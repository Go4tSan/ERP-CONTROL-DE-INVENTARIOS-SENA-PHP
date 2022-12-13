<?php
class AccessPointModel extends Query{
    private $ID_Access,$Switch,$Ambiente,$Piso,$Serial,$Placa_Telefonica,$Foto_Objeto,$Foto_Ambiente,$Marca,$Observacion,$Fecha_Observacion,$MAC;
     public function __construct()
     {
        parent::__construct();
     }

     public function getConteoT(){
      $sql = "SELECT COUNT(*) from access_point_nuevo WHERE Estado ='1';";
      $data = $this->selectAll($sql);
      return $data; 
  }
public function getConteoT2()
{
   $sql = "SELECT COUNT(*) from access_point_nuevo WHERE Estado ='2';";
   $data = $this->selectAll($sql);
   return $data; 
}
 

     public function getAccessPoint(){
        $sql = "SELECT * from access_point_nuevo";
        $data = $this->selectAll($sql);
        return $data; 
    }

    
    public function registrarAccessPoint(string $Switch, string $Ambiente,string $Piso,string $Serial,string $Placa_Telefonica, string $Foto_Objeto,string $Foto_Ambiente,string $Marca,string $Observacion,string $Fecha_Observacion,string $MAC)
    {
       $this->Switch = $Switch;
       $this->Ambiente = $Ambiente;
       $this->Piso = $Piso;
       $this->Serial = $Serial;
       $this->Placa_Telefonica = $Placa_Telefonica;
       $this->Foto_Objeto = $Foto_Objeto;
       $this->Foto_Ambiente = $Foto_Ambiente;
       $this->Marca = $Marca;
       $this->Observacion = $Observacion;
       $this->Fecha_Observacion = $Fecha_Observacion;
       $this->MAC = $MAC;

       $verificar = "SELECT * FROM access_point_nuevo Where MAC = '$this->MAC'";
       $existe = $this-> select($verificar);
       if(empty($existe)){
       $sql ="INSERT INTO access_point_nuevo (Switch, Ambiente, Piso, Seria, Placa_Telefonica, Foto_Objeto, Foto_Ambiente, Marca, Observacion, Fecha_Observacion, MAC ,Estado) VALUES (?,?,?,?,'COLTEL-' ?,?,?,?,?,?,?,'1')"; 
       $datos = array($this->Switch, $this->Ambiente, $this->Piso, $this->Serial, $this->Placa_Telefonica, $this->Foto_Objeto, $this->Foto_Ambiente, $this->Marca, $this->Observacion, $this->Fecha_Observacion, $this->MAC);
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

    public function editarAccessPoint(string $ID_Access)
    {
       $sql = "SELECT * FROM access_point_nuevo where Id_Access = $ID_Access";  
       $data = $this->select($sql);
       return $data;
    }
    
    public function modificarAccessPoint(string $Switch, string $Ambiente,string $Piso,string $Serial,string $Placa_Telefonica, string $Foto_Objeto,string $Foto_Ambiente,string $Marca,string $Observacion,string $Fecha_Observacion,string $MAC, int $ID_Access)
{

    $this->Switch = $Switch;
    $this->Ambiente = $Ambiente;
    $this->Piso = $Piso;
    $this->Serial = $Serial;
    $this->Placa_Telefonica = $Placa_Telefonica;
    $this->Foto_Objeto = $Foto_Objeto;
    $this->Foto_Ambiente = $Foto_Ambiente;
    $this->Marca = $Marca;
    $this->Observacion = $Observacion;
    $this->Fecha_Observacion = $Fecha_Observacion;
    $this->MAC = $MAC;
    $this->ID_Access = $ID_Access;

   $sql ="UPDATE access_point_nuevo SET Switch = ?, Ambiente = ?, Piso = ?, Seria = ?, Placa_Telefonica = ?, Foto_Objeto = ?, Foto_Ambiente = ?, Marca = ?, Observacion = ?, Fecha_Observacion = ?, MAC = ?, Estado = '1' where Id_Access= ?";
   $datos = array( $this->Switch, $this->Ambiente, $this->Piso, $this->Serial, $this->Placa_Telefonica, $this->Foto_Objeto, $this->Foto_Ambiente, $this->Marca, $this->Observacion, $this->Fecha_Observacion, $this->MAC, $this->ID_Access);
   $data = $this->save($sql,$datos);

   if($data == 1){
      $res ="modificado";
   }else{
     $res ="error";
  }  
   return $res;

}  

public function eliminarAccessPoint(int $ID_Access)
{
   $this->ID_Access=$ID_Access;
   $sql = "UPDATE access_point_nuevo set Estado='2' WHERE Id_Access=?";
   $datos =array($this->ID_Access);
   $data = $this->save($sql,$datos);
   return $data;
}

 }

 ?>