<?php

class Base{

  private $dbh;
  private $stmt;
  private $error;

    public function __construct() {
        //Configuramos la conexión
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $opciones = array (
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            //TO DO: CONEXIÓN CON LA BBDD
            $this->dbh=new PDO($dsn,DB_USER,DB_PASSWORD);
            $this->dbh->exec("set names:utf8");
            $this->dbh->setAttribute($opciones[12],$opciones[3]);
        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    // funcion que lee una variable, que sera una consulta sql a la base de datos blog
    public function query ($sql) {
      $this->stmt = $this->dbh->prepare($sql);
    }
    // función que ejecuta una consulta, este caso se aplica a las consultas tipo:
    // insert, delete y update
    public function execute () {
        return $this->stmt->execute();
    }
    // función que ejecuta una consulta sql y devuelve el resultado, este tipo de
    // consultas se utiliza sobre todo en consultas tipo select.
    public function registros() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public function filas(){
        $this->execute();
        return $this->stmt->rowCount();
      }

      public function bind ($param, $valor, $tipo = null){
        // si la variable tipo tiene un valor nulo entraria en esta parte del codigo
        if (is_null($tipo)) {
            switch (true) {
              // si valor es un numero, convierte tipo en un int de pdo
              case is_int($valor):
                $tipo = PDO::PARAM_INT;
                break;
                // si valor tiene un valor booleano, convierte tipo en un booleano de pdo
              case is_boolean($valor):
                $tipo = PDO::PARAM_BOOL;
                break;
                // si valor tiene un valor nulo, convierte tipo en un bulo de pdo
              case is_null($valor):
                $tipo = PDO::PARAM_NULL;
                break;
              // y en caso de que no se cumpla ninguna de las condiciones anteriores
              // se usara el string de pdo
              default:
                $tipo = PDO::PARAM_STR;
                break;
            }
          }
          // lo que havae la función de pdo bindValue es vicular un valor de pdo a
          // una variable con un valor que le indicamos en la parte anterior
          $this->stmt->bindValue($param, $valor, $tipo);
      }
}

?>
