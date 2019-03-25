@extends('layouts.app')

@section('content')
{{custom_helper_function()}}
<button class="btn btn-success"></button>
<form action="{{route('categories.store')}}" method="POST">
    {{csrf_field()}}
    <div class="col-md-5">
        <div class="form-group">
            <label for="name" class="col-form-label">Categories name:
            </label>

            <input name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Shops_id:</label>
            <input name="shops_id" class="form-control" value="{{$_GET['id']}}">
        </div>
        <div class="form-group">
            <label>Categories slug:</label>
            <input name="slug" class="form-control">
        </div>
        <div class="form-group">
            <label for="description" class="col-form-label">Categories description:</label>

            <textarea name="description" class="form-control"></textarea>

        </div>
        <div class="form-group">
            <label for="img" class="col-form-label">Categories image:</label>
            <input name="img" class="form-control">
        </div>
        <select name="type">
           <option value="0">0</option>
           @foreach($categories as $category)
           <option value="{{$category->id}}">{{$category->name}}
           </option>
           @endforeach
        </select>
        <button class="btn btn-success">Create</button>
    </div>




</form>


@endsection
