<!DOCTYPE html>
<html lang="en">
<head>

    <?php require './include/head.php'; ?>
    
    <title>All Heroes</title>

</head>
<body class="container-md">

    <?php require './include/header.php'; ?>
    
    <main class="row justify-content-center mt-2 pt-2 d-md-flex tbBorders">
       <h1 class="row justify-content-center text-center mb-4 heading">Superhero Collective</h1>

       <section class="col-6 col-md-3">
        <a href="#" class="heroLinks">
            <figure class="text-center h-100">
                <img src="../imgs/captainAmerica-img.jpg" alt="Superhero Name" class="heroImgs">
                <figcaption class="dcHeroNames">Superhero Name</figcaption>
            </figure>
        </a>
       </section>
       <section class="col-6 col-md-3">
        <a href="#" class="heroLinks">
            <figure class="text-center h-100">
                <img src="../imgs/blackPanther-img.jpg" alt="Superhero Name" class="heroImgs">
                <figcaption class="marvelHeroNames">Superhero Name</figcaption>
            </figure>
        </a>
       </section>
       <section class="col-6 col-md-3">
        <a href="#" class="heroLinks">
            <figure class="text-center h-100">
                <img src="../imgs/hawkeye-img.jpg" alt="Superhero Name" class="heroImgs">
                <figcaption class="dcHeroNames">Superhero Name</figcaption>
            </figure>
        </a>
       </section>
       <section class="col-6 col-md-3">
        <a href="#" class="heroLinks">
            <figure class="text-center h-100">
                <img src="../imgs/aquaman-img.jpg" alt="Superhero Name" class="heroImgs">
                <figcaption class="marvelHeroNames">Superhero Name</figcaption>
            </figure>
        </a>
       </section>
    </main>

    <?php require './include/footer.php'; ?>

    <?php require './include/scriptLinks.php'; ?>

</body>
</html>