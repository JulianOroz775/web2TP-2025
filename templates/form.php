<form action="agregar" method="POST" class="p-4 bg-light rounded-3 shadow-sm">

  <div class="mb-3">
    <label for="marca" class="form-label">Marca</label>
    <input type="text" name="Marca" class="form-control" id="marca" placeholder="Ej: Gold Nutrition">
  </div>

  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="Nombre" class="form-control" id="nombre" placeholder="Ej: Creatina">
  </div>

  <div class="mb-3">
    <label for="prioridad" class="form-label">Prioridad</label>
    <select name="Prioridad" id="prioridad" class="form-select">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary w-100">Cargar</button>
</form>