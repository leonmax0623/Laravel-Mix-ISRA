@extends('layout.admin')

@section('main')
    <div class="container-fluid">
        <x-admin.card>
            <div id="calendar"></div>
        </x-admin.card>
    </div>
@endsection

@push('modals')
    <x-admin.widget.modal id="modal-create-task" class="modal-lg">
        <x-slot name="header">
            {{ __('Create task') }}
        </x-slot>

        <x-slot name="body">
            <form id="form-create-task" action="{{ route('admin.task-manager.create-or-update-task') }}" method="post">
                @csrf

                <input type="hidden" name="date">

                <div class="form-group">
                    <label>{{ __('Caption') }}</label>
                    <input type="text" class="form-control" name="caption">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __('Type') }}</label>
                            <select class="select2 form-control" style="width: 100%;" name="type">
                                @foreach(config('enum.task_manager_task_type') as $type)
                                    <option value="{{ $type['id'] }}">{{ __($type['name']) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>{{ __('Responsible Manager') }}</label>
                            <select class="select2 form-control" style="width: 100%" name="manager_id">
                                <option value="0">-- {{ __('Not selected') }} --</option>

                                @foreach($users_managers as $user_manager)
                                    <option value="{{ $user_manager->id }}">{{ $user_manager->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('Order') }}</label>
                    <select class="select2 form-control" style="width: 100%;" data-placeholder="{{ __('Select a order') }}" name="order_id">
                        <option value="0">-- {{ __('Not selected') }} --</option>

                        @foreach($orders as $order)
                            <option value="{{ $order->id }}">#{{ $order->id }} {{ $order->rivhit ? '/ ' . $order->rivhit : '' }} / {{ $order->user->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('Deadline time') }}</label>
                    <input type="text" class="form-control datetimepicker-input" data-toggle="datetimepicker" name="deadline_datetime">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __('Loading Worker') }}</label>
                            <input type="text" class="form-control" name="loading_worker">
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('Transport') }}</label>
                            <input type="text" class="form-control" name="transport">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('Status') }}</label>
                    <select class="form-control" name="status">
                        <option value="0">{{ __('Active') }}</option>
                        <option value="1">{{ __('Finished') }}</option>
                        <option value="2">{{ __('Canceled') }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('Details') }}</label>
                    <textarea class="form-control" rows="3" name="details"></textarea>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <button type="submit" class="btn btn-success" form="form-create-task">{{ __('Create') }}</button>
        </x-slot>
    </x-admin.widget.modal>

    <x-admin.widget.modal id="modal-edit-task" class="modal-lg">
        <x-slot name="header">
            {{ __('Edit task') }}
        </x-slot>

        <x-slot name="body">
            <form id="form-edit-task" action="{{ route('admin.task-manager.create-or-update-task') }}" method="post">
                @csrf

                <input type="hidden" name="date">
                <input type="hidden" name="task_id">

                <div class="form-group">
                    <label>{{ __('Caption') }}</label>
                    <input type="text" class="form-control" name="caption">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __('Type') }}</label>
                            <select class="select2 form-control" style="width: 100%;" name="type">
                                <option value="1">{{ __('Box delivery') }}</option>
                                <option value="2">{{ __('Box pickup') }}</option>
                                <option value="3">{{ __('Box and bulky items pickup') }}</option>
                                <option value="4">{{ __('Bulky items pickup') }}</option>
                                <option value="5">{{ __('Partial box return') }}</option>
                                <option value="6">{{ __('Partial box and bulky items return') }}</option>
                                <option value="7">{{ __('Partial bulky items return') }}</option>
                                <option value="8">{{ __('Complete return of boxes') }}</option>
                                <option value="9">{{ __('Complete return of boxes and bulky items') }}</option>
                                <option value="10">{{ __('Complete return of bulky items') }}</option>
                                <option value="11">{{ __('Return of empty boxes from client') }}</option>
                                <option value="12">{{ __('Self-delivery of boxes and/or bulky items at stock') }}</option>
                                <option value="13">{{ __('Pickup of boxes and/or bulky items from stock by client') }}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>{{ __('Responsible Manager') }}</label>
                            <select class="select2 form-control" style="width: 100%" name="manager_id">
                                <option value="0">-- {{ __('Not selected') }} --</option>

                                @foreach($users_managers as $user_manager)
                                    <option value="{{ $user_manager->id }}">{{ $user_manager->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('Order') }}</label>
                    <select class="select2 form-control" style="width: 100%;" data-placeholder="{{ __('Select a order') }}" name="order_id">
                        <option value="0">-- {{ __('Not selected') }} --</option>

                        @foreach($orders as $order)
                            <option value="{{ $order->id }}">#{{ $order->id }} {{ $order->rivhit ? ('/ ' . $order->rivhit) : '' }} / {{ $order->user->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('Deadline time') }}</label>
                    <input type="text" class="form-control datetimepicker-input" data-toggle="datetimepicker" name="deadline_datetime">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __('Loading Worker') }}</label>
                            <input type="text" class="form-control" name="loading_worker">
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('Transport') }}</label>
                            <input type="text" class="form-control" name="transport">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('Status') }}</label>
                    <select class="form-control" name="status">
                        <option value="0">{{ __('Active') }}</option>
                        <option value="1">{{ __('Finished') }}</option>
                        <option value="2">{{ __('Canceled') }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('Details') }}</label>
                    <textarea class="form-control" rows="3" name="details"></textarea>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <button type="submit" class="btn btn-danger" data-action="remove-task">{{ __('Remove') }}</button>
            <button type="submit" class="btn btn-success" form="form-edit-task">{{ __('Edit') }}</button>
        </x-slot>
    </x-admin.widget.modal>
