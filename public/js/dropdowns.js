document.addEventListener("DOMContentLoaded", function () {
    class Dropdown {
        constructor(el) {
            this.$dd = el;
            this.setup();
        }

        setup() {
            this.handleClick = this.handleClick.bind(this);
            this.handleOutClick = this.handleOutClick.bind(this);
            this.$dd.addEventListener("click", this.handleClick);
            document.addEventListener("click", this.handleOutClick);
        }

        handleClick(e) {
            if (this.$dd.classList.contains("select") && e.target.nodeName === "LI") {
                const selectedItem = this.$dd.querySelector(".selected")
                selectedItem.textContent = e.target.textContent;
                selectedItem.dataset.selected = e.target.textContent;
            }

            if (this.$dd.classList.contains("active")) {
                this.close();
            } else {
                this.open();
            }

            if (e.target.closest(".select-nested")) {
                this.open();
            }
        }

        handleOutClick(e) {
            let path = e.path || (e.composedPath && e.composedPath());
            if (path) {
                if (!path.includes(this.$dd)) {
                    this.close();
                }
            }
        }

        open() {
            this.$dd.classList.add("active");
        }

        close() {
            this.$dd.classList.remove("active");
        }

        toggle() {
            this.$dd.classList.toggle("active");
        }
    }

    const ddElems = document.querySelectorAll(".dd");

    ddElems && ddElems.forEach(el => {
        const dd = new Dropdown(el);
    });
});
