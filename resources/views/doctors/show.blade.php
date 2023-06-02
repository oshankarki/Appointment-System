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
            <h3 class="card-title">Doctor Details
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>

                <tr>
                    <th>Name</th>
                    <td>{{$data->user->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$data->user->email}}</td>
                </tr>
                <tr>
                    <th>License Number</th>
                    <td>{{$data->license_no}}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>{{$data->department}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    @if($data->user->app_status)
                    <td>Approved</td>
                    @else
                        <td>Not Approved <button class="btn btn-primary"> <a href="https://www.nmc.org.np/searchPractitioner">Find Registered Doctor </a> </button> </td>
                    @endif
                </tr>
                <tr>
                    <th>Image</th>
                    @if($data->image)
                    <td>{{$data->image}}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                </tr>
                </thead>
            </table>
        </div>

    </div>

</body>
</html>
