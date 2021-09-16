<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php
        include("includes.php")
    ?>
</head>

<body>

<?php
    require("./Database/Connection.php");

    session_start();
    $connection = new Connection;
 
    if(isset($_SESSION['username'])){
        header('location:/Dashboard');
    }

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if($username=="admin1234" && $password=="password"){
            $_SESSION['username'] = $username;
        }
    }

?>

    <section class="hero is-info is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                        <form action="" method="POST" class="box">
                            <div class="field">
                                <label for="" class="label">Admin usernmae</label>
                                <div class="control has-icons-left">
                                    <input type="text" minlength="6" placeholder="admin1234" class="input" name="username" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="" class="label">Admin password</label>
                                <div class="control has-icons-left">
                                    <input type="password" minlength="8" placeholder="*******" name="password" class="input" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="" class="checkbox">
                                    <input type="checkbox">
                                    Remember me
                                </label>
                            </div>
                            <div class="field">
                                <button name="submit" class="button is-success">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>