document.addEventListener("DOMContentLoaded", function() {
    const accountComplNum = document.querySelector(".acc-compl-number"),
        accountComplProgress = document.querySelector(".acc-compl-progress"),
        accTabItem = document.querySelectorAll(".acc-tab"),
        accContentBox = document.querySelectorAll(".acc-content"),
        accountApplyBtns = document.querySelectorAll(".acc-form-code-btn");

    if (accountComplNum.dataset.fullness <= 100 ) {
        accountComplProgress.style.width = `${accountComplNum.dataset.fullness}%`
        accountComplNum.textContent = `${accountComplNum.dataset.fullness}%`
    }

    if (window.innerWidth <= 991) {
        const accountBar = document.querySelector(".acc-bar"),
            accountBarBtn = document.querySelector(".acc-bar-btn");

        accountBarBtn.addEventListener("click", function(e) {
            accountBar.classList.toggle("active");
        });

        document.addEventListener("click", function(e) {
            let path = e.path || (e.composedPath && e.composedPath());
            if (path) {
                if (!path.includes(accountBar)) {
                    accountBar.classList.remove("active");
                }
            }
        })
    }

    accountApplyBtns.forEach(btn => {
        btn.addEventListener("click", () => btn.classList.toggle("apply"))
    });


});

$(document).ready(function() {
    $(document).on('click', '.on-item-counter', function(event) {
        let $this = $(this);

        let count = parseInt($this.attr('data-count'));

        let minus = $(event.target).closest('.minus')
        let plus = $(event.target).closest('.plus');
        let input = $(this).find('input');

        if (minus.length && count > 0) {
            count--;

            $this.attr('data-count', count);
            $this.find('.count').text(count);
        }

        if(plus.length) {
            count++;
            $this.attr('data-count', count);
            $this.find('.count').text(count);
        }

        if(input.length) {
            input.val(count);
            input.trigger('change');
        }
    });
});
