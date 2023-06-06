@extends('layouts.app')
@section('content')
<form action="{{route('role.update',$data['record']->id)}}"  method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="role">Role Name</label>
        <input type="text" class="form-control" placeholder="Enter Role" name="name" value="{{$data['record']->name}}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
