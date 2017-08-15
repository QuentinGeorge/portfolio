<?php
/*

    Template Name: Page de contact

*/
get_header();
 ?>

    <?php get_template_part('part', 'content'); ?>

    <section class="contact">
        <h3 class="contact__title hidden">Formulaire de contact</h3>
        <form class="contact__form" action="/contactez-moi/#wpcf7-f36-o1" method="POST">
            <fieldset>
                <legend class="contact__form__legend">Remplissez ce formulaire (Les champs munis d'une * sont obligatoires)</legend>
                <?= do_shortcode('[contact-form-7 id="36" title="Contactez-moi"]'); ?>
            </fieldset>
        </form>
    </section>

<?php get_footer(); ?>
