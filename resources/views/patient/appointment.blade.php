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
                        <input id="english_date" type="date" name="appointment_date" onclick="date.now()" readonly class="form-control" placeholder="Date in AD" required>

                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <input type="text" name="date_bs" id="nepali-datepicker" ndpYearCount=2 readonly class="form-control" placeholder="Date in BS" required>

                    </div>
                </div>
                <div class="row">

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
                    <textarea class="form-control" name="description" rows="5"   placeholder="Message (Optional)"></textarea>
                    <div class="validate"></div>
                </div>
                <div class="mb-3">

                </div>
                <div class="text-center"><button  class="btn btn-primary" type="submit">Request an Appointment</button></div>
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
        <script>
            var today = new Date().toISOString().split('T')[0];
            var maxDate = new Date();
            maxDate.setDate(maxDate.getDate() + 5);
            var maxDateFormatted = maxDate.toISOString().split('T')[0];
            document.getElementById("date").setAttribute('min', today);
            document.getElementById("date").setAttribute('max', maxDateFormatted);
        </script>
        <script type="text/javascript">
            window.onload = function() {
                year = NepaliFunctions.GetCurrentBsYear();
                month = NepaliFunctions.GetCurrentBsMonth();
                day = NepaliFunctions.GetCurrentBsDay();
                var currentdate = year + "-" + month + "-" + day
                console.log(currentdate)
                var mainInput = document.getElementById("nepali-datepicker");
                mainInput.nepaliDatePicker({
                    disableBefore: currentdate,
                    disableDaysAfter: 3
                });


            };
        </script>
        <script>
            setInterval(() => {
                getDate()
            }, 10);

            function getDate() {
                var nepali = document.getElementById("nepali-datepicker").value;
                converted = NepaliFunctions.BS2AD(nepali)

                var english = document.getElementById("english_date");
                english.value = converted;
            }
        </script>
    </section><!-- End Appointment Section -->


@endsection
