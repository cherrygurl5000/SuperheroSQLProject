<script>
    // Add logo image to header section on smaller screens
    if ($(window).width() < 768) {
        $('#logoImg').append(`
            <figure class="w-100">
                <img src="../logos/<?php echo($logoLoc); ?>" alt="<?php echo($heroName); ?> Logo" class="heroImg">
            </figure>
            `);
        $('#logoImg').removeClass('col-md-0');
        $('#logoImg').addClass('col-md-2 align-self-center ml-4 mt-md-4'); 
    }
    else {
        // Add logo image to bioText
        $('#bioText').prepend(
            `<span id="logoImg"><img src="../logos/<?php echo($logoLoc); ?>" alt="<?php echo($heroName); ?> Logo" class="heroImg"></span>`
        );
    }

</script>