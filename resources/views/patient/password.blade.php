@extends('layouts.patient')
<style>
    .section{
        margin-top:100px;
    }
</style>
@section('content')

    <section class="section about-section gray-bg" id="about">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <form action="{{route('patient.password.update')}}"  method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="password">Old Passsword</label>
                        <input type="password" class="form-control" placeholder="Enter old Password" name="current_password" value="">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" placeholder="Enter new Password" name="new_password" value="">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" placeholder="Enter Confirm new password" name="confirm_new_password" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
        </div>
    </section>



@endsection