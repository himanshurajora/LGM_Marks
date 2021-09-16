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
                            <p class="card-header-title">Add Subject</p>
                        </div>
                        <div class="card-content">
                            <div class="container">
                                <form action="" method="post">
                                    <div class="feild">
                                        <label for="" class="label">Class No.</label>
                                        <select name="class" id="class" class="input">
                                            <option value="">Select Class</option>
                                            <?php
                                                require_once("../Database/Class.php");
                                                require_once("../Database/Subject.php");
                                                $classes = new Classes();
                                                $subjects = new Subjects;
                                                $data = $classes->getAllClasses();
                                                foreach($data as $row)
                                                {
                                                    echo "<option value='".$row['classno']."'>".$row['classno']."</option>";
                                                }
                                            ?>    
                                        </select>
                                    </div>
                                    <div class="feild">
                                        <label for="" class="label">Subject Name</label>
                                        <input type="text" name="subject" id="subject" class="input">
                                    </div>
                                    <br>
                                    <div class="feild">
                                        <button name="submit" class="button is-success">
                                            Add
                                        </button>
                                    </div>
                                </form>
                                <?php
                                if(isset($_POST['submit']))
                                {
                                    $message = "";
                                    $class = $_POST['class'];
                                    $subject = $_POST['subject'];
                                    $message = $subjects->addSubject($class, $subject);
                                    echo $message;
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <br />
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Availble Subjects</p>
                        </div>
                        <div class="card-content">
                            <?php
                            $data =$subjects->getSubjects();
                            foreach($data as $row)
                            {
                                echo "<div class='columns is-multiline is-mobile is-fullwidth'>";
                                echo "<div class='column is-one-third'>";
                                echo $row['name'];
                                echo "</div>";
                                echo "<div class='column is-one-third'>";
                                echo $row['classno'];
                                echo "</div>";
                                echo "<div class='column is-one-third'>";
                                echo "<button class='button is-small is-danger' onclick='window.location.href=\"deletesubject.php?classno=".$row['classno']."&name=".$row['name']."\"'>Delete</button>";
                                echo "</div>";
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