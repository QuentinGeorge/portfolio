<?php get_header(); ?>

<section class="index__page">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <h2 class="index__title" role="heading" aria-level="2"><?php the_title(); ?></h2>
        <header class="index__header">
            <?php the_content(); ?>
        </header>
    <?php endwhile; else: ?>
        <h2 class="index__title" role="heading" aria-level="2">Accueil</h2>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
