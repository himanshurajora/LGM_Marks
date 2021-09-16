<?php

class Connection{
    function connect(){
        try{
            return new PDO("mysql:host=localhost; dbname=lgm", "root","");
        }
        catch(PDOException $error){
            die("Could not connect!!" . $error->getMessage());
        }
    }
}

?>