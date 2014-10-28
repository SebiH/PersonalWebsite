jQuery(function($){

'use strict';

var LILITH = window.LILITH || {};

// Desktop Menu
LILITH.listenerMenu = function(){
    $('#content').append('<div id="blocker"></div>');

    // Fixed the Menu
    $('#desktop-nav').on('click', function(e){
        $(this).toggleClass('open');
        $('header, .wrap_all, #menu').toggleClass('moveNowLeft');
        $('#blocker').toggleClass('visible');
        e.preventDefault();
    });

    // Close Menu if Click on Body
    $('#blocker').on('click', function(){
        $(this).removeClass('visible');
        $('#desktop-nav').removeClass('open');
        $('header, .wrap_all, #menu').removeClass('moveNowLeft');
    });

    // Add icon for sub-menu if exist
    $('#menu li').each(function(){
        if($(this).find('> ul').length > 0) {
            $(this).addClass('has-ul').children('.sub-menu').hide();
            $(this).find('> a').append('<span class="cont"><i class="plus-icon"></i></span>');
        }
    });

    // Open SubMenu Current Page
    /*
    $('#menu li.current-menu-ancestor').each(function(){
        $(this).find('.sub-menu').first().show();
        $(this).find('a > .cont').addClass('active');
    });
    */

    $('#menu li:has(">ul")').on('click', "a[href^='#']", function(){
        $(this).find('.cont').toggleClass('active');
        $(this).find('.cont').parent().parent().find('> ul').stop(true,true).slideToggle(350, 'easeOutExpo');
        return false;
    });

    
    $('#menu li:has(">ul") > a > .cont').click(function(){
        $(this).toggleClass('active');
        $(this).parent().parent().find('> ul').stop(true,true).slideToggle(350, 'easeOutExpo');
        return false;
    });

};

// Mobile Menu
LILITH.listenerMenuMobile = function(){
    $('#mobile-nav').on('click', function(e){
        $(this).toggleClass('open');
        $('#menu').stop().slideToggle(350, 'easeOutExpo');
        e.preventDefault();
    });
};

LILITH.mobileNavEvents = function(){
    var windowWidth = $(window).width();
    // Show Menu or Hide the Menu
    if( windowWidth <= 1199 ) {
        if ($('#desktop-nav').hasClass('open')) {
            $('#desktop-nav').removeClass('open');
            $('header, .wrap_all, #menu').removeClass('moveNowLeft');
            $('#blocker').removeClass('visible');
        }
    
    } else {
        if ($('#mobile-nav').hasClass('open')) {
            $('#mobile-nav').removeClass('open');
        }   
    }
}

LILITH.fullPageHeight = function(){
    var headerH = $('header.header-menu').height();
    var num = '';
    if ($('header').css("position") === "relative") {
        num = headerH;
    } else {
        num = 0;
    }

    $('.full-container').each(function(){
        var elem = $(this);
        var winH = window.innerHeight ? window.innerHeight:$(window).height();
        elem.css({'height': ( winH - num ) + 'px'});
    });

    $('.section-full-area').each(function(){
        var elem = $(this);
        var winH = window.innerHeight ? window.innerHeight:$(window).height();
        elem.css({'height': winH + 'px'});
    });

    // Control if exist full-container
    if ( $('.full-container').length > 0) {
        // First Element
        var elem = $('.section-full-area').slice(0,1);
        var winH = window.innerHeight ? window.innerHeight:$(window).height();
        elem.css({'height': winH + 'px'});
    } else {
        // First Element
        var elem = $('.section-full-area').slice(0,1);
        var winH = window.innerHeight ? window.innerHeight:$(window).height();
        elem.css({'height': (winH - num) + 'px'});
    }

};

LILITH.normalToFull = function(){
    var headerH = $('header.header-menu').height();
    var oldHeight = $('.normal-container').attr('data-height');

    var num = '';
    if ($('header').css("position") === "relative") {
        num = headerH;
    } else {
        num = 0;
    }

    var windowWidth = $(window).width();
    $('.normal-container.responsiveFull').each(function(){
        var elem = $(this);
        var winH = window.innerHeight ? window.innerHeight:$(window).height();
        if( windowWidth <= 767 ) {
            elem.css({'height': (winH - num) + 'px'});
        } else {
            elem.css('height', oldHeight + 'px');
        }
    });
};

/* ==================================================
    MediaElements and Video Responsive
================================================== */

LILITH.mediaElements = function(){

    $('audio, video').each(function(){
        $(this).mediaelementplayer({
        // if the <video width> is not specified, this is the default
        defaultVideoWidth: 480,
        // if the <video height> is not specified, this is the default
        defaultVideoHeight: 270,
        // if set, overrides <video width>
        videoWidth: -1,
        // if set, overrides <video height>
        videoHeight: -1,
        // width of audio player
        audioWidth: 400,
        // height of audio player
        audioHeight: 50,
        // initial volume when the player starts
        startVolume: 0.8,
        // path to Flash and Silverlight plugins
        pluginPath: theme_objects.base + '/_include/js/mediaelement/',
        // name of flash file
        flashName: 'flashmediaelement.swf',
        // name of silverlight file
        silverlightName: 'silverlightmediaelement.xap',
        // useful for <audio> player loops
        loop: false,
        // enables Flash and Silverlight to resize to content size
        enableAutosize: true,
        // the order of controls you want on the control bar (and other plugins below)
        // Hide controls when playing and mouse is not over the video
        alwaysShowControls: false,
        // force iPad's native controls
        iPadUseNativeControls: false,
        // force iPhone's native controls
        iPhoneUseNativeControls: false,
        // force Android's native controls
        AndroidUseNativeControls: false,
        // forces the hour marker (##:00:00)
        alwaysShowHours: false,
        // show framecount in timecode (##:00:00:00)
        showTimecodeFrameCount: false,
        // used when showTimecodeFrameCount is set to true
        framesPerSecond: 25,
        // turns keyboard support on and off for this instance
        enableKeyboard: true,
        // when this player starts, it will pause other players
        pauseOtherPlayers: false,
        // array of keyboard commands
        keyActions: []
        });
    });

    $('.video-wrap video').each(function(){
        $(this).mediaelementplayer({
            enableKeyboard: false,
            iPadUseNativeControls: false,
            pauseOtherPlayers: false,
            iPhoneUseNativeControls: false,
            AndroidUseNativeControls: false
        });

        if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
            $(".video-section-container .mobile-video-image").show();
            $(".video-section-container .video-wrap").remove()
        }
    });

    $(".video-section-container .video-wrap").each(function (b) {
        var min_w = 1500;
        var header_height = 0;
        var vid_w_orig = 1280;
        var vid_h_orig = 720;
        
        var f = $(this).closest(".video-section-container").outerWidth();
        var e = $(this).closest(".video-section-container").outerHeight();
        $(this).width(f);
        $(this).height(e);
        var a = f / vid_w_orig;
        var d = (e - header_height) / vid_h_orig;
        var c = a > d ? a : d;
        min_w = 1280 / 720 * (e + 20);
        if (c * vid_w_orig < min_w) {
            c = min_w / vid_w_orig
        }
        $(this).find("video, .mejs-overlay, .mejs-poster").width(Math.ceil(c * vid_w_orig + 2));
        $(this).find("video, .mejs-overlay, .mejs-poster").height(Math.ceil(c * vid_h_orig + 2));
        $(this).scrollLeft(($(this).find("video").width() - f) / 2);
        $(this).find(".mejs-overlay, .mejs-poster").scrollTop(($(this).find("video").height() - (e)) / 2);
        $(this).scrollTop(($(this).find("video").height() - (e)) / 2);
    });

};

LILITH.resizeMediaElements = function(){
    var entryAudioBlog = $('.audio-thumb');
    var entryVideoBlog = $('.video-thumb');

    entryAudioBlog.each(function() { 
        $(this).css("width", $('article').width() + "px"); 
    }); 

    entryVideoBlog.each(function() { 
        $(this).css("width", $('article').width() + "px"); 
    }); 
};

LILITH.responsiveVideo = function(){
    $('.videoWrapper, .video-embed').fitVids();
};

/* ==================================================
    Accordion and Toggle
================================================== */

LILITH.accordion = function(){
    if($('.accordion-builder').length > 0 ){
        $('.accordion h3').click(function(){
            
            if($(this).parents('.accordion').hasClass('open')) return false;
            
            $(this).parents('.accordions').find('.accordion > div').slideUp(300);
            $(this).parents('.accordions').find('.accordion').removeClass('open');
            
            $(this).parents('.accordion').find('> div').slideDown(300);
            $(this).parents('.accordion').addClass('open');
            
            return false;
        });
    }
};

LILITH.toggle = function() {
    if($('.toggle-builder').length > 0 ){
        $('.toggle h3').click(function(){
            $(this).parents('.toggle').find('> div').slideToggle(300);
            $(this).parents('.toggle').toggleClass('open');
            return false;
        });
    }
};

LILITH.tabs = function(){
    if($('.tabbable').length > 0 ){
        $('.tabbable').each(function() {
            $(this).find('li').first().addClass('active');
            $(this).find('.tab-pane').first().addClass('active'); 
        });
    }
};

/* ==================================================
    Google Maps Shortcodes
================================================== */

LILITH.googleMaps = function(){
    if($('.az-map').length > 0) {

        $('.az-map').each(function(i,e){

            var $map = $(e);
            var $map_id = $map.attr('id');
            var $map_lat = $map.attr('data-map-lat');
            var $map_lon = $map.attr('data-map-lon');
            var $map_zoom = parseInt($map.attr('data-map-zoom'));
            var $map_title = $map.attr('data-map-title');
            var $map_marker_img = $map.attr('data-map-pin');
            var $map_info = $map.attr('data-map-info');

            var $map_hue = $map.attr('data-map-color');
            var $map_saturation = $map.attr('data-map-saturation');
            var $map_lightness = $map.attr('data-map-lightness');

            var $map_scroll = $map.data('map-scroll');
            var $map_drag   = $map.data('map-drag');
            var $map_zoom_control = $map.data('map-zoom-control');
            var $map_disable_doubleclick = $map.data('map-double-click');
            var $map_disable_default_ui = $map.data('map-default');
            
            
            
            var latlng = new google.maps.LatLng($map_lat, $map_lon);            
            var options = { 
                scrollwheel: $map_scroll,
                draggable: $map_drag, 
                zoomControl: $map_zoom_control,
                disableDoubleClickZoom: $map_disable_doubleclick,
                disableDefaultUI: $map_disable_default_ui,
                zoom: $map_zoom,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
            var styles = [ 
                            {
                                stylers: [
                                    { hue: $map_hue }, // Inser Your Hue Color
                                    { saturation: $map_saturation },
                                    { lightness: $map_lightness }
                                ]
                                },{
                                    featureType: "road",
                                    elementType: "geometry",
                                    stylers: [
                                        { lightness: 50 },
                                        { saturation: 0 },
                                        { visibility: "simplified" }
                                    ]
                                },{
                                    featureType: "road",
                                    elementType: "labels",
                                    stylers: [
                                        { visibility: "on" }
                                    ]
                                }
                            ];
            
            var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});
            
            var map = new google.maps.Map(document.getElementById($map_id), options);
        
            var image = $map_marker_img;
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: $map_title,
                icon: image
            });
            
            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');
            
            var contentString = $map_info;
       
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });

        });
    }
};

