<?php 
 
 class RecuperarContraModel extends Query{
   private $correo, $contra;
     public function __construct()
     {
        parent::__construct();
     }

     public function editarUserContra(string $usuario){
        $sql = "SELECT * from cuenta where correo='$usuario'";
        $data = $this->select($sql);
        return $data; 
    }

    public function modificarContra(string $correo, string $contra)
    {
        $claveEn = hash('md5',$contra);
        $this->correo = $correo;
        $this->contra = $claveEn;

        $verificar = "SELECT * FROM cuenta Where correo = '$this->correo'";
        $existe = $this-> select($verificar);

        if(!empty($existe)){
        $sql ="UPDATE cuenta SET contra = ? where correo=?";
        $datos = array($this->contra, $this->correo);
        $data = $this->save($sql,$datos);
    if($data == 1){
      $res ="modificado";
   }else{
     $res ="error";
   }
  }else{
     $res = "existe";
  }
   return $res;
}
 
}
 
 ?>