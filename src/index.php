<?php
/*

    Template Name: Page d'accueil

*/
get_header(); ?>

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
        <?php $oPost = new WP_Query(['posts_per_page' => 2, 'category_name' => 'epingle', 'post_type' => 'projets']); ?>
        <?php if($oPost->have_posts()): while($oPost->have_posts()): $oPost->the_post(); ?>
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
            <h3 lang="en" class="why-skill__title" role="heading" aria-level="3">Responsive Web Design</h3>
            <p>Grâce à différents principes et techniques utilisés durant leurs conceptions, mes sites s'adaptent au support sur lequel ils sont consultés afin de rendre la lecture du contenu et la navigation confortable que ce soit sur mobile, tablette ou desktop.</p>
        </article>
        <article class="why-skill">
            <h3 class="why-skill__title" role="heading" aria-level="3">Accessibilité et référencement</h3>
            <p>Il est très important pour moi de rendre mes sites accessibles au plus grand nombre. C'est d'ailleurs un droit universel reconnu par l'<abbr title="Organisation des Nations Unies">ONU</abbr> et la Commission européenne. Cela concerne les personnes handicapées (par exemple, une personne mal voyante qui surf avec un navigateur vocal) mais aussi aux utilisateurs en situation peu confortable (par exemple, quelqu'un qui surf sur son mobile avec un petit écran et en plein soleil). De plus, l'ensemble de techniques et bonnes pratiques permettant de mettre cela en &oelig;uvre aide les moteurs de recherche à comprendre le site et améliore le référencement naturel (un site bien référencé est placé dans les premiers résultats des moteurs de recherche).</p>
        </article>
        <a class="index__link--button" href="<?php the_permalink('16'); ?>">Contactez-moi&nbsp;!</a>
    </section>

<?php get_footer(); ?>
