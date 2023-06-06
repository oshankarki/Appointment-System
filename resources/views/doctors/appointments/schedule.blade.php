@extends('layouts.doctors')
@section('content')
<h2 style="text-align:center">Student Create</h2>
<form action="{{route('doctors.appointments.store')}}"  method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="appointment_date">Appointment Date</label>
        <input type="date" class="form-control"  name="appointment_date">
    </div>
    <div class="form-group">
        <label for="appointment_time">Appointment Time</label>
        <input type="time" class="form-control"  name="appointment_time">
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
