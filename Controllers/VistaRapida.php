<?php
class VistaRapida extends Controller{
   public function __construct()
   {
      session_start();
      parent::__construct();
   }
   public function index()
   {
      if(empty($_SESSION['correo'])){
         header("location:".base_url);
      }
      $this->views->getView($this,"index");
   }
   public function validar()
   {
     if (empty($_POST['usuario']) || empty($_POST['clave'])){
         $msg ="Los campos estan vacíos";
      }else{ 
         $usuario = $_POST['usuario'];
         $clave = $_POST['clave'];
         $ClaveEn = hash('Md5',$clave);
         $data = $this ->model->getUsuario($usuario, $ClaveEn);
         if ($data){
            $_SESSION['id_usuario'] = $data['id_usuario'];
            $_SESSION['Tipo_Usuario'] = $data['Tipo_Usuario'];
            $_SESSION['correo'] = $data['correo'];
            $_SESSION['nombre'] = $data['nombre'];
            $msg="ok";
         }else{
            $msg ="¡Usuario o contraseña incorrectas!";
         }     
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}

public function salir()
{
  session_destroy();
  header("Location:".base_url);
}

}

?>
