<x-app page-title="{{ $page_title }}" :breadcrumb-from-title="__('default.user_management')"
       :breadcrumb-from-url="route('users.index')">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p class="text-center">
                        <img style="width: 200px;" src="{{ storageLink($user->image, 'user') }}"
                             alt="{{ $user->name }}" class="img-fluid">
                    </p>
                    <table class="table table-hover table-bordered table-striped text-center">
                        <tr>
                            <th>{{ __('default.name') }}</th>
                            <td>{{ $user->name }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('default.email') }}</th>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('default.role') }}</th>
                            <td>{{ $user->role }}</td>
                        </tr>

                    </table>

                    <p class="text-center mt-3">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary mr-2">
                                <i class="fas fa-edit"></i>
                                {{ __('default.edit') }}
                            </a>

                        @if(auth()->user()->hasRole('admin') && auth()->id() != $user->id)
                            <a href="javascript:void(0);" class="btn btn-danger"
                               onclick="makeDeleteRequest(event, '{{ $user->id }}')">
                                <i class="fas fa-trash"></i>
                                {{ __('default.delete') }}
                            </a>
                        @endif
                    </p>

                    @if(auth()->user()->hasRole('admin') && auth()->id() != $user->id)
                        <form action="{{ route('users.destroy', $user->id) }}"
                              id="delete-form-{{ $user->id }}" method="POST" style="display: none">
                            @csrf
                            @method("DELETE")
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app>
