<?php
// Este es el controlador base que como vemos, extiende la configuración por tanto nos permite usar cada uno de los
// metodos y propiedades de la clase Config
class Controllers extends Config
{
  // en un principio estaba pensado que la vista de error, se cargaria en la url en caso de error, con la vista amigable
  // es decir que en lugar de aparecer la variable r=demo/error, saldria simplemente error en la url, pero,
  // no termino de funcionar y para evitar dar información sobre la aplicación a usuarios con intenciones maliciosas
  // se decidio poner que al llegar a error, redirigiese a index
  public function error()
  {
    URL::redirect(URL::base_url());
    $meta = array(
      'title' => 'Page not found, error 404',
      'descripcion' => 'Page not found, error 404',
      'keywords' => '',
      'robots' => 'NOINDEX,NOFOLLOW');
      $layout="layouts/layout";
    return ROUTER::show_view("errors/error",array("meta"=> $meta),$layout);
  }
}

?>
