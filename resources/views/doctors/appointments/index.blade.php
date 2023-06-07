@extends('layouts.doctors')
@section('content')

<h2 style="text-align:center">Appointment Index</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Department</th>
        <th scope="col">Status</th>
        <th scope="col">Patient</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$record->appointment_date}}</td>
            <td>{{$record->appointment_time}}</td>
            <td>{{$record->doctor->department}}</td>
            <td>
                <form id="toggle-form-{{$record->id}}" action="{{ route('status.approval', $record->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="button" onclick="toggleAppStatus({{$record->id}})">
                        {{$record->status? 'Approved' : 'Not Approved'}}
                    </button>
                </form>
            </td>
            <th scope="col">{{$record->patient->user->name}}</th>
            <td>
                <a href="{{route('appointment.edit',$record->id)}}"class="btn btn-primary">Edit</a>

                <form action="{{ route('appointments.destroy', $record->id) }}" method="post" style="display:inline-block">
                    @method("delete")
                    @csrf
                    <button type="submit" class="btn btn-block btn-danger sa-warning remove_row">
                        Delete</i>
                    </button>
                </form>
        </tr>
    @endforeach
    </tbody>
</table>
<script>
    function toggleAppStatus(appointmentId) {
        $('#toggle-form-' + appointmentId).submit();
    }
</script>
@endsection
