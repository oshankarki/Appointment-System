<!DOCTYPE html>
<html>
<head>
    <title>Create Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<h2 style="text-align:center">Student Create</h2>
<form action="{{route('doctors.appointments.store')}}"  method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="appointment_date">Appointment Date</label>
        <input type="date" class="form-control"  name="appointment_date">
    </div>
    <div class="form-group">
        <label for="appointment_time">Appointment Time</label>
        <input type="time" class="form-control"  name="appointment_time">
    </div>
    <div>
        <label for="status">Appointment Status</label>
        <input type="radio" class="form-control"   value="1" name="status" checked>Activate
        <input type="radio" class="form-control" value="0"  name="status"> Deactivate

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
