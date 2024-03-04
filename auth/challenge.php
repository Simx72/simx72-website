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

require_once __DIR__ . '../include/env.php';

function crear_challenge(string $salt = bin2hex(random_bytes(12)), int $secret_number = random_int(100_000, 350_000))
{
    global $env;

    $algorithm = $env['ALTCHA_HMAC_KEY'];

    $challenge = hash($algorithm, $salt . $secret_number);

    $signature = hash_hmac($algorithm, $challenge, $env['ALTCHA_HMAC_KEY']);

    return ['algorithm' => $algorithm, 'challenge' => $challenge, 'signature' => $signature];
}

if (isset($_GET['crear-challenge'])) {
    $challenge = crear_challenge();

    // Return JSON-encoded data

    header("Content-Type: application/json");
    ?>{
    "algorithm": "SHA-256",
    "challenge": "<?php echo $challenge['challenge']; ?>",
    "salt": "<?php echo $challenge['salt']; ?>",
    "signature": "<?php echo $challenge['signature']; ?>"
    }
    <?php
}
