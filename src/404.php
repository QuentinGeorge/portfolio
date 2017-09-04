<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- compatibility issue -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width"/>
        <title>404 - Quentin George</title>
        <link rel="icon" type="image/png" href="<?php fThemeAsset(IMG, 'favicon.png'); ?>"/>
        <link rel="stylesheet" href="<?php fThemeAsset(STYLES, 'styles.min.css'); ?>"/>
    </head>
    <body class="error404">
        <section class="error404__page page__content">
            <h2 class="error404__title" role="heading" aria-level="2">Oops, erreur 404&nbsp;!</h2>
            <p class="error404__desc">La page demandée n'est pas disponible</p>
            <p class="error404__back">Revenir à <a class="error404__link" href="<?php echo home_url('/');?>" rel="home">la page d'accueil</a></p>
        </section>
    </body>
</html>
