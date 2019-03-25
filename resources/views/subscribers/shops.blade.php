@extends('layouts.app')

@section('content')


<div class="col-md-5">
<form method="GET">
	{{csrf_field()}}
    @foreach ($shops as $shop)
    <div class="form-group">
        <output name="{{$shop->name}}" class="form-control">
        	<a href="{{route('categories.index',['id'=>$shop->id])}}"> {{$shop->name}}</a>
        </output>
    </div>
    @endforeach

</div>
@endsection
