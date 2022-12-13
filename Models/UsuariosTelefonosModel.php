<?php
 class UsuariosTelefonosModel extends Query{
    
   private $Nombre, $Ubicacion, $Observacion, $Fecha_Observacion, $Extencion;
     public function __construct()
     {
        parent::__construct();
     }

     public function getConteoU(){
      $sql = "SELECT COUNT(*) from usuario WHERE Estado ='1';";
      $data = $this->selectAll($sql);
      return $data; 
  }
public function getConteoU2()
{
   $sql = "SELECT COUNT(*) from usuario WHERE Estado ='2';";
   $data = $this->selectAll($sql);
   return $data; 
}

     public function getUsuariosTelefonos(){
        $sql = "SELECT * from usuario";
        $data = $this->selectAll($sql);
        return $data; 
    }
    public function registrarUsuarioTelefono(string $Nombre, string $Ubicacion, string $Observacion, string $Fecha_Observacion,string $Extencion)
    {
      
       $this->Nombre = $Nombre;
       $this->Ubicacion = $Ubicacion;
       $this->Observacion = $Observacion;
       $this->Fecha_Observacion = $Fecha_Observacion;
       $this->Extencion = $Extencion;
       $verificar = "SELECT * FROM usuario Where Nombre = '$this->Nombre'";
       $existe = $this-> select($verificar);
       if(empty($existe)){
       $sql ="INSERT INTO usuario (Nombre, Ubicacion, Observacion, Fecha_Observacion, Extencion, Estado) values (?,?,?,?,?,'1')";
       $datos = array($this->Nombre, $this->Ubicacion,$this->Observacion, $this->Fecha_Observacion, $this->Extencion);
       $data = $this->save($sql,$datos);
       if($data == 1){
          $res ="ok";
       }else{
         $res ="error";
       }
      }else{
         $res = "existe";
      }
       return $res;
    }



public function editarUserTelefono(int $ID_Usuario)
{
   $sql = "SELECT * FROM usuario where ID_Usuario = $ID_Usuario";  
   $data = $this->select($sql);
   return $data;
}

public function modificarUsuarioTelefono(int $ID_Usuario, string $Nombre, string $Ubicacion, string $Observacion, string $Fecha_Observacion, string $Extencion)
{

   $this->ID_Usuario = $ID_Usuario;
   $this->Nombre = $Nombre;
   $this->Ubicacion= $Ubicacion;
   $this->Observacion = $Observacion;
   $this->Fecha_Observacion = $Fecha_Observacion;
   $this->Extencion = $Extencion;

   $sql ="UPDATE usuario SET Nombre = ?, Ubicacion = ?, Observacion = ?, Fecha_Observacion = ?, Extencion = ?, Estado='1' where ID_Usuario= ?";
   $datos = array($this->Nombre, $this->Ubicacion,$this->Observacion, $this->Fecha_Observacion, $this->Extencion ,$this->ID_Usuario);
   $data = $this->save($sql,$datos);

   if($data == 1){
      $res ="modificado";
   }else{
     $res ="error";
  }  
   return $res;

}    

public function eliminarUserTelefono(int $ID_Usuario)
{
   $this->ID_Usuario=$ID_Usuario;
   $sql = "UPDATE usuario set Estado='2' WHERE ID_Usuario = ?";
   $datos =array($this->ID_Usuario);
   $data = $this->save($sql,$datos);
   return $data;
}
 }
 ?>