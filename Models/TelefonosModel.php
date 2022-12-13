<?php
class TelefonosModel extends Query{
    private $ID_Telefono,$MAC,$Ambiente,$Usuario,$Piso,$Serial,$Placa_Telefonica,$Foto_Objeto,$Foto_Ambiente,$Marca,$Observacion,$Fecha_Observacion,$Estado;
     public function __construct()
     {
        parent::__construct();
     }

     public function getConteoT(){
      $sql = "SELECT COUNT(*) from telefonos WHERE Asignacion ='2';";
      $data = $this->selectAll($sql);
      return $data; 
  }
public function getConteoT2()
{
   $sql = "SELECT COUNT(*) from telefonos WHERE Asignacion ='1';";
   $data = $this->selectAll($sql);
   return $data; 
}
 
public function getConteoT3()
{
   $sql = "SELECT COUNT(*) from telefonos WHERE Asignacion ='3';";
   $data = $this->selectAll($sql);
   return $data; 
}

     public function getTelefonos(){
        $sql = "SELECT Id_Telefono, us.Nombre, us.Extencion, Ambiente, MAC, Piso, Seria, Placa_Telefonica, Foto_Objeto, Foto_Ambiente, Marca, te.Observacion, te.Fecha_Observacion, Asignacion FROM telefonos te INNER JOIN usuario us ON te.Usuarios = us.ID_Usuario;";
        $data = $this->selectAll($sql);
        return $data; 
    }

    public function getUsuarios()
    {
       $sql ="SELECT * FROM usuario where Estado='1'";
       $data =$this->selectAll($sql);
       return $data;
    }

    public function registrarTelefono(string $Usuario,string $Ambiente,string $MAC,string $Piso,string $Serial,string $Placa_Telefonica, string $Foto_Objeto,string $Foto_Ambiente,string $Marca,string $Observacion,string $Fecha_Observacion,string $Estado)
    {
       $this->Usuario = $Usuario;
       $this->Ambiente = $Ambiente;
       $this->MAC = $MAC;
       $this->Piso = $Piso;
       $this->Serial = $Serial;
       $this->Placa_Telefonica = $Placa_Telefonica;
       $this->Foto_Objeto = $Foto_Objeto;
       $this->Foto_Ambiente = $Foto_Ambiente;
       $this->Marca = $Marca;
       $this->Observacion = $Observacion;
       $this->Fecha_Observacion = $Fecha_Observacion;
       $this->Estado = $Estado;

       $verificar = "SELECT * FROM telefonos Where MAC = '$this->MAC'";
       $existe = $this-> select($verificar);
       if(empty($existe)){
       $sql ="INSERT INTO telefonos (Usuarios, Ambiente, MAC, Piso, Seria, Placa_Telefonica, Foto_Objeto, Foto_Ambiente, Marca, Observacion, Fecha_Observacion, Asignacion) VALUES (?,?,?,?,?,'COLTEL-' ?,?,?,?,?,?,?)"; 
       $datos = array($this->Usuario, $this->Ambiente,$this->MAC, $this->Piso, $this->Serial, $this->Placa_Telefonica, $this->Foto_Objeto, $this->Foto_Ambiente, $this->Marca, $this->Observacion, $this->Fecha_Observacion, $this->Estado);
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

    public function editarTelefono(int $ID_Telefono)
    {
       $sql = "SELECT * FROM telefonos where Id_Telefono = $ID_Telefono";  
       $data = $this->select($sql);
       return $data;
    }
    
    public function modificarTelefono(string $Usuario,string $Ambiente,string $MAC,string $Piso,string $Serial,string $Placa_Telefonica, string $Foto_Objeto,string $Foto_Ambiente,string $Marca,string $Observacion,string $Fecha_Observacion,string $Estado, int $ID_Telefono)
{

   $this->Usuario = $Usuario;
   $this->Ambiente = $Ambiente;
   $this->MAC = $MAC;
   $this->Piso = $Piso;
   $this->Serial = $Serial;
   $this->Placa_Telefonica = $Placa_Telefonica;
   $this->Foto_Objeto = $Foto_Objeto;
   $this->Foto_Ambiente = $Foto_Ambiente;
   $this->Marca = $Marca;
   $this->Observacion = $Observacion;
   $this->Fecha_Observacion = $Fecha_Observacion;
   $this->Estado = $Estado;
   $this->ID_Telefono = $ID_Telefono;

   $sql ="UPDATE telefonos SET Usuarios = ?, Ambiente = ?, MAC = ?, Piso = ?, Seria = ?, Placa_Telefonica = ?, Foto_Objeto = ?, Foto_Ambiente = ?, Marca = ?, Observacion = ?, Fecha_Observacion = ?, Asignacion = ? where Id_Telefono= ?";
   $datos = array($this->Usuario, $this->Ambiente,$this->MAC, $this->Piso, $this->Serial, $this->Placa_Telefonica, $this->Foto_Objeto, $this->Foto_Ambiente, $this->Marca, $this->Observacion, $this->Fecha_Observacion, $this->Estado, $this->ID_Telefono);
   $data = $this->save($sql,$datos);

   if($data == 1){
      $res ="modificado";
   }else{
     $res ="error";
  }  
   return $res;

}  

public function eliminarTelefono(int $ID_Telefono)
{
   $this->ID_Telefono=$ID_Telefono;
   $sql = "UPDATE telefonos set Asignacion='3' WHERE Id_Telefono=?";
   $datos =array($this->ID_Telefono);
   $data = $this->save($sql,$datos);
   return $data;
}

 }

 ?>