<form method="post">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" maxlength="25" name="nombre" class="form-control" required="required" placeholder="Nombre de la habilidad" value="<?php echo $model[0]["nameH"]?>">
  </div>
  <div class="form-group">
    <label for="Tipo1">descripcion de la habilidad</label>
    <textarea class="form-control" name="description" cols="3" rows="5"><?php echo $model[0]["description"]?></textarea>
  </div>
  <div class="form-group">
    <label for="HP">Generación</label>
    <input type="number" max="8" min="1" name="Generation" class="form-control" required="required" placeholder="Generación de la Habilidad" value="<?php echo $model[0]["generation_id"]?>">
  </div>
  <input type="hidden" name="id" value="<?php echo $model[0]['idH']?>">
  <button type="submit" class="btn btn-primary" name="editH">Modificar</button>

</form>
