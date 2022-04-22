require('./bootstrap');

window.Swiper = require('./application/swiper-bundle.min');

require('./application/dropdowns');
require('./application/phoneMask');
require('./application/step-by-step');
require('./application/account');
require('inputmask/dist/jquery.inputmask');

import ModalWindow from './application/modal-window';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

document.addEventListener('DOMContentLoaded', function() {
    if (window.innerWidth <= 991) {
        const menuBtn = document.querySelector('.menu-btn'),
            headerMenu = document.querySelector('.h');

        function handleNavClick() {
            headerMenu.classList.toggle('active');
            menuBtn.classList.toggle('opened');
        }

        menuBtn.addEventListener('click', handleNavClick);
    }


    const elQuests = document.querySelectorAll('.quests-qst');
    const elItem = document.querySelectorAll('.quests-item');

    elQuests.forEach((elem, index) => {
        elem.addEventListener('click', () => {
            let currHeight = parseInt(window.getComputedStyle(elItem[index], null).getPropertyValue('height'), 10);

            if (elQuests[index].clientHeight === currHeight) {
                elItem[index].style.height = `${ elItem[index].scrollHeight }px`;
            } else {
                elItem[index].style.height = `${ elQuests[index].clientHeight }px`;
            }
        });
    });
});

$.fn.blurElement = function(html = '') {
    let $element = this;

    $element.blurElementDisable();

    $element.css('position', 'relative');

    let $window = $('<div>')
        .addClass('blur-box')
        .html(html);

    $window.appendTo($element);
}

$.fn.blurElementDisable = function(html = '') {
    let $element = this;

    $element.find('.blur-box').remove();
}

