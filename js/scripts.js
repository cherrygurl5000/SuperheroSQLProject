// Show the menu when the menu button is clicked
$('#menuIcon').click(() => {
    $('.topNav').fadeToggle(800, ()=> {
        if($('.topNav').css('display') === 'block') {
            $('.fa.fa-bars').animate({'opacity': 0}, 400, () => $('#menuIcon').html('<i class="fa-solid fa-xmark"></i>')).animate({'opacity' : 1}, 300); 
        }
        else if($('.topNav').css('display') === 'none') {
            $('.fa-solid.fa-xmark').animate({'opacity': 0}, 400, () => $('#menuIcon').html('<i class="fa fa-bars"></i>')).animate({'opacity' : 1}, 300); 
        }
    });
        
});

// Make both universe images the same size
setTimeout(() => $('#dcImg').height($('#marvelImg').height()), 300);

// function for label placement
function labelPlacement() {
    // Place the labels based on the image size
    $('.allLH').css('top', $('#allHeroesImg').height() - ($('.allLH').height()*0.4));
    $('.allLH').css('left', 0);
    $('.dcLH').css('top', $('#dcImg').height() + 8);
    $('.dcLH').css('left', 0);
    $('.marvelLH').css('top', $('#marvelImg').height() + 8);
    $('.marvelLH').css('left', 0);
}

// Place the labels after the page is fully loaded and the images are properly placed
$(document).ready(function () {
    setTimeout(labelPlacement, 500);
});

// Only do the following if on a medium or larger screen
if ($(window).width() >= 768) {
    $('.allSection').removeClass('row');
    $('.allSection').addClass('col-md-4');
    $('.allSection a figure').removeClass('w-50');
    $('.allSection a figure').addClass('w-75');
}

// Add logo image to header section
$('#logoImg').append(`
    <figure class="w-100">
        <img src="../logos/aquaman-logo.jpg" alt="Aquaman Logo" class="heroImg">
    </figure>
    `);
$('#logoImg').removeClass('col-md-0');
$('#logoImg').addClass('col-md-2 align-self-center ml-4 mt-md-4');
