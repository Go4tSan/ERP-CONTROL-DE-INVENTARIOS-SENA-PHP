<?php 

class Telefonos extends Controller{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
      $data['Asignacion2'] = $this->model->getConteoT3();
      $data['Asignacion1'] = $this->model->getConteoT2();
      $data['Asignacion'] = $this->model->getConteoT();
      $data['Nombre'] = $this->model->getUsuarios();

          if(empty($_SESSION['correo'])){
            header("location:".base_url);
         } 
       $this->views->getView($this, "index", $data);
    }

    public function listar()
    {
      $data = $this->model->getTelefonos(); 
      for ($i=0; $i < count($data); $i++){
         $data[$i]['Foto_Objeto'] = '<img class="img-thumbnail" src="'.base_url. "ImagenesSistem/Telefonos/FotoObjeto/". $data[$i]['Foto_Objeto'].'" width="100%" >';
         $data[$i]['Foto_Ambiente'] = '<img class="img-thumbnail" src="'.base_url."ImagenesSistem/Telefonos/FotoAmbiente/". $data[$i]['Foto_Ambiente'].'" width="100%" >';
         if ($data[$i]['Asignacion'] == 1) {
           $data[$i]['Asignacion'] = '<span class="badge badge-primary">Asignado</span>';
         }elseif($data[$i]['Asignacion'] == 3){
            $data[$i]['Asignacion'] = '<span class="badge badge-danger">Inhabilitado</span>';
         }
         else{
            $data[$i]['Asignacion'] = '<span class="badge badge-success">Disponible</span>';
         }
         if ($_SESSION['Tipo_Usuario']=="1"){
        $data[$i]['Opciones'] = '<div><button class="btn btn-primary" type="button"  onclick="btnEditarTelefono('.$data[$i]['Id_Telefono'].');" >✒ Editar</button> <button class="btn btn-danger" type="button" onclick="btnEliminarTelefono('.$data[$i]['Id_Telefono'].');" >🗑 Eliminar</button></div>';
         }else{
            $data[$i]['Opciones'] = "No tiene permisos";
          }
      }
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();
    }
    
    public function registrar()
    { 
      $ID_Telefono = $_POST['Id_Telefono'];
      $MAC = strtoupper($_POST['MAC']);
      $Ambiente = $_POST['Ambiente'];
      $Usuario = $_POST['Usuario'];
      $Piso = $_POST['Piso'];
      $Serial = strtoupper($_POST['Serial']);
      $Placa_Telefonica = $_POST['Placa_Telefonica'];
      $Foto_Objeto = $_FILES['Foto_Objeto'];
      $Foto_Ambiente = $_FILES['Foto_Ambiente'];
      $Marca = $_POST['Marca'];
      $Observacion = $_POST['Observacion'];

      $nameO = $Foto_Objeto['name'];
      $tmpnameO = $Foto_Objeto['tmp_name'];
  
    date_default_timezone_set('America/Bogota'); 
    $fechaO = date("d-m-Y - H-i-s");

      $nameA = $Foto_Ambiente['name'];
      $tmpnameA = $Foto_Ambiente['tmp_name'];

      date_default_timezone_set('America/Bogota'); 
      $fechaA = date("d-m-Y - H-i-s");
     
      date_default_timezone_set('America/Bogota'); 
      $Fecha_Observacion=date("d-m-Y - H:i:s"); 

      if($Usuario=="1" || $Piso=="No aplica"){
         $Estado="2";
     }
     else{
         $Estado="1";
     }

     $Estado;

      if(empty($MAC) || empty($Serial) || empty($Placa_Telefonica) || empty($Marca) ){
         $msg ="Los campos MAC, Serial, Placa teléfonica y Marca son obligatorios";
      }else{
         if(!empty($nameO) ){
            $imgNombreO = $fechaO . ".jpg";
            $destinoO ="ImagenesSistem/Telefonos/FotoObjeto/". $imgNombreO;

         } else if (!empty($_POST['foto_actual']) && empty($nameO)){
            $imgNombreO = $_POST['foto_actual'];
            
         }else{
           $imgNombreO ="default.jpg";
         }
            
        if(!empty($nameA)){
            $imgNombreA = $fechaA . ".jpg";
            $destinoA ="ImagenesSistem/Telefonos/FotoAmbiente/".$imgNombreA;
         }
         else if (!empty($_POST['foto_actual2']) && empty ($nameA)) {
            $imgNombreA = $_POST['foto_actual2'];
         }
          else{
             $imgNombreA ="default.jpg";
      }
         if ($ID_Telefono == "") {
          $data = $this->model->registrarTelefono($Usuario, $Ambiente, $MAC, $Piso, $Serial, $Placa_Telefonica, $imgNombreO, $imgNombreA, $Marca, $Observacion, $Fecha_Observacion, $Estado);
          if ($data == "ok" ) {
             if(!empty($nameO) ){
               move_uploaded_file($tmpnameO,$destinoO);
             }
             if (!empty($nameA)) {
               move_uploaded_file($tmpnameA,$destinoA);
             }
             $msg = "si";

          }else if($data=="existe" ){
             $msg = "El Teléfono digitado ya existe";
          }else{
             $msg ="Error al registrar el Teléfono";
            } 
         }else{
            $data = $this->model->modificarTelefono($Usuario, $Ambiente, $MAC, $Piso, $Serial, $Placa_Telefonica, $imgNombreO, $imgNombreA, $Marca, $Observacion, $Fecha_Observacion, $Estado, $ID_Telefono);
            if ($data == "modificado") {
               if(!empty($nameO)){
                  move_uploaded_file($tmpnameO,$destinoO);
                } 
                if (!empty($nameA)) {
                  move_uploaded_file($tmpnameA,$destinoA);
                }
               $msg = "modificado";
            }else{
               $msg ="Error al modificar el Teléfono";
            }
         }
        
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
    }

    
    public function editar(int $ID_Telefono)
    {
      $data = $this->model->editarTelefono($ID_Telefono);
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();   
    }

    public function eliminar(int $ID_Telefono)
    {
    $data = $this->model->eliminarTelefono($ID_Telefono);
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