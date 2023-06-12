@extends('layouts.app')
@section('content')

    <h2 style="text-align:right"><a class="btn btn-primary" href="{{route('menu.create')}}">Create</a> </h2>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$record->title}}</td>
                <td>{{$record->slug}}</td>
                <td>
                    <a href="{{route('menu.edit',$record->id)}}" class="btn btn-primary">Edit</a>

                    <form action="{{ route('menu.destroy', $record->id) }}" method="post" style="display:inline-block">
                        @method("delete")
                        @csrf
                        <button type="submit" class="btn btn-block btn-danger sa-warning remove_row">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection



