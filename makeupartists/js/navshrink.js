$(document).ready(function() {

    $(window).scroll(function() {

        var height = $('.parallax').height();
        var scrollTop = $(window).scrollTop();

        if (scrollTop >100) {
            $('nav').addClass('solid-nav');
            $('nav').removeClass('navbar-light');
            $('nav').addClass('navbar-dark');

        } else {
            $('nav').removeClass('solid-nav');
            $('nav').addClass('navbar-light');
            $('nav').removeClass('navbar-dark');

        }

        if (scrollTop >100) {
            $('.navbar-nav li a').removeClass('nav-link');
            $('.navbar-nav li a').addClass('nav-scroll-link');
        }
        else{
            $('.navbar-nav li a').addClass('nav-link');
            $('.navbar-nav li a').removeClass('nav-scroll-link');
        }

    });
});

