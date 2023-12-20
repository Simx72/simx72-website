<?php
/*
 * File: <project root>/include/auth.php
 * Project: www
 * File Created: Wednesday, 20th December 2023 2:17:00 pm
 * Author: Simx72 (angel2600@proton.me)
 * -----
 * Copyright (C) 2023  Simx72
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 */


require_once './db.php';
require_once '../vendor/autoload.php';

$auth = new \Delight\Auth\Auth($db);
