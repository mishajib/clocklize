<x-app :pageTitle="$page_title" breadcrumbFromTitle="Dashboard">
    <div class="card">
        <div class="card-body">
            <div id='calendar'></div>
        </div>
    </div>

    <!-- Attendance Modal -->
    <div class="modal fade" id="attendanceModal" tabindex="-1" role="dialog" aria-labelledby="attendanceModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attendanceModalLabel">
                        {{ __("Enter Attendance Memo/Narration") }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <x-form id="attendance-form">
                    <div class="modal-body">
                        <input type="hidden" id="attendance-date">
                        <div class="form-group">
                            <label for="memo">{{ __("default.memo") }}</label>
                            <input type="text" class="form-control"
                                   placeholder="{{ __("default.enter_placeholder", ["placeholder" => __("default.memo")]) }}"
                                   id="memo" name="memo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ __('default.close') }}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('default.save') }}
                        </button>
                    </div>
                </x-form>
            </div>
        </div>
    </div>


    <x-slot name="styles">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/>
    </x-slot>

    <x-slot name="bottomStyles">
        <style>
            .fc-scroller {
                overflow-x: visible !Important;
            }
        </style>
    </x-slot>

    <x-slot name="scripts">
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    </x-slot>

    <x-slot name="bottomScripts">
        <script type="text/javascript">

            // check if this day has an event before
            function IsDateHasEvent(date) {
                var allEvents = [];
                allEvents = $('#calendar').fullCalendar('clientEvents');
                var event = $.grep(allEvents, function (v) {
                    return +v.start === +date;
                });
                return event.length > 0;
            }

            $(document).ready(function () {
                const calendar = $('#calendar').fullCalendar({
                    events      : "{{ route('attendances.index') }}",
                    eventRender : function (event, element, view) {
                        event.allDay = true;
                    },
                    selectable  : true,
                    selectHelper: true,
                    selectAllow : function (select) {
                        return (moment().diff(select.start, 'days') <= 0 && moment().diff(select.end, 'days') >= 0)
                    },
                    select      : function (start, end, allDay, event) {
                        let date = $.fullCalendar.formatDate(start, 'YYYY-MM-DD');
                        if (!IsDateHasEvent(start)) {
                            $('#attendance-date').val(date);
                            $('#attendanceModal').modal();
                        }
                    },
                    viewRender  : function (currentView, element) {
                        let maxDate = moment().add(2, 'weeks');

                        // Future
                        if (maxDate >= currentView.start && maxDate <= currentView.end) {
                            $(".fc-next-button").prop('disabled', true);
                            $(".fc-next-button").addClass('fc-state-disabled');
                        } else {
                            $(".fc-next-button").removeClass('fc-state-disabled');
                            $(".fc-next-button").prop('disabled', false);
                        }
                    }
                });

                $('#attendance-form').on('submit', function (e) {
                    e.preventDefault();

                    $.ajax({
                        type   : "POST",
                        url    : "{{ route('attendances.store') }}",
                        data   : {
                            'date': $('#attendance-date').val(),
                            'memo': $('#memo').val(),
                        },
                        success: function (response) {
                            console.log(response);
                            if (response.success) {
                                // available_dates = response.available_dates;
                                calendar.fullCalendar('renderEvent',
                                    {
                                        title : response.memo,
                                        start : $('#attendance-date').val(),
                                        end   : $('#attendance-date').val(),
                                        allDay: true
                                    },
                                    true // make the event "stick"
                                );

                                $('#attendanceModal').modal('hide');

                                Toast.fire({
                                    icon : 'success',
                                    title: response.message
                                });
                            }

                        }
                    });
                });
            });
        </script>
    </x-slot>
</x-app>
