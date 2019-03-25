@extends('layouts.app')

@section('content')
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>


<div class="col-md-5">
<div class="row">
<div class="col-md-4">
    @foreach ($products as $product)
    
	<figure class="card card-product">
		<div>
		<div class="img-wrap"><img src="/media/{{$product->img}}"></div>
		<figcaption class="info-wrap">
				<h4 class="title">{{$product->name}}</h4>
				<p class="desc">{{$product->description}}</p>
				<div class="rating-wrap">
					<div class="label-rating">{{$product->unit}} units</div>
					<div class="label-rating">{{$product->weight}} weight </div>
				</div> <!-- rating-wrap.// -->
		</figcaption>
		<div class="bottom-wrap">
				
			<div class="price-wrap h5">
				<span class="price-new">{{$product->price}}</span>
			</div> <!-- price-wrap.// -->
		</div> <!-- bottom-wrap.// -->
	</div>
		 <button onclick="window.location='{{url("products/$product->id/edit")}}'" class="btn btn-success">
    	Edit
    </button>
	</figure>
       
    @endforeach

</div>
</div>
</div>
@endsection
