<?php
session_start();
class Coche
{
  private $pdo;
  public $auto_id;
  public $make;
  public $year;
  public $mileage;

  public function __CONSTRUCT(){
    try{
      $this->pdo = Database::Inicio();
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listar(){
    try{

			$stm = $this->pdo->prepare("SELECT * FROM autos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
  }

  public function Obtener($id){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM autos WHERE auto_id = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

  public function Eliminar($id){
		try {
			$stm = $this->pdo->prepare("DELETE FROM autos WHERE auto_id = ?");

			$stm->execute(array($id));
      $_SESSION['success']="Registro borrado correctamente";
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

  public function Actualizar($datos){
		try {
			$sql = "UPDATE autos SET make = ?, year = ?, mileage = ? WHERE auto_id = ?";

			$this->pdo->prepare($sql)->execute(array($datos->make,$datos->year,$datos->mileage,$datos->auto_id));
      $_SESSION['success']="Registro Actualzado correctamente";
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

  public function Registrar(Coche $datos)
	{
		try
		{
		$sql = "INSERT INTO autos (make,year,mileage)
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)->execute(array($datos->make,$datos->year,$datos->mileage));
    $_SESSION['success']="Registro Creado correctamente";
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
}

?>
