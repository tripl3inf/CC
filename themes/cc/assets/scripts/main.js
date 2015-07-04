/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function ($) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage = {
        // All pages
        'common': {
            init: function () {
                // JavaScript to be fired on all pages


            },
            finalize: function () {
                // JavaScript to be fired on all pages, after page specific JS is fired
            }
        },
        // Home page
        'home': {
            init: function () {
                // JavaScript to be fired on the home page

                $('#frontpage').fullpage({
                    //Navigation
                    menu: false,
                    lockAnchors: false,
                    navigation: true,
                    anchors: ['pane1', 'pane2', 'pane3'],
                    navigationPosition: 'right',
                    showActiveTooltip: true,
                    navigationTooltips: ['First', 'Second', 'Third'],

                    //Scrolling
                    css3: true,
                    //scrollBar: false,
                    easing: 'easeInOutCubic',
                    easingcss3: 'ease',
                    continuousVertical: false,
                    scrollOverflow: false,

                    //Design
                    //sectionsColor: ['#C63D0F', '#1BBC9B', '#7E8F7C'],
                    controlArrows: true,
                    resize: false,
                    //paddingTop: '3em',
                    //paddingBottom: '10px',
                    //fixedElements: '#header, .footer',
                    //responsiveWidth: 0,
                    responsiveHeight: 0,

                    //Custom selectors
                    sectionSelector: '.section',
                    slideSelector: '.slide',
                });

            },
            finalize: function () {
                // JavaScript to be fired on the home page, after the init JS
            }
        },
        // About us page, note the change from about-us to about_us.
        'dashboard': {
            init: function () {


                $('#side-menu').metisMenu();


                //Loads the correct sidebar on window load,
                //collapses the sidebar on window resize.
                // Sets the min-height of #page-wrapper to window size
                $(window).bind("load resize", function () {
                    topOffset = 50;
                    width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
                    if (width < 768) {
                        $('div.navbar-collapse').addClass('collapse');
                        topOffset = 100; // 2-row-menu
                    } else {
                        $('div.navbar-collapse').removeClass('collapse');
                    }

                    height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
                    height = height - topOffset;
                    if (height < 1) height = 1;
                    if (height > topOffset) {
                        $("#page-wrapper").css("min-height", (height) + "px");
                    }
                });

                var url = window.location;
                var element = $('ul.nav a').filter(function () {
                    return this.href == url || url.href.indexOf(this.href) == 0;
                }).addClass('active').parent().parent().addClass('in').parent();
                if (element.is('li')) {
                    element.addClass('active');
                }
            }
        }
    };

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function (func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function () {
            // Fire common init JS
            UTIL.fire('common');

            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };

    // Load Events
    $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
