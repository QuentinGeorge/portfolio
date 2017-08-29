<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <?php if (!empty(get_the_title())): ?>
        <h2 class="content__title" role="heading" aria-level="2"><?php the_title(); ?></h2>
    <?php else: ?>
        <h2 class="content__title" role="heading" aria-level="2"><?= $sAlternativePageTitle; ?></h2>
    <?php endif; ?>
    <?php if (!empty(get_the_content())): ?>
        <header class="content__header">
            <?php the_content(); ?>
        </header>
    <?php endif; ?>
<?php endwhile; endif; ?>
