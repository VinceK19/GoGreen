<?php 
class OrderItem extends Model {
    public function __construct(){
        parent::__construct("order_item");
    }

    function orderGetAll($customer_id){
        $sql = "CALL order_get_all('".$customer_id."')";
        if ($result = $this->con->query($sql)){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            throw new Exception($this->con->error);
        }
    }
}
?>