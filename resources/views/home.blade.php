@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="card bg-primary" style="width: 18rem; margin-left: 50px">
                                <div class="card-body">
                                    <p class="card-text text-warning">Verified Doctors: {{$approvedDoctors}}</p>
                                </div>
                            </div>

                            <div class="card bg-danger" style="width: 18rem; margin-left: 10px">
                                <div class="card-body">
                                    <p class="card-text text-warning">Unverified Doctors: {{$notapprovedDoctors}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="card bg-primary" style="width: 18rem; margin-left: 50px">
                                <div class="card-body">
                                    <p class="card-text text-warning">No. of Patients: {{$patients}}</p>
                                </div>
                            </div>

                            <div class="card bg-danger" style="width: 18rem; margin-left: 10px">
                                <div class="card-body">
                                    <p class="card-text text-warning">No. of Appointments: {{$appointments}}</p>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
