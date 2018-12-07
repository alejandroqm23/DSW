<form method="post">
  <input type="hidden" name="nombre" value="<?php echo $model[0]['Name'] ?>">
  <input type="hidden" name="id" value="<?php echo $model[0]['id'] ?>">
  <button type="submit" class="btn btn-primary" name="delete">Borrar</button>
  <button type="submit" class="btn btn-primary" name="volver">Volver</button>
</form>