@endpush

@push('scripts')
    <script>
        $(function () {
            let calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                locale: '{{ app()->getLocale() }}',
                plugins: [
                    dayGridPlugin,
                    interactionPlugin.default
                ],

                editable: true,
                droppable: true,
                height: 'auto',
                headerToolbar: {
                    left  : 'today',
                    center: 'title',
                    right : 'prev,next'
                },
                themeSystem: 'bootstrap',

                dateClick: function(info) {
                    let $form = $('#form-create-task');

                    $form.find('input,textarea').val('');
                    $form.find('select').each(function(index, element) {
                        $(element).val($(element).find('option:first').val());
                    });
                    $form.find('input,textarea,select').trigger('change');
                    $form.find('[name="date"]').val(info['dateStr']);

                    $('#modal-create-task').modal('show');
                },

                eventClick: function(info) {
                    let task_id = info['event']['id'];

                    $.post('{{ route('admin.task-manager.get-task-info') }}', {
                        task_id: task_id
                    }, function(task) {
                        let $modal = $('#modal-edit-task');
                        let $form = $('#form-edit-task');

                        $form.find('input,textarea').val('');
                        $form.find('select').each(function(index, element) {
                            $(element).val($(element).find('option:first').val()).trigger('change');
                        });
                        $form.find('input,textarea,select').trigger('change');

                        $form.find('[name="task_id"]').val(task['id']);
                        $form.find('[name="date"]').val(task['date']);
                        $form.find('[name="caption"]').val(task['caption']);
                        $form.find('[name="type"]').val(task['type']).trigger('change');
                        $form.find('[name="loading_worker"]').val(task['loading_worker']);
                        $form.find('[name="transport"]').val(task['transport']);
                        $form.find('[name="details"]').val(task['details']);
                        $form.find('[name="status"]').val(task['status']);

                        if(!_.isNull(task['deadline_datetime'])) {
                            $form.find('[name="deadline_datetime"]').val(moment(task['deadline_datetime'], 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm'));
                        }

                        if(!_.isNull(task['manager_id'])) {
                            $form.find('[name="manager_id"]').val(task['manager_id']).trigger('change');
                        }

                        if(!_.isNull(task['order_id'])) {
                            $form.find('[name="order_id"]').val(task['order_id']).trigger('change');
                            $form.find('[name="order_id"]').closest('.form-group').append('<a href="' + route('admin.orders.edit', {order: task['order_id']}) + '" target="_blank">Open order</a>');
                        }

                        $modal.modal(_.isUndefined(info['modal']) ? 'show' : info['modal']);
                    });
                },

                eventDrop: function(info) {
                    $.post('{{ route('admin.task-manager.get-task-info') }}', {
                        task_id: info['event']['id']
                    }, function(task) {
                        task['task_id'] = task['id'];
                        task['date'] = info['event']['startStr'];

                        if(!_.isNull(task['deadline_datetime'])) {
                            task['deadline_datetime'] = moment(task['deadline_datetime'], 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
                        }

                        $.post('{{ route('admin.task-manager.create-or-update-task') }}', task)
                            .fail(function() {
                                calendar.getEventById(task['id']).remove();
                            })
                            .always(function () {
                                calendar.trigger('datesSet', {
                                    startStr: calendar.view.activeStart.toISOString(),
                                    endStr: calendar.view.activeEnd.toISOString(),
                                });
                            });
                    });
                },

                datesSet: function(info) {
                    $.post('{{ route('admin.task-manager.get-calendar-tasks') }}', {
                        start: info['startStr'],
                        end: info['endStr']
                    }, function(events) {
                        _.each(events, function(event) {
                            if(_.isNull(calendar.getEventById(event['id']))) {
                                calendar.addEvent({
                                    id: event['id'],
                                    title: event['caption'],
                                    start: event['date'],
                                    backgroundColor: {
                                        0: '#007bff',
                                        1: '#28a745',
                                        2: '#dc3545'
                                    }[event['status']],
                                    borderColor: 'transparent'
                                });
                            }
                        });
                    });
                }
            });

            $('#form-create-task').formSubmitter({
                success: function(task_id) {
                    calendar.trigger('datesSet', {
                        startStr: calendar.view.activeStart.toISOString(),
                        endStr: calendar.view.activeEnd.toISOString(),
                    });

                    $('#modal-create-task').modal('hide');
                }
            });

            $('#form-edit-task').formSubmitter({
                success: function(task_id) {
                    calendar.getEventById(task_id).remove();

                    calendar.trigger('datesSet', {
                        startStr: calendar.view.activeStart.toISOString(),
                        endStr: calendar.view.activeEnd.toISOString(),
                    });

                    $('#modal-edit-task').modal('hide');
                }
            });

            $('[data-action="remove-task"]').on('click', function(event) {
                event.preventDefault();

                let task_id = $(this).closest('.modal').find('form [name="task_id"]').val();

                $.post('{{ route('admin.task-manager.delete-task') }}', {
                    task_id: task_id
                }).always(function() {
                    calendar.getEventById(task_id).remove();

                    calendar.trigger('datesSet', {
                        startStr: calendar.view.activeStart.toISOString(),
                        endStr: calendar.view.activeEnd.toISOString(),
                    });

                    $('#modal-edit-task').modal('hide');
                });
            });

            calendar.render();
        });
    </script>
@endpush
