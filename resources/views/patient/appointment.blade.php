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
                <h2>Make an Appointment</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
            @if($appointment_count==0)
            <form action="{{route('appointmentRequest')}}" method="post" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <input type="date" name="appointment_date" class="form-control datepicker" id="date"  placeholder="Appointment Date">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <input type="time" name="appointment_time" class="form-control datepicker" id="date" placeholder="Appointment Time">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="doctor" id="doctor" class="form-select">
                            <option value="">Select Doctor</option>
                            @foreach ($data['records'] as $record)
                                    <option value="{{ $record->id }}">{{ $record->user->name }} - {{ $record->department }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-group mt-3">
                    <textarea class="form-control" name="description" rows="5" placeholder="Message (Optional)"></textarea>
                    <div class="validate"></div>
                </div>
                <div class="mb-3">

                </div>
                <div class="text-center"><button  class="btn btn-primary" type="submit">Make an Appointment</button></div>
            </form>
            @else
                <h1 class="text-center">Appointment Progress</h1>
                <table class="table table-bordered">
                    <thead>

                    <tr>
                        <th>Appointment Date</th>
                        <td>{{$appointment->appointment_date}}</td>
                    </tr>
                    <tr>
                        <th>Appointment Time</th>
                        <td>{{$appointment->appointment_time}}</td>
                    </tr>
                    <tr>
                        <th>Doctor</th>
                        <td>Dr. {{$appointment->doctor->user->name}}</td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td>{{$appointment->doctor->department}}</td>
                    </tr>
                    <tr>
                        <th>Appointment Status</th>
                        @if($appointment->status==1)
                            <td>Approved</td>
                        @else
                            <td>Not Approved  </td>
                        @endif
                    </tr>


                    </thead>
                </table>

            @endif



        </div>
    </section><!-- End Appointment Section -->


@endsection
