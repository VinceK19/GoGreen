<?php

class BlogsController extends Controller{

    function index(){
        $this->view("blogs", "Blogs");
    }


    function post($id){
        $blog = $this->model("Blog");

        $post = $blog->get($id);
        $this->view("post", "Post" ,$post);
    }
}
?>