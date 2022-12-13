<?php 

class SwitchExcelModel extends Query{

     public function __construct()
     {
        parent::__construct();
     }
      

     public function getSwitchE(){
        $sql = "SELECT * from switch ORDER by Id_Switch";
        $data = $this->selectAll($sql);
        return $data;    
    }
}
?>