@extends('layouts.app')
@section('content')

<h2 style="text-align:center">Student Create</h2>
<form action="{{route('role.store')}}"  method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="role">Role Name</label>
        <input type="text" class="form-control" placeholder="Enter Role" name="name">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
