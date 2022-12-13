<?php 

class RegistrarUsuario extends Controller{
    public function __construct()
    {
       session_start();
       parent::__construct();
    }
    public function index()
    {
      if ($_SESSION['Tipo_Usuario']=="2"){
         header("location:".base_url."VistaRapida/salir");    
       }
       if(empty($_SESSION['correo'])){
         header("location:".base_url);
      } 
       $this->views->getView($this, "index");
    }

    public function listar()
    {
      $data = $this->model->getUsuarios(); 
      for ($i=0; $i < count($data); $i++){
         if ($data[$i]['Tipo_Usuario'] == 1) {
           $data[$i]['Tipo_Usuario'] = '<span class="badge badge-primary">Super Admin</span>';
         }else{
            $data[$i]['Tipo_Usuario'] = '<span class="badge badge-success">Admin</span>';
         }
        $data[$i]['Opciones'] = '<div><button class="btn btn-primary" type="button"  onclick="btnEditarUser('.$data[$i]['id_usuario'].');" >✒ Editar</button>  <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['id_usuario'].');" >🗑 Eliminar</button><div/>';
      }
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();
    }

    public function registrar()
    { 
      $id = $_POST['id'];
      $nombre = $_POST['nombre'];
      $correo = $_POST['correo'];
      $tipo = $_POST['Tipo'];
      $clave = $_POST['clave'];
      $repetir = $_POST['repetir'];

      if(empty($nombre) || empty($correo) || empty($tipo)){
         $msg ="Todos los campos son obligatiorios";
      }else{
         if ($id == "") {
            if($clave != $repetir){
               $msg ="Las claves no coinciden";
            }else{
               $data = $this->model->registrarUsuario($tipo,$correo,$nombre,$clave);
               if ($data == "ok") {
                  $msg = "si";
               }else if($data=="existe"){
                  $msg = "El usuario digitado ya existe";
               }else{
                  $msg ="Error al registrar el usuario";
               }
            } 
         }else{
            $data = $this->model->modificarUsuario($id,$tipo,$correo,$nombre);
            if ($data == "modificado") {
               $msg = "modificado";
            }else{
               $msg ="Error al modificar el usuario";
            }
         }
        
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
    }

    public function editar(int $id)
    {
      $data = $this->model->editarUser($id);
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();   
    }

    public function eliminar(int $id)
    {
    $data = $this->model->eliminarUser($id);
    if ($data == 1){
       $msg ="ok";
    }else{
       $msg ="Error al eliminar el usuario";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
    }

   
}
?>


