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

	<link rel="stylesheet" href="/build/css/bootstrap.css?<?php echo filemtime(dirname(__FILE__).'/../build/css/bootstrap.css'); ?>">
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
	<div class="text-bg-dark">
		<div class="container">
		  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
			<div class="d-flex itworks">
				
				It works
			</div>
	
			<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
			  <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
			  <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
			  <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
			  <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
			  <li><a href="#" class="nav-link px-2 text-white">About</a></li>
			</ul>
	
			<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
			  <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
			</form>
		  </div>
		</div>
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
		</footer>
	</section>
</body>
</html>
	<?php
}