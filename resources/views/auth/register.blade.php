<x-auth.app :pageTitle="$page_title">
    <x-slot name="headerText">
        {{ $page_title }}
    </x-slot>

    <x-form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">


        <div class="input-group mb-3">
            <input type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   name="name" required
                   placeholder="{{ __('default.enter_placeholder', ['placeholder' => __('default.name')]) }}"
                   autocomplete="name" autofocus
                   value="{{ old('name') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="text"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" required
                   placeholder="{{ __('default.enter_placeholder', ['placeholder' => __('default.email')]) }}"
                   autocomplete="email"
                   value="{{ old('email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="file"
                   class="form-control @error('profile_image') is-invalid @enderror"
                   name="profile_image" required
                   placeholder="{{ __('default.enter_placeholder', ['placeholder' => __('default.profile_image')]) }}"
                   value="{{ old('profile_image') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-file-image"></span>
                </div>
            </div>
            @error('profile_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password"
                   placeholder="{{ __('default.enter_placeholder', ['placeholder' => __('default.password')]) }}"
                   autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password_confirmation" required
                   placeholder="{{ __('default.enter_placeholder', ['placeholder' => __('default.confirm_password')]) }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">{{ __('default.register') }}</button>
            </div>
            <!-- /.col -->
        </div>
    </x-form>

    <x-slot name="slot2">
        @if (Route::has('login'))
            <p class="mb-1">
                <a href="{{ route('login') }}">{{ __('default.login_now') . '?' }}</a>
            </p>
        @endif
    </x-slot>
</x-auth.app>
