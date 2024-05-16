<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Superhero SQL Project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/styles.css" rel="stylesheet" type="text/css" />

</head>
<body>
    <div class="container mt-2 border">
        <header class="row justify-content-center my-1">
            <div class="col-12 text-center">
                <h1><u>Adding Superheroes</u></h1>
            </div>
            <div class="col-12 text-center">
                <img src="../imgs/1superhero-img.jpg" alt="Generic Image of a Superhero" class="rounded mx-auto d-block">
            </div>
        </header>

        <main>
            <form name="addHero" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <article class="row justify-content-center">
                    <div class="col-12 col-sm-6 my-1">
                        <label for="heroName">Hero Name: </label>
                       <input type="text" name="heroName" id="heroName" placeholder="Enter Hero Name..." class="w-100">
                    </div>
                    <div class="col-12 col-sm-6 my-1">
                        <label for="heroGroups">Hero Groups: </label>
                        <input type="text" name="heroGroups" id="heroGroups" placeholder="Enter Hero Groups..." class="w-100">
                    </div>
                    <div class="col-12 col-sm-6 my-1">
                        <label for="heroImg">Select Hero Image Location: </label>
                        <input type="file" name="heroImg" id="heroImg" class="w-100">
                    </div>
                    <div class="col-12 col-sm-6 my-1">
                        <label for="heroLogo">Select Hero Logo Location: </label>
                        <input type="file" name="heroLogo" id="heroLogo" class="w-100">
                    </div>    
                </article>
                <article class="row justify-content-center">
                    <div class="col-12 col-sm-6 my-1">
                        <label for="heroPwr">Powers: </label>
                        <input type="text" name="heroPwr" id="heroPwr"placeholder="Enter Powers..." class="w-100">
                    </div>
                    <div class="col-12 col-sm-6 my-1">
                        <label for="heroAb">Abilities: </label>
                        <input type="text" name="heroAb" id="heroAb"placeholder="Enter Abilities..." class="w-100">
                    </div>
                    <div class="col-12 col-sm-6 my-1">
                        <label for="heroWeak">Weaknesses: </label>
                        <input type="text" name="heroWeak" id="heroWeak"placeholder="Enter Weaknesses..." class="w-100">
                    </div>
                    <div class="col-12 col-sm-6 my-1">
                        <label for="heroEn">Enemies: </label>
                        <input type="text" name="heroEn" id="heroEn"placeholder="Enter Enemies..." class="w-100">
                    </div>
                </article>
                <article class="row justify-content-center mb-4">
                    <div class="col-12 col-sm-6 my-1">
                        <label for="heroBio">Enter Hero Bio: </label>
                        <div class="row justify-content-center">
                            <textarea name="heroBio" id="heroBio" class="col-11" placeholder="Hero Biography..."></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 my-1 text-center">
                            <div class="row mb-2 text-start">
                                <label for="heroUni">Select Hero Universe: </label>
                            </div>
                        <section class="btn-group-vertical ml-2 row w-75" role="group" aria-label="Hero Universe Selection">
                            <input type="radio" class="btn-check" name="heroUni" id="heroUniMar" value="ma">
                            <label class="btn btn-outline-primary" for="heroUniMar">Marvel</label>
                            <input type="radio" class="btn-check" name="heroUni" id="heroUniDc" value="dc">
                            <label class="btn btn-outline-info" for="heroUniDc">DC</label>
                            <input type="radio" class="btn-check" name="heroUni" id="heroUniOther" value="ot">
                            <label class="btn btn-outline-secondary" for="heroUniOther">Other</label>
                        </section>
                    </div>
                </article>
                <article class="row justify-content-center text-center mt-5 mb-4">
                    <div class="col-6">
                        <button type="reset" class="btn btn-warning w-75">Reset</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-success w-75">Submit</button>
                    </div>

                </article>
            </form>
        </main>
        


    <!-- End of container div -->
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>

