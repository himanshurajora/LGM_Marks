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
                            <p class="card-header-title">Add Class</p>
                        </div>
                        <div class="card-content">
                            <div class="container">
                                <form action="" method="post">
                                    <div class="feild">
                                        <label for="" class="label">Class No.</label>
                                        <input type="number" class="input" placeholder="eg: 4, 7 etc" name="class" required>
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
                                $message = "";
                                include("../Database/Class.php");
                                $classes = new Classes();
                                if(isset($_POST['submit'])){
                                    $classnumber = $_POST['class'];
                                    $message = $classes->addClass($classnumber);
                                }
                                echo $message;    
                                ?>

                        </div>
                    </div>

                    <br />
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Availble Classes</p>
                        </div>
                        <div class="card-content">
                            <?php
                            $data = $classes->getAllClasses();
                            foreach($data as $row){
                                echo "<div class='columns is-multiline is-mobile is-fullwidth'>";
                                echo "<div class='column is-half'>";
                                echo $row['classno'];
                                echo "</div>";
                                echo "<div class='column is-half'>";
                                echo "<button class='button is-small is-danger' onclick='window.location.href=\"deleteclass.php?classno=".$row['classno']."\"'>Delete</button>";
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