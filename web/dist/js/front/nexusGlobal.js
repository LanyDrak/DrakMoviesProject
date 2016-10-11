$(document).ready(function(){

    $('body').on('mouseenter', 'header .main-nav ul li a', function (e){

        $('#current').removeClass('MenuItemSelected');
        $(this).addClass('MenuItemSelected')
    });

    $('body').on('mouseout', 'header .main-nav ul li a', function (e){

        $(this).removeClass('MenuItemSelected');
        $('#current').addClass('MenuItemSelected');
    })
});