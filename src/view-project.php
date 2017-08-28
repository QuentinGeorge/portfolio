<?php
/*

    Template Name: Page du projet
    Template Post Type: projets

*/
get_header(); ?>

    <section class="project__content">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h2 class="project__title" role="heading" aria-level="2"><?php the_title(); ?></h2>
            <header class="project__header">
                <?php the_content(); ?>
            </header>
        <?php endwhile; else: ?>
            <h2 class="project__title" role="heading" aria-level="2">Projet</h2>
        <?php endif; ?>
    </section>

<?php get_footer(); ?>
