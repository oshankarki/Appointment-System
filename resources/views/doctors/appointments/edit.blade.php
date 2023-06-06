@extends('layouts.doctors')
@section('content')
    <h2 style="text-align:center">Student Create</h2>
    <form action="{{route('doctors.appointments.update',$data['record']->id)}}"  method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="appointment_date">Appointment Date</label>
            <input type="date" class="form-control"  name="appointment_date" value="{{$data['record']->appointment_date}}">
        </div>
        <div class="form-group">
            <label for="appointment_time">Appointment Time</label>
            <input type="time" class="form-control"  name="appointment_time" value="{{$data['record']->appointment_time}}">
        </div>
        @if($data['record']->appointment_date=="1")
        <label for="status">Appointment Status</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Activate
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status" value="0" >
            <label class="form-check-label" for="flexRadioDefault2">
                Deactivate
            </label>
        </div>
        @else
            <label for="status">Appointment Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status" value="1" >
                <label class="form-check-label" for="flexRadioDefault1">
                    Activate
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status" value="0"  checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Deactivate
                </label>
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
