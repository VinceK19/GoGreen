<?php

class AboutController extends Controller {
    function __construct(){
    }
    function index(){
        $this->view("about", [
            "title" => "About Us",
            "breadcrumb" => [
                ["name" => "Home", "link" => BASE_URL."home"]
            ],
        ]);
    }
}
?>