/* ==================================================
    Custom Select
================================================== */

LILITH.customSelect = function(){
    if($('.selectpicker').length > 0){
        $('.selectpicker').selectpicker();
    }
};

LILITH.naviNone = function(){
    var f = $('.post-type-navi');
    var n = $('li.next');
    var m = $('li.prev');
    var o = $('div.prev-blog');
    var p = $('div.next-blog');
    var r = $('li.back-blog');
    var s = $('li.back-portfolio');
    if(r.length && r.html() == '') {
        f.addClass('no-back');                                                              
    } 
    if(s.length && s.html() == '') {
        f.addClass('no-back');                                                              
    }                                        
    if(n.length && n.html() == '') {
        f.addClass('mod-col');                                        
        n.addClass('none');
        m.addClass('single');                           
    }
    if(m.length && m.html() == '') {
        f.addClass('mod-col');                                        
        m.addClass('none');
        n.addClass('single');                          
    }
    if(o.length && o.html() == '') {
        f.addClass('mod-col');                                        
        o.addClass('none');                          
    }
    if(p.length && p.html() == '') {
        f.addClass('mod-col');                                        
        p.addClass('none');                          
    }
};

LILITH.portfolio = function(){

if($('#portfolio-filter').length > 0){ 
    $('.dropmenu').on('click', function(e){
        $(this).toggleClass('open');
        
        $('.dropmenu-active').stop().slideToggle(350, 'easeOutExpo');
        
        e.preventDefault();
    });

    // Dropdown
    $('.dropmenu-active a').on('click', function(e){
        var dropdown = $(this).parents('.dropdown');
        var selected = dropdown.find('.dropmenu .selected');
        var newSelect = $(this).html();
        
        $('.dropmenu').removeClass('open');
        $('.dropmenu-active').slideUp(350, 'easeOutExpo');
        
        selected.html(newSelect);
        
        e.preventDefault();
    });
}

if($('#portfolio-items.grid-portfolio').length > 0 || $('#portfolio-items.masonry-portfolio').length > 0 ){       
    var $container = $('#portfolio-items');

    // Find it Filter has Elements
    $('#portfolio-filter ul.option-set li').each( function() {
        var filter = $(this),
            filterName = $(this).find('a').attr('class'),
            portfolioItems = $('#portfolio-items');
        
        portfolioItems.find('.single-portfolio').each( function() {
            if ( $(this).hasClass(filterName) ) {
                filter.addClass('has-items');
            }
        });
    });

    $container.imagesLoaded(function() {
        $container.isotope({
          // options
          itemSelector : '.single-portfolio'
        });
    }).done( function( instance ) {
        $('.single-portfolio').each(function(i){
            $(this).find('.portfolio-photo').delay(i*90).queue(function(){
                $(this).addClass('fade_in animate');
            });
        });
    });
    
    // $container.isotope('layout');

    // filter items when filter link is clicked
    var $optionSets = $('#portfolio-filter .option-set'),
        $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');

        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options );
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }

        return false;
    });
}
};

