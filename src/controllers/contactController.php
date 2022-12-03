<?php

class ContactController extends Controller {
    function __construct(){
    }
    function index(){
        $this->view("contact-us", [
            "title" => "Contact Us",
            "breadcrumb" => [
                ["name" => "Home", "link" => BASE_URL."home"]
            ],
        ]);
    }
}
?>