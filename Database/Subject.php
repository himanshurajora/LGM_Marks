<?php
    class Subjects{
        function __construct(){
            require_once("Connection.php");
            $connection = new Connection();
            $this->connect = $connection->connect();
        }
        function getSubjects(){
            $query = "SELECT * FROM Subjects";
            $statement = $this->connect->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        function getNumberOfSubjects(){
            $query = "SELECT name FROM Subjects";
            $statement = $this->connect->prepare($query);
            $statement->execute();
            return $statement->rowCount();
        }
        function addSubject($classno, $name){
            $query = "INSERT INTO Subjects (ClassNo, Name) VALUES ('$classno', '$name')";
            $statement = $this->connect->prepare($query);
            $statement->execute();
            return "Subject $name added success fully in class $classno";
        }
        function deleteSubject($classno, $name){
            $query = "DELETE FROM Subjects WHERE ClassNo = '$classno' AND Name = '$name'";
            $statement = $this->connect->prepare($query);
            $statement->execute();
        }
    }