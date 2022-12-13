<?php 

class VistaRapidaModel extends Query{
    public function __construct()
    {
      parent::__construct();
    }

    public function getUsuario(string $usuario, string $clave){
        $sql = "SELECT * from cuenta where correo='$usuario' and contra ='$clave'";
        $data = $this->select($sql);
        return $data; 
    }

}


?>