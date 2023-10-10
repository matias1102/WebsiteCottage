document.addEventListener("DOMContentLoaded", function() {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');

    function showSlide(index) {
        slides.forEach((slide) => {
            slide.style.display = 'none';
        });
        slides[index].style.display = 'block';
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    const prevButton = document.getElementById('prevBtn');
    const nextButton = document.getElementById('nextBtn');

    prevButton.addEventListener('click', prevSlide);
    nextButton.addEventListener('click', nextSlide);

    // Automatiquement passer à la diapositive suivante toutes les 3 secondes
    setInterval(nextSlide, 30000);

    // Afficher la première image dès le chargement de la page
    showSlide(currentSlide);
});
