<?php

/*
 *
 *
 */

	// =========================================================================
	require_once '../conf/config.php';

	// =========================================================================
	require_once '../lib/email_validation.php';
	require_once '../lib/recaptchalib.php';
	require_once '../lib/phpmailer/class.phpmailer.php';

	// =========================================================================
	function send_email($config, $email_body) {
		$xmail = new PHPMailer();
		$xmail -> From    = $config["email_from"];
		$xmail -> Subject = $config["email_subject"];
		$xmail -> Body    = $email_body;
		$xmail -> IsHTML();
		$xmail -> IsSMTP();

		$xmail -> Host     = $config["smtp_host"];
		$xmail -> Port     = $config["smtp_port"];
		$xmail -> SMTPAuth = $config["smtp_auth"];
		$xmail -> Username = $config["smtp_username"];
		$xmail -> Password = $config["smtp_password"];

		$xmail -> AddAddress($config["email_recipient"]);

		error_log("sending mail...");
		return $xmail -> Send();
	}

	// =========================================================================
	function validate_form() {
		// filter_var($email_address, FILTER_VALIDATE_EMAIL)
		return validEmail($_POST['email']);
	}

	// =========================================================================
	if (isset($_POST["submit"])) {
		$name    = $_POST['name'];
		$email   = $_POST['email'];
		$phone   = $_POST['phone'];
		$message = $_POST['message'];

		// =========================================================================
		$email_body = "Nombre: $name \n Email: $email \n Telefono: $phone \n Message: $message";

		// =========================================================================
		$recaptcha_status = recaptcha_check_answer (
			$config["recaptcha_private_key"],
			$_SERVER["REMOTE_ADDR"],
			$_POST["recaptcha_challenge_field"],
			$_POST["recaptcha_response_field"]
		);

		$status = $recaptcha_status -> is_valid and validate_form and send_email($config, $email_body);
	}

	// =========================================================================

?>
