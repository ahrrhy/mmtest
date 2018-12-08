(function ($) {
    $(window).on('scroll resize',function(){
        var wH = $(window).height(),
            wT = $(window).scrollTop();
        $('.js-timeline-cell').not('.on').each(function(){
            if($(this).offset().top <= wT + wH* .75){
                $(this).addClass('on');
            }
        });
    }).triggerHandler('scroll');
})(jQuery);
