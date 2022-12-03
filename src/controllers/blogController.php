<?php

class BlogController extends Controller{

    function index(){
        $model = $this->model("Blog");
        $blogs = $model->getAll();
        $popular_blogs = $model->get_random(5);
        $this->view("blog", [
            "title" => "Blogs",
            "breadcrumb" => [
                ["name" => "Home", "link" => BASE_URL."home"]
            ],
            "blogs" => $blogs,
            "popular_blogs" => $popular_blogs
        ]);
    }


    function post($id){
        $model = $this->model("Blog");
        
        $item = $model->get_data($id);
        $blog = $item["blog"];
        $comments = $item["comments"];
        $recomended_blogs = $model->get_random(5);
        $this->view("blog-detail",[
            "page_title" => $blog["title"],
            "title" => "Blog Detail",
            "breadcrumb" => [
                ["name" => "Blog", "link" => BASE_URL."blog"]
            ],
            "blog" => $blog,
            "comments" => $comments,
            "recomended_blogs" => $recomended_blogs
        ]);
    }

    // AJAX ====================================================
    function post_comment(){
        try {
            if ($_SERVER["REQUEST_METHOD"] != "POST"){
                throw new Exception("Method Not Allowed", 1);
            } else if (!isset($_SESSION["user"])){
                throw new Exception("Login required", 1);
            } else {
                $model = $this->model("BlogComment");
                $user = $_SESSION["user"];
                $data = $_POST; // comment: text, blog_id: int
                $data["date_created"] = time();
                $data["author_id"] = $user["id"];
                $model->create($data);
                $comments = $model->get_joined($data["blog_id"]);
                $this->load("comment-card", [
                    "comments" => $comments
                ]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
}
?>