<?php
require_once 'model/coche.php';

class CocheController{

  private $model;

  public function __CONSTRUCT(){
    $this->model = new Coche();
  }
  public function Indice(){
      require_once 'view/header.php';
      require_once 'view/coches.php';
      require_once 'view/footer.php';
  }
  public function Crud(){
      $alm = new Coche();

      if(isset($_REQUEST['auto_id'])){
          $alm = $this->model->Obtener($_REQUEST['auto_id']);
      }

      require_once 'view/header.php';
      require_once 'view/coches-editar.php';
      require_once 'view/footer.php';
  }

  public function Guardar(){
      $alm = new Coche();

      $alm->auto_id = $_REQUEST['auto_id'];
      $alm->make = $_REQUEST['make'];
      $alm->year = $_REQUEST['year'];
      $alm->mileage = $_REQUEST['mileage'];

      $alm->auto_id > 0
        ? $this->model->Actualizar($alm)
        : $this->model->Registrar($alm);

      header('Location: index.php');
  }

  public function Eliminar(){
      $this->model->Eliminar($_REQUEST['auto_id']);
      header('Location: index.php');
  }
}
?>