<?php
    // Define variables to be used
    $heroName = $heroGroups = $heroImg = $heroLogo = $heroPwr= $heroAb = $heroWeak = $heroEn = $heroBio = $heroUni = "";
    
    // Check for POST request
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //Check if the database has already been created
        //$con = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD);    
        $con = new mysqli("superhero", "root", "");
        if ($con->connect_error){
            die("Connection failed!");
        }
        else {
            //echo("connected");
            // create the Superhero database in case it wasn't previously created
            $sqlCreate = "CREATE DATABASE IF NOT EXISTS Superhero";
            $con->query($sqlCreate);
            $dbSel = mysqli_select_db( $con, 'Superhero');
        if(!$dbSel) {
                die("Database wasn't created");
                header("Refresh:0");
            }
        else {
            echo("db selected");
            createTables($con);
            addingStats($con);
        
        }
        $con->close();
        }
    }

    function processInput($input) {
        $input = trim($input);
        $input = addslashes($input);
        $input = htmlentities($input);
        $input = htmlspecialchars($input);
        $input = strip_tags($input);

        return $input;
    }

    function createTables($conn) {
        // Create tables for the hero stats, images, universes, and groups
        $sqlCreateTableHero = "CREATE TABLE IF NOT EXISTS hero (
            heroID INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            heroName VARCHAR(50) UNIQUE NOT NULL,
            heroPwr VARCHAR(300) DEFAULT 'NONE',
            heroAb VARCHAR(300) DEFAULT 'NONE',
            heroWeak VARCHAR(300) DEFAULT 'NONE',
            heroEn VARCHAR(300) DEFAULT 'NONE',
            heroBio VARCHAR(3000) NOT NULL,
            uniID CHAR(2),
            imgLoc VARCHAR(150) DEFAULT '1superhero-img.jpg',
            logoLoc VARCHAR(150)
        )";
        $sqlCreateTableUni = "CREATE TABLE IF NOT EXISTS uni (
            uniID CHAR(2) PRIMARY KEY,
            uniName VARCHAR(25) DEFAULT 'Other',
            teamName VARCHAR(25)
        )";
        $sqlCreateTableImg = "CREATE TABLE IF NOT EXISTS img (
            imgID INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            imgLoc VARCHAR(150) UNIQUE,
            imgDesc VARCHAR(5),
            uniID CHAR(2)
        )";

        if($conn->query($sqlCreateTableHero) == FALSE) {
            echo("Creating Hero table FAILED" . $conn->error);
        }

        if($conn->query($sqlCreateTableImg) == FALSE) {
            echo("Creating Image table FAILED" . $conn->error);
        }
        else if ($conn->query($sqlCreateTableImg) == TRUE) {            
            // Add the team image locations to the img table
            $sqlImg1 = "INSERT IGNORE INTO img (imgLoc, imgDesc, uniID) VALUES ('justiceLeagueTeam-img.jpg', 'img', 'dc')";
            $sqlImg2 = "INSERT IGNORE INTO img (imgLoc, imgDesc, uniID) VALUES ('avengersTeam-img.webp', 'img', 'ma')";
            $sqlImg3 = "INSERT IGNORE INTO img (imgLoc, imgDesc, uniID) VALUES ('otherTeam-img.jpg', 'img', 'ot')";

            // Run the queries for the img table
            if($conn->query($sqlImg1) == FALSE) {
                echo("Failed to add to table" . $conn->error);
            }
            if($conn->query($sqlImg2) == FALSE) {
                echo("Failed to add to table" . $conn->error);
            }
            if($conn->query($sqlImg3) == FALSE) {
                echo("Failed to add to table" . $conn->error);
            }
        }
        
        if($conn->query($sqlCreateTableUni) == FALSE) {
            echo("Creating Universe table FAILED" . $conn->error);
        }
        else if ($conn->query($sqlCreateTableUni) == TRUE) {
            // Add the universes to the uni table
            $sqlUni1 = "INSERT IGNORE INTO uni VALUES ('dc', 'DC Universe', 'Justice League')";
            $sqlUni2 = "INSERT IGNORE INTO uni VALUES ('ma', 'Marvel Universe', 'Avengers')";
            $sqlUni3 = "INSERT IGNORE INTO uni VALUES ('ot', 'Other', 'Flying Solo')";

            // Run the queries for the uni table
            if($conn->query($sqlUni1) == FALSE) {
                echo("Failed to add to table" . $conn->error);
            }
            if($conn->query($sqlUni2) == FALSE) {
                echo("Failed to add to table" . $conn->error);
            }
            if($conn->query($sqlUni3) == FALSE) {
                echo("Failed to add to table" . $conn->error);
            }
        }
    }

    function addingStats($conn) {
        $heroName = processInput($_POST["heroName"]);
        $heroPwr = processInput($_POST["heroPwr"]);
        $heroAb = processInput($_POST["heroAb"]);
        $heroWeak = processInput($_POST["heroWeak"]);
        $heroEn = processInput($_POST["heroEn"]);
        $heroBio = mysqli_real_escape_string($conn, processInput($_POST["heroBio"]));
        $heroUni = processInput($_POST["heroUni"]); 
        $heroImg = processInput($_POST["heroImg"]);
        $heroLogo = processInput($_POST["heroLogo"]);
        echo ($heroName . "<br>");
        echo ($heroPwr . "<br>");
        echo ($heroAb . "<br>");
        echo ($heroWeak . "<br>");
        echo ($heroEn . "<br>");
        echo ($heroBio . "<br>");
        echo ($heroUni . "<br>");
        echo ($heroImg . "<br>");
        echo ($heroLogo . "<br>");

        $sqlHero = "INSERT INTO hero (heroName, heroPwr, heroAb, heroWeak, heroEn, heroBio, uniID, imgLoc, logoLoc) VALUES ('$heroName', '$heroPwr', '$heroAb', '$heroWeak', '$heroEn', '$heroBio', '$heroUni', '$heroImg', '$heroLogo')";
        if($conn->query($sqlHero) == FALSE) {
            echo("Failed to add entry to hero table ". $conn->error);
        }
    }
?>