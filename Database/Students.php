<?php
    class Students{
        function __construct(){
            require_once('Connection.php');
            $connection = new Connection();
            $this->connect = $connection->connect();
        }
        public function getAllStudents(){
            $query = "SELECT * FROM students";
            $statement = $this->connect->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getStudentByClassno($classno){
            $query = "SELECT * FROM students WHERE classno = :classno";
            $statement = $this->connect->prepare($query);
            $statement->bindParam(':classno', $classno, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        public function addStudent($name, $classno, $rollno, $age, $gender){
            $query = "INSERT INTO students (name, classno, rollno, age, gender) VALUES (:name, :classno, :rollno, :age, :gender)";
            $query2 = "INSERT INTO results (studentid, result) VALUES ($rollno, '')";
            $statement = $this->connect->prepare($query);
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':classno', $classno, PDO::PARAM_INT);
            $statement->bindParam(':rollno', $rollno, PDO::PARAM_INT);
            $statement->bindParam(':age', $age, PDO::PARAM_INT);
            $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
            $statement->execute();

            $statement = $this->connect->prepare($query2);
            $statement->execute();
            
            return "Added Student $name in class $classno Successfully";
        }
        public function deleteStudent($id){
            $query = "DELETE FROM students WHERE id = :id";
            $statement = $this->connect->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
        }
    }