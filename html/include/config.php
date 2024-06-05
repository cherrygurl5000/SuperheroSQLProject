<?php
    const HOMEPAGE = "./index.php";
    const ALLHEROES = "./allHeroes.php";
    const ALLDC = ALLHEROES . "?uni=dc";
    const ALLMARVEL = ALLHEROES . "?uni=ma";
    const LOCALHOST = "superhero";
    const DB_USERNAME = "root";
    const DB_PASSWORD = "";
    const DB_DATABASE = "superhero";

    $randomHero = 1;
    $con = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if ($con->connect_error){
        die("Connection failed!");
    }
    else {
        $sqlSelectAll = "SELECT * FROM hero";
        $res = $con->query($sqlSelectAll);
        //$res = FALSE;
        if($res == TRUE) {
            $count = $res->num_rows;
            $randomHero = rand(1, $count);
        }        
    }
    $con->close();
    $randHero = "./heroPage.php?id=" . $randomHero;
    //echo($randHero ." ");
?>