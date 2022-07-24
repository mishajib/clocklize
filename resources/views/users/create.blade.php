<x-app :page-title="$page_title" :breadcrumb-from-title="__('default.user_management')"
       :breadcrumb-from-url="route('users.index')">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $page_title }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <x-form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">
                                {{ __("default.name") }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="name" value="{{ old('name') }}"
                                   class="form-control" name="name"
                                   placeholder="{{ __("default.enter_placeholder", ['placeholder' => Str::lower(__("default.name"))]) }}"
                                   required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                {{ __("default.email_address") }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" name="email" class="form-control" id="email"
                                   placeholder="{{ __("default.enter_placeholder", ['placeholder' => Str::lower(__("default.email"))]) }}"
                                   value="{{ old('email') }}"
                                   required>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password">
                                    {{ __('default.password') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="{{ __("default.enter_placeholder", ['placeholder' => Str::lower(__("default.password"))]) }}"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label for="confirm-password">
                                    {{ __('default.confirm_password') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" name="password_confirmation"
                                       id="confirm-password"
                                       placeholder="{{ __("default.enter_placeholder", ['placeholder' => Str::lower(__("default.confirm_password"))]) }}"
                                       required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="profile-image">
                                {{ __("default.profile_image") }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control" name="image" id="profile-image">
                            <img class="mt-3" id="image_holder" src="" alt="profile_image"
                                 style="height: 5rem; display: none;">
                        </div>


                        <div class="form-group">
                            <label for="role">
                                {{ __("default.role") }}
                                <span class="text-danger">*</span>
                            </label>
                            <select name="role" id="role" class="form-control" required>
                                @foreach($roles as $role)
                                    <option
                                        value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>
                                        {{ str()->ucfirst($role) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="float-right">
                            <a href="{{ route('users.index') }}" class="btn btn-danger">
                                <i class="fas fa-window-close"></i>
                                {{ __('default.cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                {{ __('default.submit') }}
                            </button>
                        </div>
                    </div>
                </x-form>
            </div>
        </div>
    </div>

    <x-slot name="bottomScripts">
        <script>
            $(document).ready(function () {
                // Preview Profile Image
                $('#profile-image').change(function () {
                    event.preventDefault();
                    readInputImageURL(this);
                });
            });
        </script>
    </x-slot>
</x-app>
