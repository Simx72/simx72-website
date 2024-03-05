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


require_once __DIR__ . '/../include/auth.php';

// if ?accion=challenge
if (isset($_GET['accion'])) {
    if ($_GET['accion'] == 'challenge') {
        $challenge = crear_challenge(null, null);
        
        // Return JSON-encoded data
        
        header("Content-Type: application/json");
        echo json_encode($challenge);
        
    }
}
