@extends('layouts.patient')
@section('content')

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h2>Make a appointment with experienced doctors</h2>
        </div>
    </section><!-- End Hero -->
    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Appointment Details</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
        </div>
    </section>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>

            <tr>
                <th>Doctor name</th>
                <td>{{$data->doctor->user->name}}</td>
            </tr>
            <tr>
                <th>Department</th>
                <td>{{$data->doctor->department}}</td>
            </tr>
            <tr>
                <th>Appointment Date</th>
                <td>{{$data->appointment_date}}</td>
            </tr>
            <tr>
                <th>Appointment Time</th>
                <td>{{$data->appointment_time}}</td>
            </tr>
            <tr>
                <th>Status</th>
                @if($data->status==1)
                    <td>Approved</td>
                @else
                    <td>Not Approved </td>
                @endif
            </tr>
            <tr>
                <th>Prescription</th>
                @if($data->prescription!=null)
                    <td>{{$data->prescription}}</td>
                @else
                    <td>No Prescription </td>
                @endif
            </tr>

            </thead>
        </table>
        <form action="{{ route('appointments.destroy', $data->id) }}" method="post" style="display:inline-block">
            @method("delete")
            @csrf
            <button type="submit" class="btn btn-block btn-danger sa-warning remove_row">
                Delete Appointment</i>
            </button>
        </form>
    </div>

</div>

@endsection
