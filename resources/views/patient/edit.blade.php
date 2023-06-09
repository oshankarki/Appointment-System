@extends('layouts.patient')
<style>
    .section{
        margin-top:100px;
    }
</style>
@section('content')

    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <form action="{{ route('patient.profile.update') }}" method="post" enctype="multipart/form-data">
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

                    <p>Replace Profile Image</p>
                    @if(Auth::user()->patient->image)
                        <img src="{{ asset('storage/images/'.Auth::user()->patient->image) }}" alt="Doctor Image" height="200px" width="200">
                    @else
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Doctor Image" height="200px" width="200" alt="">
                    @endif
                    <br>
                    Profile Picture:
                    <div id="imagePreviewContainer" style="display: none;">
                        <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px;">
                    </div>

                    <div class="form-group">
                        <input type="file"  onchange="previewImage(this)" class="form-control"  name="image" accept="image/*">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
            </div>
        </div>
    </section>
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
