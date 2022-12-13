<?php 

class Impresoras extends Controller{
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
      $data = $this->model->getImpresora(); 
      for ($i=0; $i < count($data); $i++){
         $data[$i]['Foto_Objeto'] = '<img class="img-thumbnail" src="'.base_url. "ImagenesSistem/Impresoras/FotoObjeto/". $data[$i]['Foto_Objeto'].'" width="100%" >';
         $data[$i]['Foto_Ambiente'] = '<img class="img-thumbnail" src="'.base_url."ImagenesSistem/Impresoras/FotoAmbiente/". $data[$i]['Foto_Ambiente'].'" width="100%" >';
         if ($data[$i]['Estado'] == 1) {
            $data[$i]['Estado'] = '<span class="badge badge-success">Operativo</span>';
          }else{
             $data[$i]['Estado'] = '<span class="badge badge-danger">Inhabilitado</span>';
          }
         if ($_SESSION['Tipo_Usuario']=="1"){
        $data[$i]['Opciones'] = '<div><button class="btn btn-primary" type="button"  onclick="btnEditarImpresora('.$data[$i]['Id_Impresora'].');" >✒ Editar</button> <button class="btn btn-danger" type="button" onclick="btnEliminarImpresora('.$data[$i]['Id_Impresora'].');" >🗑 Eliminar</button></div>';
         }else{
            $data[$i]['Opciones'] = "No tiene permisos";
          }
      }
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();
    }
    
    public function registrar()
    { 
      $ID_Impresora = $_POST['Id_Impresora'];
      $MAC = strtoupper($_POST['MAC']);
      $Ip = $_POST['Ip'];
      $Modelo = $_POST['Modelo'];
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

      if(empty($MAC) || empty($Serial) || empty($Placa_Telefonica) || empty($Marca)  ){
         $msg ="Los campos MAC, Serial, Placa teléfonica y Marca son obligatorios";
      }else{
         if(!empty($nameO) ){
            $imgNombreO = $fechaO . ".jpg";
            $destinoO ="ImagenesSistem/Impresoras/FotoObjeto/". $imgNombreO;

         } else if (!empty($_POST['foto_actual']) && empty($nameO)){
            $imgNombreO = $_POST['foto_actual'];
            
         }else{
           $imgNombreO ="default.jpg";
         }
            
        if(!empty($nameA)){
            $imgNombreA = $fechaA . ".jpg";
            $destinoA ="ImagenesSistem/Impresoras/FotoAmbiente/".$imgNombreA;
         }
         else if (!empty($_POST['foto_actual2']) && empty ($nameA)) {
            $imgNombreA = $_POST['foto_actual2'];
         }
          else{
             $imgNombreA ="default.jpg";
      }
         if ($ID_Impresora  == "") {
          $data = $this->model->registrarImpresora($Ip, $Modelo, $Ambiente, $Piso, $Serial, $Placa_Telefonica, $imgNombreO, $imgNombreA, $Marca, $Observacion, $Fecha_Observacion, $MAC);
          if ($data == "ok" ) {
             if(!empty($nameO) ){
               move_uploaded_file($tmpnameO,$destinoO);
             }
             if (!empty($nameA)) {
               move_uploaded_file($tmpnameA,$destinoA);
             }
             $msg = "si";

          }else if($data=="existe" ){
             $msg = "La impresora digitada ya existe";
          }else{
             $msg ="Error al registrar el switch";
            } 
         }else{
            $data = $this->model->modificarImpresora($Ip, $Modelo, $Ambiente, $Piso, $Serial, $Placa_Telefonica, $imgNombreO, $imgNombreA, $Marca, $Observacion, $Fecha_Observacion, $MAC, $ID_Impresora);
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

    
    public function editar(int $ID_Impresora)
    {
      $data = $this->model->editarImpresora($ID_Impresora);
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();   
    }



    public function eliminar(int $ID_Impresora)
    {
    $data = $this->model->eliminarImpresora($ID_Impresora);
    if ($data == 1){
       $msg ="ok";
    }else{
       $msg ="Error al eliminar la impresora";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
    }
}