$(document).ready(function() {
    const $formFeedback = $('#form-feedback');
    if($formFeedback.length) {
        $formFeedback.on('submit', function(event) {
            let $form = $(this);
            let $button = $(event.originalEvent.submitter);

            event.preventDefault();

            $.ajax({
                url: $form.attr('action'),
                method: $form.attr('method'),
                data: new FormData($form.get(0)),
                dataType: 'json',
                processData: false,
                contentType: false,

                beforeSend: function() {
                    $button.attr('disabled', 'disabled');

                    $form.find('.text-red').remove();
                },

                success: function(response) {
                    $form.find('input,textarea').val('');

                    let modalWindow = new ModalWindow({
                        content: '<span class="text-green text-center">' + response.message + '</span>'
                    });

                    modalWindow.open();
                },

                error: function(xhr) {
                    const response = xhr.responseJSON;

                    if(typeof response.errors !== 'undefined') {
                        $.each(response.errors, function(field_name, field_errors) {
                            const $field = $form.find('[name=' + field_name + ']');

                            console.log($field.after('<span class="d-block text-red mt-5">' + field_errors.join('<br>') + '</span>'));
                        });
                    }
                },

                complete: function() {
                    $button.removeAttr('disabled');
                }
            });
        });
    }

    const $buttonCallbackRequest = $('#button-callback-request');
    if($buttonCallbackRequest.length) {
        $buttonCallbackRequest.on('click', function(event) {
            event.preventDefault();

            const modalWindow = new ModalWindow({
                id: 'modal-callback',
                class: 'modal_window__callback'
            });

            modalWindow.open();
        });
    }

    const $formModalCallback = $('#form-modal-callback');
    if($formModalCallback.length) {
        $formModalCallback.on('submit', function(event) {
            let $form = $(this);
            let $button = $(event.originalEvent.submitter);

            event.preventDefault();

            $.ajax({
                url: $form.attr('action'),
                method: $form.attr('method'),
                data: new FormData($form.get(0)),
                dataType: 'json',
                processData: false,
                contentType: false,

                beforeSend: function() {
                    $button.attr('disabled', 'disabled');

                    $form.find('.text-red').remove();
                },

                success: function(response) {
                    $form.find('input,textarea').val('');

                    let modalWindow = new ModalWindow({
                        content: '<span class="text-green text-center">' + response.message + '</span>'
                    });

                    modalWindow.open();
                },

                error: function(xhr) {
                    const response = xhr.responseJSON;

                    if(typeof response.errors !== 'undefined') {
                        $.each(response.errors, function(field_name, field_errors) {
                            const $field = $form.find('[name=' + field_name + ']');

                            $field.after('<span class="d-block text-red mt-5">' + field_errors.join('<br>') + '</span>');
                        });
                    }
                },

                complete: function() {
                    $button.removeAttr('disabled');
                }
            });
        });
    }

    const $ordersForms = $('#form-create-order-storage-in-boxes,#form-create-order-storage-on-pallets,#form-create-order-rent-of-boxes,#form-create-order-storage-in-volume,#form-create-order-return');
    if($ordersForms.length) {
        $ordersForms.each(function(i, form) {
            const $form = $(form);

            $form.find('[name="delivery_date"],[name="pickup_date"],[name="expiry_date"]').inputmask({
                mask: '99.99.9999'
            });

            $form.find('[name="delivery_time"],[name="pickup_time"]').inputmask({
                mask: '99:99'
            });

            $form.find('[name="phone_1"],[name="phone_2"]').inputmask({
                mask: '+9{5,}'
            });

            $form.submit(function(event) {
                event.preventDefault();

                const $this = $(this);
                const $button = $(event.originalEvent.submitter);

                $.ajax({
                    url: $this.attr('action'),
                    method: $this.attr('method'),

                    data: new FormData($form.get(0)),
                    dataType: 'json',
                    processData: false,
                    contentType: false,

                    beforeSend: function() {
                        $form.find('.text-red').remove();
                        $form.find('.border-red').removeClass('border-red');

                        $button.attr('disabled', 'disabled');
                    },

                    success: function(response) {
                        let modalWindow = new ModalWindow({
                            content: '<span class="text-green text-center">' + response.message + '</span>'
                        });

                        modalWindow.open();
                        $form.blurElement();

                        setInterval(function () {
                            window.location.href = route('account.orders');
                        }, 3000);
                    },

                    error: function(xhr) {
                        const response = xhr.responseJSON;

                        if(typeof response.errors !== 'undefined') {
                            $.each(response.errors, function(field_name, field_errors) {
                                const $field = $form.find('[name=' + field_name + ']');

                                $field.addClass('border-red');

                                if($field.closest('label').length) {
                                    $field.closest('label').after('<span class="d-block text-red mt-5 text-error-field">' + field_errors.join('<br>') + '</span>');
                                } else {
                                    $field.after('<span class="d-block text-red mt-5 text-error-field">' + field_errors.join('<br>') + '</span>');
                                }
                            });
                        }

                        $button.removeAttr('disabled');

                        $form.find('.step-container').each(function(i, element) {
                            const $stepContainer = $(element);
                            const $stepContainerErrors = $stepContainer.find('.text-error-field');

                            if($stepContainerErrors.length) {
                                $form.find('.step-container').removeClass('active');

                                $stepContainer.addClass('active');

                                $([document.documentElement, document.body]).animate({
                                    scrollTop: $stepContainer.offset().top
                                }, 500);

                                return false;
                            }
                        });
                    }
                })
            });

            const $affect_price_inputs = $form.find('[name="boxes[count]"],[name="bulky_items[count]"],[name="pallets[count]"],[name^="products["][name$="][count]"]');
            $affect_price_inputs.on('change', function(event) {
                const $address_subtotal_price = $form.find('#address-subtotal-price');
                const $payment_subtotal_price = $form.find('#payment-subtotal-price');
                const $payment_total_price = $form.find('#payment-total-price');

                const $items = $form.find('.on-item[data-price]');

                let subtotal = 0;
                let discount = 0;
                let delivery = 0;
                let total = 0;

                $items.each(function(i, item) {
                    let $item = $(item);

                    subtotal += parseInt($item.attr('data-price')) * parseInt($item.find('[data-count]').attr('data-count'));
                });

                //todo Сделать рассчет скидки.

                //todo Сделать рассчет доставки.

                total = subtotal + delivery - discount;

                $address_subtotal_price.text(subtotal + ' ₪');
                $payment_subtotal_price.text(subtotal + ' ₪');
                $payment_total_price.text(total + ' ₪');
            });
        });
    }

    const $formAccountPersonalInformation = $('#account-personal-information');
    $formAccountPersonalInformation.find('[name="avatar"]').change(function(e) {
        let $that = $(this);

        let formData = new FormData();
        formData.append('avatar', $(this)[0].files[0]);

        $.ajax({
            url: route('account.update.avatar'),
            method: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            dataType : 'json',

            success: function(response) {
                $(document).find('.acc-prof-avatar > img').attr('src', response.avatar['64']);
                $(document).find('.acc-form-av__icon').html('<img src="' + response.avatar['100'] + '" width="100px" height="100px" alt="avatar">');

                alert(response.message);
            },

            error: function (error) {
                let errors_list = [];

                $.each(error.responseJSON.errors, function(filed, errors) {
                    $.each(errors, function(index, error_text) {
                        errors_list.push(error_text);
                    });
                });

                alert(errors_list.join("\n"));
            },

            complete: function() {
                $that.val('');
            }
        });
    });
});
