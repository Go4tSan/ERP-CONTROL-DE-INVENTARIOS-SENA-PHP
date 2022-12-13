<?php 
 
 class RegistrarUsuarioModel extends Query{
    
    private $tipo, $correo, $nombre, $clave, $id;
     public function __construct()
     {
        parent::__construct();
     }
     
     public function getUsuarios(){
        $sql = "SELECT * from cuenta";
        $data = $this->selectAll($sql);
        return $data; 
    }

    public function registrarUsuario(string $tipo, string $correo, string $nombre, string $clave)
    {
       $claveEn = hash('md5',$clave);
       $this->tipo = $tipo;
       $this->correo = $correo;
       $this->nombre = $nombre;
       $this->clave = $claveEn;
       $verificar = "SELECT * FROM cuenta Where correo = '$this->correo'";
       $existe = $this-> select($verificar);
       if(empty($existe)){
       $sql ="INSERT INTO cuenta(Tipo_Usuario, correo, nombre, contra) values (?,?,?,?)";
       $datos = array($this->tipo, $this->correo,$this->nombre, $this->clave);
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

public function editarUser(int $id)
{
   $sql = "SELECT * FROM cuenta where id_usuario = $id";  
   $data = $this->select($sql);
   return $data;
}

public function modificarUsuario(int $id, string $tipo, string $correo, string $nombre)
{

   $this->id = $id;
   $this->tipo = $tipo;
   $this->correo = $correo;
   $this->nombre = $nombre;

   $sql ="UPDATE cuenta SET Tipo_Usuario = ?, correo = ?, nombre = ? where id_usuario=?";
   $datos = array($this->tipo, $this->correo,$this->nombre, $this->id);
   $data = $this->save($sql,$datos);

   if($data == 1){
      $res ="modificado";
   }else{
     $res ="error";
  }  
   return $res;

}    

public function eliminarUser(int $id)
{
   $this->id=$id;
   $sql = "DELETE FROM cuenta WHERE id_usuario = ?";
   $datos =array($this->id);
   $data = $this->save($sql,$datos);
   return $data;
}


 }

 
 ?>