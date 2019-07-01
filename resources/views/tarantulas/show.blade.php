@extends('layouts.app')

@section('content')

<div class="row justify-content-sm-center">
	<div class="col-xs-12 col-sm-10 col-md-7 col-lg-6">
		<div class="card">
		  <div class="card-header">
		    <h4><strong>{{ $tarantula->common_name }}</strong></h4>
		  </div>
		  <div class="card-body">
		  	<img src="{{ URL::to('/').'/'.$tarantula->image_url }}" alt="" height="250px">
		    <p class="card-text">
		    	<strong>Nombre Cientifico:</strong> {{ $tarantula->scientific_name }}
		    </p>
		    <p class="card-text">
		    	<strong>Nombre Cientifico:</strong> {{ $tarantula->getGender() }}
		    </p>
		    <p class="card-text">
		    	<strong>Nombre Cientifico:</strong> {{ $tarantula->size }}
		    </p>
		    <p class="card-text">
		    	<strong>Nombre Cientifico:</strong> {{ $tarantula->getClass() }}
		    </p>
		    <p class="card-text">
		    	<strong>Nombre Cientifico:</strong> {{ $tarantula->getPrice() }}
		    </p>
		  </div>
		  @if (Auth::check() && !Auth::user()->is_admin)
			  <div class="card-footer bg-transparent text-center">
			  	<form action="{{ route('in_shopping_carts.store') }}" method="POST">
			  		@csrf
			  		<input type="hidden" name="product_id" value="{{ $tarantula->id }}">
			  		<input type="submit" value="Agregar al carrito" class="btn btn-outline-success">
			  	</form>
			  	{{-- <add-product-btn></add-product-btn> --}}
			  </div>
		  @endif
		</div>
	</div>
</div>

@endsection

