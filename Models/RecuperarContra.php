<?php 
 
 class RecuperarContraModel extends Query{
     public function __construct()
     {
        parent::__construct();
     }

     public function editarUserContra(string $usuario){
        $sql = "SELECT * from cuenta where correo='$usuario'";
        $data = $this->select($sql);
        return $data; 
    }

    public function modificarContra(string $correo, string $clave)
    {


        $claveEn = hash('md5',$clave);
        $this->correo = $correo;
        $this->clave = $claveEn;
     
        $sql ="UPDATE cuenta SET contra = ?, where correo=?";
        $datos = array($this->claveEn, $this->correo);
        $data = $this->save($sql,$datos);
     
        if($data == 1){
           $res ="modificado";
        }else{
          $res ="error";
       }  
        return $res;
    }
 }
 
 ?>