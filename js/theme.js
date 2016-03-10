jQuery(document).ready(function($) {

    $(".button-collapse").sideNav();

    $('.slider').slider({
      full_width: true,
      height: 450
    });


    //Masonry blocks
	$blocks = $('.apartmani');

    $blocks.masonry({
      // options
      itemSelector: '.apartman',
      //columnWidth: '.grid-item',
      isAnimated: true,
      //percentPosition: true
    });

    $(document).ready( function() { setTimeout( function() { $blocks.masonry(); }, 500); });

	$(window).resize(function () {
		$blocks.masonry();
	});

});

var cbpAnimatedHeader = (function() {

var docElem = document.documentElement,
    header = document.querySelector( '#navigacija' ),
    didScroll = false,
    changeHeaderOn = 10;

function init() {
    window.addEventListener( 'scroll', function( event ) {
        if( !didScroll ) {
            didScroll = true;
            setTimeout( scrollPage, 250 );
        }
    }, false );
}

function scrollPage() {
    var sy = scrollY();
    if ( sy >= changeHeaderOn ) {
        classie.remove(header, 'navbar-base')
        classie.add( header, 'navbar-scrolled' );
    }
    else {
        classie.remove( header, 'navbar-scrolled' );
        classie.add( header, 'navbar-base' );
    }
    didScroll = false;
}

function scrollY() {
    return window.pageYOffset || docElem.scrollTop;
}

init();

})();
