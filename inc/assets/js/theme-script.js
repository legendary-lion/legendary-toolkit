jQuery( function ( $ ) {
    'use strict';
    // here for each comment reply link of WordPress
    $( '.comment-reply-link' ).addClass( 'btn btn-primary' );

    // here for the submit button of the comment reply form
    $( '#commentsubmit' ).addClass( 'btn btn-primary' );

    // The WordPress Default Widgets
    // Now we'll add some classes for the WordPress default widgets - let's go

    // the search widget
    $( '.widget_search input.search-field' ).addClass( 'form-control' );
    $( '.widget_search input.search-submit' ).addClass( 'btn btn-default' );
    $( '.variations_form .variations .value > select' ).addClass( 'form-control' );
    $( '.widget_rss ul' ).addClass( 'media-list' );

    $( '.widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul, .widget_product_categories ul' ).addClass( 'nav flex-column' );
    $( '.widget_meta ul li, .widget_recent_entries ul li, .widget_archive ul li, .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_product_categories ul li' ).addClass( 'nav-item' );
    $( '.widget_meta ul li a, .widget_recent_entries ul li a, .widget_archive ul li a, .widget_categories ul li a, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_product_categories ul li a' ).addClass( 'nav-link' );

    $( '.widget_recent_comments ul#recentcomments' ).css( 'list-style', 'none').css( 'padding-left', '0' );
    $( '.widget_recent_comments ul#recentcomments li' ).css( 'padding', '5px 15px');

    $( 'table#wp-calendar' ).addClass( 'table table-striped');

    // Adding Class to contact form 7 form
    $('.wpcf7-form-control').not(".wpcf7-submit, .wpcf7-acceptance, .wpcf7-file, .wpcf7-radio").addClass('form-control');
    $('.wpcf7-submit').addClass('btn btn-primary');

    // Adding Class to Woocommerce form
    $('.woocommerce-Input--text, .woocommerce-Input--email, .woocommerce-Input--password').addClass('form-control');
    $('.woocommerce-Button.button').addClass('btn btn-primary mt-2').removeClass('button');

    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).parent().siblings().removeClass('open');
        $(this).parent().toggleClass('open');
    });

    // Fix woocommerce checkout layout
    $('#customer_details .col-1').addClass('col-12').removeClass('col-1');
    $('#customer_details .col-2').addClass('col-12').removeClass('col-2');
    $('.woocommerce-MyAccount-content .col-1').addClass('col-12').removeClass('col-1');
    $('.woocommerce-MyAccount-content .col-2').addClass('col-12').removeClass('col-2');

    // Add Option to add Fullwidth Section
    function fullWidthSection(){
        var screenWidth = $(window).width();
        if ($('.entry-content').length) {
            var leftoffset = $('.entry-content').offset().left;
        }else{
            var leftoffset = 0;
        }
        $('.full-bleed-section').css({
            'position': 'relative',
            'left': '-'+leftoffset+'px',
            'box-sizing': 'border-box',
            'width': screenWidth,
        });
    }
    fullWidthSection();

    function page_full_height() {

        // set a variable to hold the content height
        var non_content_height = 0;

        // check each main element for the height to calculate away from the content area min-height
        if($('.top-bar-content').length){
            // console.log("$('.top-bar-content').outerHeight()" + $('.top-bar-content').outerHeight());
            non_content_height += $('.top-bar-content').outerHeight();
        }
        if($('#masthead').length){
            // console.log("$('#masthead').outerHeight()" + $('#masthead').outerHeight());
            non_content_height += $('#masthead').outerHeight(); 
        }
        if($('#page_title').length){
            // console.log("$('#page_title').outerHeight()" + $('#page_title').outerHeight());
            non_content_height += $('#page_title').outerHeight();
        }
        if($('#footer').length){
            // console.log("$('#footer').outerHeight()" + $('#footer').outerHeight());
            non_content_height += $('#footer').outerHeight();
        }
        if($('#wpadminbar').length){
            // console.log("$('#wpadminbar').outerHeight()" + $('#wpadminbar').outerHeight());
            non_content_height += $('#wpadminbar').outerHeight();
        }
        var content_height = $(window).height() - non_content_height;
        content_height = (content_height < 0 ) ? 0 : content_height;
        // console.log('content_height' + content_height);
        $('#content').css('min-height', `${content_height}px`);
    }
    page_full_height();
    
    $( window ).resize(function() {
        fullWidthSection();
        page_full_height();
    });

    // Allow smooth scroll
    $('.page-scroller').on('click', function (e) {
        e.preventDefault();
        var target = this.hash;
        var $target = $(target);
        $('html, body').animate({
            'scrollTop': $target.offset().top
        }, 1000, 'swing');
    });
});