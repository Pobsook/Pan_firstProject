// Slide Show
let slideIndex = 0;
showSlides();

function showSlides() {
    let slides = document.getElementsByClassName("mySlides");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
        slides[i].style.opacity = 0;
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1; 
    }
    let currentSlide = slides[slideIndex - 1];
    currentSlide.style.display = "block";  
    setTimeout(function() {
        currentSlide.style.opacity = 1; 
    });

    setTimeout(showSlides, 10000); 
}

function plusSlides(n) {
    slideIndex += n;
    let slides = document.getElementsByClassName("mySlides");
    if (slideIndex > slides.length) {slideIndex = slides.length}
    if (slideIndex < 1) {slideIndex = 1}
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        slides[i].style.opacity = 0; 
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(function() {
        slides[slideIndex - 1].style.opacity = 1; 
    }); 
}