<?php

class CartController extends Controller {

// Action ================================

    function index(){
        if (!isset($_SESSION["user"])){
            header("Location: ".BASE_URL."account/login");
        }
        $cart = $this->_get_orders();
        $subTotal = $this->_cal_subTotal($cart);
        $this->view("cart",[
            "title" => "Cart",
            "breadcrumb" => [
                ["name" => "Shop", "link" => BASE_URL."shop/list"]
            ],
            "cart" => $cart,
            "sub_total" => $subTotal,
            "tax" => 0,
            "total" => $subTotal
        ]);
    }

    function checkout(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $modelItem = $this->model("OrderItem");
            $modelInvoice =  $this->model("Invoice");
            $data = $_POST;
            $cart = $this->_get_orders_assoc("order_id");
            $condition = "id in (".implode(",",array_keys($cart)).")";
            $invoice_id = $modelInvoice->create($data);
            $modelItem->update($condition,["status" => 1, "invoice_id" => $invoice_id]);
            $_SESSION["user"]["cart"] = [];
            header("Location: ".BASE_URL."shop/list");
        } else {
            $cart = $_SESSION["user"]["cart"];
            $subTotal = $this->_cal_subTotal($cart);
            $this->view("checkout",[
                "title" => "Checkout",
                "breadcrumb" => [
                    ["name" => "Cart", "link" => BASE_URL."cart"],
                ],
                "cart" => $_SESSION["user"]["cart"],
                "sub_total" => $subTotal,
                "tax" => 0,
                "total" => $subTotal,
            ]);
        }
    }

// AJAX ================================
    function get_orders(){
        $cart = $this->_get_orders_assoc();
        echo json_encode( array_values($cart) );
    }

    function add_order(){
        try {
            if ($_SERVER['REQUEST_METHOD'] != "POST"){
                throw new Exception("Not Found");
            }
            if (!isset($_SESSION["user"])){
                header("Location: ".BASE_URL."login");
            };
            $model = $this->model("OrderItem");
            $cart = $this->_get_orders_assoc();
            $product_id = $_POST["product_id"];
            $customer_id = $_SESSION["user"]["id"];
            if ( isset($cart[$product_id]) ){
                $cart[$product_id]["quantity"] += 1;

                $model->update(
                    [ "product_id" => $product_id, "customer_id" => $customer_id], 
                    [ "quantity" => $cart[$product_id]["quantity"]]);
            } else {
                $data = $_POST;
                $data["customer_id"] = $customer_id;
                $data["product_id"] = $product_id;
                $model->create($data);
                $cart = $model->orderGetAll($_SESSION["user"]["id"]);
            }
            $_SESSION["user"]["cart"] = array_values($cart);
            echo json_encode($_SESSION["user"]["cart"]);
        } catch (Exception $th) {
            echo json_encode(["error" => ["message" => $th->getMessage()]]);
        }
    }

    function remove_order(){
        try {
            if ($_SERVER['REQUEST_METHOD'] != "POST"){
                throw new Exception("Not Found");
            }
            if (!isset($_SESSION["user"])){
                throw new Exception("Authorization Requested");
            };
            $model = $this->model("OrderItem");
            $order_id = $_POST["order_id"];
            $customer_id = $_SESSION["user"]["id"];
            $model->delete(["customer_id" => $customer_id, "id" => $order_id, "status" => 0]);
            foreach($_SESSION["user"]["cart"] as $k => $v){
                if($v["order_id"] == $order_id){
                    unset($_SESSION["user"]["cart"][$k]);
                    break;
                }
            }
            $this->load("cart-table", ["cart" => $this->_get_orders()]);
        } catch (Exception $th) {
            echo json_encode(["error" => ["message" => $th->getMessage()]]);
        }
    }

    function update_cart(){
        try {
            if ($_SERVER['REQUEST_METHOD'] != "POST"){
                throw new Exception("Not Found");
            }
            if (!isset($_SESSION["user"])){
                throw new Exception("Authorization Requested");
            };
            $model = $this->model("OrderItem");
            $customer_id = $_SESSION["user"]["id"];
            $cart = $this->_get_orders_assoc("order_id");
            foreach($_POST["data"] as $item){
                $order_id = explode('-', $item["name"])[2];
                $cart[ $order_id ][ "quantity" ] = $item["value"];
                $model->update(["customer_id" => $customer_id, "id" => $order_id], ["quantity" => $item["value"]]); 
            }
            $_SESSION["user"]["cart"] = array_values($cart);
            $subTotal = $this->_cal_subTotal($cart);
            $this->load("cart-summary",[
                "sub_total" => $subTotal,
                "tax" => 0,
                "total" => $subTotal,
            ]);
        } catch (Exception $th) {
            echo json_encode(["error" => ["message" => $th->getMessage()]]);
        }
    }
// Helper

    private function _get_orders(){
        if (isset($_SESSION["user"]["cart"])){
            return $_SESSION["user"]["cart"];
        } else {
            $model = $this->model("OrderItem");
            return $model->orderGetAll($_SESSION["user"]["id"]);
        }
    }

    private function _get_orders_assoc($indexCol = "product_id"){
        $items = $this->_get_orders();
        return array_column($items, null, $indexCol);
    }

    private function _cal_subTotal($cart){
        return array_reduce( $cart, function($res, $item) { return $res + $item["price"]*$item["quantity"]; }, 0);
    }

    function test(){
        $model = $this->model("OrderItem");
        $items = $model->orderGetAll($_SESSION["user"]["id"]);
        echo json_encode($items);
    }


}
?>