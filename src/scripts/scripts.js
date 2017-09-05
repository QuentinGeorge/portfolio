// Main Scripts

const fActiveEltsHandler = function() {
    let $sPageURL = $( location ).attr( "href" ),
        $aNavigationItems = $( ".header .navigation__container .navigation__item" ),
        $oDefaultMenuItem = $( ".header .navigation__first-item" ),
        $aHREFLinkParts = [],
        $iHREFLinkPagePart = 0;

    // remove all active classes
    $aNavigationItems.each( function() {
        $( this ).removeClass( "active" );
    } );
    // add active class on default item (home)
    $oDefaultMenuItem.addClass( "active" );
    // for all item link which aren't home check if the url contains the page cibled by the link
    $( ".header .navigation__item-container .navigation__link" ).each( function() {
        // split the href of the link
        $aHREFLinkParts = $( this ).attr( "href" ).split( "/" );
        // set where is the page part in the array (here the last cell)
        $iHREFLinkPagePart = $aHREFLinkParts.length - 1;
        // if the last cell is empty (href last char is /) take the 2 cell from the end
        if ( $aHREFLinkParts[$iHREFLinkPagePart] === "" ) {
            $iHREFLinkPagePart--;
        }
        // if we found the page in the url manage active classes
        if ( $sPageURL.indexOf($aHREFLinkParts[$iHREFLinkPagePart]) !== -1 ) {
            // remove active from default (home)
            $oDefaultMenuItem.removeClass( "active" );
            // add active on the item wich contain the link with the matched href
            $( this ).parent().addClass( "active" );
            return;
        }
        // projects are in /projets/"projectname"/ so the link projets is matched because url contains projets
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

const fBurgerMenuAriaHandler = function() {
    let $oNavBurgerLink = $( ".header .navigation__item-container .navigation--burger__link" ),
        $oNavBurgerItem = $( ".header .navigation--burger" );

    // If we are in mobile, the burger menu should be aria-hidden true. And false if we are in desktop.
    if ( $oNavBurgerItem.css( "display" ) !== "none" ) {
        $oNavBurgerItem.attr( "aria-hidden", "false" );
    } else {
        $oNavBurgerItem.attr( "aria-hidden", "true" );
    }
    // Burger menu is not expanded if we have content hidden and if we are in mobile. If we have not content hidden or if we are in desktop it's expanded.
    if ( $( ".header .navigation__item-container" ).hasClass( "content-hidden" ) && $oNavBurgerItem.css( "display" ) !== "none" ) {
        $oNavBurgerLink.attr( "aria-expanded", "false" );
    } else {
        $oNavBurgerLink.attr( "aria-expanded", "true" );
    }
};

$( function() {
    /* Manage active class */
    // If menu loaded
    $( ".header .navigation__container .navigation__item" ).ready( function() {
        fActiveEltsHandler();
        // Manage aria attributes on load
        fBurgerMenuAriaHandler();
    } );

    /* Sticky elements */
    $( window ).scroll( function() {
        fStickyEltsHandler();
    } );

    /* Burger menu */
    $( ".header .navigation--burger__link" ).on( "click", function( oEvent ) {
        oEvent.preventDefault();

        fBurgerMenuHandler();
        fBurgerMenuAriaHandler();
    } );
    // Manage aria attributes on resize if we are in desktop version menu burger doesn't exist so it will be aria popup true and burger should be aria-hidden true
    $( window ).resize( function() {
        fBurgerMenuAriaHandler();
    } );
} );
