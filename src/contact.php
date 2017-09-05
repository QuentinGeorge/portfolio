<?php

/*

    Template Name: Page contact

*/

$sAlternativePageTitle = 'Contact';

get_header();

?>

    <section class="page__content contact">
        <?php include(locate_template('part-content.php')); ?>
        <form class="contact__form" action="#wpcf7-f36-o1" method="POST">
            <fieldset>
                <legend class="contact__form__legend">Remplissez ce formulaire (Les champs munis d'une * sont obligatoires)</legend>
                <?= do_shortcode('[contact-form-7 id="36" title="Contactez-moi"]'); ?>
            </fieldset>
        </form>
    </section>

<?php get_footer(); ?>
