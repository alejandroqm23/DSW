<?php
if($model!=[]){


?>
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
  <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
  <button type="submit" class="btn btn-primary" name="quit">Desasignar</button>
  <a href="<?php echo URL::base_url()."/login"?>"><button type="button" class="btn btn-primary">Volver</button></a>
</form>
<?php
}else{
echo "<p>Esa habilidad no esta asignada a ningún pokemon</p>\n";
echo  "<a href='".URL::base_url()."/login'><button type='button' class='btn btn-primary'>Volver</button></a>";
}

?>
