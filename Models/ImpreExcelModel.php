<?php 

class ImpreExcelModel extends Query{

     public function __construct()
     {
        parent::__construct();
     }
      

     public function getImpresoraE(){
        $sql = "SELECT * from impresoras ORDER by Id_Impresora";
        $data = $this->selectAll($sql);
        return $data;    
    }
}
?>