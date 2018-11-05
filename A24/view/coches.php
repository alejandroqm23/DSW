<a class="btn btn-primary" href="?c=Coche&a=Crud">Nuevo Coche</a>
<?php
  if(isset($_SESSION['success'])){
    echo "<p style='color: green;'>".$_SESSION['success']."</p>";
    unset($_SESSION['success']);
  }
?>
<table border="1">
  <thead>
    <tr>
      <th>Marca</th>
      <th>Año</th>
      <th>Kilómetros</th>
      <th colspan=2>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($this->model->listar() as $r):?>
      <tr>
        <td><?php echo $r->make ?></td>
        <td><?php echo $r->year ?></td>
        <td><?php echo $r->mileage ?></td>
        <td><a href="?c=Coche&a=Crud&auto_id=<?php echo $r->auto_id; ?>">Editar</a></td>
        <td><a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Coche&a=Eliminar&auto_id=<?php echo $r->auto_id; ?>">Eliminar</a></td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
