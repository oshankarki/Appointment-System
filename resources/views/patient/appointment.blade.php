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
            <form action="{{route('appointmentRequest')}}" method="post" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <input type="date" name="appointment_date" class="form-control datepicker" id="date"  placeholder="Appointment Date">
                    </div>

                    <div class="col-md-4 form-group mt-3">
                        <input type="time" name="appointment_time" class="form-control datepicker" id="date" placeholder="Appointment Time">
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
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        @if ($errors->has('appointment_time'))
                            <span class="text-danger">{{ $errors->first('appointment_time') }}</span>
                        @endif
                    </div>

                    <div class="col-md-4 form-group mt-3">
                        @if ($errors->has('appointment_date'))
                            <span class="text-danger">{{ $errors->first('appointment_date') }}</span>
                        @endif
                    </div>

                    <div class="col-md-4 form-group mt-3">
                        @if ($errors->has('doctor'))
                            <span class="text-danger">{{ $errors->first('doctor') }}</span>
                        @endif
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
            <h1 class="text-center">Total no of appointments: {{$appointment_count}}</h1>

        @if($appointment)
                    @foreach($appointment as $app)

                <h1 class="text-center">Appointment Progress for the Dr.{{$app->doctor->user->name}}</h1>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Appointment Date</th>
                        <td>{{$app->appointment_date}}</td>
                    </tr>
                    <tr>
                        <th>Appointment Time</th>
                        <td>{{$app->appointment_time}}</td>
                    </tr>
                    <tr>
                        <th>Doctor</th>
                        <td>Dr. {{$app->doctor->user->name}}</td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td>{{$app->doctor->department}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$app->description}}</td>
                    </tr>
                    <tr>
                        <th>Appointment Status</th>
                        @if($app->status==1)
                            <td>Approved</td>
                        @else
                            <td>Not Approved  </td>
                        @endif
                    </tr>
                    </thead>
                </table>
                    <form action="{{ route('patient.appointment.destroy', $app->id) }}" method="post" style="display:inline-block">
                        @method("delete")
                        @csrf
                        <button type="submit" class="btn btn-block btn-danger sa-warning remove_row">
                            Delete</i>
                        </button>
                    </form>
                @endforeach
            @endif




        </div>
    </section><!-- End Appointment Section -->


@endsection
