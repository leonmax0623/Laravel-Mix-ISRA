export default class ModalWindow {
    static _modalOverlay;
    static _modalList = [];

    constructor(props) {
        this.config = Object.assign({
            linkAttributeName: 'data-hystmodal',
            content: '',
            class: ''
        }, props);

        if(!ModalWindow._modalOverlay) {
            ModalWindow._modalOverlay = document.createElement('div');
            ModalWindow._modalOverlay.classList.add('modal_window__overlay');

            document.body.appendChild(ModalWindow._modalOverlay);
        }

        this.init();
    }

    init() {
        this.isOpened = false;

        let closeButton;
        let modalContentBlock;

        if(typeof this.config.id === 'undefined') {
            this._modalBlock = document.createElement('div');
            this._modalBlock.classList.add('modal_window__inner');

            closeButton = document.createElement('span');
            closeButton.classList.add('modal_window__close');

            modalContentBlock = document.createElement('div');
            modalContentBlock.classList.add('modal_window__content');
            modalContentBlock.innerHTML = this.config.content;

            this._modalBlock.appendChild(closeButton);
            this._modalBlock.appendChild(modalContentBlock);
        } else {
            this._modalBlock = document.getElementById(this.config.id);

            closeButton = this._modalBlock.querySelector('.modal_window__close');
        }

        if(this.config.class.length) {
            this._modalBlock.classList.add(this.config.class);
        }

        ModalWindow._modalList.push(this);

        closeButton.addEventListener('click', function (e) {
            return this.close();
        }.bind(this));

        window.addEventListener("keydown", function (event) {
            if (event.which === 27 && this.isOpened) {
                event.preventDefault();

                return this.close();
            }
        }.bind(this));
    }

    open() {
        ModalWindow._modalList.map(function(modal) {
            modal.close();
        });

        this._modalBlock.classList.add('active');

        ModalWindow._modalOverlay.style.display = 'block';

        document.body.appendChild(this._modalBlock);

        this.isOpened = true;
    }

    close() {
        if (!this.isOpened) {
            return;
        }

        if(typeof this.config.id === 'undefined') {
            this._modalBlock.remove();
        } else {
            this._modalBlock.classList.remove('active')
        }

        ModalWindow._modalOverlay.style.display = '';

        this.isOpened = false;
    }
}
