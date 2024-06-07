<!DOCTYPE html>
<html lang="en">
<head>

    <?php require './include/head.php'; ?>

    <title>All Heroes</title>

</head>

<?php require './include/header.php'; ?>
<?php 
    // Connect to the database and collect all information about the chosen character
    $con = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if ($con->connect_error){
        die("Connection failed!");
    }
    else {
        // Set the id to 1 if no id or an id outside of the range is given 
        $id = 1;
        if(isset($_GET['id'])) {
            $sqlSelectAll = "SELECT * FROM hero";  
            $res = $con->query($sqlSelectAll);
            if($res == TRUE) {
                $count = $res->num_rows;
                if($_GET['id'] <= $count && $_GET['id'] >= 1) {
                    $id = $_GET['id'];
                }
                if($count > 0) { 
                    $sqlSelectHero = "SELECT * FROM hero H
                    LEFT JOIN img I on I.imgLoc = H.imgLoc
                    INNER JOIN uni U on U.uniID = H.uniID
                    WHERE H.heroID = '$id'";
                    $res = $con->query($sqlSelectHero);
                    if($res == TRUE) { 
                        while($row = $res->fetch_assoc()) {
                            $heroName = $row['heroName'];
                            $heroPwr = $row['heroPwr'];
                            $heroAb = $row['heroAb'];
                            $heroWeak = $row['heroWeak'];
                            $heroEn = $row['heroEn'];
                            $heroBio = $row['heroBio'];
                            $imgLoc = $row['imgLoc'];
                            $logoLoc = $row['logoLoc'];
                            $teamName = $row['teamName'];
                        }
                    }
                }
            }
        }
    }        
    $con->close();
    // Add the team name to the team image
    if($teamName == 'Avengers') {
        $teamImg = 'avengersTeam-img.webp';
    }
    else if($teamName == 'Justice League') {
        $teamImg = 'justiceLeagueTeam-img.jpg';
    }
    else {
        $teamImg = 'otherTeam-img.jpg';
    }
    // Turn the powers, abilities, weaknesses, and enemies into arrays
    $heroPwr = explode(',', $heroPwr);
    $heroAb = explode(',', $heroAb);
    $heroWeak = explode(',', $heroWeak);
    $heroEn = explode(',', $heroEn);
    // Replace the special character stripped from the bio with '
    //echo(str_replace("\&#039;", "333", $heroBio));
    $heroBio = html_entity_decode($heroBio);
    $heroBio = str_replace('\\', '', $heroBio);
?>
<body class="container-md heroPg" style="background-image: url('../logos/<?php echo($logoLoc); ?>')">


    <main class="row justify-content-center mt-2 pt-2 d-md-flex">
        <h1 class="row justify-content-center text-center mb-4 heading heroHeading"><?php echo($heroName); ?></h1>

        <section class="col-5 col-lg-3 align-self-center">
            <figure>
                <img src="../imgs/<?php echo($imgLoc); ?>" alt="<?php echo($heroName); ?> Image" class="heroImg" id="heroId">
            </figure>
        </section>
        <section class="col-7 col-lg-9 h-md-100 align-self-center">
            <h2 class="infoTitles" id="bioTitle">Bio</h2>
            <p class="overflow-auto infoText" id="bioText">
            <?php echo($heroBio); ?>
            </p>
        </section>
        <section class="col-6 col-md-3 mt-3">
            <h2 class="infoTitles">Powers</h2>
            <ul class="overflow-auto infoText skillsText">
                <?php 
                    foreach($heroPwr as $power) {
                        ?>
                <li><?php echo($power); ?></li>
                        <?php
                    } 
                ?>
            </ul>
        </section>
        <section class="col-6 col-md-3 mt-3">
            <h2 class="infoTitles">Abilities</h2>
            <ul class="overflow-auto infoText skillsText">
                <?php 
                    foreach($heroAb as $ability) {
                        ?>
                <li><?php echo($ability); ?></li>
                        <?php
                    } 
                ?>
            </ul>
        </section>
        <section class="col-6 col-md-3 mt-md-3">
            <h2 class="infoTitles">Weaknesses</h2>
            <ul class="overflow-auto infoText skillsText">
                <?php 
                    foreach($heroWeak as $weak) {
                        ?>
                <li><?php echo($weak); ?></li>
                        <?php
                    } 
                ?>
            </ul>
        </section>
        <section class="col-6 col-md-3 mt-md-3">
            <h2 class="infoTitles">Enemies</h2>
            <ul class="overflow-auto infoText skillsText">
                <?php 
                    foreach($heroEn as $enemy) {
                        ?>
                <li><?php echo($enemy); ?></li>
                        <?php
                    } 
                ?>
            </ul>
        </section>
        <section class="col-10 col-md-4">
            <figure class="bgColors">
                <figcaption class="infoTitles" style="background-color: transparent;"><?php echo($teamName); ?></figcaption>
                <img src="../imgs/<?php echo($teamImg); ?>" alt="<?php echo($teamName); ?> Group Image" class="mx-auto d-block groupImg">
            </figure>
        </section>

    </main>

    <?php 
        require './include/footer.php'; 
        require './include/scriptLinks.php'; 
        require './include/heroPageScript.php'; 
    ?>
    

</body>
</html>