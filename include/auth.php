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

require_once __DIR__ . "/./env.php";

if (isset($env["MODE"])) {
	if ($env["MODE"] == "development") {
		error_reporting(E_ALL);
		ini_set('display_errors', 'On');
	}
}

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../include/db.php';
require_once __DIR__ . '/../include/mailer.php';

$auth = new \Delight\Auth\Auth($db);

$challenge_available_algorithms = array(
	"SHA-256" => "sha256",
	"SHA-384" => "sha384",
	"SHA-512" => "sha512"
);

function crear_challenge(string|null $salt, int|null $secret_number)
{
	global $env, $challenge_available_algorithms;

	$salt = $salt ?? bin2hex(random_bytes(12));
	$secret_number = $secret_number ?? random_int(100_000, 350_000);

	$algorithm = $challenge_available_algorithms[$env['ALTCHA_ALGORITHM']];

	$challenge = hash($algorithm, $salt . $secret_number);

	$signature = hash_hmac($algorithm, $challenge, $env['ALTCHA_HMAC_KEY']);

	return ['algorithm' => $env['ALTCHA_ALGORITHM'], 'challenge' => $challenge, 'signature' => $signature, 'salt' => $salt];
}

function altcha_es_valido(string $altcha): bool
{
	$json = json_decode(base64_decode($altcha), true);

	if ($json !== null) {
		$check = crear_challenge($json['salt'], $json['number']);

		// var_dump($json, $check);

		return $json['algorithm'] === $check['algorithm']
			&& $json['challenge'] === $check['challenge']
			&& $json['signature'] === $check['signature'];
	}
	return false;
}


function verificar_conexion()
{
	if (
		!(isset($_SERVER['HTTPS']) &&
			($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
			isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
			$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
	) {
		?>
		<div class="alert alert-danger" role="alert" id="https-warning">
			<div>
				<h3>Cuidado</h3>
			</div>
			<div>
				La conexión no esta protegida por el protocolo HTTPS. La información podría ser robada en tránsito
			</div>
		</div>
		<script>
			{
				let btn = document.createElement('button');
				btn.type = "button";
				btn.classList.add("btn", "btn-success");
				btn.innerHTML = 'Proteger <i class="bi bi-lock"></i>';
				let secureUrl = new URL(window.location.href);
				secureUrl.protocol = "https";
				btn.addEventListener('click', _ => {
					window.location.url = secureUrl;
				})
				let div = document.createElement('div');
				div.appendChild(btn);
				document.getElementById('https-warning').appendChild(div);
			}
		</script>
		<?php
	}
}