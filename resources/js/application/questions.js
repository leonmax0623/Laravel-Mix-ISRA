document.addEventListener("DOMContentLoaded", function() {

  const elQuests = document.querySelectorAll(".quests-qst"),
        elItem = document.querySelectorAll(".quests-item");

  elQuests.forEach((elem, index) => {
    elem.addEventListener("click", () => {
      let currHeight = parseInt(window.getComputedStyle(elItem[index], null).getPropertyValue("height"), 10);
      if (elQuests[index].clientHeight === currHeight) {
          elItem[index].style.height = `${ elItem[index].scrollHeight }px`;
      } else {
          elItem[index].style.height = `${ elQuests[index].clientHeight }px`;
      }
    });
  });

});