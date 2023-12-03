<?php
/*
 * File: <project root>/index.php
 * Project: simx72-website
 * File Created: Thursday, 23rd November 2023 4:00:40 pm
 * Author: Simx72 (angel2600@proton.me)
 * -----
 * Last Modified: Sunday, 3rd December 2023 3:26:49 pm
 * Modified By: Simx72 (angel2600@proton.me>)
 * -----
 * Copyright (C) 2023  Simx72
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 */



require './include/base.php';

$titulo="Inicio";

head();

?>
<header id="header">
        <div class="left">
            <span class="it-works-button"></span>
            It works!
        </div>
        <div class="center">
            <?php HeaderC(); ?>
        </div>
        <div class="right">
            <?php HeaderR(); ?>
        </div>
    </header>
    <section id="cuerpo">
	<div class="bloque">
		Bienvenido al inicio. <br>
		Aún no hay nada pero algún día habrá algo. <br>
		Hasta la próxima...
	</div>
<?php

pies();