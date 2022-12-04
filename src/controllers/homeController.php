<?php

class HomeController extends Controller {
    function __construct(){
    }
    function index(){
        $test_data = "Goodbyt world";
        $this->view("home", [
            "title" => "Home",
            "breadcrumb" => [],
            "test_data" => $test_data
        ]);
    }
}
?>