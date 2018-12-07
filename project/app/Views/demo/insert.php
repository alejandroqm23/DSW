<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" maxlength="25" name="nombre" class="form-control" required="required" placeholder="Nombre del Pokemon">
  </div>
  <div class="form-group">
    <label for="Tipo1">Tipo 1</label>
    <select class="form-control" name="Tipo1">
      <?php
        foreach ($model as $row) {
          echo "<option value='".$row["Type_1"]."'>".$row["Type_1"]."</option>";
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="Tipo2">Tipo 2</label>
    <select class="form-control" name="Tipo2">
      <option value=""></option>
      <?php
        foreach ($model as $row) {
          echo "<option value='".$row["Type_1"]."'>".$row["Type_1"]."</option>";
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="HP">HP</label>
    <input type="number" max="400" min="1" name="HP" class="form-control" required="required" placeholder="Vida del Pokemon">
  </div>
  <div class="form-group">
    <label for="Attack">Ataque</label>
    <input type="number" max="400" min="1" name="Attack" class="form-control" required="required" placeholder="Ataque del Pokemon">
  </div>
  <div class="form-group">
    <label for="Defense">Defensa</label>
    <input type="number" max="400" min="1" name="Defense" class="form-control" required="required" placeholder="Defensa del Pokemon">
  </div>
  <div class="form-group">
    <label for="Sp_Atk">Ataque Especial</label>
    <input type="number" max="400" min="1" name="Sp_Atk" class="form-control" required="required" placeholder="Ataque especial del Pokemon">
  </div>
  <div class="form-group">
    <label for="Sp_Def">Defensa Especial</label>
    <input type="number" max="400" min="1" name="Sp_Def" class="form-control" required="required" placeholder="Defensa especial del Pokemon">
  </div>
  <div class="form-group">
    <label for="Speed">Velocidad</label>
    <input type="number" max="400" min="1" name="Speed" class="form-control" required="required" placeholder="Velocidad del Pokemon">
  </div>
  <div class="form-group">
    <label for="Generation">Generación</label>
    <input type="number" max="7" min="1" name="Generation" class="form-control" required="required" placeholder="Generación del Pokemon">
  </div>
  <div class="form-group">
    <label for="Legendary">Legendario</label>
    <select class="form-control" name="Legendary">
      <option value='False'>No</option>
      <option value='True'>Si</option>
    </select>
  </div>
  <div class="form-group">
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen" accept="image/gif,image/x-png">
  </div>
  <input type="hidden" name="id" value="<?php echo $id[0]['id']+1?>">
  <button type="submit" class="btn btn-primary" name="add">Crear</button>
</form>
