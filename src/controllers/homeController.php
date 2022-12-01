<?php

class HomeController extends Controller {
    function __construct(){
    }
    function index(){
        $this->view("home", [
            "title" => "Home",
            "breadcrumb" => []
        ]);
    }
}
?>