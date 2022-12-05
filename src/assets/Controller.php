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

    public function load($name, $data=[]){
        require "./src/views/components/".$name.".php";
    }

    public function admin_view($name, $data=[]) {
        require_once "./src/views/admin-page.php";
    }
    public function admin_load($name, $data=[]){
        require "./src/views/pages/admin-panel/".$name.".php";
    }
}
?>