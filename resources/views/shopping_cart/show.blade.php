@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card padding">
		<h2>Mi carrito de compras</h2>
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
		    		</tr>
		    	</thead>
		    	<tbody>
		    		@foreach ($shopping_cart->products as $product)
			    		<tr class="text-center">
			    			<td><a href="{{ route('tarantulas.show', ['id' => $product->id]) }}">{{ $product->common_name }}</a></td>
			    			<td>{{ $product->scientific_name }}</td>
			    			<td>{{ $product->getGender() }}</td>
			    			<td>{{ $product->size }}</td>
			    			<td>{{ $product->getClass() }}</td>
			    			<td>{{ $product->getPrice() }}</td>
			    		</tr>
		    		@endforeach
		    	</tbody>
		    	<tfoot>
		    		<tr class="text-right">
		    			<td colspan="6">
		    				<strong>Monto Total</strong> <span id="total">{{ $shopping_cart->productsSum() }}</span>
		    			</td>
		    		</tr>
		    	</tfoot>
		    </table>
	</div>
</div>

@endsection