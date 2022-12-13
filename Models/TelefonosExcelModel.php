<?php 

class TelefonosExcelModel extends Query{

     public function __construct()
     {
        parent::__construct();
     }
      

     public function getTelefonosE(){
        $sql = "SELECT Id_Telefono, us.Nombre, us.Extencion, Ambiente, MAC, Piso, Seria, Placa_Telefonica, Foto_Objeto, Foto_Ambiente, Marca, te.Observacion, te.Fecha_Observacion, Asignacion FROM telefonos te INNER JOIN usuario us ON te.Usuarios = us.ID_Usuario ORDER by Id_Telefono;";
        $data = $this->selectAll($sql);
        return $data; 
    }
}
?>