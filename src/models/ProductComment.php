<?php 
class ProductComment extends Model {
    public function __construct(){
        parent::__construct("product_comment");
    }

    public function get_joined($product_id){
        $sql = "call product_comment_get_joined($product_id)";
        if ($result = $this->con->query($sql)){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            throw new Exception($this->con->error, 1);
        }
    }
}
?>