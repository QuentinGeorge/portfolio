<?php

/*

    Template Name: Page à propos

*/

$sAlternativePageTitle = 'À propos';

get_header();

?>

    <section class="about__content">
        <?php include(locate_template('part-content.php')); ?>
        <nav class="about__nav">
            <h3 class="about__nav__title" role="heading" aria-level="3">Voir mon CV</h3>
            <ul>
                <li>
                    <a class="about__link--button" href="<?php fThemeAsset(DATA, 'CV-Quentin-GEORGE.pdf'); ?>">Télécharger une version PDF</a>
                </li>
                <li>
                    <a class="about__link--button" href="http://hepl01.cblue.be/~user27/dw/cv/" hreflang="en" title="En anglais">Voir mon projet CV en ligne</a>
                </li>
            </ul>
        </nav>
    </section>

<?php get_footer(); ?>
