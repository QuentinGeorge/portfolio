<?php

/*

    Template Name: Page d'accueil

*/

$sAlternativePageTitle = 'Accueil';  // use in part-content.php if the page has no title defined by WP

get_header();

?>

    <section class="page__content index">
        <?php include(locate_template('part-content.php')); ?>
        <!-- coold use: get_template_part('part', 'content'); instead but with this way we can have access to the variable $sAlternativePageTitle in part-content.php -->
        <section class="page__section index__content index__projects">
            <h3 class="index__title" role="heading" aria-level="2">Quelques projets</h3>
            <div class="index__container">
                <?php $aPost = fGetPinnedPosts(); ?>
                <?php if($aPost->have_posts()): while($aPost->have_posts()): $aPost->the_post(); ?>
                    <article class="index__article index__project h-item" itemscope itemtype="http://schema.org/CreativeWork">
                        <a class="project__link u-url" href="<?php the_permalink(); ?>" title="En savoir plus sur le projet" itemprop="thumbnailUrl">
                            <h4 class="index__sub-title project__title p-name" itemprop="name"><?php the_title(); ?></h4>
                            <?php if (has_post_thumbnail() === true): ?>
                                <figure class="project__figure u-photo" itemprop="image">
                                    <?php the_post_thumbnail('medium_large'); ?>
                                </figure>
                            <?php endif; ?>
                        </a>
                    </article>
                <?php endwhile; else: ?>
                    <p>Il n'y a pas de projets à afficher pour le moment.</p>
                <?php endif; ?>
            </div>
            <div class="link__container">
                <a class="link--button" href="<?php the_permalink('12'); ?>">Voir tous mes projets</a>
            </div>
        </section>
        <section class="page__section index__content why-me">
            <h3 class="index__title" role="heading" aria-level="2">Pourquoi moi&nbsp;?</h3>
            <div class="index__container">
                <article class="index__article why-skill h-entry">
                    <h4 lang="en" class="index__sub-title why-skill__title p-name" role="heading" aria-level="3">Responsive Web Design</h4>
                    <p class="e-content">Grâce à différents principes et techniques utilisés durant leurs conceptions, mes sites s'adaptent au support sur lequel ils sont consultés afin de rendre la lecture du contenu et la navigation confortable que ce soit sur mobile, tablette ou desktop.</p>
                </article>
                <article class="index__article why-skill h-entry">
                    <h4 class="index__sub-title why-skill__title p-name" role="heading" aria-level="3">Accessibilité et référencement</h4>
                    <p class="e-content">Il est très important pour moi de rendre mes sites accessibles au plus grand nombre. C'est d'ailleurs un droit universel reconnu par l'<abbr title="Organisation des Nations Unies">ONU</abbr> et la Commission européenne. Cela concerne les personnes handicapées (par exemple, une personne mal voyante qui surf avec un navigateur vocal) mais aussi les utilisateurs en situation peu confortable (par exemple, quelqu'un qui surf sur son mobile avec un petit écran et en plein soleil). De plus, l'ensemble de techniques et bonnes pratiques permettant de mettre cela en &oelig;uvre aide les moteurs de recherche à comprendre le site et améliorent le référencement naturel (un site bien référencé est placé dans les premiers résultats des moteurs de recherche).</p>
                </article>
            </div>
            <div class="link__container">
                <a class="link--button" href="<?php the_permalink('16'); ?>">Contactez-moi&nbsp;!</a>
            </div>
        </section>
    </section>

<?php get_footer(); ?>
