<?php

/*

    Template Name: Page contact

*/

$sAlternativePageTitle = 'Contact';

get_header();

?>

    <section class="page__content contact">
        <?php include(locate_template('part-content.php')); ?>
        <p class="contact__legend">Remplissez ce formulaire (Les champs munis d'une * sont obligatoires)</p>
        <?= do_shortcode('[contact-form-7 id="36" title="Contactez-moi"]'); ?>
    </section>

<?php get_footer(); ?>
