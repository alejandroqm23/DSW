<form method="post">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" maxlength="25" name="nombre" class="form-control" required="required" placeholder="Nombre de la habilidad">
  </div>
  <div class="form-group">
    <label for="Tipo1">descripcion de la habilidad</label>
    <textarea class="form-control" name="description" cols="3" rows="5"></textarea>
  </div>
  <div class="form-group">
    <label for="HP">Generación</label>
    <input type="number" max="8" min="1" name="Generation" class="form-control" required="required" placeholder="Generación de la Habilidad">
  </div>
  <input type="hidden" name="id" value="<?php echo $id[0]['id']+1?>">
  <button type="submit" class="btn btn-primary" name="add">Crear</button>

</form>
