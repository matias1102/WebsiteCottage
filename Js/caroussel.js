const carouselContainer = document.querySelector('.carousel-container');
const leftArrow = document.querySelector('.left-arrow');
const rightArrow = document.querySelector('.right-arrow');

let currentIndex = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.carousel-slide');
    slides.forEach((slide, i) => {
        const slideOffset = 100 * (i - index);
        slide.style.transform = `translateX(${slideOffset}%)`;
    });
}


leftArrow.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex-=2;
        showSlide(currentIndex);
    }
});

rightArrow.addEventListener('click', () => {
    const slides = document.querySelectorAll('.carousel-slide');
    if (currentIndex < 2*slides.length-2 ) {
        currentIndex+=2;
        showSlide(currentIndex);
    }
});

// Affiche la première diapositive au chargement de la page
showSlide(currentIndex);
