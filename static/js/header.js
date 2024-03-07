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
 * @param {HTMLLinkElement} tab - checks if the tab should be marked as current, and then marks it
 */
function primaryTab(tab) {
    let current = window.location.pathname;
    let header = new URL(tab.href).pathname;
    if (current == header) {
        tab.classList.add('link-primary');
    }
}

let tabs = document.querySelectorAll('.header-link');

tabs.forEach(tab => {
    primaryTab(tab);
})
