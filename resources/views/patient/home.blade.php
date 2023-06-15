
@extends("layouts.patient")
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome to MediBook</h1>
            <h2>Make a appointment with experienced doctors</h2>
        </div>
    </section><!-- End Hero -->
<section id="why-us" class="why-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="content">
                    <h3>Why Choose MediBook?</h3>
                    <p>
                       Medibook provides integrated solutions that redefine how you capture and analyze your organization’s risk, claims, safety, quality, and compliance data. Workflow and automation tools make your team more efficient, help to simplify insurance management, improve the productivity of your claims team, and reduce administrative burden, allowing staff to spend more time on patient care.
                    </p>
                    <div class="text-center">
                        <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="icon-boxes d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="bx bx-receipt"></i>
                                <h4>Patient Safety & Quality</h4>
                                <p>Manage patient safety and quality initiatives in one consolidated, secure system.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="bx bx-cube-alt"></i>
                                <h4>Healthcare Claims Management & Administration</h4>
                                <p>Comprehensive claims management for the entire claims life cycle, across all lines of coverage.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="bx bx-images"></i>
                                <h4>Healthcare Insurance Management</h4>
                                <p>Manage insurance policies and programs across all lines of coverage.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- End .content-->
            </div>
        </div>

    </div>
</section>
<section id="doctors" class="doctors">
    <div class="container">

        <div class="section-title">
            <h2>Appointments with Top Doctors</h2>
            <p>200+ experienced medical practitioners available for video consultation and appointment.</p>
        </div>

        <div class="row">
            @foreach($records as $record)
            <div class="col-lg-6">
                <div class="member d-flex align-items-start">
                    @if($record->image)
                        <div class="pic"><img src="{{ asset('storage/images/'.$record->image)}}" alt="Doctor Image" height="180px" width="180"></div>
                    @else
                        <div class="pic"><img src="{{asset('assets/img/doctors/doctors-1.jpg')}}" class="img-fluid" alt=""></div>
                    @endif

                    <div class="member-info">
                        <h4>{{$record->user->name}}</h4>
                        <span>{{$record->department}}</span>
                        <p>Liscense Number: {{$record->license_no}}</p>

                    </div>
                </div>
            </div>
            @endforeach
            </div>

        </div>

    </div>
</section>
@endsection
