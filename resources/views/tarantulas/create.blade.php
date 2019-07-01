@extends('layouts.app')

@section('content')

<div class="container">
	<div class="card">
	  <div class="card-header">
	    <strong>Registrar tarantula</strong>
	  </div>
	  <div class="card-body">
	    @include('tarantulas.form')
	  </div>
	</div>
</div>

@endsection

