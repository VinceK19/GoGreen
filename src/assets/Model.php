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
        $condition = $condition? "WHERE ".$condition: "";
        $sql = "SELECT ".$columns." FROM ".$this->table." ".$condition." ".$orderBy;
        $result =  $this->con->query($sql);
        if ( $result ){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            throw new Exception($this->con->error);
        }
    }

    function get($condition){
        $sql = "SELECT * FROM ".$this->table." WHERE ".$condition ;
        $result =  $this->con->query($sql);
        if ( $result ) {
            return $result->fetch_assoc();
        } else {
            throw new Exception($this->con->error);
        }
    }

    function create($data){
        print_r($data);
        $sql = "INSERT INTO ".$this->table." (".implode(",",array_keys($data)).") VALUES (".implode(",",array_map(function ($v) { return "'".$v."'"; } ,array_values($data))).")";
        echo $sql;
        if  ($this->con->query($sql)){
            return TRUE;
        } else {
            throw new Exception($this->con->error);
        }
    }

    function update($id, $change=[]){
        $stmt = [];
        foreach($change as $key => $value){
            array_push($stmt, $key."=".$value );
        }
        $sql = "UPDATE ".$this->table." SET ".implode(",",$stmt)." WHERE id=".$id;
        if ( $this->con->query($sql) ){
            return TRUE;
        } else {
            throw new Exception($this->con->error);
        }
    }

    function delete($id){
        $sql = "DELETE FROM ".$this->table." WHERE id=".$id;
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