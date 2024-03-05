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


/**
 * 
 * @param {'GET'|'POST'} method - the method to use
 * @param {string | URL} url - the url to get the data from
 * @returns {Promise<XMLHttpRequest>}
 */
let ajax = (method, url) => new Promise((res, rej) => {
    let xhr = new XMLHttpRequest();
    xhr.addEventListener('readystatechange', _ => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            res(xhr);
        } else if (xhr.status > 400) {
            rej(xhr);
        }
    });
    xhr.open(method, url);
    xhr.send();
});

export {ajax};