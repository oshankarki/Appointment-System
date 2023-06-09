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
        <div class="row">
            <div class="col-sm-6 login-section-wrapper">
                <div class="login-wrapper my-auto">
                    <h3 class="login-title">Register as a doctor</h3>
                    <form method="POST" action="{{ route('doctor.request') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="license_no">License Number</label>
                            <input type="license_no" name="license_no" id="license_no" class="form-control" placeholder="license Number">
                        </div>
                        Image:
                        <div id="imagePreviewContainer" style="display: none;">
                            <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px;">
                        </div>

                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="department" name="department" id="department" class="form-control" placeholder="Department">
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-block login-btn">
                                    Request for approval
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="login-wrapper-footer-text">Have an account? <a href="{{route('login')}}" class="text-reset">Login here</a></p>
                </div>
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="assets/login/images/about.jpg" alt="login image" class="login-img">
            </div>
        </div>
    </div>
</main>
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
                $('#imagePreviewContainer').show();
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#imagePreview').attr('src', '#');
            $('#imagePreviewContainer').hide();
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
