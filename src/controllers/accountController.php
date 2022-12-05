<?php

class AccountController extends Controller {
    protected $breadcrumb = [ 
        ["name" => "Home", "link" => BASE_URL."home"]
    ];
//  Action  ========================================================
    function index(){
       $this->profile();
    }

    function login(){
        try {
            if (isset($_SESSION["user"])){
                header("Location: ".BASE_URL."account/profile");
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $model = $this->model("member");
                $username = $_POST["username"];
                $password = $_POST["password"];
                $err = "";
                $member = $model->member_get_data($username);
                if (!$member){
                    $err = "Người dùng không tồn tại";
                } else if (md5($password) != $member["password"]){
                    $err = "Mật khẩu không đúng";
                } else {
                    $model->update(["id" => $member["id"]],["last_login" => time()]);
                    $this->_login($member);
                }
                header("Location: ".BASE_URL.( $err == ""? "account/profile" : "account/login"));
            } else {
                $this->view("login",[
                    "title" => "Sign In",
                    "breadcrumb" => $this->breadcrumb
                ]);     
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    function register(){
        try {
            if (isset($_SESSION["user_id"])){
                header("Location: ".BASE_URL."account");
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $model = $this->model("member");
                $data = $_POST;
                $data["password"] = md5($data["password"]);
                $current_time = time();
                $data = array_merge($data, [
                    "last_login" => $current_time,
                    "date_created" => $current_time,
                    "is_admin" => 0
                ]);
                $id = $model->create($data);
                $data = array_merge($data, ["id" => $id]);
                $this->_login($data);
                header("Location: ".BASE_URL."account");
            } else {
                $this->view("register",[
                    "title" => "Register",
                    "breadcrumb" => $this->breadcrumb
                ]);
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    function logout(){
        $this->_logout();
        header('Location: '.BASE_URL);
    }

    function profile($mode=""){
        if (isset($_SESSION["user"])) {
            $user = $_SESSION["user"];
            $this->view("account", [
                "title" => "My Account",
                "breadcrumb" => $this->breadcrumb,
                "user" => $user,
                "mode" => $mode
            ]);
        } else {
            header("Location: ".BASE_URL."account/login");
        }
    }

    function updateProfile(){
        try {
            if (isset($_POST)){
                $model = $this->model("Member");
                $model->update(["id" => $_SESSION["user"]["id"] ], $_POST);
                $_SESSION["user"] = array_merge($_SESSION["user"], $_POST);
                header("Location: ".BASE_URL."account/profile");
            } else {
                throw new Exception("Method Not Allowed", 1);
                
            }
        } catch (Exception $th) {
            print($th->getMessage());
        }

        
    }

//  Method  ========================================================
    function _checkUsername($username){
        $model = $this->model("member");
        $member = $model->get("username='".$username."'");
        if ($member) {
            echo json_encode([
               "error" => ["message"  => "Username is unavailable!"]
            ]);
        } else {
            echo json_encode([
                "error" => null
             ]);
        }
    }

    function _login($data){
        $_SESSION["user"] = $data;
    }

    function _logout(){
        unset($_SESSION["user"]);
    }

    function test(){
        $model = $this->model("Member");
        echo json_encode( $model->member_get_data("johncena") );
    }
}
?>