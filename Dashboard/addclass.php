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
                                if(isset($_POST['submit'])){
                                    $class = $_POST['class'];
                                    echo $class . "added";
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