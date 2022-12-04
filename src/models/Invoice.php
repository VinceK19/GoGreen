<?php 
class Invoice extends Model {
    public function __construct(){
        parent::__construct("invoice");
    }

    public function get_order($id){
        $sql = "call invoice_get_order($id)";
        if ($this->con->multi_query($sql)){
            $invoice = $this->con->store_result();
            $this->con->next_result();
            $orders = $this->con->store_result();
            $this->con->next_result();
            $data = [
                "invoice" => $invoice->fetch_assoc(),
                "orders" => $orders->fetch_all(MYSQLI_ASSOC)
            ];
            return $data;
        } else {
            throw new Exception($this->con->error);
        }
    }
}

?>