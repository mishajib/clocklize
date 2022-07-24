<x-auth.app :page-title="$page_title">
    <x-slot name="headerText">
        {{ __('default.confirm_password') }}
    </x-slot>

    <x-form action="{{ route('password.confirm') }}" method="POST">

        <div class="form-group">
            <label for="password">
                {{ __('default.password') }}
                <span class="text-danger">*</span>
            </label>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" autofocus
                       placeholder="{{ __('default.enter_placeholder', ['placeholder' => Str::lower(__('default.password'))]) }}">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div><!--end form-group-->

        <div class="form-group mb-0 row">
            <div class="col-12 mt-2">
                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">
                    {{ __('default.confirm') }}
                    <i class="fas fa-sign-in-alt ml-1"></i>
                </button>
            </div><!--end col-->
        </div> <!--end form-group-->
    </x-form>
    <!--end form-->
</x-auth.app>
