let MegaMenu;
let dropdownEls;
let navEls;

function resetActives() {
    dropdownEls.forEach(navItem => navItem.classList.remove('active'));
    navEls.forEach(navItem => navItem.classList.remove('active'));
}

function resetMegaMenu(e) {
    resetActives();
    e.target.parentElement.classList.add('active');
}

function toggleMegaMenu(e) {
    e.preventDefault();
    resetActives();
    if(MegaMenu && MegaMenu.classList.contains('active')) {
        MegaMenu.classList.remove('active');
        e.target.parentElement.classList.remove('active');
    } else {
        MegaMenu.classList.add('active');
        e.target.parentElement.classList.add('active');
    }
}

document.onreadystatechange = function () {
    MegaMenu = document.querySelector('.MegaMenu');
    if (document.readyState == "interactive") {
        dropdownEls = document.querySelectorAll('.site-navigation #menu-primary .menu-item-has-children');
        navEls = document.querySelectorAll('.site-navigation #menu-primary menu-item:not(.menu-item-has-children)');
    }

    if(navEls && navEls.length > 0) {
        navEls.forEach(navItem => {
            navItem.firstElementChild.addEventListener('click', toggleMegaMenu);
        });
    }

    if(dropdownEls && dropdownEls.length > 0) {
        dropdownEls.forEach(navItem => {
            navItem.firstElementChild.addEventListener('click', toggleMegaMenu);
        });
        document.addEventListener('click', function(event) {
            if(event.target.parentElement.classList.contains('menu-item-has-children') === false) {
                MegaMenu.classList.remove('active');
            }
        });
    }
}