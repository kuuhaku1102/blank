<?php get_header(); ?>

<style>
/* ページ固有のスタイル：トラスト×ミニマル・サイバー感 */
.single-bw-hero {
    background: linear-gradient(135deg, var(--secondary-color) 0%, #0d121c 100%);
    color: var(--white);
    padding: 180px 0 100px;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.single-bw-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 1px);
    background-size: 30px 30px;
    pointer-events: none;
}
.single-bw-title {
    font-size: 2.8rem;
    font-weight: 800;
    margin: 0;
    letter-spacing: 0.05em;
    position: relative;
    z-index: 2;
    padding: 0 5%;
}
.single-bw-subtitle {
    font-size: 1.1rem;
    color: var(--highlight-color);
    letter-spacing: 0.2em;
    margin-top: 15px;
    position: relative;
    z-index: 2;
    text-transform: uppercase;
}
.single-bw-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 80px 5%;
}

/* メタ情報セクション */
.bw-meta-box {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 60px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.03);
    border: 1px solid rgba(145,166,180,0.2);
}
.bw-meta-list {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    list-style: none;
    padding: 0;
    margin: 0;
}
.bw-meta-list li {
    flex: 1 1 200px;
    display: flex;
    flex-direction: column;
}
.bw-meta-label {
    font-size: 0.85rem;
    color: var(--secondary-color);
    font-weight: bold;
    margin-bottom: 5px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
.bw-meta-value {
    font-size: 1.1rem;
    color: var(--primary-color);
    font-weight: bold;
}

/* ギャラリー領域 */
.bw-gallery-header {
    text-align: center;
    margin-bottom: 40px;
    font-size: 1.8rem;
    color: var(--primary-color);
    font-weight: 800;
}
.bw-gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
}
.bw-gallery-item {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    background: #ebeef0;
}
.bw-gallery-item img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.4s ease;
}
.bw-gallery-item:hover img {
    transform: scale(1.03);
}

.back-btn-wrap {
    text-align: center;
    margin-top: 80px;
}
</style>

<?php if(have_posts()): while(have_posts()): the_post(); 
    $bw_company = get_post_meta(get_the_ID(), 'banner_company', true);
    $bw_media = get_post_meta(get_the_ID(), 'banner_media', true);
    $bw_days = get_post_meta(get_the_ID(), 'banner_days', true);
    $bw_gallery = get_post_meta(get_the_ID(), 'banner_gallery', true);
?>

<div class="single-bw-hero">
    <h1 class="single-bw-title"><?php the_title(); ?></h1>
    <div class="single-bw-subtitle">Banner Works</div>
</div>

<div class="single-bw-container fade-up">

    <!-- 本文がある場合は表示 -->
    <?php if (get_the_content()): ?>
    <div style="margin-bottom:60px; line-height:1.8; color:var(--text-color);">
        <?php the_content(); ?>
    </div>
    <?php endif; ?>

    <!-- 基本情報 -->
    <?php if($bw_company || $bw_media || $bw_days): ?>
    <div class="bw-meta-box fade-up">
        <ul class="bw-meta-list">
            <?php if($bw_company): ?>
            <li>
                <span class="bw-meta-label">Client / 会社名</span>
                <span class="bw-meta-value"><?php echo esc_html($bw_company); ?></span>
            </li>
            <?php endif; ?>
            
            <?php if($bw_media): ?>
            <li>
                <span class="bw-meta-label">Media / 広告媒体</span>
                <span class="bw-meta-value"><?php echo esc_html($bw_media); ?></span>
            </li>
            <?php endif; ?>
            
            <?php if($bw_days): ?>
            <li>
                <span class="bw-meta-label">Duration / 制作期間</span>
                <span class="bw-meta-value"><?php echo esc_html($bw_days); ?></span>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <?php endif; ?>

    <!-- バナーギャラリー -->
    <?php if($bw_gallery): ?>
    <div class="fade-up">
        <h2 class="bw-gallery-header">Delivery Banners<br><span style="font-size:0.9rem; font-weight:normal; letter-spacing:0.1em; color:var(--highlight-color);">制作バナー一覧</span></h2>
        <div class="bw-gallery-grid">
            <?php 
            $gallery_ids = explode(',', $bw_gallery);
            foreach($gallery_ids as $img_id):
                $img_url = wp_get_attachment_image_url($img_id, 'large');
                if($img_url):
            ?>
            <div class="bw-gallery-item">
                <a href="<?php echo esc_url($img_url); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url($img_url); ?>" alt="Banner Image">
                </a>
            </div>
            <?php endif; endforeach; ?>
        </div>
    </div>
    <?php else: ?>
        <!-- ギャラリー未設定時はアイキャッチだけ表示などの配慮 -->
        <?php if(has_post_thumbnail()): ?>
            <div class="bw-gallery-item fade-up" style="max-width: 500px; margin: 0 auto;">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="back-btn-wrap fade-up">
        <a href="<?php echo esc_url(get_post_type_archive_link('banner_works')); ?>" class="cta-btn outline">バナー実績一覧へ戻る</a>
    </div>

</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
