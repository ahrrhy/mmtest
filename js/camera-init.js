(function ($) {
    $(document).ready(function () {
        $('#camera_wrap').camera({
            autoAdvance: false,
            height: '52.73%',
            minHeight: '350px',
            pagination: false,
            thumbnails: false,
            playPause: false,
            hover: false,
            loader: 'none',
            navigation: true,
            navigationHover: false,
            mobileNavHover: false,
            fx: 'simpleFade'
        });
    });
})(jQuery);