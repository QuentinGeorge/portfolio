<?php get_header(); ?>

    <section class="index__content">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h2 class="index__title" role="heading" aria-level="2"><?php the_title(); ?></h2>
            <header class="index__header">
                <?php the_content(); ?>
            </header>
        <?php endwhile; else: ?>
            <h2 class="index__title" role="heading" aria-level="2">Accueil</h2>
        <?php endif; ?>
    </section>
    <section class="index__content">
        <h2 class="index__title" role="heading" aria-level="2">Quelques projets</h2>
        <?php $posts = new WP_Query(['posts_per_page' => 2, 'category_name' => 'epingle', 'post_type' => 'projets']); // $post is already used by wordpress ?>
        <?php if($posts->have_posts()): while($posts->have_posts()): $posts->the_post(); ?>
            <article class="project">
                <?php if(has_post_thumbnail()): ?>
                    <h3 class="project__title"><?php the_title(); ?></h3>
                    <a class="project__link" href="<?php the_permalink(); ?>" title="En savoir plus sur le projet" ><?php the_post_thumbnail('medium'); ?></a>
                <?php else: ?>
                    <h3 class="project__title"><a class="project__link" href="<?php the_permalink(); ?>" title="En savoir plus sur le projet" ><?php the_title(); ?></a></h3>
                <?php endif; ?>
            </article>
        <?php endwhile; else: ?>
            <p>Il n'y a pas de projets à afficher pour le moment.</p>
        <?php endif; ?>
        <a class="index__link--button" href="<?php the_permalink('12'); ?>">Voir tous mes projets</a>
    </section>
    <section class="index__content">
        <h2 class="index__title" role="heading" aria-level="2">Pourquoi moi&nbsp;?</h2>
        <article class="why-skill">
            <h3 class="why-skill__title" role="heading" aria-level="3">J'aime le chocolat</h3>
            <p>Le chocolat c'est bon et ça fond dans la bouche</p>
        </article>
        <a class="index__link--button" href="<?php the_permalink('16'); ?>">Me contacter</a>
    </section>

<?php get_footer(); ?>
