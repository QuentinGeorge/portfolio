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
        'supports' => array('title', 'thumbnail')
    ]);
    register_taxonomy('tech', 'projets', [
        'label' => 'Technologies',
        'labels' => [
            'singular_name' => 'Technologie',
            'edit_item' => 'Editer la technologie',
            'add_new_item' => 'Ajouter une nouvelle technologie'
        ],
        'desription' => 'Permet de préciser une technologie utilisée pour réaliser ce projet.',
        'public' => true,
        'hierarchical' => true
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

function fSortTermsByImportanceFieldValue($oTerm1, $oTerm2) {
    if ($oTerm1->importance == $oTerm2->importance) {
        return 0;
    }
    return ($oTerm1->importance < $oTerm2->importance) ? -1 : 1;
}

function fSortTechnologies($aTerms) {
    $aTech = $aTerms;
    $aChildTerms = [];

    // sort elements
    usort($aTech, 'fSortTermsByImportanceFieldValue');

    // move elements childs from tech array to child array
    foreach ($aTech as $key => $value) {
        if ($value->parent !== 0) {
            if (!isset($aChildTerms[$value->parent])) {
                $aChildTerms[$value->parent] = array('0' => $value);
            } else {
                array_push($aChildTerms[$value->parent], $value);
            }
            unset($aTech[$key]);
        }
    }
    // put elements childs inside their parent
    if (!empty($aChildTerms)) {
        foreach ($aChildTerms as $childKey => $children) {
            foreach ($aTech as $parent) {
                if ($parent->term_id == $childKey) {
                    $parent->children = $children;
                    break;
                }
            }
        }
    }

    return $aTech;
}

function fGetTechnologies() {
    $aTerms = wp_get_post_terms(get_the_ID(), 'tech', ['orderby' => 'name', 'order' => 'ASC', 'fields' => 'all' ]);

    // get the importance field from ACF Extention
    foreach ($aTerms as $value) {
        $oImportance = get_field('importance', $value);
        if (isset($oImportance)) {
            $value->importance = $oImportance;
        } else {
            $value->importance = 999;
        }
    }

    return $aTechnologies = fSortTechnologies($aTerms);
}

function fGetACFImage($sImgField, $sImgSize = 'medium_large') {
    $sImgID = get_field($sImgField);

	return $oImg = wp_get_attachment_image($sImgID, $sImgSize);
}
