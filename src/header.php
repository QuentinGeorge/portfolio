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
        <link rel="icon" type="image/png" href="<?php fThemeAsset(IMG, 'favicon.png'); ?>"/>
        <link rel="stylesheet" href="<?php fThemeAsset(STYLES, 'styles.min.css'); ?>"/>
    </head>
    <body>
        <header class="header">
            <h1 class="header__title hidden" role="heading" aria-level="1"><?php bloginfo('name') ?> - <?php the_title(); ?></h1>
            <nav class="navigation">
                <h2 class="navigation__title hidden" role="heading" aria-level="2">Navigation principale</h2>
                <ul class="navigation__container">
                    <?php $oMenuItems = fGetNavItems('header'); $iMenuLength = count($oMenuItems); ?>
                    <li class="navigation__item navigation__first-item">
                        <a class="navigation__link navigation__home-link" href="<?= $oMenuItems[0]->url; ?>" rel="home">
                            <svg class="navigation__home-link__img" aria-hidden="true" role="img" viewBox="0 0 460 460" width="30" height="30">
                                <path d="M230 120.8L66 256.1c0 .2 0 .5-.1.9s-.1.7-.1.9v136.9c0 4.9 1.8 9.2 5.4 12.8 3.6 3.6 7.9 5.4 12.8 5.4h109.5V303.5h73.1V413h109.5c4.9 0 9.2-1.8 12.8-5.4s5.4-7.9 5.4-12.8v-137c0-.8-.1-1.3-.3-1.7L230 120.8z"/>
                                <path d="M456.8 225.3l-62.5-51.9V57c0-2.7-.9-4.9-2.6-6.6-1.7-1.7-3.9-2.6-6.6-2.6h-54.8c-2.7 0-4.9.9-6.6 2.6-1.7 1.7-2.6 3.9-2.6 6.6v55.7l-69.7-58.2c-6.1-4.9-13.3-7.4-21.7-7.4s-15.6 2.5-21.7 7.4L3.2 225.3c-1.9 1.5-2.9 3.6-3.1 6.1-.2 2.6.5 4.8 2 6.7l17.7 21.1c1.5 1.7 3.5 2.8 6 3.1 2.3.2 4.6-.5 6.9-2L230 95.7l197.5 164.6c1.5 1.3 3.5 2 6 2h.9c2.5-.4 4.5-1.4 6-3.1l17.7-21.1c1.5-1.9 2.2-4.1 2-6.7s-1.4-4.5-3.3-6.1z"/>
                            </svg>
                            <span class="navigation__home-link__text"><?= $oMenuItems[0]->label; ?></span>
                        </a>
                    </li>
                    <div class="navigation__item-container">
                        <li aria-hidden="false" class="navigation--burger">
                            <a class="navigation--burger__link" aria-haspopup="true" aria-expanded="true" href="#">
                                <svg class="navigation--burger__img" aria-hidden="true" role="img" viewBox="0 0 124 124" width="25" height="25">
                                    <path d="M112 6H12C5.4 6 0 11.4 0 18s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12zM112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12zM112 94H12c-6.6 0-12 5.4-12 12s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"/>
                                </svg>
                            </a>
                        </li>
                        <?php for ($i=1; $i < $iMenuLength; $i++): ?>
                        <li class="navigation__item">
                            <a class="navigation__link" href="<?= $oMenuItems[$i]->url; ?>"><?= $oMenuItems[$i]->label; ?></a>
                            <?php if($oMenuItems[$i]->children): ?>
                            <ul class="navigation__sub">
                                <?php foreach ($oMenuItems[$i]->children as $oSub): ?>
                                <li class="navigation__item">
                                    <a class="navigation__link" href="<?= $oSub->url; ?>"><?= $oSub->label; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endfor; ?>
                    </div>
                    <!-- Script inline to have burger menu open when js is not supported but close it if supported. Do it inline avoid show hide effect on page loading -->
                    <script type="text/javascript">
                        document.querySelector( ".navigation__item-container" ).classList.add( "content-hidden" );
                    </script>
                </ul>
            </nav>
        </header>
