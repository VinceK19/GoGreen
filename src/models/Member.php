<?php 
class Member extends Model {
    public function __construct(){
        parent::__construct("member");
    }

    public function member_get_data($username){
        $sql = "CALL member_get_data('".$username."')";
        if ($this->con->multi_query($sql)){
            $account = $this->con->store_result();
            $this->con->next_result();
            $cart = $this->con->store_result();
            $this->con->next_result();
            $account = $account->fetch_assoc();
            if ($account){
                $account["cart"] = $cart->fetch_all(MYSQLI_ASSOC);
            }
            return $account;
        } else {
            throw new Exception($this->con->error);
        };

    }
}

?>