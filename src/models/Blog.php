<?php 
class Blog extends Model {
    public function __construct(){
        parent::__construct("blog");
    }
    public function get_data($blog_id){
        $sql = "call blog_get_data($blog_id)";
        if ($this->con->multi_query($sql)){
            $product = $this->con->store_result();
            $this->con->next_result();
            $comments = $this->con->store_result();
            $this->con->next_result();
            $data = [
                "blog" => $product->fetch_assoc(),
                "comments" => $comments->fetch_all(MYSQLI_ASSOC)
            ];
            return $data;
        } else {
            throw new Exception($this->con->error);
        }
    }

    public function get_random($n){
        $sql = "call blog_get_random($n)";
        if ($result = $this->con->query($sql)){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            throw new Exception($this->con->error, 1);
            
        }
    }
}

?>