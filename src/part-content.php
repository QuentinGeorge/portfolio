<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <!-- If post has title & is a project page display title & itemprop. If has title but not a project display title only. Else display alternative title. -->
    <?php if (!empty(get_the_title())): ?>
        <?php if ($sAlternativePageTitle === 'Projet'): ?>
            <h2 class="content__title p-name" role="heading" aria-level="2" itemprop="name"><?php the_title(); ?></h2>
        <?php else: ?>
            <h2 class="content__title" role="heading" aria-level="2"><?php the_title(); ?></h2>
        <?php endif; ?>
    <?php else: ?>
        <h2 class="content__title" role="heading" aria-level="2"><?= $sAlternativePageTitle; ?></h2>
    <?php endif; ?>
    <!-- If we have content display content. -->
    <?php if (!empty(get_the_content())): ?>
        <header class="content__header">
            <?php the_content(); ?>
        </header>
    <?php endif; ?>
<?php endwhile; endif; ?>
