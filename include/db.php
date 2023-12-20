<?php 
/*
 * File: <project root>/include/db.php
 * Project: www
 * File Created: Wednesday, 20th December 2023 12:36:25 pm
 * Author: Simx72 (angel2600@proton.me)
 * -----
 * Copyright (C) 2023  Simx72
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 */


$db_connect = explode(" ", getenv('DB_CONNECT'));

var_dump($db_connect);

try {
    $db = new PDO($db_connect[0], $db_connect[1], $db_connect[2]);
    echo "working";
} catch (Exception $e) {
    echo $e;
}



