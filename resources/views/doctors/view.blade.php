@extends('layouts.app')
@section('content')


<h2 style="text-align:center">Role Index</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Approved status</th>
        <th scope="col">License No</th>
        <th scope="col">Department</th>
        <th scope="col">Action</th>

    </tr>
    </thead>
    <tbody>
    @foreach($doctors as $record)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$record->user->name}}</td>
            <td>{{$record->user->email}}</td>
            <td>
                <form id="toggle-form-{{$record->id}}" action="{{ route('toggle.approval', $record->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="btn btn-info" onclick="toggleAppStatus({{$record->id}})">
                        {{$record->user->app_status ? 'Approved' : 'Not Approved'}}
                    </button>
                </form>
            </td>
            <td>{{$record->license_no}}</td>
            <td>{{$record->department}}</td>
            <td><a href="{{route('doctor.show',$record->id)}}" class="btn btn-info">View Details</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<script>
    function toggleAppStatus(doctorId) {
        $('#toggle-form-' + doctorId).submit();
    }
</script>
@endsection
