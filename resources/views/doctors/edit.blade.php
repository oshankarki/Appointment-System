@extends('layouts.doctors')

@section('content')
    <form action="{{ route('doctor.profile.update') }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="role">Name</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ Auth::user()->name }}">
        </div>
        <div class="form-group">
            <label for="role">Email</label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ Auth::user()->email }}">
        </div>
        <div class="form-group">
            <label for="role">Department</label>
            <input type="text" class="form-control" placeholder="Enter Department" name="department" value="{{ Auth::user()->doctor->department }}">
        </div>
        <div class="form-group">
            <label for="role">License Number</label>
            <input type="text" class="form-control" placeholder="Enter License Number" name="license_no" value="{{ Auth::user()->doctor->license_no }}">
        </div>
        <p>Replace Profile Image</p>
        @if(Auth::user()->doctor->image)
            <img src="{{ asset('storage/images/'.Auth::user()->doctor->image) }}" alt="Doctor Image" height="200px" width="200">
        @else
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Doctor Image" height="200px" width="200" alt="">
        @endif
        <br>
        Profile Picture:
        <div id="imagePreviewContainer" style="display: none;">
            <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px;">
        </div>

        <div class="form-group">
            <input type="file"  onchange="previewImage(this)" class="form-control"  name="image">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

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
@endsection

