@extends('layouts.app')

@section('content')


<div class="col-md-5">
<form method="GET">
	{{csrf_field()}}
    @foreach ($categories as $category)
    <div class="form-group">
        <output name="{{$category->name}}" class="form-control">
        	<a href="{{route('products.index',['id'=>$category->id])}}"> {{$category->name}}</a>
        </output>
    </div>
    @endforeach

</div>
@endsection
