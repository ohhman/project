@extends('layouts.app')

@section('content')


<div class="col-md-5">
	<div class="form-group">

		<form method="POST" action="{{route('shops.update',$shops->id)}}">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
			
			<input name="name" value="{{$shops->name}}">
			<br>
			<input name="adress" value="{{$shops->adress}}">
			<br>
			<input name="phone" value="{{$shops->phone_number}}">
			<br>
			<input name="imones_kodas" value="{{$shops->imones_kodas}}">
			<br>
			<input name="pvm" value="{{$shops->PVM_moketojo_kodas}}">
			<br>
			
			<input class="hidden" name="user_id" value="{{$shops->user_id}}">
			<br>
			<button>Submit</button>
		</form>
		
	</div>
	@endsection
