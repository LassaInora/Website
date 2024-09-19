<?php
$current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

function is_path($path) {
    global $current_path;
    print_r("$current_path === $path : ".($current_path === $path));
    return $current_path === $path;
}
?>

<menu class="menu">
    <button class="menu__item<?php echo is_path('') ? ' active' : ''; ?>" style="--bgColorItem: #C33800;">
        <svg class="icon" viewBox="0 0 24 24">
            <path d="M3.8,6.6h16.4"/>
            <path d="M20.2,12.1H3.8"/>
            <path d="M3.8,17.5h16.4"/>
        </svg>
    </button>

    <button class="menu__item<?php echo is_path('ecrits') ? ' active' : ''; ?>" style="--bgColorItem: #4A5920;">
        <svg class="icon" viewBox="0 0 24 24">
            <path d="M3.4,11.9l8.8,4.4l8.4-4.4"/>
            <path d="M3.4,16.2l8.8,4.5l8.4-4.5"/>
            <path d="M3.7,7.8l8.6-4.5l8,4.5l-8,4.3L3.7,7.8z"/>
    </button>

    <button class="menu__item<?php echo is_path('photos') ? ' active' : ''; ?>" style="--bgColorItem: #5C283F;">
        <svg class="icon" viewBox="0 0 24 24">
            <path d="M5.1,3.9h13.9c0.6,0,1.2,0.5,1.2,1.2v13.9c0,0.6-0.5,1.2-1.2,1.2H5.1c-0.6,0-1.2-0.5-1.2-1.2V5.1
          C3.9,4.4,4.4,3.9,5.1,3.9z"/>
            <path d="M5.5,20l9.9-9.9l4.7,4.7"/>
            <path d="M10.4,8.8c0,0.9-0.7,1.6-1.6,1.6c-0.9,0-1.6-0.7-1.6-1.6C7.3,8,8,7.3,8.9,7.3C9.7,7.3,10.4,8,10.4,8.8z"/>
        </svg>
    </button>

    <button class="menu__item<?php echo is_path('bots') ? ' active' : ''; ?>" style="--bgColorItem: #F2B100;">
        <svg class="icon" viewBox="0 0 24 24">
            <path d="M5.1,3.9h13.9c0.6,0,1.2,0.5,1.2,1.2v13.9c0,0.6-0.5,1.2-1.2,1.2H5.1c-0.6,0-1.2-0.5-1.2-1.2V5.1
          C3.9,4.4,4.4,3.9,5.1,3.9z"/>
            <path d="M4.2,9.3h15.6"/>
            <path d="M9.1,9.5v10.3"/>
    </button>

    <button class="menu__item<?php echo is_path('projets') ? ' active' : ''; ?>" style="--bgColorItem: #005D9F;">
        <svg class="icon" viewBox="0 0 24 24">
            <path d="M6.7,4.8h10.7c0.3,0,0.6,0.2,0.7,0.5l2.8,7.3c0,0.1,0,0.2,0,0.3v5.6c0,0.4-0.4,0.8-0.8,0.8H3.8
        C3.4,19.3,3,19,3,18.5v-5.6c0-0.1,0-0.2,0.1-0.3L6,5.3C6.1,5,6.4,4.8,6.7,4.8z"/>
            <path d="M3.4,12.9H8l1.6,2.8h4.9l1.5-2.8h4.6"/>
        </svg>
    </button>

    <div class="menu__border"></div>
</menu>

<div class="svg-container">
    <svg viewBox="0 0 202.9 45.5">
        <clipPath id="menu" clipPathUnits="objectBoundingBox" transform="scale(0.0049285362247413 0.021978021978022)">
            <path d="M6.7,45.5c5.7,0.1,14.1-0.4,23.3-4c5.7-2.3,9.9-5,18.1-10.5c10.7-7.1,11.8-9.2,20.6-14.3c5-2.9,9.2-5.2,15.2-7
          c7.1-2.1,13.3-2.3,17.6-2.1c4.2-0.2,10.5,0.1,17.6,2.1c6.1,1.8,10.2,4.1,15.2,7c8.8,5,9.9,7.1,20.6,14.3c8.3,5.5,12.4,8.2,18.1,10.5
          c9.2,3.6,17.6,4.2,23.3,4H6.7z"/>
        </clipPath>
    </svg>
</div>
<script>
    // Designed by:  Mauricio Bucardo
    // Original image:
    // https://dribbble.com/shots/5619509-Animated-Tab-Bar

    "use strict";

    const body = document.body;
    // const bgColorsBody = ["#ffb457", "#ff96bd", "#9999fb", "#ffe797", "#cffff1"];
    const bgColorsBody = ["#D8805D", "#8C9571", "#977685", "#F6CD5D", "#5D98C2"];
    const nmPage = ["Accueil", "Mes Écrits", "Mes Photos", "Mes Bots", "Mes Projets"];
    const nmURL = ["", "ecrits", "photos", "bots", "projets"];
    const menu = body.querySelector(".menu");
    const menuItems = menu.querySelectorAll(".menu__item");
    const menuBorder = menu.querySelector(".menu__border");
    let activeItem = menu.querySelector(".active");

    let dynamicTitle = document.querySelector(".dynamic-title");

    function clickItem(item, index, updateURL = true) {

        menu.style.removeProperty("--timeOut");

        if (activeItem === item) return;

        if (activeItem) {
            activeItem.classList.remove("active");
        }


        item.classList.add("active");
        body.style.backgroundColor = bgColorsBody[index];
        document.title = nmPage[index];
        dynamicTitle.textContent = nmPage[index];
        activeItem = item;
        offsetMenuBorder(activeItem, menuBorder);

        // Si updateURL est true, on modifie l'URL
        if (updateURL) {
            const pagePath = nmURL[index];
            window.location.href = `https://lassainora.fr/${pagePath}`;
        }
    }

    function offsetMenuBorder(element, menuBorder) {

        const offsetActiveItem = element.getBoundingClientRect();
        const left = Math.floor(offsetActiveItem.left - menu.offsetLeft - (menuBorder.offsetWidth - offsetActiveItem.width) / 2) + "px";
        menuBorder.style.transform = `translate3d(${left}, 0 , 0)`;

    }

    function checkURL() {
        const path = window.location.pathname;
        console.log(`URL : ${path}`)

        // Mapping des chemins avec les index des items
        const urlMap = {
            "/": 0,
            "/ecrits/": 1,
            "/photos/": 2,
            "/bots/": 3,
            "/projets/": 4
        };

        const index = urlMap[path] !== undefined ? urlMap[path] : 0; // Redirige vers "Accueil" par défaut
        console.log(`Vous êtes sur la page ${index} (${urlMap[index]})`)
        clickItem(menuItems[index], index, false); // false pour ne pas changer l'URL
    }

    offsetMenuBorder(activeItem, menuBorder);

    window.addEventListener("popstate", checkURL);

    menuItems.forEach((item, index) => {

        item.addEventListener("click", () => clickItem(item, index));

    })

    checkURL();

    window.addEventListener("resize", () => {
        offsetMenuBorder(activeItem, menuBorder);
        menu.style.setProperty("--timeOut", "none");
    });
</script>