<?php get_header(); ?>

<div class="page-header" style="background:var(--secondary-color); color:var(--white); padding:60px 0; text-align:center;">
    <h1>WORKS</h1>
    <p>制作実績</p>
</div>

<main class="container" style="padding: 60px 0;">
    <div style="margin-bottom: 40px; border-bottom: 1px solid var(--light-gray); padding-bottom: 20px;">
        <h3>カテゴリで絞り込む</h3>
        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:10px;">
            <a href="#" style="background:var(--light-gray); padding:5px 15px; border-radius:20px; color:var(--text-color);">すべて</a>
            <a href="#" style="background:var(--light-gray); padding:5px 15px; border-radius:20px; color:var(--text-color);">LP</a>
            <a href="#" style="background:var(--light-gray); padding:5px 15px; border-radius:20px; color:var(--text-color);">コーポレートサイト</a>
            <a href="#" style="background:var(--light-gray); padding:5px 15px; border-radius:20px; color:var(--text-color);">EC</a>
            <a href="#" style="background:var(--light-gray); padding:5px 15px; border-radius:20px; color:var(--text-color);">広告実績</a>
            <a href="#" style="background:var(--light-gray); padding:5px 15px; border-radius:20px; color:var(--text-color);">自社プロジェクト</a>
        </div>
    </div>

    <div class="grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px;">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="work-card" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden; background:var(--white);">
                <a href="<?php the_permalink(); ?>">
                    <?php if( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php else: ?>
                        <div style="background:#ddd; height: 200px; width: 100%; display:flex; align-items:center; justify-content:center; color:#999;">No Image</div>
                    <?php endif; ?>
                </a>
                <div style="padding: 20px;">
                    <span style="font-size:0.8rem; background:var(--highlight-color); color:var(--white); padding:3px 8px; border-radius:3px;">
                        <?php 
                        $terms = get_the_terms($post->ID, 'work_cat'); 
                        echo $terms ? esc_html($terms[0]->name) : '実績';
                        ?>
                    </span>
                    <h2 style="font-size: 1.3rem; margin: 10px 0;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    
                    <div style="font-size: 0.9rem; color: #555;">
                        <p><strong>課題:</strong> <?php echo esc_html(get_post_meta($post->ID, 'issue', true) ?: '未入力'); ?></p>
                        <p><strong>成果:</strong> <?php echo esc_html(get_post_meta($post->ID, 'result', true) ?: '未入力'); ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; else: ?>
            <p>まだ実績が登録されていません。</p>
        <?php endif; ?>
    </div>
    
    <div style="margin-top: 40px; text-align:center;">
        <?php the_posts_pagination(array('mid_size' => 2)); ?>
    </div>
</main>

<?php get_footer(); ?>
