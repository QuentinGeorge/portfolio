<?php
/*

    Template Name: Page de contact

*/
get_header();
 ?>

    <section class="contact__content">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h2 class="contact__title" role="heading" aria-level="2"><?php the_title(); ?></h2>
            <header class="contact__header">
                <?php the_content(); ?>
            </header>
        <?php endwhile; else: ?>
            <h2 class="contact__title" role="heading" aria-level="2">Contact</h2>
        <?php endif; ?>
        <form class="contact__form" action="/contactez-moi/#wpcf7-f36-o1" method="POST">
            <fieldset>
                <legend class="contact__form__legend">Remplissez ce formulaire (Les champs munis d'une * sont obligatoires)</legend>
                <?= do_shortcode('[contact-form-7 id="36" title="Contactez-moi"]'); ?>
            </fieldset>
        </form>
    </section>

<?php get_footer(); ?>
