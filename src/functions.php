<?php

add_action('init', 'fRegisterTypes');
add_filter('wp_title', 'fCustomWPTitle');
add_theme_support('post-thumbnails');

// Define constants
define('INDEX_PROJECTS_OVERVIEWS_NUM', 2);

// Define folders path
define('STYLES', '/css/');
define('IMG', '/assets/img/');
define('DATA', '/assets/data/');

// Register custom post-types
function fRegisterTypes() {
    register_nav_menus([
        'header' => 'La navigation principale du site.',
        'footer' => 'La navigation du pied de page.'
    ]);
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
        'taxonomies' => ['category'],
        'supports' => ['title', 'thumbnail']
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

// Get technology term and sort by importance taxonomy
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

// Get an image from ACF plugin
function fGetACFImage($sImgField, $sImgSize = 'medium_large') {
    $sImgID = get_field($sImgField);

	return $oImg = wp_get_attachment_image($sImgID, $sImgSize);
}

// Get posts for index page
function fGetPinnedPosts() {
    $aPinnedPosts = get_posts(['posts_per_page' => INDEX_PROJECTS_OVERVIEWS_NUM, 'category_name' => 'epingle', 'post_type' => 'projets']);
    $aPosts = $aPinnedPosts;

    // if we havn't enought pinned posts add other posts wich havn't class epingle
    if (count($aPinnedPosts) < INDEX_PROJECTS_OVERVIEWS_NUM ) {
        $iNumberMissingPosts = INDEX_PROJECTS_OVERVIEWS_NUM - count($aPinnedPosts);
        // get all posts and remove duplicated values wich are already in $aPinnedPosts
        $aAllPosts = get_posts(['post_type' => 'projets']);
        foreach ($aAllPosts as $allPostsKey => $allPostsValue) {
            foreach ($aPinnedPosts as $pinnedPostsValue) {
                if ($allPostsValue->ID === $pinnedPostsValue->ID) {
                    unset($aAllPosts[$allPostsKey]);
                }
            }
        }
        // keep only the exact number of missing posts
        $aOtherPosts = array_slice($aAllPosts, 0, $iNumberMissingPosts);
        // merge the 2 arrays
        $aPosts = array_merge($aPinnedPosts, $aOtherPosts);
    }

    // get ids of posts
    foreach ($aPosts as $key => $value) {
        $aPostsID[$key] = $value->ID;
    }

    // return posts by selected ids
    return new WP_Query(['posts_per_page' => INDEX_PROJECTS_OVERVIEWS_NUM, 'post__in' => $aPostsID, 'post_type' => 'projets']);
}
