;(function ($) {
    $(document).ready(function () {
        // This is mobile menu
        var menuToggle = $('#menu-toggle'),
            menuList = $($('.menu-menu-1-container')[0]);
        if (menuToggle) {
            menuToggle.on('click', function () {
                menuToggle.toggleClass('active');
                menuList.toggleClass('active');
            });
        }
        // This is sticky menu
        var headerBox = $('.header-box')[0],
            documentMinimumWidth = 980;
        window.onscroll = function() {
            if ($(window).width() > documentMinimumWidth) {
                myFunction();
            }
        };
        var sticky = headerBox.offsetTop + 200;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                $(headerBox).addClass("active nav-bg");
            } else {
                $(headerBox).removeClass("active nav-bg");
            }
        }
    });
})(jQuery);

(function ($) {
    $(document).ready(function () {
        var arrowTop = $('#toTop'),
            $header = $('#masthead'),
            documentMinimumWidth = 980;

        $(window).scroll(function () {
            if ($(window).scrollTop() > $header.innerHeight()) {
                arrowTop.css('display', 'block');
            } else {
                arrowTop.css('display', 'none');
            }
        });

        arrowTop.on('click', function () {
            var offset = $header.offset();
            $('html, body').animate({ scrollTop: -56 }, 'slow');
            return false;
        });
    });
})(jQuery);