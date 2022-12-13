<?php
class SwitchesModel extends Query{
    private $ID_Switch,$IDF,$Marquilla_Telefonica,$Puertos_Switch,$Ubicacion,$MAC,$Piso,$Serial,$Placa_Telefonica,$Foto_Objeto,$Foto_Ambiente,$Marca,$Observacion,$Fecha_Observacion;
     public function __construct()
     {
        parent::__construct();
     }

     public function getConteoT(){
      $sql = "SELECT COUNT(*) from switch WHERE Estado ='1';";
      $data = $this->selectAll($sql);
      return $data; 
  }
public function getConteoT2()
{
   $sql = "SELECT COUNT(*) from switch WHERE Estado ='2';";
   $data = $this->selectAll($sql);
   return $data; 
}
 

     public function getSwitches(){
        $sql = "SELECT * from switch";
        $data = $this->selectAll($sql);
        return $data; 
    }

    
    public function registrarSwitch(string $IDF, string $Marquilla_Telefonica,string $Puertos_Switch,string $Ubicacion,string $MAC,string $Piso,string $Serial,string $Placa_Telefonica, string $Foto_Objeto,string $Foto_Ambiente,string $Marca,string $Observacion,string $Fecha_Observacion)
    {
       $this->IDF = $IDF;
       $this->Marquilla_Telefonica = $Marquilla_Telefonica;
       $this->Puertos_Switch = $Puertos_Switch;
       $this->Ubicacion = $Ubicacion;
       $this->MAC = $MAC;
       $this->Piso = $Piso;
       $this->Serial = $Serial;
       $this->Placa_Telefonica = $Placa_Telefonica;
       $this->Foto_Objeto = $Foto_Objeto;
       $this->Foto_Ambiente = $Foto_Ambiente;
       $this->Marca = $Marca;
       $this->Observacion = $Observacion;
       $this->Fecha_Observacion = $Fecha_Observacion;

       $verificar = "SELECT * FROM switch Where MAC = '$this->MAC'";
       $existe = $this-> select($verificar);
       if(empty($existe)){
       $sql ="INSERT INTO switch (IDF, Marquilla_Telefonica, Puertos_Switch, Lugar, MAC, Piso, Seria, Placa_Telefonica, Foto_Objeto, Foto_Ambiente, Marca, Observacion, Fecha_Observacion, Estado) VALUES ('IDF-' ?,?,?,?,?,?,?,'COLTEL-' ?,?,?,?,?,?,'1')"; 
       $datos = array($this->IDF, $this->Marquilla_Telefonica,$this->Puertos_Switch,$this->Ubicacion,$this->MAC, $this->Piso, $this->Serial, $this->Placa_Telefonica, $this->Foto_Objeto, $this->Foto_Ambiente, $this->Marca, $this->Observacion, $this->Fecha_Observacion);
       $data = $this->save($sql,$datos);


       if($data == 1 ){
          $res ="ok";
       }else{
         $res ="error";
       }
      }else{
         $res = "existe";
      }
       return $res;
    }

    public function editarSwitch(string $ID_Switch)
    {
       $sql = "SELECT * FROM switch where Id_Switch = $ID_Switch";  
       $data = $this->select($sql);
       return $data;
    }
    
    public function modificarSwitch(string $IDF, string $Marquilla_Telefonica,string $Puertos_Switch,string $Ubicacion,string $MAC,string $Piso,string $Serial,string $Placa_Telefonica, string $Foto_Objeto,string $Foto_Ambiente,string $Marca,string $Observacion,string $Fecha_Observacion, int $ID_Switch)
{

    $this->IDF = $IDF;
    $this->Marquilla_Telefonica = $Marquilla_Telefonica;
    $this->Puertos_Switch = $Puertos_Switch;
    $this->Ubicacion = $Ubicacion;
    $this->MAC = $MAC;
    $this->Piso = $Piso;
    $this->Serial = $Serial;
    $this->Placa_Telefonica = $Placa_Telefonica;
    $this->Foto_Objeto = $Foto_Objeto;
    $this->Foto_Ambiente = $Foto_Ambiente;
    $this->Marca = $Marca;
    $this->Observacion = $Observacion;
    $this->Fecha_Observacion = $Fecha_Observacion;
    $this->ID_Switch = $ID_Switch;

   $sql ="UPDATE switch SET IDF = ?, Marquilla_Telefonica = ?, Puertos_Switch = ?, Lugar = ?, MAC = ?, Piso = ?, Seria = ?, Placa_Telefonica = ?, Foto_Objeto = ?, Foto_Ambiente = ?, Marca = ?, Observacion = ?, Fecha_Observacion = ?, Estado = '1' where Id_Switch= ?";
   $datos = array( $this->IDF, $this->Marquilla_Telefonica,$this->Puertos_Switch,$this->Ubicacion,$this->MAC, $this->Piso, $this->Serial, $this->Placa_Telefonica, $this->Foto_Objeto, $this->Foto_Ambiente, $this->Marca, $this->Observacion, $this->Fecha_Observacion, $this->ID_Switch);
   $data = $this->save($sql,$datos);

   if($data == 1){
      $res ="modificado";
   }else{
     $res ="error";
  }  
   return $res;

}  

public function eliminarSwitch(int $ID_Switch)
{
   $this->ID_Switch=$ID_Switch;
   $sql = "UPDATE switch set Estado='2' WHERE Id_Switch=?";
   $datos =array($this->ID_Switch);
   $data = $this->save($sql,$datos);
   return $data;
}

 }

 ?>