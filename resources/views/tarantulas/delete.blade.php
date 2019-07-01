@auth
	<form action="{{route('tarantulas.destroy',[$tarantula->id])}}" method="POST">
		@method('DELETE')
		@csrf
		<button type="submit" class="btn btn-outline-danger">Delete</button>               
	</form>
@endauth