LILITH.stripedPortfolio = function() {
if($('#portfolio-items.striped').length > 0){ 
    var $container = $('#portfolio-items');
    var windowWidth = $(window).width();
    var headerH = $('header.header-menu').height();

    $container.imagesLoaded(function() {
        $('.single-portfolio').each(function(i){
            $(this).find('.portfolio-photo').delay(i*90).queue(function(){
                $(this).addClass('fade_in animate');
            });
        });
    });

    if( windowWidth >= 1200 ) {
        $('.single-portfolio').each(function(){
            var elem = $(this);
            var winH = window.innerHeight ? window.innerHeight:$(window).height();
            elem.css({'height': winH + 'px'});
        });
    }

    if( windowWidth >= 768 && windowWidth <= 1199) {
        $('.single-portfolio').each(function(){
            var elem = $(this);
            var winH = window.innerHeight ? window.innerHeight:$(window).height();
            elem.css({'height': winH / 2 + 'px'});
        });

        // First Two Elements
        var elem = $('.single-portfolio').slice(0,2);
        var winH = window.innerHeight ? window.innerHeight:$(window).height();
        var result = winH - headerH - 30;
        elem.css({'height': result / 2 + 'px'});
    }

    if( windowWidth >= 320 && windowWidth <= 767 ) {
        $('.single-portfolio').each(function(){
            var elem = $(this);
            var winH = window.innerHeight ? window.innerHeight:$(window).height();
            elem.css({'height': winH + 'px'});
        });

        // First Element
        var elem = $('.single-portfolio').slice(0,1);
        var winH = window.innerHeight ? window.innerHeight:$(window).height();
        var result = winH - headerH;
        elem.css({'height': result + 'px'});
    }
}
};

