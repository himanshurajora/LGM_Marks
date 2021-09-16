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
                            <p class="card-header-title">Add Students</p>
                        </div>
                        <div class="card-content">
                            <div class="container">
                                <form action="" method="post">
                                    <div class="feild">
                                        <label for="" class="label">Class</label>
                                        <select name="classno" id="input" class="input">
                                            <option value="">Select Class</option>
                                            <?php
                                            $classes = new Classes();
                                            $students = new Students();
                                            $data = $classes->getAllClasses();
                                            foreach ($data as $class) {
                                                echo "<option value='" . $class['classno'] . "'>" . $class['classno'] . "</option>";
                                            }

                                            ?>
                                        </select>
                                    </div>

                                    <br>
                                    <div class="feild">
                                        <button name="submit" class="button is-success">
                                            List Students
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <br />
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Availble Students</p>
                        </div>
                        <div class="card-content">
                            <?php
                            if (isset($_POST['submit'])) {
                                $classno = $_POST['classno'];
                                $data = $students->getStudentByClassno($classno);
                                foreach ($data as $row) {
                                    echo "<div class='columns is-multiline is-mobile is-fullwidth'>";
                                    echo "<div class='column'>";
                                    echo $row['name'];
                                    echo "</div>";
                                    echo "<div class='column'>";
                                    echo $row['classno'];
                                    echo "</div>";
                                    echo "<div class='column'>";
                                    echo "<button class='button is-small is-danger' onclick='window.location.href=\"deletestudent.php?id=" . $row['id'] . "\"'>Delete</button>";
                                    echo "</div>";
                                    echo "</div>";
                                }
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