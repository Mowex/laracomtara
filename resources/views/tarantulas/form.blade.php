<form action="{{ route($tarantula->url(), $tarantula->id) }}" method="POST" enctype="multipart/form-data">

  @csrf

  @if ($tarantula->method() == 'PUT')
    @method('PUT')
  @endif

  <div class="form-group">
    <label>Nombre común</label>
    <input type="text" class="form-control" id="" name="common_name" value="{{ $tarantula->common_name }}" placeholder="Rodillas rojas, Chilena rosada..." required>
  </div>

  <div class="form-group">
    <label>Nombre Científico</label>
    <input type="text" class="form-control" id="" name="scientific_name" value="{{ $tarantula->scientific_name }}" placeholder="Brachypelma Vaganas, auratum..." required>
  </div>

  <div class="form-group">
    <label>Tamaño</label>
    <input type="number" class="form-control" id="" name="size" value="{{ $tarantula->size }}" placeholder="especificar en cm" required>
  </div>

  <div class="form-group">
    <label>Precio</label>
    <input type="number" class="form-control" id="" name="price" value="{{ $tarantula->price }}" placeholder="MXN" required>
  </div>

  <div class="form-group">
    <label>Género</label>
    <select name="gender" id="" class="form-control" required>
      <option value="S" {{ ( $tarantula->gender == 'S') ? 'selected' : '' }} >Sin Sexar</option>
      <option value="M" {{ ( $tarantula->gender == 'M') ? 'selected' : '' }} >Macho</option>
      <option value="H" {{ ( $tarantula->gender == 'H') ? 'selected' : '' }} >Hembra</option>
    </select>
  </div>

  <div class="form-group">
    <label>Clasificación</label>
    <select name="classification" id="" class="form-control" required>
      <option value="L" {{ ( $tarantula->classification == 'L') ? 'selected' : '' }} >Ling</option>
      <option value="J" {{ ( $tarantula->classification == 'J') ? 'selected' : '' }} >Juvenil</option>
      <option value="A" {{ ( $tarantula->classification == 'A') ? 'selected' : '' }} >Adulto(a)</option>
    </select>
  </div>

  @if ($tarantula->image_url)
    <img src="{{ URL::to('/').'/'.$tarantula->image_url }}" alt="" height="100px">
  @endif

  <div class="form-group">
    <label>Imagen</label>
    <input type="file" name="image" id="" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-outline-primary">Guardar</button>
</form>