LILITH.stripedScrollPortfolio = function() {
if($('#portfolio-items.striped-scroll').length > 0){ 
    LILITH.scrollLeft();
    LILITH.ulWidhtSize();

    var $container = $('#portfolio-items');
    var windowWidth = $(window).width();
    var headerH = $('header.header-menu').height();

    $container.imagesLoaded(function() {
        $('.single-portfolio').each(function(i){
            $(this).find('.portfolio-photo').delay(i*90).queue(function(){
                $(this).addClass('fade_in animate');
            });
        });
    });

    if( windowWidth >= 1200 ) {

        $('.single-portfolio').each(function(){
            var elem = $(this);
            var winH = window.innerHeight ? window.innerHeight:$(window).height();
            elem.css({'height': winH + 'px'});
        });
    }

    if( windowWidth >= 768 && windowWidth <= 1199) {

        $('.single-portfolio').each(function(){
            var elem = $(this);
            var winH = window.innerHeight ? window.innerHeight:$(window).height();
            elem.css({'height': winH / 2 + 'px'});
        });

        // First Two Elements
        var elem = $('.single-portfolio').slice(0,2);
        var winH = window.innerHeight ? window.innerHeight:$(window).height();
        var result = winH - headerH - 30;
        elem.css({'height': result / 2 + 'px'});
    }

    if( windowWidth >= 320 && windowWidth <= 767 ) {

        $('.single-portfolio').each(function(){
            var elem = $(this);
            var winH = window.innerHeight ? window.innerHeight:$(window).height();
            elem.css({'height': winH + 'px'});
        });

        // First Element
        var elem = $('.single-portfolio').slice(0,1);
        var winH = window.innerHeight ? window.innerHeight:$(window).height();
        var result = winH - headerH;
        elem.css({'height': result + 'px'});
    }
}
};


