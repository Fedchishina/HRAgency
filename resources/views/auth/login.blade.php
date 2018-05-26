@section('auth')
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="text-center mb-1">
                            <img class="mb-1" src="favicon.ico" alt="" width="72" height="72">
                            <h1 class="h3 mb-2 font-weight-normal">Sign in</h1>
                        </div>

                        <div class="form-label-group mb-3">
                            <label for="login">{{ __('Your login') }}:</label>
                            <input id="login" type="text"
                                   class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login"
                                   value="{{ old('login') }}" placeholder="Enter your login" required autofocus>

                            @if ($errors->has('login'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-label-group mb-3">
                            <label for="password">{{ __('Password') }}:</label>

                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" placeholder="Enter your password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>

                    <button type="submit" class="btn btn-success">Sign in</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Back</button>
                </div>

                </form>
            </div>
        </div>
    </div>
@endsection