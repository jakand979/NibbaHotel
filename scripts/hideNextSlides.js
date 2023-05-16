window.addEventListener('resize', hideNextSlides);

function hideNextSlides() {
    const slides = document.querySelectorAll('.slide');
    const activeSlides = document.querySelector('.slide.active');
    const activeIndex = Array.from(slides).indexOf(activeSlides);

    for (let i = activeIndex + 1; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
}