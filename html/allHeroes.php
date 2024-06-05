<!DOCTYPE html>
<html lang="en">
<head>

    <?php require './include/head.php'; ?>
    
    <title>All Heroes</title>

</head>
<body class="container-md">

    <?php require './include/header.php'; ?>
    
    <main class="row justify-content-center mt-2 pt-2 d-md-flex tbBorders">

       <?php

            $con = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            if ($con->connect_error){
                die("Connection failed!");
            }
            else {
                // echo("connected");
                // echo($_GET['uni']);
                $sqlSelectAll = "SELECT * FROM hero";
                $titleName = 'Superhero';

                if(isset($_GET['uni'])) {
                    if($_GET['uni'] == 'dc') {
                        $sqlSelectAll = "SELECT * FROM hero WHERE uniID = 'dc'";
                        $titleName = 'DC';
                    }
                    else if($_GET['uni'] == 'ma') {
                        $sqlSelectAll = "SELECT * FROM hero WHERE uniID = 'ma'";
                        $titleName = 'Marvel';
                    }
                }

                $res = $con->query($sqlSelectAll);

                // Print them all
                if($res == TRUE) {
                    $count = $res->num_rows;
                    // echo($count);
                    if($count > 0) {
                        ?>

        <h1 class="row justify-content-center text-center mb-4 heading"><?php echo($titleName) ?> Collective</h1>

                        <?php
                        while($row = $res->fetch_assoc()) {
                        $heroID = $row['heroID'];
                        $heroName = $row['heroName'];
                        $uniID = $row['uniID'];
                        $imgLoc = $row['imgLoc'];
                        if($uniID == 'ma') {
                            $uniID = 'marvel';
                        }
                        // echo($heroId . " " . $heroName . " " . $uniID ." ". $imgLoc ." ");
                        ?>

        <section class="col-6 col-md-3">
            <a href="./heroPage.php?id=<?php echo($heroID); ?>" class="heroLinks">
                <figure class="text-center h-100">
                    <img src="../imgs/<?php echo($imgLoc); ?>" alt="<?php echo($heroName); ?>" class="heroImgs">
                    <figcaption class="<?php echo($uniID); ?>HeroNames"><?php echo($heroName); ?></figcaption>
                </figure>
            </a>
        </section>
                        <?php
                        }
                    }
                    else { 
                        echo('No HEROES to DISPLAY');
                    }
                }
            }
            $con->close();
        ?>

    </main>

    <?php 
        require './include/footer.php';
        require './include/scriptLinks.php'; 
    ?>

</body>
</html>