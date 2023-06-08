@extends('layouts.patient')
<style>

    .section {
        padding: 100px 0;
        position: relative;
    }
    .gray-bg {
        background-color: #f5f5f5;
    }
    img {
        max-width: 100%;
        margin-left:100px;
        border-radius: 50%;
    }
    img {
        vertical-align: middle;
        border-style: none;
    }
    /* About Me
    ---------------------*/
    .about-text h3 {
        font-size: 45px;
        font-weight: 700;
        margin: 0 0 6px;
    }
    @media (max-width: 767px) {
        .about-text h3 {
            font-size: 35px;
        }
    }
    .about-text h6 {
        font-weight: 600;
        margin-bottom: 15px;
    }
    @media (max-width: 767px) {
        .about-text h6 {
            font-size: 18px;
        }
    }
    .about-text p {
        font-size: 18px;
        max-width: 450px;
    }
    .about-text p mark {
        font-weight: 600;
        color: #20247b;
    }

    .about-list {
        padding-top: 10px;
    }
    .about-list .media {
        padding: 5px 0;
    }
    .about-list label {
        color: #20247b;
        font-weight: 600;
        width: 88px;
        margin: 0;
        position: relative;
    }
    .about-list label:after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        right: 11px;
        width: 1px;
        height: 12px;
        background: #20247b;
        -moz-transform: rotate(15deg);
        -o-transform: rotate(15deg);
        -ms-transform: rotate(15deg);
        -webkit-transform: rotate(15deg);
        transform: rotate(15deg);
        margin: auto;
        opacity: 0.5;
    }
    .about-list p {
        margin: 0;
        font-size: 15px;
    }

    @media (max-width: 991px) {
        .about-avatar {
            margin-top: 30px;
        }
    }

    .about-section .counter {
        padding: 22px 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
    }
    .about-section .counter .count-data {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .about-section .counter .count {
        font-weight: 700;
        color: #20247b;
        margin: 0 0 5px;
    }
    .about-section .counter p {
        font-weight: 600;
        margin: 0;
    }
    mark {
        background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
        background-size: 100% 3px;
        background-repeat: no-repeat;
        background-position: 0 bottom;
        background-color: transparent;
        padding: 0;
        color: currentColor;
    }
    .theme-color {
        color: #fc5356;
    }
    .dark-color {
        color: #20247b;
    }

</style>
@section('content')

    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h3 class="dark-color">About {{Auth::user()->name}}</h3>
                        <h6 class="theme-color lead">Patient of MediBook</h6>


                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Email</label>
                                    <p>{{Auth::user()->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <a href="{{route('patient.profile.edit')}}" class="btn btn-primary col-md-3">Update Profile</a>
                                <a href="{{route('patient.password.change')}}" class="btn btn-primary col-md-3" style="margin-left: 10px">Change Password</a>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="about-avatar">
                        @if(Auth::user()->patient->image)
                            <img src="{{ asset('storage/images/'.Auth::user()->patient->image)}}" alt="Doctor Image" height="300px" width="300">
                        @else
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
