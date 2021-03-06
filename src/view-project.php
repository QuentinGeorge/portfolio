<?php

/*

    Template Name: Page du projet
    Template Post Type: projets

*/

$sAlternativePageTitle = 'Projet';

get_header();

?>
<!-- Don't forget to set model page => Page du projet for a new project in wp-admin -->
    <section class="page__content view-project h-entry" itemscope itemtype="http://schema.org/CreativeWork">
        <?php include(locate_template('part-content.php')); ?>
        <div class="e-content">
            <section class="project__content page__section project__intro">
                <h3 class="project__sub-title hidden" role="heading" aria-level="3">Introduction du projet</h3>
                <?php if (has_post_thumbnail() === true): ?>
                    <figure class="project__figure u-photo" itemprop="image">
                        <?php the_post_thumbnail('medium'); ?>
                    </figure>
                <?php endif; ?>
                <p class="project__text" itemprop="description"><?php the_field('introduction_du_projet'); ?></p>
                <ul class="project__container">
                    <li class="link__container">
                        <a class="link--button u-url" href="<?php the_field('lien_vers_le_projet'); ?>" rel="external" itemprop="url">Voir le projet</a>
                    </li>
                    <li class="link__container">
                        <a class="link--button" href="<?php the_field('lien_vers_github'); ?>" hreflang="en" rel="external code-repository">Voir le code sur GitHub</a>
                    </li>
                </ul>
            </section>
            <section class="project__content page__section project__constraints">
                <h3 class="project__sub-title" role="heading" aria-level="3">Contraintes</h3>
                <p class="project__text"><?php the_field('contraintes'); ?></p>
                <?php if (get_field('image_de_contrainte') !== false): ?>
                    <figure class="project__figure u-photo" itemprop="image">
                        <?= fGetACFImage('image_de_contrainte'); ?>
                    </figure>
                <?php endif; ?>
            </section>
            <?php $aTechnologies = fGetTechnologies(); ?>
            <?php if (!empty($aTechnologies)): ?>
                <section class="project__content page__section project__tech">
                    <svg class="hidden" aria-hidden="true" version="1.1" width="0" height="0">
                        <defs>
                            <g id="tech">
                                <path d="M267.9 119.5c-0.4-3.8-4.8-6.6-8.6-6.6 -12.3 0-23.2-7.2-27.8-18.4 -4.7-11.5-1.7-24.8 7.5-33.2 2.9-2.6 3.2-7.1 0.8-10.1 -6.3-8-13.5-15.2-21.3-21.5 -3.1-2.5-7.6-2.1-10.2 0.8 -8 8.9-22.4 12.2-33.5 7.5 -11.6-4.9-18.9-16.6-18.2-29.2 0.2-4-2.7-7.4-6.6-7.8 -10-1.2-20.2-1.2-30.2-0.1 -3.9 0.4-6.8 3.8-6.7 7.7 0.4 12.5-6.9 24-18.4 28.7 -11 4.5-25.3 1.2-33.3-7.6 -2.6-2.9-7.1-3.3-10.1-0.9 -8.1 6.3-15.4 13.6-21.7 21.5 -2.5 3.1-2.1 7.6 0.8 10.2 9.4 8.5 12.4 21.9 7.5 33.5 -4.6 11-16.1 18.2-29.2 18.2 -4.3-0.1-7.3 2.7-7.8 6.6 -1.2 10.1-1.2 20.4-0.1 30.6 0.4 3.8 5 6.6 8.8 6.6 11.7-0.3 22.9 6.9 27.7 18.4 4.7 11.5 1.7 24.8-7.5 33.2 -2.9 2.6-3.2 7.1-0.8 10.1 6.2 8 13.4 15.2 21.3 21.5 3.1 2.5 7.6 2.1 10.2-0.8 8-8.9 22.4-12.2 33.5-7.5 11.6 4.9 18.9 16.6 18.2 29.2 -0.2 4 2.7 7.4 6.6 7.9 5.1 0.6 10.3 0.9 15.5 0.9 4.9 0 9.8-0.3 14.8-0.8 3.9-0.4 6.8-3.8 6.7-7.7 -0.5-12.5 6.9-24 18.4-28.7 11.1-4.5 25.3-1.2 33.3 7.6 2.7 2.9 7 3.2 10.1 0.8 8-6.3 15.3-13.5 21.7-21.5 2.5-3.1 2.1-7.6-0.8-10.2 -9.4-8.5-12.4-21.9-7.5-33.5 4.6-10.9 15.6-18.2 27.5-18.2l1.7 0c3.9 0.3 7.4-2.7 7.9-6.6C269 139.9 269.1 129.6 267.9 119.5zM134.6 179.5c-24.7 0-44.8-20.1-44.8-44.8 0-24.7 20.1-44.8 44.8-44.8 24.7 0 44.8 20.1 44.8 44.8C179.4 159.4 159.3 179.5 134.6 179.5z"/>
                        	</g>
                        </defs>
                    </svg>
                    <h3 class="project__sub-title" role="heading" aria-level="3">Technologies utilisées</h3>
                    <ul class="tech">
                        <?php foreach ($aTechnologies as $oTech): ?>
                            <li class="tech__item">
                                <svg class="tech__icon" aria-label="engrenages" role="img" version="1.1" viewBox="0 0 268.8 268.8" width="16" height="16">
                                    <use xlink:href="#tech"></use>
                                </svg>
                                <span class="tech__text p-category"><?= $oTech->name; ?></span>
                                <?php if (isset($oTech->children)): ?>
                                    <ul class="tech sub-tech">
                                        <?php foreach ($oTech->children as $oSubTech): ?>
                                            <li class="tech__item sub-tech__item">
                                                <svg class="tech__icon sub-tech__icon" aria-label="engrenages" role="img" version="1.1" viewBox="0 0 268.8 268.8" width="16" height="16">
                                                    <use xlink:href="#tech"></use>
                                                </svg>
                                                <span class="tech__text sub-tech__text p-category"><?= $oSubTech->name; ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>
        </div>
    </section>

<?php get_footer(); ?>
