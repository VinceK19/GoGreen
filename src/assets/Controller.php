<?php 
class Controller {
    public function model($name) {
        require_once PATH_MODELS.$name.".php";
        return new $name;
    }

    public function view($name, $title="blank", $data=[]) {
        require_once "./src/views/template.php";
    }
}
?>