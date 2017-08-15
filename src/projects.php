<?php
/*

    Template Name: Page projets

*/
get_header();
 ?>

    <section class="projects__page">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h2 class="projects__title" role="heading" aria-level="2"><?php the_title(); ?></h2>
            <header class="projects__header">
                <?php the_content(); ?>
            </header>
        <?php endwhile; else: ?>
            <h2 class="projects__title" role="heading" aria-level="2">Projets</h2>
        <?php endif; ?>
    </section>

<?php get_footer(); ?>
