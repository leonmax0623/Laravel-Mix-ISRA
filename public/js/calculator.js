document.addEventListener("DOMContentLoaded", function() {

  const calcProgress = document.querySelector(".calc-progress");

  if (calcProgress.dataset.percentValue <= 100 ) {
    calcProgress.style.width = `${calcProgress.dataset.percentValue}%`
  }

});