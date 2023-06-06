<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        a{
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Patient Appointment Details
        </h3>
    </div>
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
                @if($data->tatus)
                    <td>Approved</td>
                @else
                    <td>Not Approved </td>
                @endif
            </tr>

            </thead>
        </table>
    </div>

</div>

</body>
</html>
