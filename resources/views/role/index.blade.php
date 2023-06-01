<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<h2 style="text-align:center">Role Index</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>

    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$record->name}}</td>
        <td>

            <a href="{{route('role.edit',$record->id)}}"class="btn btn-primary">Edit</i></a>

            <form action="{{ route('role.destroy', $record->id) }}" method="post" style="display:inline-block">
                @method("delete")
                @csrf
                <button type="submit" class="btn btn-block btn-danger sa-warning remove_row">
                    Delete</i>
                </button>
            </form>
        </td>

    </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