LILITH.scrollLeft = function() {
    var windowWidth = $(window).width();
    $('body, #content').css('overflow','visible');

    if( windowWidth >= 1199 ) {
        $("body, html").on('mousewheel', function(event, delta) {
            if ($('body.opera').hasClass('osx')) {
                this.scrollLeft -= (delta * 3);
            }
            else if ($('body.opera').hasClass('windows')) {
                this.scrollLeft -= (delta * 120);
            } else {
                this.scrollLeft -= (delta * event.deltaFactor);
            }
            event.preventDefault();
        });
    } else {
        $("body, html").unmousewheel();
    }
};

LILITH.ulWidhtSize = function(){
    var ul = $('#projects');
    var ulWidth = 0;
    $('#portfolio-items.striped-scroll .col-fixed').each(function(){
        ulWidth = ulWidth + $(this).width();
    });
    $('#portfolio-items.striped-scroll ul').css({'width' : ulWidth + 'px'});
};

LILITH.masonryBlog = function(){
    if($('.masonry-blog').length > 0){ 
        var $container = $('.masonry-area');

        $container.imagesLoaded(function() {
            $container.isotope({
              itemSelector : '.item-blog'
            });
        }).done( function( instance ) {
            $('.item-blog').each(function(i){
                $(this).find('.post-container').delay(i*90).queue(function(){
                    $(this).addClass('fade_in animate');
                });
            });
        });

        // $container.isotope('layout');
    }
};


/* ==================================================
   FancyBox
================================================== */

LILITH.fancyBox = function(){
    if($('.fancybox-thumb').length > 0 || $('.fancybox-media').length > 0 || $('.fancybox-various').length > 0){
        
        $(".fancybox-thumb").fancybox({             
            padding : 0,
            openMethod: 'zoomIn',
            closeMethod: 'zoomOut',
            nextEasing: 'easeInQuad',
            prevEasing: 'easeInQuad',
            helpers : {
                title : { type: 'inside' }
            },
            afterLoad : function() {
                this.title = '<span class="counter-img">' + (this.index + 1) + ' / ' + this.group.length + '</span>' + (this.title ? '' + this.title : '');
            },
            beforeShow: function(){
                $(window).on({
                    'resize.fancybox' : function(){
                        $.fancybox.update();
                    }
                });
            },
            afterClose: function(){
                $(window).off('resize.fancybox');
            }
        });
            
        $('.fancybox-media').fancybox({
            padding : 0,
            helpers : {
                media : true
            },
            openMethod: 'zoomIn',
            closeMethod: 'zoomOut',
            nextEasing: 'easeInQuad',
            prevEasing: 'easeInQuad',
            width       : 800,
            height      : 450,
            aspectRatio : true,
            scrolling   : 'no',
            beforeShow: function(){
                $(window).on({
                    'resize.fancybox' : function(){
                        $.fancybox.update();
                    }
                });
            },
            afterClose: function(){
                $(window).off('resize.fancybox');
            }
        });
        
        $(".fancybox-various").fancybox({
            maxWidth    : 800,
            maxHeight   : 600,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openMethod: 'zoomIn',
            closeMethod: 'zoomOut',
            nextEasing: 'easeInQuad',
            prevEasing: 'easeInQuad'
        });
    }
};

