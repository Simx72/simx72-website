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

import { ajax } from "./funciones";



function transicion(href) {
    let url = new URL(href);
    url.searchParams.append('plantilla', 'no');

    ajax('GET', url).then( xhr => {
        let cuerpo =document.getElementById('cuerpo');
        cuerpo.innerHTML = xhr.responseText;
    });

}

let headerTabs = document.querySelectorAll('.header-tab');

headerTabs.forEach(tab => {
    tab.addEventListener('click', () => transicion(tab.href));
})