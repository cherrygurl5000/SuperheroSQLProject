<!DOCTYPE html>
<html lang="en">
<head>

    <?php require './include/head.php'; ?>
    
    <title>Superhero Project Home</title>

</head>
<body class="container-md">

    <?php require './include/header.php'; ?>

    <main class="row justify-content-center mt-2 d-md-flex">
        <section class="row justify-content-center pb-4 order-md-2 allSection" id="allSect">
            <a href="<?php echo ALLHEROES; ?>" class="row justify-content-center">
                <figure class="w-50 position-relative">
                    <img src="../imgs/1superhero-img.jpg" alt="All Heroes Image" title="All Heroes Image" id="allHeroesImg">
                    <span class="allLH labelHeading"></span>
                </figure>
            </a>
        </section>
        <section class="col-6 col-md-4 pt-3 border border-dark order-md-1" id="noLeftBorder">
            <a href="<?php echo ALLDC; ?>">
                <figure class="w-100 pt-5 position-relative">
                    <img src="../imgs/dc-img.jpg" alt="DC Universe Image" title="DC Universe Image" id="dcImg">
                    <span class="dcLH labelHeading"></span>
                </figure>
            </a>
        </section>
        <section class="col-6 col-md-4 pt-3 border border-dark order-md-2" id="noRightBorder">
            <a href="<?php echo ALLMARVEL; ?>">
                <figure class="w-100 pt-5 position-relative">
                    <img src="../imgs/marvel-img.jpeg" alt="Marvel Universe Image" title="Marvel Universe Image" id="marvelImg">
                    <span class="marvelLH labelHeading"></span>
                </figure>
            </a>
        </section>
    </main>

    <?php 
        require './include/footer.php';
        require './include/scriptLinks.php'; 
    ?>
    
</body>
</html>