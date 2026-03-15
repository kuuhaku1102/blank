<?php get_header(); ?>

<style>
/* ページ固有のスタイル：トラスト×ミニマル・サイバー感 */
.archive-hero {
    background: linear-gradient(135deg, var(--secondary-color) 0%, #0d121c 100%);
    color: var(--white);
    padding: 180px 0 100px;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.archive-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 1px);
    background-size: 30px 30px;
    pointer-events: none;
}
.archive-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin: 0;
    letter-spacing: 0.05em;
    position: relative;
    z-index: 2;
}
.archive-subtitle {
    font-size: 1.1rem;
    color: var(--highlight-color);
    letter-spacing: 0.2em;
    margin-top: 15px;
    position: relative;
    z-index: 2;
    text-transform: uppercase;
}

/* Banner Works Grid */
.banner-archive-container {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 80px 5%;
}
.banner-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 40px;
}
.banner-card {
    display: flex;
    flex-direction: column;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 5px 20px rgba(0,0,0,0.03);
    border: 1px solid rgba(0,0,0,0.05);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.banner-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
}
.banner-thumb {
    width: 100%;
    aspect-ratio: 1/1;
    background: #f4f7f6;
    overflow: hidden;
    position: relative;
}
.banner-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.banner-card:hover .banner-thumb img {
    transform: scale(1.05);
}
.banner-content {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.banner-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--primary-color);
    margin: 0 0 15px;
    line-height: 1.5;
}
.banner-meta-list {
    margin: 0 0 20px;
    padding: 0;
    list-style: none;
    font-size: 0.9rem;
    color: var(--secondary-color);
}
.banner-meta-list li {
    margin-bottom: 8px;
    display: flex;
    gap: 10px;
}
.banner-meta-list li span {
    font-weight: bold;
    color: var(--primary-color);
    min-width: 60px;
}
.banner-readmore {
    margin-top: auto;
    font-size: 0.95rem;
    color: var(--highlight-color);
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: gap 0.3s ease;
}
.banner-card:hover .banner-readmore {
    gap: 10px;
}

/* ページネーション */
.pagination { margin-top: 60px; text-align: center; }
.pagination .page-numbers {
    display: inline-block; padding: 10px 18px; margin: 0 5px;
    border: 1px solid rgba(0,0,0,0.1); border-radius: 4px;
    text-decoration: none; color: var(--text-color); font-weight: bold;
    transition: all 0.3s ease;
}
.pagination .page-numbers.current,
.pagination .page-numbers:hover {
    background: var(--primary-color); color: var(--white); border-color: var(--primary-color);
}
</style>

<div class="archive-hero">
    <h1 class="archive-title">BANNER WORKS</h1>
    <div class="archive-subtitle">バナー制作実績</div>
</div>

<div class="banner-archive-container fade-up">
    <div class="banner-grid">
        <?php if(have_posts()): while(have_posts()): the_post(); 
            $bw_company = get_post_meta(get_the_ID(), 'banner_company', true);
            $bw_media = get_post_meta(get_the_ID(), 'banner_media', true);
            $bw_days = get_post_meta(get_the_ID(), 'banner_days', true);
        ?>
        <a href="<?php the_permalink(); ?>" class="banner-card">
            <div class="banner-thumb">
                <?php if(has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php else: ?>
                    <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:var(--primary-color); opacity:0.3; font-size:1.2rem; font-weight:bold;">NO IMAGE</div>
                <?php endif; ?>
            </div>
            <div class="banner-content">
                <h2 class="banner-title"><?php the_title(); ?></h2>
                <ul class="banner-meta-list">
                    <?php if($bw_company): ?><li><span>会社</span><?php echo esc_html($bw_company); ?></li><?php endif; ?>
                    <?php if($bw_media): ?><li><span>媒体</span><?php echo esc_html($bw_media); ?></li><?php endif; ?>
                    <?php if($bw_days): ?><li><span>期間</span><?php echo esc_html($bw_days); ?></li><?php endif; ?>
                </ul>
                <div class="banner-readmore">Read More &rarr;</div>
            </div>
        </a>
        <?php endwhile; else: ?>
            <p style="grid-column: 1/-1; text-align:center;">現在実績を準備中です。</p>
        <?php endif; ?>
    </div>
    
    <div class="pagination">
        <?php 
        echo paginate_links(array(
            'prev_text' => '&laquo; Prev',
            'next_text' => 'Next &raquo;',
        )); 
        ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var fadeElems = document.querySelectorAll('.fade-up');
    if('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if(entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        fadeElems.forEach(function(el) { observer.observe(el); });
    } else {
        fadeElems.forEach(function(el) { el.classList.add('is-visible'); });
    }
});
</script>

<?php get_footer(); ?>
