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
                    <?php foreach (fGetNavItems('header') as $oItem): ?>
                    <li class="navigation__item">
                        <a href="<?= $oItem->url; ?>" class="navigation__link"><?= $oItem->label; ?></a>
                        <?php if($oItem->children): ?>
                        <ul class="navigation__sub">
                            <?php foreach ($oItem->children as $oSub): ?>
                            <li class="navigation__item">
                                <a href="<?= $oItem->url; ?>" class="navigation__link"><?= $oSub->label; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
                </ul>
            </nav>
        </header>
