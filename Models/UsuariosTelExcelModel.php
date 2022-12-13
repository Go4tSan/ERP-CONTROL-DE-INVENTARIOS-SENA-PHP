<?php 

class UsuariosTelExcelModel extends Query{

     public function __construct()
     {
        parent::__construct();
     }
      

     public function getUsuarioTelE(){
        $sql = "SELECT * from usuario";
        $data = $this->selectAll($sql);
        return $data;    
    }
}
?>