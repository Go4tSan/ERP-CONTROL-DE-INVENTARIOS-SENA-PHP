<?php 

class Home extends Controller{
    public function __construct()
    {
        session_start();
       if(!empty($_SESSION['correo'])){
            header("location:".base_url."VistaRapida");
         } 
        parent::__construct();
    }
    public function index()
    {
       $this->views->getView($this, "index");
    }
}

?>