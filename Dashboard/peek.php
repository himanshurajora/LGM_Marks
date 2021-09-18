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
            require_once('../Database/Class.php');
            require_once('../Database/Students.php');

            ?>


            <div class="container column is-10">
                <div class="section">

                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Result of This Student</p>
                        </div>
                        <div class="card-content">
                            <div class="container">
                                <div class="card">
                                    <div class="card-header">
                                        <p class="card-header-title">Total Marks</p>

                                    </div>
                                    <div class="card-content">
                                        <div class="container">
                                            <?php
                                            require_once('../Database/Marks.php');
                                            require_once('../Database/Subject.php');
                                            $marks = new Marks();
                                            $subjects = new Subjects();
                                            
                                            $classno = $_GET['classno'];
                                            $rollno = $_GET['rollno'];
                                            
                                            $numberofsubjects = $subjects->getNumberOfSubjects($classno);
                                            $total = $marks->getTotalMarks($rollno, $classno);
                                            $all = $numberofsubjects * 100;
                                            echo "<p class='title'>$total out of $all</p>"

                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <p class="card-header-title">Percentage</p>
                                    </div>
                                    <div class="card-content">
                                        <div class="container">
                                            <?php


                                   
                                            echo "<p class='title'>";
                                            echo $total / $numberofsubjects;
                                            echo "%</p>";

                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <br />
                                <div class="card">
                                    <div class="card-header">
                                        <p class="card-header-title">Subject vise marks</p>
                                    </div>
                                    <div class="card-content">
                                        <?php
                                        $data = $marks->getMarks($_GET['rollno'], $_GET['classno']);
                                        foreach ($data as $row) {
                                            echo "<div class='columns is-multiline'>";
                                            echo "<div class='column'>";
                                            echo $row['subject'];
                                            echo "</div>";
                                            echo "<div class='column'>";
                                            echo '<strong>' . $row['marks'] . '</strong>';
                                            echo "</div>";
                                            echo "</div>";
                                        }

                                        ?>
                                    </div>
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