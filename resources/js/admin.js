require('./bootstrap');

window.moment = require('moment');

require('jquery-ui/ui/widgets/draggable');

require('bootstrap');
require('codemirror');
require('bs4-summernote');
require('select2/dist/js/select2.full');
require('datatables.net-bs4')
require('datatables.net-buttons-bs4')
require('tempusdominus-bootstrap-4');
require('./admin/adminlte');


import * as Calendar from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import * as interactionPlugin from '@fullcalendar/interaction';
import bootstrapPlugin from '@fullcalendar/bootstrap';


window.FullCalendar = Calendar;
window.dayGridPlugin = dayGridPlugin;
window.timeGridPlugin = timeGridPlugin;
window.listPlugin = listPlugin;
window.interactionPlugin = interactionPlugin;
window.bootstrapPlugin = bootstrapPlugin;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('.select2').select2();

    $('.datetimepicker-input').datetimepicker({
        format: 'DD.MM.YYYY HH:mm',
        sideBySide: true,
        defaultDate: moment()
    });

    $('.datepicker-input').datetimepicker({
        format: 'DD.MM.YYYY',
        sideBySide: true,
        defaultDate: moment()
    });

    $('.timepicker-input').datetimepicker({
        format: 'HH:mm',
        sideBySide: true,
        defaultDate: moment()
    });

    $('[data-toggle="tooltip"]').tooltip({
        container: '.content-wrapper'
    });

    $('select[id^="filter-table-"]').on('change', function(event) {
        window.location.href = $(this).find('option:selected').attr('data-url');
    });

    const $formCallbackRequestNoteCreate = $('#form-callback-request-note-create');
    if($formCallbackRequestNoteCreate.length) {
        $formCallbackRequestNoteCreate.formSubmitter();
    }

    const $formCallbackRequestEdit = $('#form-callback-request-edit');
    if($formCallbackRequestEdit.length) {
        $formCallbackRequestEdit.formSubmitter();
    }

    const $formCallbackRequestCreate = $('#form-callback-request-create');
    if($formCallbackRequestCreate.length) {
        $formCallbackRequestCreate.formSubmitter();
    }

    const $formOrderEdit = $('#form-order-edit');
    if($formOrderEdit.length) {
        $formOrderEdit.formSubmitter();
    }

    const $formOrderCreate = $('#form-order-create');
    if($formOrderCreate.length) {
        $formOrderCreate.formSubmitter();
    }

    const $formsDelete = $('#form-order-delete, #form-callback-request-delete');
    if($formsDelete.length) {
        $formsDelete.on('submit', function (event) {
            return confirm('Are you sure?');
        });
    }
});

$.fn.formSubmitter = function(options = {}) {
    let _this = this;

    if(_this.is('form') === false) {
        throw 'Element is not form!';
    }

    let fnSuccess = function(response) {};
    let fnError = function(xhr) {};

    if(typeof options === 'object') {
        if(typeof options.success === 'function') {
            fnSuccess = options.success;
        }

        if(typeof options.error === 'function') {
            fnError = options.error;
        }
    }

    _this.on('submit', function(event) {
        event.preventDefault();

        let $button = $(event.originalEvent.submitter);

        $.ajax({
            url: _this.attr('action'),
            method: _this.attr('method'),
            data: new FormData(_this.get(0)),
            dataType: 'json',
            processData: false,
            contentType: false,

            beforeSend: function() {
                $button.attr('disabled', 'disabled');

                _this.find('.is-invalid').removeClass('is-invalid');
                _this.find('.invalid-feedback').remove();
            },

            success: function(response) {
                if(typeof response.redirect !== 'undefined') {
                    return window.location.href = response.redirect;
                }

                fnSuccess(response);
            },

            error: function(xhr) {
                const response = xhr.responseJSON;
                let errors = {};

                if(typeof response.errors !== 'undefined') {
                    errors = response.errors;
                } else {
                    errors = response;
                }

                $.each(errors, function(field, error) {
                    let $field = _this.find('[name="' + field + '"]');
                    let $field_input_group = $field.closest('.input-group');
                    let $field_btn_group = $field.closest('.btn-group');

                    if($field_input_group.length) {
                        $field.addClass('is-invalid');
                        $field_input_group.addClass('is-invalid').after('<div class="invalid-feedback">' + error[0] + '</div>')
                    } else if($field_btn_group.length) {
                        $field_btn_group.addClass('is-invalid').after('<div class="invalid-feedback">' + error[0] + '</div>')
                    } else {
                        $field.addClass('is-invalid').after('<div class="invalid-feedback">' + error[0] + '</div>');
                    }
                });

                fnError(xhr);
            },

            complete: function() {
                $button.removeAttr('disabled');
            }
        });
    });
};
