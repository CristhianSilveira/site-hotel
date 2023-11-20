function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
        document.querySelector('i').className = 'fa-solid fa-bars';
    } else {
        menuMobile.classList.add('open');
        document.querySelector('i').className = 'fa-solid fa-xmark fa-lg';
    }
}