<h1 class="page-header">
    <?php echo $alm->auto_id != null ? $alm->make : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Coche">Coches</a></li>
  <li class="active"><?php echo $alm->auto_id != null ? $alm->make : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Coche&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="auto_id" value="<?php echo $alm->auto_id; ?>" />

    <div class="form-group">
        <label>Marca</label>
        <input type="text" name="make" value="<?php echo $alm->make; ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label>Año</label>
        <input type="text" name="year" value="<?php echo $alm->year; ?>" class="form-control" />
    </div>

    <div class="form-group">
        <label>Kilómetros</label>
        <input type="text" name="mileage" value="<?php echo $alm->mileage; ?>" class="form-control" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
