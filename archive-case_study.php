<?php get_header(); ?>

<div class="page-header" style="background:var(--secondary-color); color:var(--white); padding:60px 0; text-align:center;">
    <h1>CASE STUDY</h1>
    <p>成功事例</p>
</div>

<main class="container" style="padding: 60px 0;">
    <p style="text-align:center; margin-bottom:40px;">実際のクライアントにおける、導入前後の課題と解決のプロセス、そして具体的な成果をご紹介します。</p>

    <div class="grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px;">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="case-card" style="border: 1px solid var(--light-gray); border-radius: 8px; overflow: hidden; background:var(--white); display:flex; flex-direction:column;">
                <a href="<?php the_permalink(); ?>">
                    <?php if( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail('medium_large', array('style'=>'width:100%; height:200px; object-fit:cover;')); ?>
                    <?php else: ?>
                        <div style="background:var(--primary-color); height: 200px; width: 100%; display:flex; align-items:center; justify-content:center; color:var(--white); font-weight:bold; font-size:1.5rem;"><?php the_title(); ?></div>
                    <?php endif; ?>
                </a>
                <div style="padding: 25px; flex-grow:1; display:flex; flex-direction:column;">
                    <h2 style="font-size: 1.4rem; margin: 0 0 15px; border-bottom:2px solid var(--highlight-color); padding-bottom:10px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    
                    <div style="margin-bottom: 20px; font-size:0.95rem; color:#444; flex-grow:1;">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <a href="<?php the_permalink(); ?>" style="align-self:flex-start; font-weight:bold; color:var(--accent-color); padding:8px 20px; border:1px solid var(--accent-color); border-radius:5px;">続きを読む &rarr;</a>
                </div>
            </div>
        <?php endwhile; else: ?>
            <p>まだ成功事例が登録されていません。</p>
        <?php endif; ?>
    </div>
    
    <div style="margin-top: 50px; text-align:center;">
        <?php the_posts_pagination(array('mid_size' => 2)); ?>
    </div>
</main>

<?php get_footer(); ?>
