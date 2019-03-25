@extends('layouts.app')

@section('content')


<div class="col-md-5">

    @foreach ($categories as $category)
    <div class="form-group">
        <input type="hidden" name="catid" value="{{$category->id}}">
        <output name="{{$category->name}}" class="form-control">
        	<a href="{{route('products.create',['id'=>$category->id])}}"> {{$category->name}}</a>
        </output>
        <button onclick="window.location='{{url("admin/categories/$category->id/edit")}}'" class="btn btn-success">
    	Edit
    </button>
     <button onclick="window.location='{{url("admin/products/$category->id")}}'" class="btn btn-success">
        Show
    </button>
    </div>
    @endforeach
{{$categories->links()}}
</div>
@endsection
