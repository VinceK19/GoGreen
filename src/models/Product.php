<?php 
class Product extends Model {
    public function __construct(){
        parent::__construct("product");
    }

    public function get_data($id){
        $sql = "call product_get_data($id)";
        if ($this->con->multi_query($sql)){
            $product = $this->con->store_result();
            $this->con->next_result();
            $comments = $this->con->store_result();
            $this->con->next_result();
            $data = [
                "product" => $product->fetch_assoc(),
                "comments" => $comments->fetch_all(MYSQLI_ASSOC)
            ];
            return $data;
        } else {
            throw new Exception($this->con->error);
        }
    }

    public function get_all(){
        $sql = "call product_get_all()";
        if ($result = $this->con->query($sql)){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            throw new Exception($this->con->error);
        }
    }
}

?>