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



// Criando carrossel nas imagens
const carousels = document.querySelectorAll(".container-slider");
carousels.forEach((carousel) => {
  const slider = carousel.querySelectorAll(".slider");
  const btnPrev = carousel.querySelector(".prev-button");
  const btnNext = carousel.querySelector(".next-button");

  let currentSlide = 0;

  function hideSlider() {
    slider.forEach((item) => item.classList.remove("on"));
  }

  function showSlider() {
    slider[currentSlide].classList.add("on");
  }

  function nextSlider() {
    hideSlider();
    if (currentSlide === slider.length - 1) {
      currentSlide = 0;
    } else {
      currentSlide++;
    }
    showSlider();
  }

  function prevSlider() {
    hideSlider();
    if (currentSlide === 0) {
      currentSlide = slider.length - 1;
    } else {
      currentSlide--;
    }
    showSlider();
  }

  btnNext.addEventListener("click", nextSlider);
  btnPrev.addEventListener("click", prevSlider);
});