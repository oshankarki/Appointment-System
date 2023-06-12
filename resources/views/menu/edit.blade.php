@extends('layouts.app')
@section('content')
    <form action="{{route('menu.update',$data['record']->id)}}"  method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" placeholder="Enter Menu Title" name="title" value="{{$data['record']->title}}" id="title">
        </div>
            @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" placeholder="Enter SLug" name="slug" value="{{$data['record']->slug}}" id="slug">
        </div>
            @if ($errors->has('slug'))
                <span class="text-danger">{{ $errors->first('slug') }}</span>
            @endif

        <button type="submit" class="btn btn-primary">Update</button>
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
