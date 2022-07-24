<x-app page-title="{{ $page_title }}" breadcrumb-from-title="{{ __('default.attendances') }}"
       breadcrumb-from-url="{{ route('dashboard') }}">


    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('reports.monthly') }}" id="month-form" method="GET">
                        <label for="month-picker">
                            {{ __('default.select_module', ['module' => __("default.month")]) }}
                        </label>
                        <input type="text" name="month" class="form-control" id="month-picker"
                               value="{{ old('month', $month) }}"
                               placeholder="{{ __("default.select_module", ['module' => Str::lower(__('default.month'))]) }}">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        {{ __('default.monthly_reports_month', ['month' => '(' . date('F, Y', strtotime($month)) . ')']) }}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th>{{ __('SL#') }}</th>
                                <th>{{ __('default.profile_image') }}</th>
                                <th>{{ __('default.user_name') }}</th>
                                <th>{{ __('default.date') }}</th>
                                <th>{{ __('default.memo') . '/' . __('default.narration') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($attendances as $key => $attendance)
                                <tr>
                                    <td>{{ $attendances->firstItem() + $key }}</td>
                                    <td>
                                        <img src="{{ storagelink($attendance->user->image) }}" alt="{{ $attendance->user->name }}"
                                             style="height: 10rem;">
                                    </td>
                                    <td>{{ $attendance->user->name }}</td>
                                    <td>{{ date('F j, Y - h:i:sa', strtotime($attendance->created_at)) }}</td>
                                    <td>{{ $attendance->memo }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">
                                        {{ __('default.no_module_found', ['module' => __('default.attendances')]) }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {{ $attendances->appends(request()->query())->links('partials.paginate') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="styles">
        <link href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    </x-slot>
    <x-slot name="bottomScripts">
        <script type="text/javascript">
            $(document).ready(function () {
                $('#month-picker').datepicker({
                    format      : "yyyy-mm",
                    minViewMode : 'months',
                    toggleActive: true,
                    autoclose   : true,
                    endDate     : new Date(),
                }).change(function () {
                    $('#month-form').submit();
                });
            });
        </script>
    </x-slot>
</x-app>
