<?php

class Model{

    public $con;
    public $table;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "go_green";

    function __construct($table){
        $this->table = $table;
        $this->con = new mysqli($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }

    function getAll($columns="*", $condition="", $orderBy=""){
        $orderBy = $orderBy? "ORDER BY ".$orderBy : "";
        if (gettype($condition) == "array"){
            $condition = implode("AND", array_map(function ($k, $v) { return $k."='".$v."'";}, array_keys($condition), array_values($condition))) ;
        }
        $sql = "SELECT ".$columns." FROM ".$this->table." ".($condition? "WHERE ".$condition : "")." ".$orderBy;
        $result =  $this->con->query($sql);
        if ( $result ){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            throw new Exception($this->con->error);
        }
    }

    function get($condition){
        if (gettype($condition) == "array"){
            $condition = implode("AND", array_map(function ($k, $v) { return $k."='".$v."'";}, array_keys($condition), array_values($condition)))  ;
        }
        $sql = "SELECT * FROM ".$this->table." WHERE ".$condition ;
        $result =  $this->con->query($sql);
        if ( $result ) {
            return $result->fetch_assoc();
        } else {
            throw new Exception($this->con->error);
        }
    }

    function create($data){
        $keys = implode(",",array_keys($data));
        $values = implode(",",array_map(function ($v) { return "'".$v."'"; } ,array_values($data)));
        $sql = "INSERT INTO ".$this->table." (".$keys.") VALUES (".$values.")";
        echo $sql;
        if  ($this->con->query($sql)){
            return $this->con->insert_id;
        } else {
            throw new Exception($this->con->error);
        }
    }

    function update($condition, $change=[]){
        if (gettype($condition) == "array"){
            $condition = implode(" AND ", array_map(function ($k, $v) { return $k."='".$v."'";}, array_keys($condition), array_values($condition)))  ;
        }
        $change = array_map(function ($k, $v) { return $k."='".$v."'";}, array_keys($change), array_values($change));
        $sql = "UPDATE ".$this->table." SET ".implode(",",$change)." WHERE ".$condition;
        print($sql);
        if ( $this->con->query($sql) ){
            return $this->con->insert_id;
        } else {
            throw new Exception($this->con->error);
        }
    }

    function delete($condition){
        if (gettype($condition) == "array"){
            $condition = implode("AND", array_map(function ($k, $v) { return $k."='".$v."'";}, array_keys($condition), array_values($condition)))  ;
        }
        $sql = "DELETE FROM ".$this->table." WHERE ".$condition;
        if ($this->con->query($sql)) {
            return TRUE;
        } else {
            throw new Exception($this->con->error);
        }
    }

    function count(){
        $sql = "SELECT * FROM ".$this->table;
        $result =  $this->con->query($sql);
        if ( $result ) {
            return $result->num_rows;
        } else {
            throw new Exception($this->con->error);
        }
    }
}
?>