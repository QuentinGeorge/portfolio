<?php

/*

    Template Name: Page d'accueil

*/

$sAlternativePageTitle = 'Accueil';  // use in part-content.php if the page has no title defined by WP

get_header();

?>

    <section class="page__content">
        <?php include(locate_template('part-content.php')); ?>
        <!-- coold use: get_template_part('part', 'content'); instead but with this way we can have access to the variable $sAlternativePageTitle in part-content.php -->
        <section class="index__content">
            <h3 class="index__title" role="heading" aria-level="2">Quelques projets</h3>
            <?php $oPost = new WP_Query(['posts_per_page' => 2, 'category_name' => 'epingle', 'post_type' => 'projets']); ?>
            <?php if($oPost->have_posts()): while($oPost->have_posts()): $oPost->the_post(); ?>
                <article class="project">
                    <?php if(has_post_thumbnail()): ?>
                        <h4 class="project__title"><?php the_title(); ?></h4>
                        <a class="project__link" href="<?php the_permalink(); ?>" title="En savoir plus sur le projet" ><?php the_post_thumbnail('medium'); ?></a>
                    <?php else: ?>
                        <h4 class="project__title"><a class="project__link" href="<?php the_permalink(); ?>" title="En savoir plus sur le projet" ><?php the_title(); ?></a></h4>
                    <?php endif; ?>
                </article>
            <?php endwhile; else: ?>
                <p>Il n'y a pas de projets à afficher pour le moment.</p>
            <?php endif; ?>
            <a class="index__link--button" href="<?php the_permalink('12'); ?>">Voir tous mes projets</a>
        </section>
        <section class="index__content">
            <h3 class="index__title" role="heading" aria-level="2">Pourquoi moi&nbsp;?</h3>
            <article class="why-skill">
                <h4 lang="en" class="why-skill__title" role="heading" aria-level="3">Responsive Web Design</h4>
                <p>Grâce à différents principes et techniques utilisés durant leurs conceptions, mes sites s'adaptent au support sur lequel ils sont consultés afin de rendre la lecture du contenu et la navigation confortable que ce soit sur mobile, tablette ou desktop.</p>
            </article>
            <article class="why-skill">
                <h4 class="why-skill__title" role="heading" aria-level="3">Accessibilité et référencement</h4>
                <p>Il est très important pour moi de rendre mes sites accessibles au plus grand nombre. C'est d'ailleurs un droit universel reconnu par l'<abbr title="Organisation des Nations Unies">ONU</abbr> et la Commission européenne. Cela concerne les personnes handicapées (par exemple, une personne mal voyante qui surf avec un navigateur vocal) mais aussi aux utilisateurs en situation peu confortable (par exemple, quelqu'un qui surf sur son mobile avec un petit écran et en plein soleil). De plus, l'ensemble de techniques et bonnes pratiques permettant de mettre cela en &oelig;uvre aide les moteurs de recherche à comprendre le site et améliore le référencement naturel (un site bien référencé est placé dans les premiers résultats des moteurs de recherche).</p>
            </article>
            <a class="index__link--button" href="<?php the_permalink('16'); ?>">Contactez-moi&nbsp;!</a>
        </section>
    </section>

<?php get_footer(); ?>
