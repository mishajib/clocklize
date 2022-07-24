<x-app page-title="{{ $page_title }}" breadcrumb-from-title="{{ __('default.user_management') }}">


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        {{ __('default.users') }}
                    </h4>

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <form action="{{ route('users.index') }}" method="GET" id="month-form">
                                <input type="text" name="month" class="form-control" id="month-picker"
                                       value="{{ old('month', $month) }}"
                                       placeholder="{{ __("default.select_module", ['module' => Str::lower(__('default.month'))]) }}">
                            </form>
                        </div>
                    </div>

                    <a href="{{ route('users.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i>
                        {{ __('default.add_new_module', ['module' => Str::lower(__('default.user'))]) }}
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th>{{ __('SL#') }}</th>
                                <th>{{ __('default.profile_image') }}</th>
                                <th>{{ __('default.name') }}</th>
                                <th>{{ __('default.total_day_present_month', ['month' => date('F', strtotime($month))]) }}</th>
                                <th>{{ __('default.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $key => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $key }}</td>
                                    <td>
                                        <img src="{{ storagelink($user->image) }}" alt="{{ $user->name }}"
                                             style="height: 10rem;">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->total_day_present }}</td>
                                    <td>
                                        <div class="btn-group mb-2 mb-md-0">
                                            <button type="button"
                                                    class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">{{ __('default.toggle_dropdown') }}</span> <i
                                                    class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item text-info"
                                                   href="{{ route('users.edit', $user->id) }}"
                                                   title="{{ __('default.edit_module', ['module' => Str::lower(__('default.user'))]) }}">
                                                    <i class="fas fa-edit"></i>
                                                    {{ __('default.edit_module', ['module' => Str::lower(__('default.user'))]) }}
                                                </a>

                                                <a class="dropdown-item text-primary"
                                                   href="{{ route('users.show', $user->id) }}"
                                                   title="{{ __('default.show_module', ['module' => Str::lower(__('default.user'))]) }}">
                                                    <i class="fas fa-eye"></i>
                                                    {{ __('default.show_module', ['module' => Str::lower(__('default.user'))]) }}
                                                </a>

                                                @if($user->role == 'member')
                                                    <a class="dropdown-item text-green"
                                                       href="{{ route('users.reports', $user->id) }}"
                                                       title="{{ __('default.show_module', ['module' => Str::lower(__('default.reports'))]) }}">
                                                        <i class="fas fa-chart-bar"></i>
                                                        {{ __('default.show_module', ['module' => Str::lower(__('default.reports'))]) }}
                                                    </a>
                                                @endif

                                                @if(auth()->user()->hasRole('admin') && auth()->id() != $user->id)
                                                    <x-form action="{{ route('users.destroy', $user->id) }}"
                                                            id="delete-form-{{ $user->id }}" method="DELETE"
                                                            style="display: none">
                                                    </x-form>
                                                    <a href="javascript:void(0);" class="dropdown-item text-danger"
                                                       onclick="makeDeleteRequest(event, {{ $user->id }})"
                                                       title="{{ __('default.delete_module', ['module' => Str::lower(__('default.user'))]) }}">
                                                        <i class="fas fa-trash"></i>
                                                        {{ __('default.delete_module', ['module' => Str::lower(__('default.user'))]) }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">
                                        {{ __('default.no_module_found', ['module' => __('default.users')]) }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {{ $users->appends(request()->query())->links('partials.paginate') }}
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
