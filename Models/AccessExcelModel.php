<?php 

class AccessExcelModel extends Query{

     public function __construct()
     {
        parent::__construct();
     }
      

     public function getAccessE(){
        $sql = "SELECT * from access_point_nuevo ORDER by Id_Access";
        $data = $this->selectAll($sql);
        return $data;    
    }
}
?>