<x-app :pageTitle="$page_title" breadcrumbFromTitle="Dashboard">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        {{ __('default.attendance_records') }}
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
</x-app>
