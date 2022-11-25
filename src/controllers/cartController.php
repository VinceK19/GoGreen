<?php

class HomeController extends Controller {

// Action ================================

    function index(){
        $model = $this->model("Order");

        // Get loged-in customer id
        $items = $model->getAll("*", ["customer_id" => $_SESSION["user_id"], "status" => 0]);

        print_r($items);
    }

    function checkout(){
        $model = $this->model("Order");
        if ($_SERVER["REQEST_METHOD"] == "POST"){
            $data = $_POST;
            $condition = "id in (".implode(",",$data["ids"]).")";
            $model->update("",["status" => 1]);
            header("Location: ".BASE_URL."cart");
        } else {
            echo "Not Found";
        }
    }

// AJAX ================================
    function getOrders(){
        $model = $this->model("Order");
        // Get loged-in customer id
        $items = $model->getAll("*", ["customer_id" => $_SESSION["user_id"], "status" => 0]);
        echo json_encode($items);
    }

    function removeOrder(){
        try {
            if (!isset($_POST)){
                throw new Exception("Not Found");
            }
            if (!isset($_SESSION["user_id"])){
                throw new Exception("Authorization Requested");
            };
            $model = $this->model("Order");
            $id = $_POST["id"];
            $customer_id = $_SESSION["user_id"];
            $model->delete(["customer_id" => $customer_id, "id" => $id]);
        } catch (Exception $th) {
            echo json_encode(["error" => ["message" => $th->getMessage()]]);
        }
    }

    function updateOrder(){
        try {
            if (!isset($_POST)){
                throw new Exception("Not Found");
            }
            if (!isset($_SESSION["user_id"])){
                throw new Exception("Authorization Requested");
            };
            $model = $this->model("Order");
            $id = $_POST["id"];
            $change = $_POST["change"];
            $customer_id = $_SESSION["user_id"];
            $model->update(["customer_id" => $customer_id, "id" => $id], $change);
        } catch (Exception $th) {
            echo json_encode(["error" => ["message" => $th->getMessage()]]);
        }
    }

}
?>