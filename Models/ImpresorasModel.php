<?php
class ImpresorasModel extends Query{
    private $ID_Impresora,$Ip,$Modelo,$Ambiente,$Piso,$Serial,$Placa_Telefonica,$Foto_Objeto,$Foto_Ambiente,$Marca,$Observacion,$Fecha_Observacion,$MAC;
     public function __construct()
     {
        parent::__construct();
     }

     public function getConteoT(){
      $sql = "SELECT COUNT(*) from impresoras WHERE Estado ='1';";
      $data = $this->selectAll($sql);
      return $data; 
  }
public function getConteoT2()
{
   $sql = "SELECT COUNT(*) from impresoras WHERE Estado ='2';";
   $data = $this->selectAll($sql);
   return $data; 
}
 

     public function getImpresora(){
        $sql = "SELECT * from impresoras";
        $data = $this->selectAll($sql);
        return $data; 
    }

    
    public function registrarImpresora(string $Ip, string $Modelo,string $Ambiente,string $Piso,string $Serial,string $Placa_Telefonica, string $Foto_Objeto,string $Foto_Ambiente,string $Marca,string $Observacion,string $Fecha_Observacion,string $MAC)
    {
       $this->Ip = $Ip;
       $this->Modelo = $Modelo;
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

       $verificar = "SELECT * FROM impresoras Where MAC = '$this->MAC'";
       $existe = $this-> select($verificar);
       if(empty($existe)){
       $sql ="INSERT INTO impresoras (Ip, Modelo, Ambiente, Piso, Seria, Placa_Telefonica, Foto_Objeto, Foto_Ambiente, Marca, Observacion, Fecha_Observacion, MAC ,Estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,'1')"; 
       $datos = array($this->Ip, $this->Modelo,$this->Ambiente, $this->Piso, $this->Serial, $this->Placa_Telefonica, $this->Foto_Objeto, $this->Foto_Ambiente, $this->Marca, $this->Observacion, $this->Fecha_Observacion, $this->MAC);
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

    public function editarImpresora(string $ID_Impresora)
    {
       $sql = "SELECT * FROM impresoras where Id_Impresora = $ID_Impresora";  
       $data = $this->select($sql);
       return $data;
    }
    
    public function modificarImpresora(string $Ip, string $Modelo,string $Ambiente,string $Piso,string $Serial,string $Placa_Telefonica, string $Foto_Objeto,string $Foto_Ambiente,string $Marca,string $Observacion,string $Fecha_Observacion,string $MAC, int $ID_Impresora)
{
       $this->Ip = $Ip;
       $this->Modelo = $Modelo;
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
       $this->ID_Impresora = $ID_Impresora;

   $sql ="UPDATE impresoras SET Ip = ?, Modelo= ?, Ambiente = ?, Piso = ?, Seria = ?, Placa_Telefonica = ?, Foto_Objeto = ?, Foto_Ambiente = ?, Marca = ?, Observacion = ?, Fecha_Observacion = ?, MAC = ?, Estado = '1' where Id_Impresora= ?";
   $datos = array( $this->Ip, $this->Modelo ,$this->Ambiente, $this->Piso, $this->Serial, $this->Placa_Telefonica, $this->Foto_Objeto, $this->Foto_Ambiente, $this->Marca, $this->Observacion, $this->Fecha_Observacion, $this->MAC, $this->ID_Impresora);
   $data = $this->save($sql,$datos);

   if($data == 1){
      $res ="modificado";
   }else{
     $res ="error";
  }  
   return $res;

}  

public function eliminarImpresora(int $ID_Impresora)
{
   $this->ID_Impresora=$ID_Impresora;
   $sql = "UPDATE impresoras set Estado='2' WHERE Id_Impresora=?";
   $datos =array($this->ID_Impresora);
   $data = $this->save($sql,$datos);
   return $data;
}

 }

 ?>