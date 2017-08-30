// Main Scripts

const fStickyEltsHandler = function() {
    let $iMainMenuTopPosition = $( ".header" ).offset().top,
        $oStickyElt = $( ".header .navigation" );

    if ( $( window ).scrollTop() > $iMainMenuTopPosition ) {
        $oStickyElt.addClass( "sticky" );
    } else {
        $oStickyElt.removeClass( "sticky" );
    }
};

const fActiveEltsHandler = function() {
    let $sPageURL = $( location ).attr( "href" ),
        $oDefaultMenuItem = $( ".header .navigation__container .navigation__item:nth-child(2)" );

    $oDefaultMenuItem.siblings( ".active" ).removeClass( "active" );
    $oDefaultMenuItem.addClass( "active" );
    $( ".header .navigation__link" ).each( function() {
        if ( $sPageURL == $( this ).attr( "href" ) ) {
            $( this ).parent().siblings( ".active" ).removeClass( "active" );
            $( this ).parent().addClass( "active" );
            return;
        }
    } );
};

$( function() {

    /* Manage active class */
    // If menu loaded
    $( ".header .navigation__container .navigation__item" ).ready( function() {
        fActiveEltsHandler();
    } );

    /* Sticky elements */
    $( window ).scroll( function() {
        fStickyEltsHandler();
    } );

} );
