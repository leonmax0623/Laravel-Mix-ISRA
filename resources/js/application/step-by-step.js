document.addEventListener("DOMContentLoaded", function () {
    const stepsWrapper = document.querySelectorAll(".steps-wrapper");

    stepsWrapper.forEach(function (wraps) {
        const stepCont = wraps.querySelectorAll(".step-container");

        stepCont.forEach((elem, index, arr) => {
            let step = 1;

            if (parseInt(elem.dataset.step) === step) {
                elem.classList.add("active")
            }

            elem.addEventListener("click", function (e) {
                const prevBtn = e.target.closest(".step-btn-prev"),
                    nextBtn = e.target.closest(".step-btn-next");

                if (prevBtn) {
                    step--;
                    arr.forEach(stepEl => stepEl.classList.remove("active"));
                    arr[index - 1].classList.add("active");
                }

                if (nextBtn) {
                    step++;
                    arr.forEach(stepEl => stepEl.classList.remove("active"));
                    arr[index + 1].classList.add("active");
                }
            });
        })
    });
});
