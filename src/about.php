<?php

/*

    Template Name: Page à propos

*/

$sAlternativePageTitle = 'À propos';

get_header();

?>

    <section class="page__content about">
        <?php include(locate_template('part-content.php')); ?>
        <nav class="about__nav page__section">
            <h3 class="about__nav__title" role="heading" aria-level="3">Voir mon CV</h3>
            <ul class="about__container">
                <li class="link__container">
                    <a class="link--button" href="<?php fThemeAsset(DATA, 'CV-Quentin-GEORGE.pdf'); ?>" rel="enclosure">Télécharger une version PDF</a>
                </li>
                <li class="link__container">
                    <a class="link--button" href="http://www.quentin-george.com/cv/" hreflang="en" title="En anglais" rel="external">Voir mon projet CV en ligne</a>
                </li>
            </ul>
        </nav>
    </section>

<?php get_footer(); ?>
