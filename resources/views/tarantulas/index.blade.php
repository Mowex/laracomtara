@extends('layouts.app')

@section('content')

<div class="container">
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
</div>

@endsection