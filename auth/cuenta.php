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

require_once __DIR__ . '/../include/auth.php';
require_once __DIR__ . '/../include/template.php';


$titulo = 'Mi cuenta';

head();

if (!$auth->isLoggedIn()) {
	?>
	<div class="container">
		Primer necesitas ingresar con tus credenciales. Para hacerlo ve a <a href="/auth/ingreso.php">Ingreso</a>.
	</div>
	<?php
	pies();
	die;
}

?>


<div class="container">
	<p>
		Bienvenido
		<?php echo $auth->getUsername(); ?>
	</p>

	<div class="row justify-content-around w-100">
		<div class="col-md-1"></div>
		<div class="col-md-4">
			<div class="bloque">
				<img class="img-de-perfil rounded-circle" src="./img-cuenta.php?accion=defecto"
					alt="Imagen de perfil de <?php echo $auth->getUsername(); ?>" />
				<br>
				<form action="./img-cuenta.php?accion=cambiar" method="post" enctype="multipart/form-data">
					<input type="file" style="visibility:hidden;" id="imagen-perfil" name="imagen" aria-label="Cambiar imagen">
					<div class="input-group mb-3">
						<label class="btn btn-secondary" for="imagen-perfil">
							Elegir imagen
						</label>
						<button class="btn btn-primary" type="submit" id="subir-imagen-perfil">
							Cambiar
							<i class="bi bi-arrow-repeat"></i>
						</button>
					</div>
				</form>

			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-6">
			<div class="bloque">
			</div>
		</div>
	</div>

	<div>
		<a href="./cerrar_sesion.php">Cerrar sesión</a>
	</div>

</div>





<?php

pies();


