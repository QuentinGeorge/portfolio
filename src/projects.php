<?php
/*

    Template Name: Page projets

*/
get_header();
 ?>

    <section class="projects__content">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h2 class="projects__title" role="heading" aria-level="2"><?php the_title(); ?></h2>
            <header class="projects__header">
                <?php the_content(); ?>
            </header>
        <?php endwhile; else: ?>
            <h2 class="projects__title" role="heading" aria-level="2">Projets</h2>
        <?php endif; ?>
        <?php $oPost = new WP_Query(['post_type' => 'projets']); ?>
        <?php if($oPost->have_posts()): while($oPost->have_posts()): $oPost->the_post(); ?>
            <article class="project">
                <?php if(has_post_thumbnail()): ?>
                    <h3 class="project__title"><?php the_title(); ?></h3>
                    <a class="project__link" href="<?php the_permalink(); ?>" title="En savoir plus sur le projet" ><?php the_post_thumbnail('medium_large'); ?></a>
                <?php else: ?>
                    <h3 class="project__title"><a class="project__link" href="<?php the_permalink(); ?>" title="En savoir plus sur le projet" ><?php the_title(); ?></a></h3>
                <?php endif; ?>
            </article>
        <?php endwhile; else: ?>
            <p>Il n'y a pas de projets à afficher pour le moment.</p>
        <?php endif; ?>
    </section>

<?php get_footer(); ?>
