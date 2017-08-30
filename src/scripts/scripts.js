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

const fBurgerMenuShowItems = function() {
    $( ".header .navigation__item-container" ).removeClass( "hide" );
    $( ".header .navigation--burger" ).siblings().show();
};

const fBurgerMenuHideItems = function() {
    $( ".header .navigation__item-container" ).addClass( "hide" );
    $( ".header .navigation--burger" ).siblings().hide();
};

const fBurgerMenuHandler = function() {
    if ( $( ".header .navigation__item-container" ).hasClass( "hide" ) ) {
        fBurgerMenuShowItems();
    } else if ( $( ".header .navigation--burger" ).css( "display" ) !== "none" ) {
        fBurgerMenuHideItems();
    }
};

const fBurgerMenuHandlerOnResize = function() {
    if ( $( ".header .navigation__item-container" ).hasClass( "hide" ) && $( ".header .navigation--burger" ).css( "display" ) == "none" ) {
        fBurgerMenuShowItems();
    } else if ( !$( ".header .navigation__item-container" ).hasClass( "hide" ) && $( ".header .navigation--burger" ).css( "display" ) !== "none" ) {
        fBurgerMenuHideItems();
    }
};

$( function() {
    /* Manage active class */
    // If menu loaded
    $( ".header .navigation__container .navigation__item" ).ready( function() {
        fActiveEltsHandler();
        // if mobile, hide menu burger on load
        fBurgerMenuHandler();
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
    // if resize window further than mobile size .navigation--burger is on display: none so we have to show items
    $( window ).resize( function() {
        fBurgerMenuHandlerOnResize();
    } );
} );
