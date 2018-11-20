<?php

function redireccionar($pagina){
  header("location: " . URL_ROUTE . "/".$pagina);
}

?>
