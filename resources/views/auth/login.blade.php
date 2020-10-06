<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/learners/public/css/teach-register.css">

    <!-- Main css -->
<!--    <link rel="stylesheet" href="css/style.css">-->
<style>
    
    .main-button{
        text-align:right;
        padding:10px;
    }
    .main-button a{
       padding:10px;
    }
</style>
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="/learners/public/images/signup.jpg" alt="">
                </div>
                
                <div class="signup-form">
                    <div class="row">
                    <div class="main-button">
                        <a href="{{url('/login')}}">SIGN IN</a>
                        <a href="{{url('/register-teacher')}}">SIGN UP</a>
                </div>
                    </div>
                    <form method="POST" class="register-form" action="{{ route('login') }}">
                        @csrf
                        <h2>Teachers login</h2>
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                             @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                         <div class="form-radio">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
               
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="submit" name="submit" id="submit">
                                    {{ __('Login') }}
                                </button>
                               
                        </div>
                         @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>