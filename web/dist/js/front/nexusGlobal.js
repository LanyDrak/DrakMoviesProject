$(document).ready(function(){

    $('body').on('mouseenter', 'header .main-nav ul li a', function (e){

        $('#current').removeClass('MenuItemSelected');
        $(this).addClass('MenuItemSelected')
    });

    $('body').on('mouseout', 'header .main-nav ul li a', function (e){

        $(this).removeClass('MenuItemSelected');
        $('#current').addClass('MenuItemSelected');
    })

    /*$.fn.stars = function() {
        return $(this).each(function() {

            var rating = $(this).text();

            var numStars = 5;

            var fullStar = new Array(Math.floor(rating + 1)).join('<i class="fa fa-star"></i>');

            var noStar = new Array(Math.floor(numStars + 1 - rating)).join('<i class="fa fa-star-o"></i>');

            $(this).html(fullStar + noStar);

        });
    };

    $('p.rating').stars();*/

    $('ul.og-grid li a').on('click', function(){

        var rating = $('p.rating').attr('data-noten6tyrell');

        for (var i = 1; i<=rating; i++){
            $('p.rating').append('<i class="fa fa-star"></i>');
        }

        for(var i=1; i<=(5 - rating); i++){
            $('p.rating').append('<i class="fa fa-star-o"></i>');
        }

    });


});