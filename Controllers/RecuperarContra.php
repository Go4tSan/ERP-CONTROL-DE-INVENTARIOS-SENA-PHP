<?php 

class RecuperarContra extends Controller{
    public function __construct()
    {
       parent::__construct();
    }
    public function index()
    {
       $this->views->getView($this, "index");
    }

    
    public function recuperar()
    { 
      $caracteres ='abcdefghijklmnopqrstuvxyz1234567890ABCDEFGHIJKLMNOPQRSTUVXYZ$#%&/()=?!;-_{}+*[]:'; $longitud=9;  
      $contra= substr(str_shuffle($caracteres), 0,$longitud);
      $correo = $_POST['correo'];

      if(empty($correo)){
         $msg ="El campo es obligatiorio";
      }else{
        $data = $this->model->modificarContra($correo,$contra);
        if ($data == "modificado") {
           $msg = "modificado";
           $msg ="Su nueva contraseña es: $contra";
        }else if($data=""){
         $msg = "El usuario digitado no existe";
        }else{
           $msg ="El usuario digitado no existe";
        }
     }
    
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
    }
}

?>