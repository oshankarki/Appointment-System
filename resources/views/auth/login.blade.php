<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Template</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/login/css/login.css')}}">
</head>
<body>
<main>
    <div class="container-fluid">
        @if ($errors->has('status'))
            <div class="alert alert-danger">
                {{ $errors->first('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-6 login-section-wrapper">

                <div class="login-wrapper my-auto">
                    <h3 class="login-title">Log in</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your passsword">
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-block login-btn">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                    <p class="login-wrapper-footer-text">Don't have an account? <a href="{{route('register')}}" class="text-reset">Register here</a></p>
                    <p class="login-wrapper-footer-text">Want to be a doctor? <a href="{{route('registerDoctor')}}" class="text-reset">Register as a Doctor</a></p>

                </div>
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="assets/login/images/about.jpg" alt="login image" class="login-img">
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
