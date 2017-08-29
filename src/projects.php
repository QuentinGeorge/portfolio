<?php

/*

    Template Name: Page projets

*/

$sAlternativePageTitle = 'Projets';

get_header();

?>

    <section class="page__content projects">
        <?php include(locate_template('part-content.php')); ?>
        <?php $oPost = new WP_Query(['post_type' => 'projets']); ?>
        <?php if($oPost->have_posts()): while($oPost->have_posts()): $oPost->the_post(); ?>
            <article class="projects__project page__section">
                <?php if(has_post_thumbnail()): ?>
                    <h3 class="projects__title"><?php the_title(); ?></h3>
                    <a class="projects__link" href="<?php the_permalink(); ?>" title="En savoir plus sur le projet" >
                        <figure class="projects__figure">
                            <?php the_post_thumbnail('medium_large'); ?>
                        </figure>
                    </a>
                <?php else: ?>
                    <h3 class="projects__title">
                        <a class="projects__link" href="<?php the_permalink(); ?>" title="En savoir plus sur le projet" ><?php the_title(); ?></a>
                    </h3>
                <?php endif; ?>
            </article>
        <?php endwhile; else: ?>
            <p>Il n'y a pas de projets à afficher pour le moment.</p>
        <?php endif; ?>
    </section>

<?php get_footer(); ?>
