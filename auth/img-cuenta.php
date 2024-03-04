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
require_once __DIR__ . '/../include/db.php';


function default_img () {
	global $db;
	// get default image
	$query_string = 'SELECT `value`,`mime` FROM `assets` WHERE `key` = ?';
	$query = $db->prepare($query_string);
	$query->execute(['default_profil_img']);
	$res = $query->fetch(PDO::FETCH_ASSOC);
	$blob = $res['value'];
	$mime = $res['mime'];
	// send it
	header('Content-Type: '.$mime);
	echo $blob;
}


if (!isset($_GET['action']) || !$auth->isLoggedIn()) {
	default_img();
	die;
}

/*********************************************
 * SI DE VERDAD ES UN USUARIO QUE YA INGRESÓ
 *********************************************/

$action = $_GET['action'];


if ($action == 'update') {
	// check image is there
	if (!isset($_FILES['image'])) {
		http_response_code(400);
		die;
	}

	// get data
	$id = $auth->getUserId();
	$filename = $_FILES['avatar']["tmp_name"];
	$file = file_get_contents($filename);
	$mime = mime_content_type($filename);

	// get imgid from `users`


	// if (imgid == null) {insert} else {update}
	$query_string='INSERT INTO `users_images` (`mime`, `value`) VALUES (?, ?);';


	// update imgid in `users`

	

}

// action == 'default' {return image or default}
// action == 'null' {return image or null (404) }