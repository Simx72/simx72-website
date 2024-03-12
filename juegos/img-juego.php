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
 * @return mixed|null
 */
function getImgJuegosById(int $hexid)
{
	global $db;

    // hex 2 int
    $id = hexdec($hexid);

	// get imgid from `users`
	$query_string = 'SELECT `imgmime`, `img` FROM `juegos` WHERE `id` = ?';
	$query = $db->prepare($query_string);
	$query->execute([$id]);
	$res = $query->fetch();
	return $res;
}


if (!isset($_GET["id"])) {
	default_img();
	die;
}

/*********************************************
 * SI DE VERDAD ES UN USUARIO QUE YA INGRESÓ
 *********************************************/

$id = $_GET['id'];

$img = getImgJuegosById($id);

if ($img) {
    showImg($img["imgmime"], $img["img"]);
} else {
    default_img();
}

