<x-auth.app :page-title="$page_title">
    <x-slot name="headerText">
        {{ __('default.reset_password') }}
    </x-slot>

    <x-form action="{{ route('password.update') }}" method="POST">

        <input type="hidden" name="token" value="{{ old('token', $request->route('token')) }}" required>

        <input type="hidden" name="email" value="{{ old('email', $request->email) }}" required>

        <div class="form-group">
            <label for="password">
                {{ __('default.new_password') }}
                <span class="text-danger">*</span>
            </label>
            <div class="input-group mb-3">
                <input type="password" autofocus
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" id="password" required
                       placeholder="{{ __('default.enter_placeholder', ['placeholder' => Str::lower(__('default.new_password'))]) }}">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div><!--end form-group-->

        <div class="form-group">
            <label for="password-confirmation">
                {{ __('default.confirm_password') }}
                <span class="text-danger">*</span>
            </label>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password_confirmation"
                       id="password-confirmation"
                       placeholder="{{ __('default.enter_placeholder', ['placeholder' => Str::lower(__('default.confirm_password'))]) }}">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <!--end form-group-->

        <div class="form-group mb-0 row">
            <div class="col-12 mt-2">
                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">
                    {{ __('default.reset') }}
                    <i class="fas fa-sign-in-alt ml-1"></i>
                </button>
            </div>
            <!--end col-->
        </div>
        <!--end form-group-->
    </x-form>
    <!--end form-->

    <x-slot name="slot2">
        @if (Route::has('login'))
            <p class="mb-1">
                <a href="{{ route('login') }}">{{ __('default.login_now') . '?' }}</a>
            </p>
        @endif
    </x-slot>
</x-auth.app>
