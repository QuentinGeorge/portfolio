<?php

/*

    Template Name: Page du projet
    Template Post Type: projets

*/

$sAlternativePageTitle = 'Projet';

get_header();

?>

    <section class="project__content">
        <?php include(locate_template('part-content.php')); ?>

        <?php $aTechnologies = fGetTechnologies(); ?>
        <?php if (!empty($aTechnologies)): ?>
            <section class="project__tech">
                <h3 class="tech__title" role="heading" aria-level="3">Technologies utilisées</h3>
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
