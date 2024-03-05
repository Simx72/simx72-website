<?php
/*
 * Simx72 website
 * 
 * @author Simx72
 * @link mailto:angel2600@proton.me
 * @link http://sdesim.ca/
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html
 * -----
 * Copyright (C) 2024  Simx72
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 */

require_once 'auth.php';

$titulo = "[Título]";
$nom_sitio = "sdesim.ca";
$filepath = __FILE__;
$fileyear = "2023"; // replace with current year

function template_config($title, $__FILE__) {
	global $titulo, $filepath, $fileyear;
	$titulo = $title;
	$filepath = $__FILE__;
	$fileyear = date ("Y", filemtime($filepath));
}

function head()
{
	global $titulo, $nom_sitio, $fileyear;

	if (isset($_GET['plantilla'])) {
		if ($_GET['plantilla'] == 'no') {
			return;
		}
	}
	
	?>

	<!-- 
	Sitio de Simx72, donde subo mis proyectos
	de aplicaciones y videojuegos ;) 


	Copyright (C) <?php echo $fileyear; ?>  Simx72

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU Affero General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU Affero General Public License for more details.

	You should have received a copy of the GNU Affero General Public License
	along with this program.  If not, see <https://www.gnu.org/licenses/>.
	-->

<!DOCTYPE html>
<html lang="es">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="./favicon.png" type="image/x-icon">

	<link rel="stylesheet" href="/build/css/index.css?<?php echo filemtime(dirname(__FILE__).'/../build/css/index.css'); ?>">

	<?php 
	// <script async defer src="/node_modules/altcha/dist/altcha.js" type="module"></script> --> 
	?>

	<title><?php echo $titulo." - ".$nom_sitio; ?></title>
</head>
<body>
	<?php
		myheader();
	?>
	<section id="cuerpo">
	<?php
}

function myheader()
{
	global $auth;
	?>
	<div class="text-bg-dark border-bottom">
		<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-around py-3">

			<div class="col-md-3 mb-2 mb-md-0">
				<span class="it-works-button"></span>
				It works
			</div>

			<ul id="header_tabs" class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
				<?php /* T*T volver amarillo si se para en él (con un script) */ ?>
				<li><a href="/"				class="header-link normal px-2 link-primary">Inicio</a></li>
				<li><a href="/juegos.php"	class="header-link normal px-2">Juegos</a></li>
				<li><a href="/blog.php"		class="header-link normal px-2">Blog</a></li>
				<li><a href="/faq.php"		class="header-link normal px-2">FAQ</a></li>
				<li><a href="/sobre_mi.php"	class="header-link normal px-2">Sobre mí</a></li>
			</ul>


			<div class="col-md-3 text-end">
				<a href="/auth/ingreso.php" class="header-link">
					<button type="button" class="btn btn-outline-primary me-2">
						<?php
						if (!$auth->isLoggedIn()) {
							echo 'Cuenta';
						} else {
							?>
								<img class="img-de-perfil" src="/auth/img-cuenta.php?accion=defecto" alt="Imagen de perfil de la cuenta">
								<span><?php echo substr($auth->getUsername(), 0, 10); ?></span>
							<?php
						}
						?>
					</button>
				</a>
			</div>

		</header>
	</div>

	<?php
}

/**
 * @deprecated
 */
function fullhead() {
	head();
}

function pies()
{
	global $fileyear;
	if (isset($_GET['plantilla'])) {
		if ($_GET['plantilla'] == 'no') {
			return;
		}
	}
	
	?>
		</section>
		<div id="footer-1" class="footer row sticky">
				<span class="text-center">
					Simx72-website  Copyright &copy; <?php echo $fileyear; ?>  Simx72
				</span>
			</div>
		</div>
		<section id="footer">
			<div id="footer-box">
				<div class="container-sm">
					<div id="footer-2" class="footer row">
						<div class="col-md-6">
							<a href="mailto:angel2600@proton.me">angel2600@proton.me</a>
						</div>
						<div class="col-md-6">
							<a href="/git.php">Git</a>
						</div>
					</div>
					<div id="footer-3" class="footer text-center">
						<p>
							Este sitio esta bajo licencia GNU-AGPL-v3, para mas detalles vaya a <a href="/licencia.php">/licencia.php</a>.
						</p>
						<p>
							Esto es software libre, siéntase libre de redistribuirlo y modificarlo siempre y cuando cumpla con las condiciones; mas detalles en <a href="/licencia.php#terms">/licencia.php#terms</a>.
						</p>
						<p class="t-chiquito">
							Por el momento no he configurado el servidor para mostrar el repositorio, pero puedes pedirme el código fuente a <a href="mailto:angel2600@proton.me">angel2600@proton.me</a>
						</p>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
	<?php
}

function alerta_error(string $error, string $volver_a = "", string $mensaje = "Ocurrió un error mientras se procesaba su solicitud.") {
	?>
	<div class="container">
		<div
		class="alert alert-danger"
		role="alert"
        >
		<strong>Error: <?php echo htmlspecialchars($error); ?></strong>
		<p><?php echo $mensaje; ?></p>
		<?php
			if ($volver_a != "") {
				?>
				<a href="<?php echo $volver_a; ?>">Volver ↩️</a>
				<?php
			}
			?>
        </div>
	</div>
	<?php
}