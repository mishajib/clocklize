<x-app :page-title="$page_title" :breadcrumb-from-title="__('default.dashboard')"
       :breadcrumb-from-url="route('dashboard')">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $page_title }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <x-form action="{{ route('profile.update-password') }}" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="old-password">
                                {{ __('default.old_password') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="old_password" id="old-password" class="form-control"
                                   placeholder="{{ __("default.enter_placeholder", ['placeholder' => __('default.old_password')]) }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="password">
                                {{ __('default.new_password') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="{{ __('default.new_password') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="confirm-password">
                                {{ __("default.confirm_password") }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password_confirmation" id="confirm-password"
                                   class="form-control"
                                   placeholder="{{ __("default.confirm_password") }}" required>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary float-right">
                                {{ __("default.submit") }}
                            </button>
                        </div>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
</x-app>
