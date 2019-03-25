@extends('layouts.app')

@section('content')


<div class="col-md-5">
<form method="GET">
	{{csrf_field()}}
    @foreach ($products as $product)
    <div class="form-group">
        <output name="{{$product->name}}" class="form-control">
       	{{$product->name}}
        </output>
    </div>
    @endforeach

</div>
@endsection
