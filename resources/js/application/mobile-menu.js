document.addEventListener("DOMContentLoaded", function() { 
  if (window.innerWidth <= 991) {
    const menuBtn = document.querySelector(".menu-btn"),
          headerMenu = document.querySelector(".h");

    function handleNavClick() {
      headerMenu.classList.toggle("active");
      menuBtn.classList.toggle("opened");
    }

    menuBtn.addEventListener("click", handleNavClick);
  }

});