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
}
?>