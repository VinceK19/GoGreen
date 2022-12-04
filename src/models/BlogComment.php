<?php 
class BlogComment extends Model {
    public function __construct(){
        parent::__construct("blog_comment");
    }

    public function get_joined($blog_id){
        $sql = "call blog_comment_get_joined($blog_id)";
        if ($result = $this->con->query($sql)){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            throw new Exception($this->con->error, 1);
        }
    }
}

?>