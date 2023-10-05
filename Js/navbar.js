// navbar.js

window.addEventListener('scroll', function () {
    var header = document.querySelector('header');
    var nav = document.querySelector('nav');

    if (window.scrollY >= header.offsetHeight) {
        nav.style.position = 'fixed';
        nav.style.top = '0';
        nav.style.backgroundColor = '#53B7FF'; // Nouvelle couleur principale
    } else {
        nav.style.position = 'relative';
        nav.style.backgroundColor = '#53B7FF'; // Nouvelle couleur principale
    }
});
