<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" maxlength="25" name="nombre" class="form-control" value='<?php echo $model[0]["Name"]; ?>' required="required" placeholder="Nombre del Pokemon">
  </div>
  <div class="form-group">
    <label for="Tipo1">Tipo 1</label>
    <select class="form-control" name="Tipo1">
      <?php
        foreach ($tipos as $row) {
          if($row["Type_1"]==$model[0]["Type_1"])
          {
            echo "<option value='".$row["Type_1"]."' selected>".$row["Type_1"]."</option>";
          }else
          {
            echo "<option value='".$row["Type_1"]."'>".$row["Type_1"]."</option>";
          }
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="Tipo2">Tipo 2</label>
    <select class="form-control" name="Tipo2">
      <option value=""></option>
      <?php
        foreach ($tipos as $row) {
          if($row["Type_1"]==$model[0]["Type_2"])
          {
            echo "<option value='".$row["Type_1"]."' selected>".$row["Type_1"]."</option>";
          }else
          {
            echo "<option value='".$row["Type_1"]."'>".$row["Type_1"]."</option>";
          }
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="HP">HP</label>
    <input type="number" max="400" min="1" name="HP" class="form-control" value='<?php echo $model[0]["HP"]; ?>' required="required" placeholder="Vida del Pokemon">
  </div>
  <div class="form-group">
    <label for="Attack">Ataque</label>
    <input type="number" max="400" min="1" name="Attack" class="form-control" value='<?php echo $model[0]["Attack"]; ?>' required="required" placeholder="Ataque del Pokemon">
  </div>
  <div class="form-group">
    <label for="Defense">Defensa</label>
    <input type="number" max="400" min="1" name="Defense" class="form-control" value='<?php echo $model[0]["Defense"]; ?>' required="required" placeholder="Defensa del Pokemon">
  </div>
  <div class="form-group">
    <label for="Sp_Atk">Ataque Especial</label>
    <input type="number" max="400" min="1" name="Sp_Atk" class="form-control" value='<?php echo $model[0]["Sp_Atk"]; ?>' required="required" placeholder="Ataque especial del Pokemon">
  </div>
  <div class="form-group">
    <label for="Sp_Def">Defensa Especial</label>
    <input type="number" max="400" min="1" name="Sp_Def" class="form-control" value='<?php echo $model[0]["Sp_Def"]; ?>' required="required" placeholder="Defensa especial del Pokemon">
  </div>
  <div class="form-group">
    <label for="Speed">Velocidad</label>
    <input type="number" max="400" min="1" name="Speed" class="form-control" value='<?php echo $model[0]["Speed"]; ?>' required="required" placeholder="Velocidad del Pokemon">
  </div>
  <div class="form-group">
    <label for="Generation">Generación</label>
    <input type="number" max="7" min="1" name="Generation" class="form-control" value='<?php echo $model[0]["Generation"]; ?>' required="required" placeholder="Generación del Pokemon">
  </div>
  <div class="form-group">
    <label for="Legendary">Legendario</label>
    <select class="form-control" name="Legendary">
      <?php
      if($model[0]["Legendary"]=="False"){
        echo "<option value='no' selected>No</option>";
        echo "<option value='si'>Si</option>";
      }else{
        echo "<option value='si' selected>Si</option>";
        echo "<option value='no'>No</option>";
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen" accept="image/gif,image/x-png">
  </div>
  <input type="hidden" name="id" value="<?php echo $model[0]['id']?>">
  <button type="submit" class="btn btn-primary" name="edit">Modificar</button>
</form>
