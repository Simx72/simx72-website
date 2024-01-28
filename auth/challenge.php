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


function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*(){}|:">?¯˘¿ÆþÞ∏”’»±—‚‚·°‡⁄€‹›ﬁﬂ‡'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

// Generate a random salt (recommended length: at least 10 characters)
$salt = random_str();

// Generate a random secret number (positive integer)
// Range depends on the chosen complexity (refer to documentation)
// Ensure NOT to expose this number to the client
$secret_number = random_int(0, 9999);

// Compute the SHA256 hash of the concatenated salt + secret_number (result encoded as HEX string)
$challenge = hash("sha256", $salt.$secret_number, false);


// estaba cambiando el codigo del altcha en codigo php


// Create a server signature using an HMAC key (result encoded as HEX string)
$signature = hash_hmac("sha256", $challenge, hmac_key, false);


// Return JSON-encoded data
response = {
  algorithm = 'SHA-256',
  challenge,
  salt,
  signature,
};