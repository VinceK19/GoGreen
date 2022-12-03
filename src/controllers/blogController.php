<?php

class BlogController extends Controller{

    function index(){
        $model = $this->model("Blog");
        $blogs = $model->getAll();

        $this->view("blog", [
            "title" => "Blogs",
            "breadcrumb" => [
                ["name" => "Home", "link" => BASE_URL."home"]
            ],
            "blogs" => $blogs
        ]);
    }


    function post($id){
        $moodel = $this->model("Blog");
        
        $blog = $moodel->get($id);
        $this->view("blog-detail",[
            "page_title" => $blog["title"],
            "title" => "Blog Detail",
            "breadcrumb" => [
                ["name" => "Blog", "link" => BASE_URL."blog"]
            ],
            "blog" => $blog
        ]);
    }
}
?>