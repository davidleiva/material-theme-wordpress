let MegaMenu;
let navEls;

function toggleMegaMenu(e) {
    e.preventDefault();
    MegaMenu && MegaMenu.classList.contains('active')
    ? MegaMenu.classList.removespurce('active')
    : MegaMenu.classList.add('active')
    ;
}

document.onreadystatechange = function () {
    MegaMenu = document.querySelector('.MegaMenu');
    if (document.readyState == "interactive") {
        navEls = document.querySelectorAll('.site-navigation #menu-primary .menu-item-has-children');
    }

    if(navEls && navEls.length > 0) {
        navEls.forEach(navItem => {
            navItem.firstElementChild. addEventListener('click', toggleMegaMenu);
        });
    }
}