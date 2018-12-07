
<form method="post">
  Buscar: <input type="search" name="buscar" placeholder="Buscar">
  <button type="submit">Buscar</button>
</form>
<a href="<?php echo ROUTER::create_action_url("demo/insert") ?>"><i class="fa fa-plus" style="font-size:36px;color:blue"></i></a>
<?php

echo "<table class='table'>";
echo "<tr><th>Nombre</th><th>Tipo 1</th><th>Tipo 2</th><th>Imagen</th><th>Editar</th><th>Borrar</th></tr>";
foreach ($model as $row) {
  echo "<tr><td>".$row["Name"]."</td><td>".$row["Type_1"]."</td><td>".$row["Type_2"]."</td><td><img src='".URL::base_url()."/resource/gif/".strtolower($row["Name"]).".gif'></td><td><a href='".ROUTER::create_action_url("demo/editar")."/id/".$row['id']."'><i class='fa fa-wrench' style='font-size:36px;color:green'></td><td><a href='".ROUTER::create_action_url("demo/delete")."/id/".$row['id']."'><i class='fa fa-trash' style='font-size:36px;color:red'></i></a></td></tr>";
}
echo "</table>";
$pagination->pages("btn btn-primary");
?>
