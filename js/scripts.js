// document.write('YO');

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

// Make both images the same size
setTimeout(() => $('#dcImg').height($('#marvelImg').height()), 100);

// Expand the universes when the universe is hovered over
/*let left = $('#noLeftBorder');
let right = $('#noRightBorder');

$(document).ready(function () {
$('#noLeftBorder').on('mouseenter', function() { console.log('left entered')});
$('#noRightBorder').mouseover(function() { console.log('right entered')});
});*/