/* ==================================================
    Scroll Btn
================================================== */

LILITH.scrollBtnFullArea = function(){
    $('.scroll-btn-full-area').on('click', function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
            || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
               if (target.length) {
                $('html,body').animate({
                     scrollTop: target.offset().top
                }, 1000, 'easeOutExpo');
                return false;
            }
        }
    });
};

LILITH.scrollBtnHeaderPage = function(){
    $('.scroll-btn-full-area.metabox-header').on('click', function(e) {
        e.preventDefault();
        $('html,body').animate({scrollTop: $('.main-content').first().offset().top}, 1000, 'easeOutExpo');
    });
};

/* ==================================================
   Tooltip
================================================== */

LILITH.toolTip = function(){ 
    $('a[data-toggle=tooltip]').tooltip();
};

/* ==================================================
   Progress Bar Animated 
================================================== */

LILITH.progressBar = function(){
    if($('.bar.animable').length > 0 ){
        $('.bar.animable').each(function() {
            var percent = $(this).data('percent');
            $(this).appear(function() {
                $(this).animate({width: percent+'%'},1000, 'easeOutExpo');
            });    
        });
    }
};

/* ==================================================
   Circular Graph 
================================================== */

LILITH.circularGraph = function(){
    if($('.chart').length > 0 ){
        var chart = $('.chart');
    
        $(chart).each(function() {
            $(this).appear(function() {
                var currentChart = $(this),
                    currentSize = currentChart.attr('data-size'),
                    currentLine = currentChart.attr('data-line'),
                    currentBgColor = currentChart.attr('data-bgcolor'),
                    currentTrackColor = currentChart.attr('data-trackcolor');
                currentChart.easyPieChart({
                    animate: 1000,
                    barColor: currentBgColor,
                    trackColor: currentTrackColor,
                    lineWidth: currentLine,
                    size: currentSize,
                    lineCap: 'round',
                    scaleColor: false,
                    onStep: function(value) {
                        this.$el.find('.percentage').text(~~value);
                    }
                });
            });
        });
    }   
};

/* ==================================================
   Count Number 
================================================== */

LILITH.countNumber = function(){
    if($('.counter-number').length > 0 ){
        $('.output-number').each(function() {
            var delay = $(this).data('delay');
            $(this).appear(function() {
                $(this).delay(delay).queue(function(){
                    $(this).find('.timer').countTo();
                });
            });
        });
    }
};

/* ==================================================
    Testimonial Sliders
================================================== */

LILITH.testimonial = function(){
if($('.testimonial').length > 0 ){
    $(window).load(function() {
        $('.az-testimonials.flexslider').flexslider({
            animation:"horizontal",
            easing:"swing",
            controlNav: true, 
            reverse:false,
            smoothHeight:true,
            directionNav: false,
            animationSpeed: 400 
        });
    });
}
};

/* ==================================================
    Big Twitter Feeds Slider
================================================== */

LILITH.bigTweetSlide = function(){
if($('#twitter-feed-slide .slides').length > 0 ){
    $('#twitter-feed-slide').flexslider({
        animation:"fade",
        easing:"swing",
        controlNav: false, 
        reverse:false,
        smoothHeight:true,
        directionNav: false, 
        controlsContainer: '#twitter-feed-slide',
        animationSpeed: 400
    });
}
};


/* ==================================================
    Scroll to Top
================================================== */

