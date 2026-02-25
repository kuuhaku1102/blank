<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
    $industry = get_post_meta(get_the_ID(), 'cs_industry', true);
    $issue    = get_post_meta(get_the_ID(), 'cs_issue', true);
    $impl     = get_post_meta(get_the_ID(), 'cs_implementation', true);
    $result   = get_post_meta(get_the_ID(), 'cs_result', true);
    $val      = get_post_meta(get_the_ID(), 'cs_value', true);
?>
<div class="page-header" style="position:relative; background:var(--secondary-color); color:var(--white); padding:80px 0; text-align:center; overflow:hidden;">
    <svg style="position:absolute; top: -50%; left: -10%; width: 120%; height: 200%; opacity: 0.05; pointer-events: none; animation: floatOrb 30s infinite alternate;" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="40" fill="none" stroke="#fff" stroke-width="0.3" stroke-dasharray="2 4" />
        <rect x="20" y="20" width="60" height="60" fill="none" stroke="#fff" stroke-width="0.2" transform="rotate(45 50 50)" />
    </svg>
    <div class="container" style="position:relative; z-index:1;">
        <h1 style="font-size: 2.2rem; font-weight: 700; line-height: 1.5; margin-bottom: 20px;"><?php the_title(); ?></h1>
        <?php if($industry): ?>
        <span style="background:var(--highlight-color); color:var(--white); font-weight:bold; padding:8px 20px; border-radius:30px; display:inline-block; font-size:1rem; letter-spacing:0.1em;">
            INDUSTRY : <?php echo esc_html($industry); ?>
        </span>
        <?php endif; ?>
    </div>
</div>

<main class="container" style="padding: 80px 0; max-width: 900px; margin: 0 auto;">
    
    <div style="text-align:center; margin-bottom:60px;">
        <?php if( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail('large', array('style'=>'max-width:100%; height:auto; border-radius:12px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);')); ?>
        <?php endif; ?>
    </div>

    <!-- コンテンツエリア -->
    <article class="cs-single-article" style="background:var(--white); padding:50px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.03); border-top: 5px solid var(--primary-color);">
        
        <?php if($issue): ?>
        <div style="margin-bottom: 50px;">
            <h2 style="font-size: 1.6rem; color: var(--primary-color); border-bottom: 2px solid var(--light-gray); padding-bottom: 15px; margin-bottom: 25px; display:flex; align-items:center; gap:10px;">
                <span style="color:var(--highlight-color); font-size:2rem; line-height:1;">課題</span>
                <span style="font-size:0.9rem; color:var(--accent-color); letter-spacing:0.1em;">ISSUES</span>
            </h2>
            <p style="font-size:1.15rem; line-height:2.2; color:var(--primary-color); font-weight:bold; white-space:pre-wrap;"><?php echo esc_html($issue); ?></p>
        </div>
        <?php endif; ?>

        <?php if($impl): ?>
        <div style="margin-bottom: 50px;">
            <h2 style="font-size: 1.6rem; color: var(--primary-color); border-bottom: 2px solid var(--light-gray); padding-bottom: 15px; margin-bottom: 25px; display:flex; align-items:center; gap:10px;">
                <span style="color:var(--highlight-color); font-size:2rem; line-height:1;">実装施策</span>
                <span style="font-size:0.9rem; color:var(--accent-color); letter-spacing:0.1em;">IMPLEMENTATION</span>
            </h2>
            <div style="background:var(--bg-color); padding:40px; border-radius:8px; border-left: 5px solid var(--highlight-color);">
                <p style="font-size:1.1rem; line-height:2.2; color:var(--primary-color); font-weight:bold; margin:0; white-space:pre-wrap;"><?php echo esc_html($impl); ?></p>
            </div>
        </div>
        <?php endif; ?>

        <?php if($result): ?>
        <div style="margin-bottom: 50px;">
            <h2 style="font-size: 1.6rem; color: var(--primary-color); border-bottom: 2px solid var(--light-gray); padding-bottom: 15px; margin-bottom: 25px; display:flex; align-items:center; gap:10px;">
                <span style="color:var(--highlight-color); font-size:2rem; line-height:1;">成果</span>
                <span style="font-size:0.9rem; color:var(--accent-color); letter-spacing:0.1em;">RESULTS</span>
            </h2>
            <div style="background:linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color:var(--white); padding:40px; border-radius:8px; box-shadow:0 10px 20px rgba(11,19,43,0.1);">
                <p style="font-size:1.3rem; line-height:2.4; font-weight:900; margin:0; text-align:center; white-space:pre-wrap;"><?php echo esc_html($result); ?></p>
            </div>
        </div>
        <?php endif; ?>

        <?php if($val): ?>
        <div style="margin-bottom: 30px; text-align:center; padding-top:40px; border-top:1px dashed var(--light-gray);">
            <p style="font-size:1.2rem; font-weight:bold; color:var(--highlight-color); margin-bottom:10px;">The blank Value</p>
            <p style="font-size:1.4rem; color:var(--primary-color); font-weight:bold; line-height:1.6; margin:0;">「<?php echo esc_html($val); ?>」</p>
        </div>
        <?php endif; ?>

        <!-- Editor Content (If any) -->
        <div class="contentArea" style="line-height:2;">
            <?php the_content(); ?>
        </div>
        
    </article>

    <div style="text-align:center; margin-top:60px;">
        <a href="<?php echo esc_url( get_post_type_archive_link( 'case_study' ) ); ?>" class="cta-btn" style="background:transparent; color:var(--primary-color); border:2px solid var(--primary-color); padding: 15px 40px; font-weight:bold; font-size:1.1rem; transition:all 0.3s; display:inline-block;" onmouseover="this.style.background='var(--primary-color)'; this.style.color='#fff';" onmouseout="this.style.background='transparent'; this.style.color='var(--primary-color)';">事例一覧に戻る</a>
    </div>

</main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
