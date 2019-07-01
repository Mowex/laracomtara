@extends('layouts.app')

@section('content')

<div class="container">
	<div class="card">
	  <div class="card-header">
	   <strong> Editar Tarantula </strong> <small class="text-primary">{{ $tarantula->common_name }}</small>
	  </div>
	  <div class="card-body">
	    @include('tarantulas.form')
	  </div>
	</div>
</div>

@endsection

