<form method="post">
  <div class="form-group">
    <label for="pokemon">Pokemon</label>
    <select class="form-control" name="pokemon[]" multiple="multiple">
      <?php
        foreach ($model as $row) {
          echo "<option value='".$row["id"]."'>".$row["Name"]."</option>";
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="Tipo">Tipo de habilidad</label>
    <select class="form-control" name="Tipo">
      <option value="unitaria">Unitaria</option>
      <option value="doble">Doble</option>
      <option value="oculta">Oculta</option>
    </select>
  </div>
  <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
  <button type="submit" class="btn btn-primary" name="add">Añadir</button>
</form>
