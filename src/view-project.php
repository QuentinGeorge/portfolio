<?php

/*

    Template Name: Page du projet
    Template Post Type: projets

*/

$sAlternativePageTitle = 'Projet';

get_header();

?>

    <section class="project__content">
        <?php include(locate_template('part-content.php')); ?>
    </section>

<?php get_footer(); ?>
