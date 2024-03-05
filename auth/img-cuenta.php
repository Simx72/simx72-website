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

function showImg(string $mime, string $blob)
{
	header('Content-Type: ' . $mime);
	print $blob;
}

function default_img()
{
	global $db;
	// get default image
	$query_string = 'SELECT `value`,`mime` FROM `assets` WHERE `key` = ?';
	$query = $db->prepare($query_string);
	$query->execute(['default_profil_img']);
	$res = $query->fetch(PDO::FETCH_ASSOC);
	$blob = $res['value'];
	$mime = $res['mime'];
	// send it
	showImg($mime, $blob);
}


/**
 * @return int|null
 */
function getImgId(int $id)
{
	global $db;
	// get imgid from `users`
	$query_string = 'SELECT `imgid` FROM `users` WHERE `id` = ?';
	$query = $db->prepare($query_string);
	$query->execute([$id]);
	$imgid = $query->fetch(PDO::FETCH_ASSOC)['imgid'];
	return $imgid;
}

/**
 * @return mixed|null
 */
function getImgById(int $imgid)
{
	global $db;
	// get imgid from `users`
	$query_string = 'SELECT `mime`, `value` FROM `users_images` WHERE `id` = ?';
	$query = $db->prepare($query_string);
	$query->execute([$imgid]);
	$res = $query->fetch(PDO::FETCH_ASSOC);
	return $res;
}

/**
 * @param int $id - The user id
 */
function getUserImg()
{
	global $auth;
	$id = $auth->getUserId();
	$imgid = getImgId($id);
	if ($imgid) {
		$img = getImgById($imgid);
		if ($img) {
			return $img;
		}
	}
	return null;
}


if (!isset($_GET['accion']) || !$auth->isLoggedIn()) {
	default_img();
	die;
}

/*********************************************
 * SI DE VERDAD ES UN USUARIO QUE YA INGRESÓ
 *********************************************/

$accion = $_GET['accion'];

$allowed_types = array("image/jpeg", "image/png");

// accion == 'cambiar' {return true or false}
if ($accion == 'cambiar') {
	// var_dump($_FILES);
	/* check image is there */
	if (!isset($_FILES['imagen'])) {
		http_response_code(400);
		echo "Error 400: Bad Request <br>\nReason: No file uploaded";
		die;
	}

	// get data
	$id = $auth->getUserId();
	$file = $_FILES['imagen'];
	$filedata = file_get_contents($file['tmp_name']);
	$mime = $file['type'];
	$size = $file['size'] / 1_000_000; // megabytes

	/* Check type and size */
	if (!in_array($mime, $allowed_types, true) || $size > 1.5/* Mb */) {
		http_response_code(400);
		echo "Error 400: Bad Request <br>\nReason: Bad mimetype or size too big.";
		die;
	}

	/* get imgid from `users` */
	$imgid = getImgId($id);

	function sacar_error()
	{
		http_response_code(500);
		echo "Error 500\nNo se pudo cambiar la imagen, revise que el formato sea el correcto y que el tamaño no sea muy grande.";
		die;
	}
	// var_dump($imgid);

	/* if (imgid == null) {insert} else {update} */
	if ($imgid == null) {
		$query_string = 'INSERT INTO `users_images` (`mime`, `value`) VALUES (?, ?)';
		$query = $db->prepare($query_string);
		$error = !$query->execute([$mime, $filedata]);
		if ($error) {
			sacar_error();
		}
		/* Set imgid in `users` table */
		$imgid = $db->lastInsertId();
		$query_string = 'UPDATE `users` SET `imgid` = ? WHERE `id` = ?';
		$query = $db->prepare($query_string);
		$error = !$query->execute([$imgid, $id]);
	} else {
		$query_string = 'UPDATE `users_images` SET `mime` = ?, `value` = ? WHERE `id` = ?';
		$query = $db->prepare($query_string);
		$error = !$query->execute([$mime, $filedata, $imgid]);
		if ($error) {
			sacar_error();
		}
	}




	echo 'Imagen cambiada con exito';
	header('Location: ./cuenta.php');
	die;
}

// accion == 'defecto' {return image or default}
if ($accion == 'defecto') {
	$img = getUserImg();
	if ($img) {
		showImg($img['mime'], $img['value']);
	} else {
		default_img();
	}
	die;
}


// accion == 'null' {return image or null (404) }
if ($accion == 'null') {
	$img = getUserImg();
	if ($img) {
		showImg($img['mime'], $img['value']);
	} else {
		http_response_code(404);
		echo 'NULL';
	}
	die;
}

echo 'NULL';