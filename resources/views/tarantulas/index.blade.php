@extends('layouts.app')

@section('content')

<div class="container">

	@if (Auth::user()->is_admin)
		<div class="form-check mb-2">
	        <input class="form-check-input" type="checkbox" id="changeMod" {{ ( $mod == 1) ? 'checked' : '' }}>
	        <label class="form-check-label" for="changeMod">
	          Cambiar Vista predeterminada
	        </label>
	    </div>
			
	@endif

	@if (Auth::user()->is_admin && $mod == 0)
		<div class="card">
			@if ($message = Session::get('success'))
		        <div class="alert alert-success">
		            <p>{{ $message }}</p>
		        </div>
		    @endif
		  <div class="card-header">
		    <strong>Lista de tarantulas</strong>
		  </div>
		  <div class="card-body">
		    <table class="table table-condensed table-striped">
		    	<thead>
		    		<tr class="text-center">
		    			<th>Nombre</th>
		    			<th>N Cientifico</th>
		    			<th>Genero</th>
		    			<th>Tamaño</th>
		    			<th>Class</th>
		    			<th>Precio</th>
		    			<th></th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		@foreach ($tarantulas as $tarantula)
			    		<tr class="text-center">
			    			<td><a href="{{ route('tarantulas.show', ['id' => $tarantula->id]) }}">{{ $tarantula->common_name }}</a></td>
			    			<td>{{ $tarantula->scientific_name }}</td>
			    			<td>{{ $tarantula->getGender() }}</td>
			    			<td>{{ $tarantula->size }}</td>
			    			<td>{{ $tarantula->getClass() }}</td>
			    			<td>{{ $tarantula->getPrice() }}</td>
			    			<td>
			    				<div class="row">
				    				<a href="{{ route('tarantulas.edit', $tarantula->id) }}" class="btn btn-outline-primary mr-1">Editar</a>
				    				@include('tarantulas.delete')
			    				</div>
			    			</td>
			    		</tr>
		    		@endforeach
		    	</tbody>
		    </table>
		  </div>
		</div>
	@else
	<div class="row">
		@foreach ($tarantulas as $tarantula)
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="card padding mt-3" style="width: 18rem;">
				  <img src="{{ URL::to('/').'/'.$tarantula->image_url }}" alt="" height="200px">
				  <div class="card-body">
				    <h5 class="card-title">{{ $tarantula->common_name }}</h5>
				    <p class="card-text"><strong>Precio:</strong> {{ $tarantula->getPrice() }}</p>
				    <p class="card-text"><strong>Tamaño:</strong> {{ $tarantula->size }}</p>
				    {{-- <p class="card-text"><strong>Genero:</strong> {{ $tarantula->getGender() }}</p>
				    <p class="card-text"><strong>Tipo:</strong> {{ $tarantula->getClass() }}</p> --}}
				    <a href="{{ route('tarantulas.show', ['id' => $tarantula->id]) }}" class="btn btn-outline-primary">Visualizar</a>
				  </div>
				</div>
			</div>
		@endforeach
	</div>
	@endif
</div>

@endsection