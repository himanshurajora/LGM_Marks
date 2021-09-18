<?php

class Marks{
    function __construct()
    {
        require_once("Connection.php");
        $connection = new Connection;
        $this->connect = $connection->connect();
    }
    function getMarks($rollno){
        $query = "SELECT * FROM marks WHERE rollno=:rollno";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(":rollno",$rollno);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    
}

?>