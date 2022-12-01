<?php 
class Controller {
    public $title;
    public $parent = [];
    public function model($name) {
        require_once PATH_MODELS.$name.".php";
        return new $name;
    }

    public function view($name, $data=[]) {
        require_once "./src/views/template.php";
    }
}
?>