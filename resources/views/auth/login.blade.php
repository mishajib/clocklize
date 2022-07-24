<x-auth.app :pageTitle="$page_title">
    <x-slot name="headerText">
        {{ __('default.sign_in_to_continue') }}
    </x-slot>

    <x-form action="{{ route('login') }}" method="POST">

        <div class="input-group mb-3">
            <input type="text"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email"
                   placeholder="{{ __('default.enter_placeholder', ['placeholder' => __('default.email')]) }}"
                   autocomplete="email" autofocus
                   value="{{ old('email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
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

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">
                        {{ __('default.remember_me') }}
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">{{ __('default.sign_in') }}</button>
            </div>
            <!-- /.col -->
        </div>
    </x-form>

    <x-slot name="slot2">
        @if (Route::has('password.request'))
            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ __('default.forgot_password') . '?' }}</a>
            </p>
        @endif
    </x-slot>
</x-auth.app>
