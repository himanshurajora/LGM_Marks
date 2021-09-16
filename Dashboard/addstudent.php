<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <?php
    include("../includes.php");
    ?>
</head>

<body>
    <div id="app">


        <section class="main-content columns is-fullheight">

            <?php
                include("./nav.php");
                
            ?>


            <div class="container column is-10">
                <div class="section">

                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Add Students</p>
                        </div>
                        <div class="card-content">
                            <div class="container">
                                <form action="" method="post">
                                    <div class="feild">
                                        <label for="" class="label">Name of Student</label>
                                        <input type="text" class="input" placeholder="Enter Name" name="name" required>
                                    </div>
                                    <div class="feild">
                                        <label for="" class="label">Class</label>
                                        <select name="classno" id="input" class="input">
                                            <option value="">Select Class</option>
                                            <?php
                                                require_once('../Database/Class.php');
                                                require_once('../Database/Students.php');
                                                $classes = new Classes();
                                                $students = new Students();
                                                $data = $classes->getAllClasses();
                                                foreach($data as $class)
                                                {
                                                    echo "<option value='".$class['classno']."'>".$class['classno']."</option>";
                                                }
                                        
                                            ?>
                                        </select>
                                    </div>
                                    <div class="feild">
                                        <label for="" class="label">Roll No.</label>
                                        <input type="number" class="input" placeholder="Enter Name" name="rollno" required>
                                    </div>
                                    <div class="feild">
                                        <label for="" class="label">Gender</label>
                                        <select name="gender" id="" class="input">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    <div class="feild">
                                        <label for="" class="label">Age</label>
                                        <input type="number" class="input" placeholder="Enter Name" name="age" required>
                                    </div>
                                    <br>
                                    <div class="feild">
                                        <button name="submit" class="button is-success">
                                            Add
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <?php
                               $message = '';
                                if(isset($_POST['submit'])){
                                    $name = $_POST['name'];
                                    $classno = $_POST['classno'];
                                    $rollno = $_POST['rollno'];
                                    $age = $_POST['age'];
                                    $gender = $_POST['gender'];

                                    $message = $students->addStudent($name, $classno, $rollno, $age, $gender);
                                }
                                echo $message;    
                                ?>

                        </div>
                    </div>

                    <br />
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Availble Students</p>
                        </div>
                        <div class="card-content">
                            <?php
                            $data = $students->getAllStudents();
                            foreach($data as $row){
                                echo "<div class='columns is-multiline is-mobile is-fullwidth'>";
                                echo "<div class='column'>";
                                echo $row['name'];
                                echo "</div>";
                                echo "<div class='column'>";
                                echo $row['classno'];
                                echo "</div>";
                                echo "<div class='column'>";
                                echo "<button class='button is-small is-danger' onclick='window.location.href=\"deletestudent.php?id=".$row['id']."\"'>Delete</button>";
                                echo "</div>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                    <br />
                </div>
            </div>

        </section>

        <footer class="footer is-hidden">
            <div class="container">
                <div class="content has-text-centered">
                    <p>Hello</p>
                </div>
            </div>
        </footer>

    </div>

</body>

</html>