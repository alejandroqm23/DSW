
<?php
include(APP_ROUTE."/app/vistas/inc/header.php");
 ?>
 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#"><?php echo $datos["Titulo"]; ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo URL_ROUTE; ?>/paginas/agregar">Insertar</a>
    </li>
  </ul>
</nav>
<table class="table">
  <tr><th>id</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th colspan="2">Acciones</th></tr>
<?php
foreach ($datos["datos"] as $key) {
  echo"<tr>";
  echo "<td>".$key->id_usuario."</td>";
  echo "<td>".$key->nombre."</td>";
  echo "<td>".$key->email."</td>";
  echo "<td>".$key->tlf."</td>";
  echo "<td><a href='" . URL_ROUTE ."/paginas/editar/".$key->id_usuario."'>Editar</a></td>";
  echo "<td><a href='" . URL_ROUTE ."/paginas/borrar/".$key->id_usuario."'>Borrar</a></td>";
  echo "</tr>";
}
echo "</table>";
include(APP_ROUTE."/app/vistas/inc/footer.php");
 ?>
