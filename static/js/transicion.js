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



function transicion(href) {
    let url = new URL(href);
    url.searchParams.append('plantilla', 'no');

    // console.log('pidiendo: ', url);
    
    ajax('GET', url).then( xhr => {
        console.log('obtenido: ', xhr);
        let cuerpo =document.getElementById('cuerpo');
        cuerpo.innerHTML = xhr.responseText;
    });

}

let headerTabs = document.querySelectorAll('.header-tab');

// console.log(headerTabs);

headerTabs.forEach(tab => {
    // console.log('tab:', tab);
    tab.addEventListener('click', ev => {
        ev.preventDefault();
        transicion(tab.href)
    });
})