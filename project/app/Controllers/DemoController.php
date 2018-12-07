<?php
// este controlador es el controlador principal, y se encarga, de todas las acciones del framework,
// como por ejemplo la inserción de nuevos registros para cada una de las tablas, el borrado de registros 
// y la modificación, además de gestionar la subida de imágenes y el logout
class DemoController extends Controllers{

  public $layout="layouts/demolayout";

  public function logout(){
    session_destroy();
    URL::redirect(URL::base_url()."/admin");
  }
  // metodo principal que muestra la totalidad de los pokemon que existen en la base de datos, implementa
  // la posibilidad de buscar, para buscar un pokemon concreto por el nombre
  public function index(){
    if(!isset($_SESSION["usuario"])){
      URL::redirect(URL::base_url()."/admin");
    }
    $meta = array(
      'title' => 'Página de Inicio',
      'descripcion' => 'Es la descripcion de la pagina de inicio',
      'keywords' => 'php, framework, mvc',
      'robots' => 'All',
      'place' => 'Lista Pokemon');

    $conn = DB::connect($this->db["mysql"]);
    $pagination = new PDO_Pagination($conn);
    if(isset($_POST["buscar"]))
    {

      $pagination->params = array("buscar" => $_POST["buscar"]);
      $pagination->btn_next_page="siguiente";
      $pagination->btn_back_page="anterior";
      $pagination->btn_last_page="ultima";
      $pagination->btn_first_page="primera";
      $pagination->rowCount("SELECT * FROM pokemon WHERE Name LIKE '%".$_POST["buscar"]."%'");
      $pagination->config(4 ,10);
      $sql = "SELECT * FROM pokemon WHERE Name LIKE '%".$_POST["buscar"]."%' ORDER BY id ASC LIMIT $pagination->start_row, $pagination->max_rows";
      $query = $conn->prepare($sql);
      $query->execute();
      $model= array();
      while($filas = $query->fetch()){
        $model[]= $filas;
      }
    }else
    {
      $pagination->btn_next_page="siguiente";
      $pagination->btn_back_page="anterior";
      $pagination->btn_last_page="ultima";
      $pagination->btn_first_page="primera";
      $pagination->rowCount("SELECT * FROM pokemon");
      $pagination->config(4 ,10);
      $sql = "SELECT * FROM pokemon ORDER BY id ASC LIMIT $pagination->start_row, $pagination->max_rows";
      $query = $conn->prepare($sql);
      $query->execute();
      $model= array();
      while($filas = $query->fetch()){
        $model[]= $filas;
      }
    }
    return ROUTER::show_view('demo/index', array('meta' => $meta, 'model' => $model,"pagination"=>$pagination));
  }
  // metodo que muestra la vista que contiene los datos de las habilidades de cada pokemon, también, implementa 
  // la posibilidad de buscar una habilidad por el nombre
  public function login(){
    if(!isset($_SESSION["usuario"])){
      URL::redirect(URL::base_url()."/admin");
    }
    $meta = array(
      'title' => 'Página de habilidades',
      'descripcion' => 'En esta página se encuentran listadas todas las habilidades de los pokemon hasta la sexta generación',
      'keywords' => 'php, framework, mvc',
      'robots' => 'All',
      'place' => 'Habilidades');

      $conn = DB::connect($this->db["mysql"]);
      $pagination = new PDO_Pagination($conn);
      if(isset($_POST["buscar"]))
      {

        $pagination->params = array("buscar" => $_POST["buscar"]);
        $pagination->btn_next_page="siguiente";
        $pagination->btn_back_page="anterior";
        $pagination->btn_last_page="ultima";
        $pagination->btn_first_page="primera";
        $pagination->rowCount("SELECT * FROM Habilidades WHERE nameH LIKE '%".$_POST["buscar"]."%'");
        $pagination->config(4 ,10);
        $sql = "SELECT * FROM Habilidades WHERE nameH LIKE '%".$_POST["buscar"]."%' ORDER BY idH ASC LIMIT $pagination->start_row, $pagination->max_rows";
        $query = $conn->prepare($sql);
        $query->execute();
        $model= array();
        while($filas = $query->fetch()){
          $model[]= $filas;
        }
      }else
      {
        $pagination->btn_next_page="siguiente";
        $pagination->btn_back_page="anterior";
        $pagination->btn_last_page="ultima";
        $pagination->btn_first_page="primera";
        $pagination->rowCount("SELECT * FROM Habilidades");
        $pagination->config(4 ,10);
        $sql = "SELECT * FROM Habilidades ORDER BY idH ASC LIMIT $pagination->start_row, $pagination->max_rows";
        $query = $conn->prepare($sql);
        $query->execute();
        $model= array();
        while($filas = $query->fetch()){
          $model[]= $filas;
        }
      }
    return ROUTER::show_view('demo/login', array('meta' => $meta, 'model' => $model,"pagination"=>$pagination));
  }
  // metodo que crea un nuevo pokemon y guarda una imagen con el nombre de dicho pokemon, solamente se aceptan
  // gif y png para la subida de archivos
  public function insert(){
    if(!isset($_SESSION["usuario"])){
      URL::redirect(URL::base_url()."/admin");
    }
    if (isset($_POST["add"])){
      $target_dir= "resource/gif/";
      $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      if($imageFileType == "gif"){
        $name=htmlentities(strtolower($_POST['nombre'])).".gif";
      }
      if($imageFileType == "png"){
        $name=htmlentities(strtolower($_POST['nombre'])).".png";
      }
      if($uploadOk ==1){
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_dir . $name);
      }
      $conn = DB::connect($this->db["mysql"]);
      $sql = "INSERT INTO pokemon values (:id,:nombre,:Tipo1,:Tipo2,:HP,:Attack,
         :Defense,:Sp_Atk,:Sp_Def,:Speed,:Generation,:Legendary)";
      $query=$conn->prepare($sql);
      $query->execute(array(
        ':id'=>htmlentities($_POST['id']),
        ':nombre'=>htmlentities($_POST['nombre']),
        ':Tipo1'=>$_POST['Tipo1'],
        ':Tipo2'=>$_POST['Tipo2'],
        ':HP'=>$_POST['HP'],
        ':Attack'=>$_POST['Attack'],
        ':Defense'=>$_POST['Defense'],
        ':Sp_Atk'=>$_POST['Sp_Atk'],
        ':Sp_Def'=>$_POST['Sp_Def'],
        ':Speed'=>$_POST['Speed'],
        ':Generation'=>$_POST['Generation'],
        ':Legendary'=>$_POST['Legendary']
      ));
      URL::redirect(URL::base_url());
    }else{
      $meta = array(
        'title' => 'Página de Insert Pokemon',
        'descripcion' => 'Es la descripcion de la pagina de Insert Pokemon',
        'keywords' => 'php, framework, mvc',
        'robots' => 'All',
        'place' => 'Añadir Pokemon');

      $conn = DB::connect($this->db["mysql"]);
      $sql = "SELECT DISTINCT Type_1 FROM pokemon ";
      $query = $conn->prepare($sql);
      $query->execute();
      $model= array();
      while($filas = $query->fetch()){
        $model[]= $filas;
      }
      $sql = "SELECT MAX(id) as id FROM pokemon ";
      $query = $conn->prepare($sql);
      $query->execute();
      $id= array();
      while($filas = $query->fetch()){
        $id[]= $filas;
      }
      return ROUTER::show_view('demo/insert', array('meta' => $meta, 'model' => $model, 'id' => $id));
    }
  }
  // metodo que borra un pokemon en concreto, junto con su imagen, si dicha imagen existe
  public function delete(){
    if(!isset($_SESSION["usuario"])){
      URL::redirect(URL::base_url()."/admin");
    }
    if(isset($_POST['delete'])){
      if(file_exists("resource/gif/".strtolower($_POST['nombre']).".gif"))
      {
        shell_exec("rm resource/gif/".strtolower($_POST['nombre']).".gif");
      }
      if(file_exists("resource/gif/".strtolower($_POST['nombre']).".png"))
      {
        shell_exec("rm resource/gif/".strtolower($_POST['nombre']).".png");
      }
      $conn = DB::connect($this->db["mysql"]);
      $sql = "DELETE FROM pokemon WHERE id = :id";
      $query = $conn->prepare($sql);
      $query->execute(array(':id' => $_POST['id']));
      URL::redirect(URL::base_url());
    }else if (isset($_POST['volver'])){
      URL::redirect(URL::base_url());
    }else{
      if(isset($_GET["id"])){
        $meta = array(
          'title' => 'Página de Borrado Pokemon',
          'descripcion' => 'Es la descripcion de la pagina de Borrado de Pokemon',
          'keywords' => 'php, framework, mvc',
          'robots' => 'All',
          'place' => 'Borrar Pokemon');

        $conn = DB::connect($this->db["mysql"]);
        $sql = "SELECT * FROM pokemon where id=".$_GET['id']."";
        $query = $conn->prepare($sql);
        $query->execute();
        $model= array();
        while($filas = $query->fetch()){
          $model[]= $filas;
        }
        return ROUTER::show_view('demo/delete', array('meta' => $meta, 'model' => $model));
      }else
      {
        URL::redirect(URL::base_url());
      }
    }
  }
  // metodo que modifica un pokemon, junto con la imagen perteneciente a ese pokemon
  public function editar(){
    if(!isset($_SESSION["usuario"])){
      URL::redirect(URL::base_url()."/admin");
    }
    if(isset($_POST['edit'])){
      $target_dir= "resource/gif/";
      $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      if($imageFileType == "gif"){
        $name=htmlentities(strtolower($_POST['nombre'])).".gif";
      }
      if($imageFileType == "png"){
        $name=htmlentities(strtolower($_POST['nombre'])).".png";
      }
      if($uploadOk ==1){
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_dir . $name);
      }
      $conn = DB::connect($this->db["mysql"]);
      $sql = "UPDATE pokemon set Name=:nombre, Type_1=:Tipo1,Type_2=:Tipo2,
      HP=:HP, Attack=:Attack, Defense=:Defense, Sp_atk=:Sp_Atk, Sp_Def=:Sp_Def,
      Speed=:Speed, Generation=:Generation, Legendary=:Legendary where id=:id";
      $query=$conn->prepare($sql);
      $query->execute(array(
        ':id'=>($_POST['id']),
        ':nombre'=>htmlentities($_POST['nombre']),
        ':Tipo1'=>$_POST['Tipo1'],
        ':Tipo2'=>$_POST['Tipo2'],
        ':HP'=>$_POST['HP'],
        ':Attack'=>$_POST['Attack'],
        ':Defense'=>$_POST['Defense'],
        ':Sp_Atk'=>$_POST['Sp_Atk'],
        ':Sp_Def'=>$_POST['Sp_Def'],
        ':Speed'=>$_POST['Speed'],
        ':Generation'=>$_POST['Generation'],
        ':Legendary'=>$_POST['Legendary']
      ));
      URL::redirect(URL::base_url());
    }else{
      if(isset($_GET["id"])){
        $meta = array(
          'title' => 'Página de Editado Pokemon',
          'descripcion' => 'Es la descripcion de la pagina de Borrado de Pokemon',
          'keywords' => 'php, framework, mvc',
          'robots' => 'All',
          'place' => 'Modificar Pokemon');

        $conn = DB::connect($this->db["mysql"]);
        $sql = "SELECT * FROM pokemon where id=".$_GET["id"]."";
        $query = $conn->prepare($sql);
        $query->execute();
        $model= array();
        while($filas = $query->fetch()){
          $model[]= $filas;
        }

        $sql = "SELECT DISTINCT Type_1 FROM pokemon ";
        $query = $conn->prepare($sql);
        $query->execute();
        $tipos= array();
        while($filas = $query->fetch()){
          $tipos[]= $filas;
        }
        return ROUTER::show_view('demo/editar', array('meta' => $meta, 'model' => $model,'tipos' => $tipos));
      }else
      {
        URL::redirect(URL::base_url());
      }
    }
  }
  // metodo que sirve para crear una nueva habilidad
  public function insertH(){
    if(!isset($_SESSION["usuario"])){
      URL::redirect(URL::base_url()."/admin");
    }
    if (isset($_POST["add"])){
      $conn = DB::connect($this->db["mysql"]);
      $sql = "INSERT INTO Habilidades values (:id,:nombre,:description,:generation)";
      $query=$conn->prepare($sql);
      $query->execute(array(
        ':id'=>htmlentities($_POST['id']),
        ':nombre'=>htmlentities($_POST['nombre']),
        ':description'=>$_POST['description'],
        ':generation'=>$_POST['Generation']
      ));
      URL::redirect(URL::base_url()."/login");
    }else{
      $meta = array(
        'title' => 'Página de Insert Habilidades',
        'descripcion' => 'Es la descripcion de la pagina de Insert Habilidades',
        'keywords' => 'php, framework, mvc',
        'robots' => 'All',
        'place' => 'Añadir Habilidad');
      $conn = DB::connect($this->db["mysql"]);
      $sql = "SELECT MAX(idH) as id FROM Habilidades ";
      $query = $conn->prepare($sql);
      $query->execute();
      $id= array();
      while($filas = $query->fetch()){
        $id[]= $filas;
      }
      return ROUTER::show_view('demo/insertH', array('meta' => $meta,'id' => $id));
    }
  }
  // metodo que borra una habilidad
  public function deleteH(){
    if(!isset($_SESSION["usuario"])){
      URL::redirect(URL::base_url()."/admin");
    }
    if(isset($_POST['delete'])){
      $conn = DB::connect($this->db["mysql"]);
      $sql = "DELETE FROM Habilidades WHERE idH = :id";
      $query = $conn->prepare($sql);
      $query->execute(array(':id' => $_POST['id']));
      URL::redirect(URL::base_url()."/login");
    }else if (isset($_POST['volver'])){
      URL::redirect(URL::base_url()."/login");
    }else{
      if(isset($_GET["id"])){
        $meta = array(
          'title' => 'Página de Borrado Habilidades',
          'descripcion' => 'Es la descripcion de la pagina de Borrado de una Habilidad',
          'keywords' => 'php, framework, mvc',
          'robots' => 'All',
          'place' => 'Borrar Habilidad');

        $conn = DB::connect($this->db["mysql"]);
        $sql = "SELECT * FROM Habilidades where idH=".$_GET['id']."";
        $query = $conn->prepare($sql);
        $query->execute();
        $model= array();
        while($filas = $query->fetch()){
          $model[]= $filas;
        }
        return ROUTER::show_view('demo/deleteH', array('meta' => $meta, 'model' => $model));
      }else
      {
        URL::redirect(URL::base_url()."/login");
      }
    }
  }
  // metodo que modifica una habilidad
  public function editarH(){
    if(!isset($_SESSION["usuario"])){
      URL::redirect(URL::base_url()."/admin");
    }
    if(isset($_POST['edit'])){
      $conn = DB::connect($this->db["mysql"]);
      $sql = "UPDATE Habilidades set NameH=:nombre, description=:description,generation_id=:Generation where idH=:id";
      $query=$conn->prepare($sql);
      $query->execute(array(
        ':id'=>$_POST['id'],
        ':nombre'=>htmlentities($_POST['nombre']),
        ':description'=>$_POST['description'],
        ':Generation'=>$_POST['Generation']
      ));
      URL::redirect(URL::base_url()."/login");
    }else{
      if(isset($_GET["id"])){
        $meta = array(
          'title' => 'Página de Editado Habilidades',
          'descripcion' => 'Es la descripcion de la pagina de Borrado de Pokemon',
          'keywords' => 'php, framework, mvc',
          'robots' => 'All',
          'place' => 'Modificar Habilidad');

        $conn = DB::connect($this->db["mysql"]);
        $sql = "SELECT * FROM Habilidades where idH=".$_GET["id"]."";
        $query = $conn->prepare($sql);
        $query->execute();
        $model= array();
        while($filas = $query->fetch()){
          $model[]= $filas;
        }
        return ROUTER::show_view('demo/editarH', array('meta' => $meta, 'model' => $model));
      }else
      {
        URL::redirect(URL::base_url()."/login");
      }
    }
  }

  // metodo que asocia una habilidad a un pokemon
  public function add(){
    if(!isset($_SESSION["usuario"])){
      URL::redirect(URL::base_url()."/admin");
    }
    if(isset($_POST["add"]))
    {
      $conn = DB::connect($this->db["mysql"]);
      $sql = "INSERT INTO Hab_pokemon (idPoke,idHab,tipoHab) values (:pokemon,:id,:Tipo)";
      $query=$conn->prepare($sql);
      foreach ($_POST['pokemon'] as $row) {
        $query->execute(array(
          ':pokemon'=>$row,
          ':id'=>$_POST['id'],
          ':Tipo'=>$_POST['Tipo']
        ));
      }
      URL::redirect(URL::base_url()."/login");
    }
    else
    {
      if(isset($_GET["id"])){

          $meta = array(
            'title' => 'Página para Añadir habilidades a un pokemon',
            'descripcion' => 'Añadir habilidades a un pokemon',
            'keywords' => 'php, framework, mvc',
            'robots' => 'All',
            'place' => 'Añadir');

            $conn = DB::connect($this->db["mysql"]);
            $sql = "SELECT id,Name FROM pokemon ORDER BY id";
            $query = $conn->prepare($sql);
            $query->execute();
            $model= array();
            while($filas = $query->fetch()){
              $model[]= $filas;
            }
            return ROUTER::show_view('demo/add', array('meta' => $meta, 'model' => $model));
      }else{
        URL::redirect(URL::base_url()."/login");
      }
    }
  }

  // metodo que desasigna una habilidad a un pokemon
  public function quit(){
    if(!isset($_SESSION["usuario"])){
      URL::redirect(URL::base_url()."/admin");
    }
    if(isset($_POST["quit"]))
    {
      $conn = DB::connect($this->db["mysql"]);
      $sql = "DELETE from Hab_pokemon where idPoke=:pokemon and idHab=:id";
      $query=$conn->prepare($sql);
      foreach ($_POST["pokemon"] as $row) {
        $query->execute(array(
          ':pokemon'=>$row,
          ':id'=>$_POST['id']
        ));
      }
      URL::redirect(URL::base_url()."/login");
    }
    else
    {
      if(isset($_GET["id"])){

          $meta = array(
            'title' => 'Página para Quitar habilidades a un pokemon',
            'descripcion' => 'Quitar habilidades a un pokemon',
            'keywords' => 'php, framework, mvc',
            'robots' => 'All',
            'place' => 'Quitar');

            $conn = DB::connect($this->db["mysql"]);
            $sql = "SELECT id,Name from pokemon, Hab_pokemon where idPoke=id AND idHab=".$_GET['id']." ";
            $query = $conn->prepare($sql);
            $query->execute();
            $model= array();
            while($filas = $query->fetch()){
              $model[]= $filas;
            }
            return ROUTER::show_view('demo/quit', array('meta' => $meta, 'model' => $model));
      }else{
        URL::redirect(URL::base_url()."/login");
      }
    }
  }
}

?>
