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
    
    function test($id){
        $model = $this->model("Product");
        $result = $model->get_data($id);
        print_r($result);
    }
}
?>