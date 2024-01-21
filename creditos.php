<?php
/*
 * File: <project root>/creditos.php
 * Project: simx72-website
 * File Created: Saturday, 25th November 2023 11:28:11 pm
 * Author: Simx72 (angel2600@proton.me)
 * -----
 * Last Modified: Sunday, 3rd December 2023 3:26:39 pm
 * Modified By: Simx72 (angel2600@proton.me>)
 * -----
 * Copyright (C) 2023  Simx72
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 */



require './include/template.php';

template_config("Créditos", __FILE__);

fullhead();

?>
	<div class="bloque">
        <img src="./favicon.png" class="f-left" style="width: 35px; height: 35px; margin: .3rem" width="35" height="35" alt="Blue ice shot spell">
        Favicon by J. W. Bjerk (eleazzaar) -- www.jwbjerk.com/art -- <br>
        find this and other open art at: http://opengameart.org
	</div>
<?php

pies();
