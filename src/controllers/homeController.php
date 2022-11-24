<?php

class HomeController extends Controller {

    function index(){
        $member = $this->model("Member");
        
        $this->view("home");
    }
}
?>