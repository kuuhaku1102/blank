<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
    $industry = get_post_meta(get_the_ID(), 'cs_industry', true);
    $issue    = get_post_meta(get_the_ID(), 'cs_issue', true);
    $impl     = get_post_meta(get_the_ID(), 'cs_implementation', true);
    $result   = get_post_meta(get_the_ID(), 'cs_result', true);
    $val      = get_post_meta(get_the_ID(), 'cs_value', true);
?>
<div class="page-header" style="position:relative; background:#ffffff; color:var(--primary-color); padding:100px 0 60px; text-align:center; overflow:hidden; border-bottom:1px solid rgba(0,0,0,0.05);">
    <!-- Professional elegant data wave and network SVG for header -->
    <svg style="position:absolute; bottom: -5px; left: 0; width: 100%; height: auto; opacity: 0.03; pointer-events: none;" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="var(--primary-color)" fill-opacity="1" d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <svg style="position:absolute; top: -50%; right: -10%; width: 70%; height: 200%; opacity: 0.02; pointer-events: none; animation: spinSlow 90s linear infinite;" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="45" fill="none" stroke="var(--primary-color)" stroke-width="0.3" stroke-dasharray="1 3" />
        <circle cx="50" cy="50" r="35" fill="none" stroke="var(--highlight-color)" stroke-width="0.2" stroke-dasharray="2 6" />
        <polygon points="50,10 85,75 15,75" fill="none" stroke="var(--primary-color)" stroke-width="0.1" />
        <polygon points="50,90 15,25 85,25" fill="none" stroke="var(--primary-color)" stroke-width="0.1" />
    </svg>
    <div class="container" style="position:relative; z-index:1;">
        <h1 style="font-size: 2.2rem; font-weight: 800; line-height: 1.5; margin-bottom: 20px; color:var(--primary-color);"><?php the_title(); ?></h1>
        <?php if($industry): ?>
        <span style="background:rgba(11,19,43,0.05); color:var(--primary-color); font-weight:bold; padding:8px 25px; border-radius:30px; display:inline-block; font-size:0.95rem; letter-spacing:0.1em; border:1px solid rgba(11,19,43,0.1);">
            <?php echo esc_html($industry); ?>
        </span>
        <?php endif; ?>
    </div>
</div>

<main style="background: #f8f9fa; position:relative; overflow:hidden; padding: 80px 0;">
    <!-- Dynamic geometric particles and network for container margins -->
    <svg style="position:absolute; top: 5%; left: -5%; width: 35%; height: auto; opacity: 0.03; pointer-events: none; animation: floatOrbCustom 25s infinite alternate ease-in-out;" viewBox="0 0 200 200">
        <path d="M 10 100 Q 50 10 100 100 T 190 100" fill="none" stroke="var(--primary-color)" stroke-width="1.5" />
        <circle cx="10" cy="100" r="4" fill="var(--highlight-color)" />
        <circle cx="100" cy="100" r="6" fill="var(--primary-color)" />
        <circle cx="190" cy="100" r="4" fill="var(--highlight-color)" />
        <path d="M 30 150 Q 100 50 170 150" fill="none" stroke="var(--primary-color)" stroke-width="0.5" stroke-dasharray="2 4"/>
    </svg>

    <svg style="position:absolute; bottom: 10%; right: -10%; width: 40%; height: auto; opacity: 0.02; pointer-events: none; animation: floatOrbCustom 30s infinite alternate-reverse ease-in-out;" viewBox="0 0 200 200">
        <rect x="50" y="50" width="100" height="100" fill="none" stroke="var(--primary-color)" stroke-width="1.5" transform="rotate(45 100 100)" />
        <rect x="70" y="70" width="60" height="60" fill="none" stroke="var(--highlight-color)" stroke-width="0.5" transform="rotate(-15 100 100)" />
        <line x1="0" y1="100" x2="200" y2="100" stroke="var(--primary-color)" stroke-width="0.2" />
        <line x1="100" y1="0" x2="100" y2="200" stroke="var(--primary-color)" stroke-width="0.2" />
        <circle cx="100" cy="100" r="60" fill="none" stroke="var(--primary-color)" stroke-width="0.3" stroke-dasharray="2 4" />
    </svg>

    <div class="container" style="position:relative; z-index:1; max-width: 900px; margin: 0 auto;">
    
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

    </div>
</main>
<?php endwhile; endif; ?>

<style>
@keyframes spinSlow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
@keyframes floatOrbCustom {
    0% { transform: translate(0, 0) scale(1) rotate(0deg); }
    50% { transform: translate(15px, 20px) scale(1.02) rotate(2deg); }
    100% { transform: translate(-10px, -15px) scale(0.98) rotate(-1deg); }
}
</style>

<?php get_footer(); ?>
