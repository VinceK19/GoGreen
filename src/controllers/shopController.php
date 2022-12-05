<?php

class ShopController extends Controller {
    function index(){
        $this->list();
    }
    function list($filterBrand=""){
        $modelProduct = $this->model("Product");
        $modelBrand = $this->model("Brand");
        $condition = $filterBrand? ["brand" => $filterBrand] : "";
        $products = $modelProduct->getAll("id, name, price, image", $condition);
        $brands = $modelBrand->getAll();
        $this->view("shop", [
            "title" => "Shop",
            "breadcrumb" => [
                ["name" => "Home", "link" => BASE_URL."home"]
            ],
            "products" => $products,
            "brands" => $brands
        ]);
    }

    function item($id){
        try {
            $modelProduct = $this->model("Product");
            $item = $modelProduct->get_data($id);
            $this->view("shop-detail", [
                "page_title" => $item["product"]["name"],
                "title" => "Shop Detail",
                "breadcrumb" => [
                    ["name" => "Shop", "link" => BASE_URL."shop/list"]
                ],
                "item" => $item["product"],
                "comments" => $item["comments"]
            ]);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
        
    }

    // AJAX =================================================================

    function post_comment(){
        try {
            if ($_SERVER["REQUEST_METHOD"] != "POST"){
                throw new Exception("Method Not Allowed", 1);
            } else if (!isset($_SESSION["user"])){
                throw new Exception("Login required", 1);
            } else {
                $model = $this->model("ProductComment");
                $user = $_SESSION["user"];
                $data = $_POST; // comment: text, product_id: int
                $data["date_created"] = time();
                $data["author_id"] = $user["id"];
                $model->create($data);
                $comments = $model->get_joined($data["product_id"]);
                $this->load("comment-card", [
                    "comments" => $comments
                ]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
?>