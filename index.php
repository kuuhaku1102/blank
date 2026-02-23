<?php
get_header(); ?>

<div class="page-header" style="background:var(--secondary-color); color:var(--white); padding:60px 0; text-align:center;">
    <h1><?php the_title(); ?></h1>
</div>

<main class="container" style="padding: 60px 0; max-width: 800px; margin: 0 auto;">
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="general-page" style="background:var(--white); padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <div class="contentArea" style="line-height: 2;">
                <?php the_content(); ?>
            </div>
        </article>

    <?php endwhile; else: ?>
        <p>コンテンツが見つかりません。</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
