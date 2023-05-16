window.addEventListener('resize', hideNextSlides);

function hideNextSlides() {
    var slides = document.querySelectorAll('.slide');
    var activeSlides = document.querySelector('.slide.active');
    var activeIndex = Array.from(slides).indexOf(activeSlides);

    for (let i = activeIndex + 1; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
}