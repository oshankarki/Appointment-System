<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleAppStatus(doctorId) {
            $('#toggle-form-' + doctorId).submit();
        }
    </script>
</head>
<body>

<h2 style="text-align:center">Role Index</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Approved status</th>
        <th scope="col">License No</th>
        <th scope="col">Department</th>
        <th scope="col">Action</th>

    </tr>
    </thead>
    <tbody>
    @foreach($doctors as $record)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$record->user->name}}</td>
            <td>{{$record->user->email}}</td>
            <td>
                <form id="toggle-form-{{$record->id}}" action="{{ route('toggle.approval', $record->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="button" onclick="toggleAppStatus({{$record->id}})">
                        {{$record->user->app_status ? 'Approved' : 'Not Approved'}}
                    </button>
                </form>
            </td>
            <td>{{$record->license_no}}</td>
            <td>{{$record->department}}</td>
            <td><a href="{{route('doctor.show',$record->id)}}"class="btn btn-info">View Details</a></td>


        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
