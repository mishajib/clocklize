<x-auth.app :page-title="$page_title">
    <x-slot name="headerText">
        {{ __('default.forgot_password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('default.forgot_password_instruction_message') }}
    </x-slot>

    <x-form action="{{ route('password.email') }}" method="POST">

        <div class="form-group">
            <label for="email">
                {{ __('default.email') }}
                <span class="text-danger">*</span>
            </label>
            <div class="input-group mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" autofocus required
                       placeholder="{{ __('default.enter_placeholder', ['placeholder' => Str::lower(__('default.email'))]) }}">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div><!--end form-group-->

        <div class="form-group mb-0 row">
            <div class="col-12 mt-2">
                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">
                    {{ __('default.send_password_reset_link') }}
                    <i class="fas fa-sign-in-alt ml-1"></i>
                </button>
            </div><!--end col-->
        </div> <!--end form-group-->
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
