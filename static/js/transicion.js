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

// console.log('iniciado')



import { ajax } from "./funciones.js";



async function transicion(href) {
    let url = new URL(href);
    url.searchParams.append('plantilla', 'no');

    // console.log('pidiendo: ', url);

    let xhr = await ajax('GET', url);

    // console.log('obtenido: ', xhr);

    let cuerpo = document.getElementById('cuerpo');
    cuerpo.innerHTML = xhr.responseText;
    
    window.history.pushState({ from: window.href }, "", href);

}

let headerTabs = document.querySelectorAll('.header-link');

// console.log(headerTabs);

headerTabs.forEach(tab => {
    // console.log('tab:', tab);
    tab.addEventListener('click', ev => {
        ev.preventDefault();
        transicion(tab.href)
    });
})