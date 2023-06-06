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

            <form action="forms/appointment.php" method="post" role="form" class="php-email-form">

                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <input type="time" name="time" class="form-control datepicker" id="date" placeholder="Appointment Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="department" id="department" class="form-select">
                            <option value="">Select Doctor</option>
                            @foreach ($data['records'] as $record)
                                <option value="{{ $record->doctor->id }}">{{ $record->doctor->user->name }}-{{ $record->doctor->department}}</option>
                            @endforeach
                        </select>
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="doctor" id="doctor" class="form-select">
                            <option value="">Select Doctor</option>
                            <option value="Doctor 1">Doctor 1</option>
                            <option value="Doctor 2">Doctor 2</option>
                            <option value="Doctor 3">Doctor 3</option>
                        </select>
                        <div class="validate"></div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                    <div class="validate"></div>
                </div>
                <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Make an Appointment</button></div>
            </form>

        </div>
    </section><!-- End Appointment Section -->


@endsection
