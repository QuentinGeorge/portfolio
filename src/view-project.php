<?php

/*

    Template Name: Page du projet
    Template Post Type: projets

*/

$sAlternativePageTitle = 'Projet';

get_header();

?>
    <section class="page__content">
        <?php include(locate_template('part-content.php')); ?>
        <section class="project__content">
            <h3 class="project__sub-title" role="heading" aria-level="3">Introduction du projet</h3>
            <figure class="project__figure">
                <?= fGetACFImage('image_dintroduction'); ?>
            </figure>
            <p class="project__text"><?php the_field('introduction_du_projet'); ?></p>
            <ul>
                <li>
                    <a href="<?php the_field('lien_vers_le_projet'); ?>">Voir le projet</a>
                </li>
                <li>
                    <a href="<?php the_field('lien_vers_github'); ?>" hreflang="en">Voir le code sur GitHub</a>
                </li>
            </ul>
        </section>
        <section class="project__content">
            <h3 class="project__sub-title" role="heading" aria-level="3">Contraintes</h3>
            <p class="project__text"><?php the_field('contraintes'); ?></p>
            <figure class="project__figure">
                <?= fGetACFImage('image_de_contrainte'); ?>
            </figure>
        </section>
        <?php $aTechnologies = fGetTechnologies(); ?>
        <?php if (!empty($aTechnologies)): ?>
            <section class="project__content">
                <h3 class="project__sub-title" role="heading" aria-level="3">Technologies utilisées</h3>
                <ul class="tech__container">
                    <?php foreach ($aTechnologies as $oTech): ?>
                        <li class="tech__item"><?= $oTech->name; ?>
                            <?php if (isset($oTech->children)): ?>
                                <ul class="sub-tech__container">
                                    <?php foreach ($oTech->children as $oSubTech): ?>
                                        <li class="sub-tech__item"><?= $oSubTech->name; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>
    </section>

<?php get_footer(); ?>
