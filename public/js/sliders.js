document.addEventListener("DOMContentLoaded", function() {

  const msSliderEl = document.querySelector(".ms-slider"),
        glSliderEl = document.querySelector(".gl-slider"),
        blogSliderEl = document.querySelector(".blog-slider"),
        recSliderEl = document.querySelector(".rec-slider");

  if (msSliderEl) {

    const msSlider = new Swiper(".ms-slider", {
      slidesPerView: 1,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.ms-pagination',
      }
    });

  }

  if (glSliderEl) {

    const glSlider = new Swiper(".gl-slider", {
      loop: true,
      navigation: {
        nextEl: '.gl-arrow-next',
        prevEl: '.gl-arrow-prev',
      },
      breakpoints: {
        0: {
          slidesPerView: 3,
        },
        786: {
          slidesPerView: 4,
        },
        991: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1200: {
          slidesPerView: 4,
        },
        1610: {
          slidesPerView: 5,
        },
      }
    });

  }

  if (blogSliderEl) {
    const blogSlider = new Swiper(".blog-slider", {
      loop: true,
      navigation: {
        nextEl: '.blog-slider-arrow-next',
        prevEl: '.blog-slider-arrow-prev',
      },
      breakpoints: {
        0: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        520: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
      }
    });
  }

  
  if (recSliderEl) {
    const recSlider = new Swiper(".rec-slider", {
      navigation: {
        nextEl: '.rec-slider-arrow-next',
        prevEl: '.rec-slider-arrow-prev',
      },
      pagination: {
        el: '.rec-pagination',
      },
      breakpoints: {
        0: {
          slidesPerView: 1
        },
        570: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        991: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1600: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
      }
    });
  }

});