@extends('layouts.app')
@section('content')
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
@endsection
