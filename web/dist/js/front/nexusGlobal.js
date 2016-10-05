$(document).ready(function(){

    $('body').on('mouseenter', 'header .main-nav ul li a', function (e){

        $('.main-nav ul li:first-child a').removeClass('MenuItemSelected');
        $(this).addClass('MenuItemSelected')
    });

    $('body').on('mouseout', 'header .main-nav ul li a', function (e){

        $(this).removeClass('MenuItemSelected')
        $('.main-nav ul li:first-child a').addClass('MenuItemSelected');
    })
});