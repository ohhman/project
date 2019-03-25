@extends('layouts.app')

@section('content')

{{custom_helper_function()}}
<form action="{{route('products.store')}}" method="POST">
    {{csrf_field()}}
    <input class="hidden" name="categories_id" value="{{$_GET['id']}}">
    <div class="col-md-5">
        <div class="form-group">
            <label for="name" class="col-form-label">Product name:</label>
            
            <input name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Product slug:</label>
            <input name="slug" class="form-control">
        </div>
        <div class="form-group">
            <label for="qty" class="col-form-label">Product qty:</label>
            
            <input name="qty" class="form-control">
        </div>
        <div class="form-group">
            <label for="descprition" class="col-form-label">Product description:</label>
            
            <textarea name="description" class="form-control"></textarea>

        </div>

        <div class="form-group">
            <label for="price" class="col-form-label">Product price:</label>
            <input name="price" class="form-control">
        </div>

        <div class="form-group">
            <label for="specprice" class="col-form-label">Product special price:</label>
            <input name="specprice" class="form-control">
        </div>
        <div class="form-group">
            <label for="weight" class="col-form-label">Product weight:</label>
            <input name="weight" class="form-control">
        </div>
        <div class="form-group">
            <label for="img" class="col-form-label">Product image:</label>
            <input data-preview="#preview" name="input_img" type="file" id="imageInput">
            <img class="col-sm-6" id="preview"  src="">
        </div>
        
        <button class="btn btn-success">Create</button>
    </div>




</form>


@endsection
