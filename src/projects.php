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
            <article class="projects__project page__section h-item" itemscope itemtype="http://schema.org/CreativeWork">
                <?php if(has_post_thumbnail()): ?>
                    <h3 class="projects__title p-name" itemprop="name"><?php the_title(); ?></h3>
                    <a class="projects__link u-url" href="<?php the_permalink(); ?>" title="En savoir plus sur le projet" itemprop="thumbnailUrl">
                        <figure class="projects__figure u-photo" itemprop="image">
                            <?php the_post_thumbnail('medium'); ?>
                        </figure>
                    </a>
                <?php else: ?>
                    <h3 class="projects__title">
                        <a class="projects__link u-url p-name" href="<?php the_permalink(); ?>" title="En savoir plus sur le projet" itemprop="name"><?php the_title(); ?></a>
                    </h3>
                <?php endif; ?>
            </article>
        <?php endwhile; else: ?>
            <p>Il n'y a pas de projets à afficher pour le moment.</p>
        <?php endif; ?>
    </section>

<?php get_footer(); ?>
