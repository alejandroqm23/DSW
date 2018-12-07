<?php
// Como podemos ver esta página de admin controller se creo como ejemplo durante el tutorial, era un ejemplo para
// la cración de un segundo controador, como vemos extiende la clase Controllers, esto se hace para usar tanto los
// metodos de Config, como los de Controllers. En este momento lo único que hace es cargar la vista admin que es
// la vista que se encarga del login.
class AdminController extends Controllers
{

  public function admin()
  {
    if(!isset($_SESSION["usuario"]))
    {
      if(isset($_POST['usuario']))
      {
        $usuario=htmlentities($_POST["usuario"]);
        $pass=hash('sha256',"password".htmlentities($_POST["clave"]));
        $conn = DB::connect($this->db["mysql"]);
        $sql = "SELECT * from usuariosMVC where UserName='".$usuario."' and passUsuario='".$pass."'";
        $query=$conn->prepare($sql);
        $query->execute();
        $model= array();
        while($filas = $query->fetch()){
          $model[]= $filas;
        }
        if($model==[]){
          URL::redirect(URL::base_url()."/admin/errorusuario/si");
        }else{
          $_SESSION["usuario"]=$model[0]["userName"];
          URL::redirect(URL::base_url());
        }
      }

      $layout="layouts/layout";
      $meta = array(
        'title' => 'Página de Login',
        'descripcion' => 'Es la página de login',
        'keywords' => 'php, framework, mvc',
        'robots' => 'All',
        'place' => 'Login');
      if(isset($_GET["errorusuario"]))
      {
        return ROUTER::show_view("demo/admin", array('meta' => $meta,'error' => $_GET["errorusuario"]),$layout);
      }
      else
      {
        return ROUTER::show_view("demo/admin", array('meta' => $meta),$layout);
      }
    }
  }
}

?>
