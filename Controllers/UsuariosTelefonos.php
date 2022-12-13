<?php

class UsuariosTelefonos extends Controller{
    public function __construct()
    {
       session_start();
       parent::__construct();
    }
    public function index()
    {
      $data['Asignacion1'] = $this->model->getConteoU2();
      $data['Asignacion'] = $this->model->getConteoU();

      if(empty($_SESSION['correo'])){
        header("location:".base_url);
     } 
 
       $this->views->getView($this, "index", $data);
    }
    
    public function listar()
    {
      $data = $this->model->getUsuariosTelefonos(); 
      
      for ($i=0; $i < count($data); $i++){
         if ($data[$i]['Estado'] == 1) {
            $data[$i]['Estado'] = '<span class="badge badge-success">Activo</span>';
          }else if( $data[$i]['Estado'] == 2){
             $data[$i]['Estado'] = '<span class="badge badge-danger">Inactivo</span>';
          } 
        if ($_SESSION['Tipo_Usuario']=="1"){
          $data[$i]['Opciones'] = '<div><button class="btn btn-primary" type="button"  onclick="btnEditarUserTelefono('.$data[$i]['ID_Usuario'].');" >✒ Editar</button>  <button class="btn btn-danger" type="button" onclick="btnEliminarUserTelefono('.$data[$i]['ID_Usuario'].');" >🗑 Eliminar</button><div/>';
        }else{
          $data[$i]['Opciones'] = "No tiene permisos";
        }
    }
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();
    }

    public function registrar()
    { 
      $ID_Usuario = $_POST['ID_Usuario'];
      $Nombre = $_POST['Nombre'];
      $Ubicacion = $_POST['Ubicacion'];
      $Observacion = $_POST['Observacion'];

      date_default_timezone_set('America/Bogota'); 
      $Fecha_Observacion=date("d-m-Y - H:i:s"); 
      $Extencion = $_POST['Extencion'];

if(empty($Extencion)){
   $Extencion = "SIN MARQUILLA";
}

      if(empty($Nombre)){
         $msg ="El campo Nombre es obligatorio";
      }else{
       if ($ID_Usuario == "" ) {
           
               $data = $this->model->registrarUsuarioTelefono($Nombre,$Ubicacion,$Observacion,$Fecha_Observacion,$Extencion);
               if ($data == "ok") {
                  $msg = "si";
               }else if($data=="existe"){
                  $msg = "El usuario digitado ya existe";
               }else{
                  $msg ="Error al registrar el usuario";
               } 
         }else{
            $data = $this->model->modificarUsuarioTelefono($ID_Usuario,$Nombre,$Ubicacion,$Observacion,$Fecha_Observacion,$Extencion);
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

    public function editar(int $ID_Usuario)
    {
      $data = $this->model->editarUserTelefono($ID_Usuario);
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();   
    }

    
    public function eliminar(int $ID_Usuario)
    {
    $data = $this->model->eliminarUserTelefono($ID_Usuario);
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