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

function template_config($title, $__FILE__) {
	global $titulo, $filepath;
	$titulo = $title;
	$filepath = $__FILE__;
}

function head()
{
	global $titulo, $nom_sitio, $filepath;
	$fileyear = date ("Y", filemtime($filepath));
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
	<link rel="stylesheet" href="/build/css/bgrid.css?<?php echo filemtime(dirname(__FILE__).'/../build/css/bgrid.css'); ?>">

	<title><?php echo $titulo." - ".$nom_sitio; ?></title>
</head>
<body>
<?php
}

function HeaderL() {
	?>
	<a href="./">Ir a inicio</a>
	<?php
}
function HeaderC() {
	global $titulo;
	echo '<span class="bold t-grande">'.$titulo.'</span>';
}
function HeaderR() {
	/* T*T */
	?>
	<div class="nodis">Prontoo... :)</div>
	<?php
}


function myheader()
{
	?>
	<nav
		class="navbar navbar-expand-sm navbar-light bg-light"
	>
		<div class="container">
			<a class="navbar-brand" href="/">Navbar</a>
			<button
				class="navbar-toggler d-lg-none"
				type="button"
				data-bs-toggle="collapse"
				data-bs-target="#top-header-collapsibleNavId"
				aria-controls="top-header-collapsibleNavId"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="top-header-collapsibleNavId">
				<ul class="navbar-nav me-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-link active" href="/" aria-current="page"
							>Inicio
							<span class="visually-hidden">(current)</span></a
						>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/static">Static</a>
					</li>
					<li class="nav-item dropdown">
						<a
							class="nav-link dropdown-toggle"
							href="#"
							id="dropdownId"
							data-bs-toggle="dropdown"
							aria-haspopup="true"
							aria-expanded="false"
							>Dropdown</a
						>
						<div
							class="dropdown-menu"
							aria-labelledby="dropdownId"
						>
							<a class="dropdown-item" href="#"
								>Action 1</a
							>
							<a class="dropdown-item" href="#"
								>Action 2</a
							>
						</div>
					</li>
				</ul>
				<form class="d-flex my-2 my-lg-0">
					<input
						class="form-control me-sm-2"
						type="text"
						placeholder="Bus"
					/>
					<button
						class="btn btn-outline-success my-2 my-sm-0"
						type="submit"
					>
						[lupita de detective :D]
					</button>
				</form>
			</div>
		</div>
	</nav>
	
	<header id="header">
		<div class="mr-auto">
			<?php HeaderL(); ?>
		</div>
		<div class="center">
			<?php HeaderC(); ?>
		</div>
		<div class="ml-auto">
			<?php HeaderR(); ?>
		</div>
	</header>
	<section id="cuerpo">

	<?php
}

function fullhead() {
	head();
	myheader();
}

function pies()
{
	?>
	</section>
	<section class="footer">
		<footer>
		Simx72-website  Copyright &copy; 2023  Simx72
	Este sitio esta bajo licencia GNU-AGPL-v3, para mas detalles vaya a <a href="./licencia.php">./licencia.php</a>.
	<br>
	Esto es software libre, siéntase libre de redistribuirlo y modificarlo siempre y cuando <br> cumpla con las condiciones; mas detalles en <a href="./licencia.php#terms">./licencia#terms</a>.
		</footer>
	</section>
</body>
</html>
	<?php
}