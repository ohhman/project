@extends('layouts.app')

@section('content')


<div class="col-md-5">
	<div class="form-group">

		<form method="POST" action="{{route('shops.store')}}">
			<input type="hidden" name="_method" value="POST">
			<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
			Shop name
			<br>
			<input name="name">
			<br>
			Adress
			<br>
			<input name="adress">
			<br>
			Phone Nr.
			<br>
			<input name="phone_number">
			<br>
			Im_code
			<br>
			<input name="im_kodas">
			<br>
			PVM moketojo kodas
			<br>
			<input name="PVM">
			<br>
			<br>
			<button class="btn btn-success">Submit</button>
		</form>
		
	</div>
	@endsection
