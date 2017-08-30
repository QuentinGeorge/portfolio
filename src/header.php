<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- compatibility issue -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width"/>
        <title><?php wp_title(''); ?></title>
        <!-- <link rel="icon" type="image/png" href="<?php fThemeAsset(IMG, 'favicon.png'); ?>"/> -->
        <link rel="stylesheet" href="<?php fThemeAsset(STYLES, 'styles.min.css'); ?>"/>
    </head>
    <body>
        <header class="header">
            <h1 class="header__title hidden" role="heading" aria-level="1"><?php bloginfo('name') ?> - <?php the_title(); ?></h1>
            <nav class="navigation">
                <h2 class="navigation__title hidden" role="heading" aria-level="2">Navigation principale</h2>
                <ul class="navigation__container">
                    <?php $oMenuItems = fGetNavItems('header') ?>
                    <li class="navigation__item navigation__first-item">
                        <a class="navigation__link" href="<?= $oMenuItems[0]->url; ?>"><?= $oMenuItems[0]->label; ?></a>
                    </li>
                    <div class="navigation__item-container">
                        <li aria-hidden="true" class="navigation--burger">
                            <a aria-hidden="true" class="navigation--burger__link" href="#">Burger Menu</a>
                        </li>
                        <?php foreach ($oMenuItems as $key => $oItem): if($key > 0): ?>
                        <li class="navigation__item">
                            <a class="navigation__link" href="<?= $oItem->url; ?>"><?= $oItem->label; ?></a>
                            <?php if($oItem->children): ?>
                            <ul class="navigation__sub">
                                <?php foreach ($oItem->children as $oSub): ?>
                                <li class="navigation__item">
                                    <a class="navigation__link" href="<?= $oItem->url; ?>"><?= $oSub->label; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif; endforeach; ?>
                </div>
                </ul>
            </nav>
        </header>