LILITH.scrollToTop = function(){
    var didScroll = false;
    var $arrow = $('#back-to-top');

    $(window).scroll(function() {
        didScroll = true;
    });

    if( $('.post-type-navi').length > 0 ) {
        $arrow.css({'bottom': 61 + 'px'});
    }

    setInterval(function() {
        if( didScroll ) {
            didScroll = false;

            if( $(window).scrollTop() > 1000 ) {
                $arrow.fadeIn(250, 'easeOutExpo');
            } else {
                $arrow.fadeOut(250, 'easeOutExpo');
            }
        }
    }, 250);

    $arrow.on('click', function(){
        $('body, html').animate({ scrollTop: "0" }, 750, 'easeOutExpo' );
        return false;
    });
};

/* ==================================================
    Social Share Button
================================================== */
LILITH.socialShare = function(){
    function sharePopup(url){
        var width = 600;
        var height = 400;
       
        var leftPosition, topPosition;
        leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
        topPosition = (window.screen.height / 2) - ((height / 2) + 50);
 
        var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
 
        window.open(url,'Social Share', windowFeatures);
    }
 
    $('#share-facebook').on('click', function(){
        var u = location.href;
        var t = document.title;
        sharePopup('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t));
        return false;
    });
 
 
    $('#share-twitter').on('click', function(){
        var u = location.href;
        var t = document.title+' - ';
        sharePopup('http://twitter.com/share?url='+encodeURIComponent(u)+'&text='+encodeURIComponent(t));
        return false;
    });
 
    $('#share-google').on('click', function(){
        var u = location.href;
        var t = document.title;
        sharePopup('https://plus.google.com/share?url='+encodeURIComponent(u)+'&text='+encodeURIComponent(t));
        return false;
    });

    $('#share-pinterest').on('click', function(){
        var u = location.href;
        var t = document.title;
        var bg_url = $('#content img').first().attr('src');
        sharePopup('http://www.pinterest.com/pin/create/button/?url='+encodeURIComponent(u)+'&description='+encodeURIComponent(t)+'&media='+encodeURIComponent(bg_url));
        return false;
    });
}

/* ==================================================
    Modal Social
================================================== */
LILITH.adjustModal = function() {
    $('.modal.social').each(function(){

        if($(this).hasClass('in') == false){
          $(this).show();
        };
        var contentHeight = window.innerHeight ? window.innerHeight:$(window).height() - 60;
        var headerHeight = $(this).find('.modal-header').outerHeight() || 0;
        var footerHeight = $(this).find('.modal-footer').outerHeight() || 0;

        $(this).find('.modal-content').css({
          'max-height': function () {
            return contentHeight;
          }
        });

        $(this).find('.modal-body').css({
          'max-height': function () {
            return (contentHeight - (headerHeight + footerHeight));
          }
        });

        $(this).find('.modal-dialog').css({
            'margin-top': function () {
                return -($(this).outerHeight() / 2);
            },
            'margin-left': function () {
                return -($(this).outerWidth() / 2);
            }
        });
        if($(this).hasClass('in') == false){
          $(this).hide();
        };
    });
};

/* ==================================================
    Menu Leave Page / Cache Back Button Reload
================================================== */

LILITH.leavePage = function(){
    $('header #logo a, #menu > .mm-panel li a').not('#menu > .mm-panel li a[href$="#"]').click(function(event){
        
        event.preventDefault();
        var linkLocation = this.href;

        $('.wrap_all').animate({'opacity' : 0}, 1000, 'easeOutExpo');
        
        $('.wrap_all').fadeOut(500, function(){
            window.location = linkLocation;
        });      
    }); 
};

LILITH.reloader = function(){
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload(); 
        }
    };  
};

/* ==================================================
    Animations Module
================================================== */

