document.addEventListener("DOMContentLoaded", function () {
  // Combined tab functionality
  const tabs = document.querySelectorAll(".tab-btn");
  const cards = document.querySelectorAll(".service-card");
  const eventContainers = document.querySelectorAll("[id^='service-cards-']");
  const tabButtons = document.querySelectorAll("[id^='tab-btn-']");

  function creative_design_agency_handleTabDisplay(index) {
    // Handle main tab switching
    eventContainers.forEach((container, i) => {
      const isActive = i === index;
      container.style.display = isActive ? 'block' : 'none';
      container.classList.toggle('active', isActive);
    });

    // Update tab button states
    tabButtons.forEach((btn, i) => btn.classList.toggle('active', i === index));
  }

  // Event listeners for category filtering
  tabs.forEach(tab => {
    tab.addEventListener("click", function() {
      tabs.forEach(t => t.classList.remove("active"));
      this.classList.add("active");

      const category = this.getAttribute("data-category");
      cards.forEach(card => {
        card.style.display = (category === "all" || category === card.getAttribute("data-category")) 
          ? "block" 
          : "none";
      });
    });
  });

  // Event listeners for tab switching
  tabButtons.forEach((btn, index) => {
    btn.addEventListener('click', () => creative_design_agency_handleTabDisplay(index));
  });

  // Initialize first tab
  creative_design_agency_handleTabDisplay(0);
   wow = new WOW(
    {
    boxClass:     'wow',      // default
    animateClass: 'animated', // default
    offset:       0,          // default
    mobile:       true,       // default
    live:         true        // default
  }
  )
  wow.init();
});

jQuery(document).ready(function ($) {

  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".back-to-top a").fadeIn();
    } else {
      $(".back-to-top a").fadeOut();
    }
  });

  $(".back-to-top a").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 800);
    return false;
  });

  //slider swiper
  var creative_design_agency_Slider = new Swiper(".creative-design-agency-slider", {
    slidesPerView: 1,
    speed: 1000,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".creative-design-agency-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".creative-design-agency-button-next",
      prevEl: ".creative-design-agency-button-prev",
    },
  });

  //projects-swiper
  var creative_design_agency_project_Slider = new Swiper(".projects-slider", {
    breakpoints: {
      0: {
        slidesPerView: 1,
        centeredSlides: false,
      },
      768: {
        slidesPerView: 2,
        centeredSlides: false,
      },
      992: {
        slidesPerView: 3,
        centeredSlides: true,
      }
    },
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: ".projects-swiper-button-next",
      prevEl: ".projects-swiper-button-prev",
    },
  });

});