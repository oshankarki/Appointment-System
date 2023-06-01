<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<h2 style="text-align:center">Student Create</h2>
<form action="{{route('role.store')}}"  method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="role">Role Name</label>
        <input type="text" class="form-control" placeholder="Enter Role" name="name">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
