@extends('layouts.app')

@section('content')
<form action="{{route('categories.destroy',$category->id)}}" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
     <button class="danger">DELETE</button>




</form>


@endsection
