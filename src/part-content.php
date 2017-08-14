<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <section class="content__page">
        <h2 class="content__title" role="heading" aria-level="2"><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </section>
<?php endwhile; endif; ?>
