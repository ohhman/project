@extends('layouts.app')

@section('content')


<div class="col-md-5">
	<div class="form-group">

		<form method="POST" action="{{route('categories.update',$categories->id)}}">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
			
			<input name="name" value="{{$categories->name}}">
			<br>
			<input name="slug" value="{{$categories->slug}}">
			<br>
			<textarea name="description" value="">{{$categories->description}}</textarea>
			<br>
			<input name="img" value="{{$categories->img}}">
			<br>
			<input name="parent_id" value="{{$categories->parent_id}}"></output>
			
			<br>
			<button>Submit</button>
		</form>
		
	</div>
	@endsection
