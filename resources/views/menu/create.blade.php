@extends('layouts.app')
@section('content')

    <h2 style="text-align:right"><a class="btn btn-primary" href="{{route('menu.index')}}">List</a> </h2>
    <form action="{{route('menu.store')}}"  method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" placeholder="Enter Menu Title" name="title" id="title">
        </div>
        @if ($errors->has('title'))
            <span class="text-danger">{{ $errors->first('title') }}</span>
        @endif
        <div class="form-group">
            <label for="route">Slug</label>
            <input type="text" class="form-control" placeholder="Enter Slug" name="slug" id="slug">
        </div>
        @if ($errors->has('slug'))
            <span class="text-danger">{{ $errors->first('slug') }}</span>
        @endif
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        $("#title").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
            $("#slug").val(Text);
        });
    </script>

@endsection
