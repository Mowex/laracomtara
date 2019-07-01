@extends('layouts.app')

@section('content')

<div class="row justify-content-sm-center">
	<div class="col-xs-12 col-sm-10 col-md-7 col-lg-6">
		<div class="card">
		  <div class="card-header">
		    <h4><strong>{{ $tarantula->common_name }}</strong></h4>
		  </div>
		  <div class="card-body">
		  	<img src="{{ URL::to('/').'/'.$tarantula->image_url }}" alt="">
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
		  <div class="card-footer bg-transparent text-center">
		  	<button type="button" class="btn btn-outline-success">Agregar al carrito</button>
		  </div>
		</div>
	</div>
</div>

@endsection

