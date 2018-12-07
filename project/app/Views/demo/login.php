
<form method="post">
  Buscar: <input type="search" name="buscar" placeholder="Buscar">
  <button type="submit">Buscar</button>
</form>
<a href="<?php echo ROUTER::create_action_url("demo/insertH") ?>"><i class="fa fa-plus" style="font-size:36px;color:blue"></i></a>
<?php

echo "<table class='table'>";
echo "<tr><th>Nombre</th><th>Añadir a pokemon</th><th>Quitar de pokemon</th><th>Editar</th><th>Borrar</th></tr>";
foreach ($model as $row) {
  echo "<tr>
    <td>".$row["nameH"]."</td>
    <td><a href='".ROUTER::create_action_url("demo/add")."/id/".$row['idH']."'><i class='fa fa-anchor' style='font-size:36px;color:blue'></i></a></td>
    <td><a href='".ROUTER::create_action_url("demo/quit")."/id/".$row['idH']."'><i class='fa fa-times' style='font-size:36px;color:red'></i></a></td>
    <td><a href='".ROUTER::create_action_url("demo/editarH")."/id/".$row['idH']."'><i class='fa fa-wrench' style='font-size:36px;color:green'></td>
    <td><a href='".ROUTER::create_action_url("demo/deleteH")."/id/".$row['idH']."'><i class='fa fa-trash' style='font-size:36px;color:red'></i></a></td>
  </tr>";
}
echo "</table>";
$pagination->pages("btn btn-primary");
?>
