@extends('layouts.app')

@section('content')


<div class="col-md-5">
	<div class="form-group">

		<form method="POST" action="{{route('products.update',$products->id)}}">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
			
			<input value="{{$products->name}}">
			<br>
			<input value="{{$products->slug}}">
			<br>
			<input value="{{$products->price}}">
			<br>
			<input value="{{$products->special_price}}">
			<br>
			<input value="{{$products->unit}}">
			<br>
			<textarea value="{{$products->description}}"></textarea>
			<br>
			<input value="{{$products->weight}}">
			<br>
			<input value="{{$products->img}}">
			<br>
			<button>Submit</button>
		</form>
		
	</div>
	@endsection
