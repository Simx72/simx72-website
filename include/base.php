<?php
/*
 * File: <project root>/include/base.php
 * Project: simx72-website
 * File Created: Sunday, 26th November 2023 12:17:10 am
 * Author: Simx72 (angel2600@proton.me)
 * -----
 * Last Modified: Sunday, 3rd December 2023 3:43:10 pm
 * Modified By: Simx72 (angel2600@proton.me>)
 * -----
 * Copyright (C) 2023  Simx72
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 */



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

	<title><?php echo $titulo." - ".$nom_sitio; ?></title>
</head>
<body>
<?php
	myheader();
	?> <section id="cuerpo"> <?php
}

function myheader()
{
	?>
	<div class="text-bg-dark border-bottom">
		<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-around py-3">

			<div class="col-md-3 mb-2 mb-md-0">
				<span class="it-works-button"></span>
				It works
			</div>

			<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
				<?php /* T*T volver amarillo si se para en él (con un script) */ ?>
				<li><a href="/"				class="normal px-2 link-primary">Inicio</a></li>
				<li><a href="/juegos.php"	class="normal px-2">Juegos</a></li>
				<li><a href="/blog.php"		class="normal px-2">Blog</a></li>
				<li><a href="/faq.php"		class="normal px-2">FAQ</a></li>
				<li><a href="/git.php"		class="normal px-2">Git</a></li>
				<li><a href="/sobre_mi.php"	class="normal px-2">Sobre mí</a></li>
			</ul>

			<div class="col-md-3 text-end">
				<button type="button" class="btn btn-outline-primary me-2">Login</button>
				<button type="button" class="btn btn-primary">Sign-up</button>
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
	?>
	</section>
	<section class="footer">
		<footer>
		Simx72-website  Copyright &copy; <?php echo $fileyear; ?>  Simx72
	Este sitio esta bajo licencia GNU-AGPL-v3, para mas detalles vaya a <a href="./licencia.php">./licencia.php</a>.
	<br>
	Esto es software libre, siéntase libre de redistribuirlo y modificarlo siempre y cuando <br> cumpla con las condiciones; mas detalles en <a href="./licencia.php#terms">./licencia#terms</a>.
	<p class="t-chiquito">Por el momento no he configurado el servidor para mostrar el repositorio pero si necesitas el codigo fuente puedes pedirmelo escribiendo a <a href="mailto:angel2600@proton.me">angel2600@proton.me</a></p>		
</footer>
	</section>
</body>
</html>
	<?php
}