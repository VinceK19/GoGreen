<?php

class AdminController extends Controller {
    function __construct(){
    }
    function index(){
        try {
            if (isset($_SESSION["user"]) && $_SESSION["user"]["is_admin"]){
                $this->user();
            } else {
                header("Location:".BASE_URL."admin/login");
            }
        } catch (\Throwable $th) {
            echo "<h1><b>".$th->getMessage()."</b></h1>";
        }
        
    }

    function login(){
        try {
            if (isset($_SESSION["user"]) && $_SESSION["user"]["is_admin"]){
                header("Location: ".BASE_URL."admin");
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $model = $this->model("member");
                $username = $_POST["username"];
                $password = $_POST["password"];
                $err = "";
                $member = $model->member_get_data($username);
                if (!$member || !$member["is_admin"]){
                    $err = "User not found or not admin";
                } else if (md5($password) != $member["password"]){
                    $err = "Incorrect password";
                } else {
                    $model->update(["id" => $member["id"]],["last_login" => time()]);
                    $this->_login($member);
                }
                header("Location: ".BASE_URL.( $err == ""? "admin" : "admin/login"));
            } else {
                $this->admin_view("login", [
                    "title" => "Admin Login"
               ]);
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    function user($id=""){
        if ($id == ""){
            $model = $this->model("Member");
            $users = $model->getAll();
            $this->admin_view("user", [
                "title" => "User",
                "users" => $users
            ]);
        } else if ($id == 'new'){
            $this->admin_view("form/user-create",[
                'title' => 'Create User',
            ]);
        } else {
            $model = $this->model("Member");
            $item = $model->get(["id" => $id]);
            $this->admin_view("form/user-edit", [
                "item" => $item,
                "table" => "member",
            ]);
        }
    }

    function brand($id=""){
        if ($id == ""){
            $model = $this->model("Brand");
            $items = $model->getAll();
            $this->admin_view("brand", [
                "title" => "Brand",
                "items" => $items,
            ]);
        } else if ($id == 'new'){
            $brandModel = $this->model("Brand");
            $this->admin_view("form/brand-create",[
                'title' => 'Create brand',
                "brands" => $brandModel->getAll()
            ]);
        } else {
            $model = $this->model("Brand");
            $item = $model->get(["id" => $id]);
            $this->admin_view("form/brand-edit", [
                "item" => $item,
                "table" => "product",
            ]);
        }
    }
    function product($id=""){
        if ($id == ""){
            $model = $this->model("Product");
            $products = $model->get_all();
            $this->admin_view("product", [
                "title" => "Product",
                "items" => $products,
            ]);
        } else if ($id == 'new'){
            $brandModel = $this->model("Brand");
            $this->admin_view("form/product-create",[
                'title' => 'Create Product',
                "brands" => $brandModel->getAll()
            ]);
        } else {
            $model = $this->model("Product");
            $brandModel = $this->model("Brand");
            $item = $model->get(["id" => $id]);
            $this->admin_view("form/product-edit", [
                "item" => $item,
                "table" => "product",
                "brands" => $brandModel->getAll()
            ]);
        }
    }

    function blog($id=""){
        if ($id == "") {
            $model = $this->model("Blog");
            $items = $model->getAll();
            $this->admin_view("blog", [
                "title" => "Blog",
                "items" => $items,
            ]);
            
        } else if ($id == "new"){
            $this->admin_view("form/blog-create", [
                "title" => "Blog",
            ]);
        } else {
            $model = $this->model("Blog");
            $item = $model->get(["id" => $id]);
            $this->admin_view("form/blog-edit", [
                "title" => "Update blog",
                "item" => $item,
            ]);
        }
    }

    function order($id=""){
        if ($id == ""){
            $model = $this->model("Invoice");
            $items = $model->getAll("*");
            $this->admin_view("order", [
                "title" => "Order",
                "items" => $items,
            ]);
        } else {
            $model = $this->model("Invoice");
            $item = $model->get_order($id);
            $this->admin_view("form/order-detail", [
                "title" => "Update blog",
                "item" => $item["invoice"],
                "orders" => $item["orders"]
            ]);
        }
    }

    function confirm_order($id){
        try {
            if (!isset($_SESSION["user"])|| !$_SESSION["user"]["is_admin"]){
                throw new Exception("Authorization required", 1);
            } else {
                $model = $this->model("OrderItem");
                $model->update(["id" => $id], ["status" => 2]);
                
            }
        } catch (\Throwable $th) {

        }
    }

    function update($table, $id){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $model = $this->model(ucfirst($table));
                $changes = $_POST;
                $model->update(["id" => $id], $changes);
                header("Location: " . BASE_URL . "admin/$table");
            } else {
                throw new Exception("Method not allowed", 1);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }

    function create($table){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $model = $this->model(ucfirst($table));
                $data = $_POST;
                if ($table == "blog"){
                    $data["date_created"] = time();
                }
                if (isset($data["password"])){
                    $data["password"] = md5($data["password"]);
                }
                $model->create($data);
                header("Location: " . BASE_URL . "admin/$table");
            } else {
                throw new Exception("Method not allowed", 1);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }

    function delete($table, $id){
        try {
            if (!isset($_SESSION["user"])|| !$_SESSION["user"]["is_admin"]){
                throw new Exception("Authorization required", 1);
            } else {
                $model = $this->model(ucfirst($table));
                $model->delete(["id" => $id]);
                header("Location: " . BASE_URL . "admin/$table");
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }

    function logout(){
        $this->_logout();
        header('Location: '.BASE_URL."admin");
    }

    function _login($data){
        $_SESSION["user"] = $data;
    }

    function _logout(){
        unset($_SESSION["user"]);
    }
}
?>