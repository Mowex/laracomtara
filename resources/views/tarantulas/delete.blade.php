@auth
	<form action="{{route('tarantulas.destroy',[$tarantula->id])}}" method="POST">
		@method('DELETE')
		@csrf
		<button type="submit" class="btn btn-outline-danger" @click="confirm('¿Desea eliminar el registro seleccionado?')">Delete</button>               
	</form>
@endauth