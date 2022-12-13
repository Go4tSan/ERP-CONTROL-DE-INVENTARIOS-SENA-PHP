<?php 

class AccessPoint extends Controller{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
     
      $data['Estado1'] = $this->model->getConteoT2();
      $data['Estado'] = $this->model->getConteoT();
  

          if(empty($_SESSION['correo'])){
            header("location:".base_url);
         } 
       $this->views->getView($this, "index", $data);
    }

    public function listar()
    {
      $data = $this->model->getAccessPoint(); 
      for ($i=0; $i < count($data); $i++){
         $data[$i]['Foto_Objeto'] = '<img class="img-thumbnail" src="'.base_url. "ImagenesSistem/AccessPoint/FotoObjeto/". $data[$i]['Foto_Objeto'].'" width="100%" >';
         $data[$i]['Foto_Ambiente'] = '<img class="img-thumbnail" src="'.base_url."ImagenesSistem/AccessPoint/FotoAmbiente/". $data[$i]['Foto_Ambiente'].'" width="100%" >';
         if ($data[$i]['Estado'] == 1) {
            $data[$i]['Estado'] = '<span class="badge badge-success">Operativo</span>';
          }else{
             $data[$i]['Estado'] = '<span class="badge badge-danger">Inhabilitado</span>';
          }
         if ($_SESSION['Tipo_Usuario']=="1"){
        $data[$i]['Opciones'] = '<div><button class="btn btn-primary" type="button"  onclick="btnEditarAccessPoint('.$data[$i]['Id_Access'].');" >✒ Editar</button> <button class="btn btn-danger" type="button" onclick="btnEliminarAccessPoint('.$data[$i]['Id_Access'].');" >🗑 Eliminar</button></div>';
         }else{
            $data[$i]['Opciones'] = "No tiene permisos";
          }
      }
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();
    }
    
    public function registrar()
    { 
      $ID_Access = $_POST['Id_Access'];
      $MAC = strtoupper($_POST['MAC']);
      $Switch = $_POST['Switch'];
      $Ambiente = $_POST['Ambiente'];
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

      if(empty($MAC) || empty($Serial) || empty($Placa_Telefonica) || empty($Marca) || empty($Switch) ){
         $msg ="Los campos MAC, Serial, Placa teléfonica, Marca y Switch son obligatorios";
      }else{
         if(!empty($nameO) ){
            $imgNombreO = $fechaO . ".jpg";
            $destinoO ="ImagenesSistem/AccessPoint/FotoObjeto/". $imgNombreO;

         } else if (!empty($_POST['foto_actual']) && empty($nameO)){
            $imgNombreO = $_POST['foto_actual'];
            
         }else{
           $imgNombreO ="default.jpg";
         }
            
        if(!empty($nameA)){
            $imgNombreA = $fechaA . ".jpg";
            $destinoA ="ImagenesSistem/AccessPoint/FotoAmbiente/".$imgNombreA;
         }
         else if (!empty($_POST['foto_actual2']) && empty ($nameA)) {
            $imgNombreA = $_POST['foto_actual2'];
         }
          else{
             $imgNombreA ="default.jpg";
      }
         if ($ID_Access  == "") {
          $data = $this->model->registrarAccessPoint($Switch, $Ambiente, $Piso, $Serial, $Placa_Telefonica, $imgNombreO, $imgNombreA, $Marca, $Observacion, $Fecha_Observacion, $MAC);
          if ($data == "ok" ) {
             if(!empty($nameO) ){
               move_uploaded_file($tmpnameO,$destinoO);
             }
             if (!empty($nameA)) {
               move_uploaded_file($tmpnameA,$destinoA);
             }
             $msg = "si";

          }else if($data=="existe" ){
             $msg = "El Access point digitado ya existe";
          }else{
             $msg ="Error al registrar el switch";
            } 
         }else{
            $data = $this->model->modificarAccessPoint($Switch, $Ambiente, $Piso, $Serial, $Placa_Telefonica, $imgNombreO, $imgNombreA, $Marca, $Observacion, $Fecha_Observacion, $MAC, $ID_Access);
            if ($data == "modificado") {
               if(!empty($nameO)){
                  move_uploaded_file($tmpnameO,$destinoO);
                } 
                if (!empty($nameA)) {
                  move_uploaded_file($tmpnameA,$destinoA);
                }
               $msg = "modificado";
            }else{
               $msg ="Error al modificar el Access point";
            }
         }
        
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
    }

    
    public function editar(int $ID_Access)
    {
      $data = $this->model->editarAccessPoint($ID_Access);
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();   
    }



    public function eliminar(int $ID_Access)
    {
    $data = $this->model->eliminarAccessPoint($ID_Access);
    if ($data == 1){
       $msg ="ok";
    }else{
       $msg ="Error al eliminar el usuario";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
    }
}
