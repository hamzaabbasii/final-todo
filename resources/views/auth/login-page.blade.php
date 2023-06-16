<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

       
    
    <div class="container custom-container"  style="width:900px; height:601px;">
        <div class="row justify-content-center custom-container-row-login">
            <div class="col-md-6 mt-5 image-res">
                <img src="{{asset('assets/images/signin-image.jpg')}}" alt="Login Image" class="img-fluid">
                <p class="mt-3 text-center create-account-text" ><a href="{{ route('register') }}">Create an Account?</a></p>
            </div>
            <div class="col-md-6 mt-5 form-res">
                <h2>Login</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group input-space">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group input-space">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group form-check input-space">
                        <input type="checkbox" id="remember" {{ old ('remember')? 'checked': ''}} name="remember" class="form-check-input">
                        <label for="remember" class="form-check-label">Remember Me</label>
                    </div>
                    <button type="submit" class="btn input-space">Login</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
