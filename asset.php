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
//

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function notFound() {
    http_response_code(404);
    echo 'Error 404';
    die;
}

if (!isset($_GET['name'])) {
    notFound();
}


require_once __DIR__ . '/include/db.php';


$name = $_GET['name'];

function showImg(string $mime, string $blob)
{
    header('Content-Type: ' . $mime);
	print $blob;
}

function showAsset(string $name)
{
	global $db;
	// get default image
	$query_string = 'SELECT `value`,`mime` FROM `assets` WHERE `key` = ?';
	$query = $db->prepare($query_string);
	$worked = $query->execute([$name]);
    if ($worked) {
        $res = $query->fetch(PDO::FETCH_ASSOC);
        $blob = $res['value'];
        $mime = $res['mime'];
        // send it
        showImg($mime, $blob);
    } else {
        notFound();
    }
}

showAsset($name);

