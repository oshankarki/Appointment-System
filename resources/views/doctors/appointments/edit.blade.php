@extends('layouts.doctors')
@section('content')
    <h2 style="text-align:center">Student Create</h2>
    <form action="{{route('doctors.appointments.update',$data['record']->id)}}"  method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="prescription">Give Prescription</label>
            <textarea class="form-control" name="prescription" rows="5" placeholder="Prescription"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
