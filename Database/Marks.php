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
    function insertMarks($classno, $rollno, $subject, $marks){
        //delete the marks for the student for rollno classno and subject   
        $query = "DELETE FROM marks WHERE rollno=:rollno AND classno=:classno AND subject=:subject";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(":rollno",$rollno);
        $stmt->bindParam(":classno",$classno);
        $stmt->bindParam(":subject",$subject);
        $stmt->execute();

        //now insert the new marks
        $query = "INSERT INTO marks(classno, rollno, subject, marks) VALUES(:classno, :rollno, :subject, :marks)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(":classno",$classno);
        $stmt->bindParam(":rollno",$rollno);
        $stmt->bindParam(":subject",$subject);
        $stmt->bindParam(":marks",$marks);
        $stmt->execute();
    }

    //Queries that could be used

    // function updateMarks($classno, $rollno, $subject, $marks){
    //     $query = "UPDATE marks SET marks=:marks WHERE classno=:classno AND rollno=:rollno AND subject=:subject";
    //     $stmt = $this->connect->prepare($query);
    //     $stmt->bindParam(":classno",$classno);
    //     $stmt->bindParam(":rollno",$rollno);
    //     $stmt->bindParam(":subject",$subject);
    //     $stmt->bindParam(":marks",$marks);
    //     $stmt->execute();
    // }
    // function checkifMarksExists($classno, $rollno, $subject){
    //     $query = "SELECT * FROM marks WHERE classno=:classno AND rollno=:rollno AND subject=:subject";
    //     $stmt = $this->connect->prepare($query);
    //     $stmt->bindParam(":classno",$classno);
    //     $stmt->bindParam(":rollno",$rollno);
    //     $stmt->bindParam(":subject",$subject);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll();
    //     if(count($result)>0){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}

?>