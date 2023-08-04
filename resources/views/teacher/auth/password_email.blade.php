<form method="POST" action="{{ route('forgot.password.email') }}">
    @csrf

    <div>
        <label for="email">{{ __('Email') }}</label>

        <div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        @error('email')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div>
        <button type="submit">
            {{ __('Send Password Reset Link') }}
        </button>
    </div>
</form>
