<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <div class="container custom-container" style="width:900px; height:601px;">
        <div class="row justify-content-center .custom-container-row-signup">
            <div class="col-md-6 mt-5 ">
                <h2>Signup</h2>
                <form action="{{route('register') }}" method="POST">
                    @csrf
                    <div class="form-group input-space">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                        <span class="text-danger">
                            @error('name')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group input-space">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group input-space">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <span class="text-danger">
                            @error('password')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group input-space">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" >
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary input-space">Register</button>
                </form>
            </div>

            <div class="col-md-5 mt-5  signup-img">
                <img src="{{asset('assets/images/signup-image.jpg')}}" alt="Login Image" class="img-fluid text-center">
                <p class="mt-3 text-center create-account-text"><a href="{{ route('login') }}">Already have an account?</a></p>
            </div>
        </div>
    </div>
</body>
</html>
