<?php

add_action('init', 'fRegisterTypes');
add_filter('wp_title', 'fCustomWPTitle');
add_theme_support('post-thumbnails');

// Define folders path
define('STYLES', '/css/');
define('IMG', '/assets/img/');
define('FONTS', '/assets/fonts/');
define('DATA', '/assets/data/');

// Register custom post-types
function fRegisterTypes() {
    register_nav_menus(array(
        'header' => 'La navigation principale du site.',
        'footer' => 'La navigation du pied de page.'
    ));
    register_post_type('projets', [
        'label' => 'Projets',
        'labels' => [
            'singular_name' => 'projet',
            'add_new_item' => 'Ajouter un nouveau projet'
        ],
        'desription' => 'Permet d\'afficher les projets présentés sur le site.',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-art',
        'taxonomies' => array('category'),
        'supports' => array('title', 'editor', 'thumbnail')
    ]);
}

// Display title
function fCustomWPTitle($sTitle) {
    if (empty($sTitle)) {
        $sTitle = 'Accueil';
    }
    $sTitle .= ' - ' . get_bloginfo('name');
    return trim($sTitle);
}

// Get the absolute URI for assets
function fGetThemeAsset($sAssetMainFolder = '', $sAssetSRC = '') {
    return get_template_directory_uri() . $sAssetMainFolder . trim($sAssetSRC, '/');
}

// Display the absolute URI for given asset
function fThemeAsset($sAssetMainFolder = '', $sAssetSRC = '') {
    echo fGetThemeAsset($sAssetMainFolder, $sAssetSRC);
}

// Get navigation ID
function fGetNavID($sLocation) {
    foreach (get_nav_menu_locations() as $navLocation => $id) {
        if($navLocation == $sLocation) return $id;
    }
    return false;
}

// Get navigation links
function fGetNavItems($sLocation) {
    $sID = fGetNavID($sLocation);
    $aNav = [];
    $aChildren = [];

    if (!$sID) return [];
    foreach (wp_get_nav_menu_items($sID) as $oMenuItem) {
        $oItem = new stdClass();
        $oItem->id = $oMenuItem->ID;
        $oItem->url = $oMenuItem->url;
        $oItem->label = $oMenuItem->title;
        $oItem->parent = intval($oMenuItem->menu_item_parent);
        $oItem->children = [];
        if ($oItem->parent) $aChildren[] = $oItem;
        else array_push($aNav, $oItem);
    }
    foreach ($aChildren as $oItem) {
        $aNav[$oItem->parent]->children[] = $oItem;
    }
    return $aNav;
}
