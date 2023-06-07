@extends('layouts.app')
@section('content')
    <form action="{{route('superadmin.password.update')}}"  method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="role">Name</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{Auth::user()->name}}">
        </div>
        <div class="form-group">
            <label for="role">Email</label>
            <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{Auth::user()->email}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