LILITH.animationsModule = function(){
    
    function elementViewed(element) {
        if (Modernizr.touch && $(document.documentElement).hasClass('no-animation-effects')) {
            return true;
        }
        var elem = element,
            window_top = $(window).scrollTop(),
            offset = $(elem).offset(),
            top = offset.top;
        if ($(elem).length > 0) {
            if (top + $(elem).height() >= window_top && top <= window_top + $(window).height()) {
                return true;
            } else {
                return false;
            }
        }
    };
    
    function onScrollInterval(){
        var didScroll = false;
        $(window).scroll(function(){
            didScroll = true;
        });
        
        setInterval(function(){
            if (didScroll) {
                didScroll = false;
            }
            
            if($('.animated-content').length > 0 ){
                $('.animated-content').each(function() {
                    var currentObj = $(this);
                    var delay = currentObj.data('delay');
                    if (elementViewed(currentObj)) {
                        currentObj.delay(delay).queue(function(){
                            currentObj.addClass('animate');
                        });
                    }
                });
            }
        }, 250);
    };
    
    onScrollInterval();
};

/* ==================================================
    Init
================================================== */

$(window).load(function(){
    if($('.preloader-enabled').length > 0 ){
        LILITH.leavePage();
    }
});

$(document).ready(function(){
    // Isotope Bug - Set html: overflow-y if necessary
    if ( document.querySelector('body').offsetHeight > window.innerHeight ) {
        document.documentElement.style.overflowY = 'scroll';
    }

    if($('.preloader-enabled').length > 0 ){
        
        LILITH.reloader();

        $('body').jpreLoader({
            splashID: "#jSplash",
            showSplash: true,
            showPercentage: false,
            autoClose: true,
        }, function() {             
            $('#content').delay(50).animate({'opacity' : 1}, 1000, 'easeOutExpo');
            LILITH.animationsModule();
            LILITH.portfolio();
            LILITH.stripedPortfolio();
            LILITH.stripedScrollPortfolio();
            LILITH.masonryBlog();
        });
    } else {
        LILITH.animationsModule();
        LILITH.portfolio();
        LILITH.stripedPortfolio();
        LILITH.stripedScrollPortfolio();
        LILITH.masonryBlog();
    }

    LILITH.listenerMenu();
    LILITH.listenerMenuMobile();
    LILITH.fullPageHeight();
    LILITH.normalToFull();
    LILITH.mediaElements();
    LILITH.resizeMediaElements();
    LILITH.responsiveVideo();
    LILITH.accordion();
    LILITH.toggle();
    LILITH.tabs();
    LILITH.customSelect();
    LILITH.naviNone();
    LILITH.googleMaps();
    LILITH.fancyBox();
    LILITH.scrollBtnFullArea();
    LILITH.scrollBtnHeaderPage();
    LILITH.socialShare();
    LILITH.toolTip();
    LILITH.progressBar();
    LILITH.circularGraph();
    LILITH.countNumber();
    LILITH.testimonial();
    LILITH.bigTweetSlide();
    LILITH.scrollToTop();
    LILITH.adjustModal();
});

$(window).resize(function(){
    LILITH.mobileNavEvents();
    LILITH.adjustModal();
    LILITH.fullPageHeight();
    LILITH.resizeMediaElements();
    LILITH.stripedPortfolio();
    LILITH.stripedScrollPortfolio();
    LILITH.normalToFull();

    // Resize Video Background
    $(".video-section-container .video-wrap").each(function (b) {
        var min_w = 1500;
        var header_height = 0;
        var vid_w_orig = 1280;
        var vid_h_orig = 720;
        
        var f = $(this).closest(".video-section-container").outerWidth();
        var e = $(this).closest(".video-section-container").outerHeight();
        $(this).width(f);
        $(this).height(e);
        var a = f / vid_w_orig;
        var d = (e - header_height) / vid_h_orig;
        var c = a > d ? a : d;
        min_w = 1280 / 720 * (e + 20);
        if (c * vid_w_orig < min_w) {
            c = min_w / vid_w_orig
        }
        $(this).find("video, .mejs-overlay, .mejs-poster").width(Math.ceil(c * vid_w_orig + 2));
        $(this).find("video, .mejs-overlay, .mejs-poster").height(Math.ceil(c * vid_h_orig + 2));
        $(this).scrollLeft(($(this).find("video").width() - f) / 2);
        $(this).find(".mejs-overlay, .mejs-poster").scrollTop(($(this).find("video").height() - (e)) / 2);
        $(this).scrollTop(($(this).find("video").height() - (e)) / 2);
    });
});

});
