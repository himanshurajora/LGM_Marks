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
                            <p class="card-header-title">Total Classes</p>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <?php
                                    require_once('../Database/HomeData.php');
                                    $homeData = new HomeData();
                                    $data = $homeData->getNumberOfClasses();
                                    echo '<p class="title is-2">'.$data.'</p>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Total Subjects</p>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <?php
                                    $data = $homeData->getNumberOfSubjects();
                                    echo '<p class="title is-2">'.$data.'</p>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Total Students</p>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <?php
                                    $data = $homeData->getNumberOfStudents();
                                    echo '<p class="title is-2">'.$data.'</p>';
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