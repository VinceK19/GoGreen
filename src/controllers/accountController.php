<?php

class AccountController extends Controller {
//  Action  ========================================================
    function index(){
        if (!isset($_SESSION["user_id"])) {
            $this->login();
        } else {
            echo "Account Page";
        }
    }

    function login(){
        try {
            $model = $this->model("member");
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = $_POST["username"];
                $password = $_POST["password"];
                $err = "";
                $member = $model->get("username='".$username."'");
                if (!$member){
                    $err = "Người dùng không tồn tại";
                } else if (md5($password) != $member["password"]){
                    $err = "Mật khẩu không đúng";
                } else {
                    $model->update($member["id"],["last_login" => time()]);
                    $this->_login($member);
                }
                echo $err;
            } else {
                echo "Please Log-in";
                // $this->view("home");
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    function signup(){
        try {
            $model = $this->model("member");
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $data = $_POST;
                $data["password"] = md5($data["password"]);
                $data["last_login"] = $data["date_created"] = time();
                $data["is_admin"] = 0;
                $err = "";
                $member = $model->get("username='".$data["username"]."'");
                if ($member){
                    $err = "Tên người dùng đã được dùng";
                } else {
                    $model->create($data);
                    $this->_login($data);
                }
                echo $err;
            } else {
                echo "Signup page";
                
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    function logout(){
        $this->_logout();
        header('Location: '.BASE_URL);
    }

//  Method  ========================================================
    function _login($data){
        $_SESSION["user_id"] = $data["id"];
        $_SESSION["username"] = $data["username"];
        $_SESSION["is_admin"] = $data["is_admin"];
    }

    function _logout(){
        unset($_SESSION["user_id"]);
        unset($_SESSION["username"]);
        unset($_SESSION["is_admin"]);
    }
}
?>