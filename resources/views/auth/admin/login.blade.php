<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/asset/vendor/bootstrap/css/bootstrap.min.css')}}">
</head>
<body style="background-color:#372121">
<div class="container mt-5" >
    <div class="row justify-content-center">
    @include('frontend.partials.messages')
        <div class="col-md-8">
            <div class="card mt-4" >
                <div class="card-header"  style="background-color:rgb(17, 204, 163)">{{ __('Admin Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf

                        <div class="form-group row ">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6  ">
                                <input style="border: 1px solid #cccccc;" id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6 ">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row ">
                        <div class="col-md-4"></div>
                            <div class="col-md-8 offset-md-4">
                               <button type="submit" class="btn btn-success" >
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                  <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('public/asset/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/asset/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>


