<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="page-header" style="background:var(--secondary-color); color:var(--white); padding:60px 0; text-align:center;">
    <h1><?php the_title(); ?></h1>
    <p>制作実績 詳細</p>
</div>

<main class="container" style="padding: 60px 0; max-width: 900px; margin: 0 auto;">
    <article style="background:var(--white); padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <div style="text-align:center; margin-bottom:40px;">
            <?php if( has_post_thumbnail() ): ?>
                <?php the_post_thumbnail('large', array('style'=>'max-width:100%; height:auto; border-radius:8px;')); ?>
            <?php endif; ?>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 40px;">
            <div style="background:var(--bg-color); padding: 20px; border-radius: 5px;">
                <h3 style="color:var(--primary-color);">課題</h3>
                <p><?php echo nl2br(esc_html(get_post_meta($post->ID, 'issue', true) ?: 'テキストが入力されていません。')); ?></p>
            </div>
            <div style="background:var(--bg-color); padding: 20px; border-radius: 5px;">
                <h3 style="color:var(--highlight-color);">施策</h3>
                <p><?php echo nl2br(esc_html(get_post_meta($post->ID, 'measure', true) ?: 'テキストが入力されていません。')); ?></p>
            </div>
            <div style="background:var(--primary-color); color:var(--white); padding: 20px; border-radius: 5px; grid-column: span 2;">
                <h3 style="color:var(--white);">成果（数値）</h3>
                <p style="font-size:1.2rem; font-weight:bold;"><?php echo nl2br(esc_html(get_post_meta($post->ID, 'result', true) ?: 'テキストが入力されていません。')); ?></p>
            </div>
        </div>

        <div style="margin-bottom: 40px; border-bottom: 1px solid var(--light-gray); padding-bottom: 30px;">
            <h3 style="border-left: 4px solid var(--accent-color); padding-left: 10px;">制作範囲</h3>
            <p><?php echo esc_html(get_post_meta($post->ID, 'scope', true) ?: '要件定義 / デザイン / システム開発 / 保守運用'); ?></p>
        </div>

        <div class="contentArea" style="line-height: 2;">
            <?php the_content(); ?>
        </div>

    </article>

    <div style="text-align:center; margin-top:40px;">
        <a href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>" class="cta-btn-outline">実績一覧に戻る</a>
    </div>
</main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
