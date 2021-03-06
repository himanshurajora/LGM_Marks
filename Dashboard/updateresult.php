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
                            <p class="card-header-title">Update Result</p>
                        </div>
                        <div class="card-content">
                            <div class="container">
                                <form action="" method="post">
                                    <div class="feild">
                                        <label for="" class="label">Subjects</label>
                                        <?php
                                        require_once('../Database/Subject.php');
                                        require_once('../Database/Marks.php');
                                        $classes = new Classes();
                                        $students = new Students();
                                        $subjects = new Subjects();
                                        $marks = new Marks();
                                        $clasno = $_GET['classno'];
                                        $data = $subjects->getSubjectsInClass($clasno);
                                        foreach ($data as $row) {
                                            echo '<label class="label">Enter Marks of ' . $row['name'] . '</label><input class="input" type="number" value="" name="' . $row['name'] . '"/>';
                                        }



                                        if (isset($_POST['submit'])) {
                                            foreach ($_POST as $key => $value) {
                                                if ($key != 'submit') {
                                                    $marks->insertMarks($_GET['classno'], $_GET['rollno'], $key, $value);
                                                }
                                            }
                                        }


                                        ?>
                                        </select>
                                    </div>

                                    <br>
                                    <div class="feild">
                                        <button name="submit" class="button is-success">
                                            Update Result
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <br />
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Previous Result</p>
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
                                echo '<strong>'.$row['marks'].'</strong>';
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