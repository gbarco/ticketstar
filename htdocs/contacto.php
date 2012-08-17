<!doctype html>
<html lang="es">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>TicketStar</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>

<link rel="shortcut icon" href="favicon.ico"/>
</head>

<body>
	<div class="main">
	<header class="header_wrap">
		<div class="redes">
			<a class="facebook" title="facebook" href=""><span>f</span></a>
			<a class="twit"  title="twitter" href=""><span>t</span></a>
		</div>
		<a href="index.html"><img src="img/logo.png" alt="TicketStar"></a>
    	<!--headertop-->
	</header>
    <div class="main-wrap">
	<form action="contacto.php" method="post">

		<h1>CONSULTAS</h1>

		<fieldset id="user-details">

			<label for="name">Nombre:</label>
			<input type="text" name="name" value="" />

			<label for="email">Email:</label>
			<input type="email" name="email" value=""  />

			<label for="phone">Telefono:</label>
			<input type="text" name="phone" value=""  />

		</fieldset><!--mensaje-->

		<fieldset id="user-message">

			<label for="message">Mensaje:</label>
			<textarea name="message" rows="0" cols="0"></textarea>

			<?php
				require_once('../lib/contactolib.php');
				require_once('../lib/recaptchalib.php');
				$publickey = "your_public_key"; // you got this from the signup page
				echo recaptcha_get_html('6LfBlc4SAAAAAKOAYpweVXT_Sfsd1U4Z744IZe4k');
			?>

			<input type="submit" value="enviar" name="submit" class="submit" />

			<div>
				<?php
					if ($status)
						echo 'Muchas gracias por contacterse con nosostros.';
				?>
			</div>
		</fieldset><!-- fin de mensaje -->

	</form>
    </div>
 </div>
 <footer>
	<div class="footer_wrap">
		<div class="footer_ind">
			<p>Contacto</p> <br/>
            <p>info@tickerstar.com.uy</p> <br/>
            <p>Cel.: 098 313 325</p>
            <div class="contacto" title="contacto">
            <a href="#">@</a>
            </div>
		</div>
		<div class="footer_ind">
			<p>terminos y condiciones</p>
            <div class="term_cond_leer" title="leer PDF" >
            <a href="terminos y condiciones.pdf" target="_blank" > </a>
            </div>
            <div class="term_cond_desc" title="descargar PDF">
            <a href="terminos y condiciones.rar" > </a>
            </div>

		</div>
		<div class="footer_ind">
		<p>Conozca más</p>
		</div>
		<div class="footer_ind_der" style="border-right:none;" title="www.computadorasyservice.com">
			<p>desarrollado por:</p> <br/>

            <a href="http://www.computadorasyservice.com" target="_blank" ></a>
		</div>
	</div>
</footer>
</body>
</html>
