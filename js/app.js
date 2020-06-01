
(function ($) {
    
    $(document).ready(function () {
        var dom = {
            $window: $(window),
            $body: $('body'),
            $navToggle: $('.nav-toggle'),
            $skipToContent: $('.skip-to-content')
        };

        (function init() {
            // Hamburger
            dom.$navToggle.click(function() {
                dom.$body.toggleClass('nav-open');
            });

            dom.$skipToContent.click(function() {
                var vheight = $(window).height();
                $('html, body').animate({
                    scrollTop: ((Math.floor($(window).scrollTop() / vheight)+1) * vheight) + 1
                }, 500); 
            });

            // init Isotope
            var $grid = $('.works-grid').isotope({
                layoutMode: 'fitRows'
            });

            // filter items on button click
            var filters = {};

            $('.works-filters').on( 'click', 'button', function() {
                var $this = $(this);
                if($this.attr('data-filter') === '*') {
                    filters = {};
                    filterValue = concatValues( filters );
                    $grid.isotope({ filter: filterValue });
                    $('.works-filters button').removeClass('active');
                    $(this).addClass('active');
                }
                else {
                    $('.works-filters button[data-filter="*"].active').removeClass('active');
                    // get group key
                    var $buttonGroup = $this.parents('.button-group');
                    $buttonGroup.find('button').removeClass('active');
                    $(this).addClass('active');
                    var filterGroup = $buttonGroup.attr('data-filter-group');
                    // set filter for group
                    filters[ filterGroup ] = $this.attr('data-filter');
                    // combine filters
                    var filterValue = concatValues( filters );
                    $grid.isotope({ filter: filterValue });
                }
            });

            // Toggle Collapsed Header
            var winH = dom.$window.height() / 2;   // Get the window height.
            var isBodyPage = false;
            if(dom.$body.hasClass('home')) {
                isBodyPage = true;
                winH = dom.$window.height();
            }
            dom.$window.on("scroll", function () {
                if ($(this).scrollTop() > winH ) {
                    dom.$body.addClass("header-collapsed");
                } else {
                    dom.$body.removeClass("header-collapsed");
                }
            }).on("resize", function(){ // If the user resizes the window
                if(isBodyPage) {
                    winH = $(this).height(); // you'll need the new height value
                } else {
                    winH = $(this).height() /2 ;
                }
            });

        })();

        // flatten object by concatting values
        function concatValues( obj ) {
            var value = '';
            for ( var prop in obj ) {
            value += obj[ prop ];
            }
            return value;
        }

    });
}(jQuery));