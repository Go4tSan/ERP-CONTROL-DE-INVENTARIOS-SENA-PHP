<?php 

class Login extends Controller{
    public function index()
    {
       $this->views->getView($this, "index");
    }
}

?>