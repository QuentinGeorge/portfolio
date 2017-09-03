// Main Scripts

const fActiveEltsHandler = function() {
    let $sPageURL = $( location ).attr( "href" ),
        $aNavigationItems = $( ".header .navigation__container .navigation__item" ),
        $oDefaultMenuItem = $( ".header .navigation__item-container li:nth-child(2)" );

    $aNavigationItems.each( function() {
        $( this ).removeClass( "active" ); // remove all active classes
    } );
    $oDefaultMenuItem.addClass( "active" ); // add active class on default item
    $( ".header .navigation__link" ).each( function() {
        // compare url with menu items href and put active class on the good item
        if ( $sPageURL == $( this ).attr( "href" ) ) {
            $oDefaultMenuItem.removeClass( "active" ); // all active class are removed but don't forget the default if it's anothe page
            $( this ).parent().addClass( "active" );
            return;
        }
    } );
};

const fStickyEltsHandler = function() {
    let $iMainMenuTopPosition = $( ".header" ).offset().top,
        $oStickyElt = $( ".header .navigation" );

    if ( $( window ).scrollTop() > $iMainMenuTopPosition ) {
        $oStickyElt.addClass( "sticky" );
    } else {
        $oStickyElt.removeClass( "sticky" );
    }
};

const fBurgerMenuHandler = function() {
    let $oItemContainer = $( ".header .navigation__item-container" );

    if ( $oItemContainer.hasClass( "content-hidden" ) ) {
        $oItemContainer.removeClass( "content-hidden" );
    } else {
        $oItemContainer.addClass( "content-hidden" );
    }
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

    /* Burger menu */
    $( ".header .navigation--burger__link" ).on( "click", function( oEvent ) {
        oEvent.preventDefault();

        fBurgerMenuHandler();
    } );
} );
