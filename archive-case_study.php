<?php get_header(); ?>

<div class="page-header" style="position:relative; background:var(--secondary-color); color:var(--white); padding:80px 0; text-align:center; overflow:hidden;">
    <svg style="position:absolute; top: -50%; left: -10%; width: 120%; height: 200%; opacity: 0.05; pointer-events: none; animation: floatOrb 30s infinite alternate;" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="40" fill="none" stroke="#fff" stroke-width="0.3" stroke-dasharray="2 4" />
        <rect x="20" y="20" width="60" height="60" fill="none" stroke="#fff" stroke-width="0.2" transform="rotate(45 50 50)" />
    </svg>
    <div class="container" style="position:relative; z-index:1;">
        <h1 style="font-size: 3rem; font-weight: 700; letter-spacing: 0.1em; margin-bottom: 10px;">CASE STUDIES</h1>
        <p style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 0.95rem;">成功事例・実装インパクト</p>
    </div>
</div>

<main style="background: var(--secondary-color); padding: 80px 0; position:relative; overflow:hidden;">
    <!-- Geometric abstract data lines for tech feel -->
    <svg style="position:absolute; top:10%; left:-5%; width:40%; opacity:0.03; pointer-events:none; animation: fluidMorph2 20s infinite alternate;" viewBox="0 0 100 100">
        <polygon points="50,0 100,25 100,75 50,100 0,75 0,25" fill="none" stroke="#fff" stroke-width="0.5"/>
        <line x1="50" y1="0" x2="50" y2="100" stroke="#fff" stroke-width="0.2"/>
        <line x1="0" y1="25" x2="100" y2="75" stroke="#fff" stroke-width="0.2"/>
        <line x1="0" y1="75" x2="100" y2="25" stroke="#fff" stroke-width="0.2"/>
    </svg>

    <div class="container" style="position:relative; z-index:1;">
        <p style="text-align:center; margin-bottom:60px; color:rgba(255,255,255,0.8); font-size:1.1rem; line-height:1.8;">
            デジタルの“余白”に設計と実装を入れ込み、大きな成果を出したプロジェクトをご紹介します。</p>

        <div class="works-grid fade-up" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(400px, 1fr)); gap: 40px;">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                $industry = get_post_meta(get_the_ID(), 'cs_industry', true);
                $issue = get_post_meta(get_the_ID(), 'cs_issue', true);
                $impl = get_post_meta(get_the_ID(), 'cs_implementation', true);
                $result = get_post_meta(get_the_ID(), 'cs_result', true);
                $val = get_post_meta(get_the_ID(), 'cs_value', true);
            ?>
            <a href="<?php the_permalink(); ?>" class="cs-card" style="display:block; text-decoration:none; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); border-radius:12px; padding: 60px 50px; position:relative; overflow:hidden; transition:transform 0.4s ease, border-color 0.4s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.borderColor='rgba(229, 57, 53, 0.5)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(255,255,255,0.08)';">
                
                <!-- Background decorative accent -->
                <div style="position:absolute; top:0; right:0; width:150px; height:150px; background:radial-gradient(circle at top right, rgba(229,57,53,0.15), transparent 70%); border-radius:0 12px 0 0;"></div>

                <div style="display:flex; align-items:center; gap:15px; margin-bottom:25px;">
                    <span style="background:var(--highlight-color); color:var(--white); font-size:0.85rem; font-weight:bold; padding:6px 16px; border-radius:20px;">
                        <?php echo esc_html( $industry ? $industry : '未設定' ); ?>
                    </span>
                </div>

                <h3 style="font-size:1.6rem; font-weight:bold; color:var(--white); margin-top:0; margin-bottom:40px; line-height:1.6; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:30px;">
                    <?php the_title(); ?>
                </h3>

                <div style="display:flex; flex-direction:column; gap:35px;">
                    <!-- 課題 -->
                    <?php if($issue): ?>
                    <div style="background:rgba(0,0,0,0.2); padding:30px; border-radius:8px; border-left:4px solid #6c757d;">
                        <h4 style="color:#a1a1aa; font-size:1rem; margin-top:0; margin-bottom:15px; font-weight:bold; letter-spacing:0.05em;">▼ 課題</h4>
                        <p style="color:var(--white); margin:0; font-size:1.05rem; line-height:2; white-space:pre-wrap;"><?php echo esc_html($issue); ?></p>
                    </div>
                    <?php endif; ?>

                    <!-- 実装ブロック -->
                    <?php if($impl): ?>
                    <div style="background:rgba(229,57,53,0.05); padding:30px; border-radius:8px; border-left:4px solid var(--highlight-color);">
                        <h4 style="color:var(--highlight-color); font-size:1rem; margin-top:0; margin-bottom:15px; font-weight:bold; letter-spacing:0.05em;">▼ 実装ブロック</h4>
                        <p style="color:var(--white); font-weight:bold; margin:0; font-size:1.05rem; line-height:2; white-space:pre-wrap;"><?php echo esc_html($impl); ?></p>
                    </div>
                    <?php endif; ?>

                    <!-- 成果 -->
                    <?php if($result): ?>
                    <div style="background:rgba(90,103,216,0.1); padding:30px; border-radius:8px; border-left:4px solid #5a67d8;">
                        <h4 style="color:#818cf8; font-size:1rem; margin-top:0; margin-bottom:15px; font-weight:bold; letter-spacing:0.05em;">▼ 成果</h4>
                        <p style="color:var(--white); margin:0; font-size:1.15rem; font-weight:bold; line-height:2; white-space:pre-wrap;"><?php echo esc_html($result); ?></p>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- 価値 -->
                <?php if($val): ?>
                <div style="margin-top:40px; text-align:right;">
                    <p style="color:var(--white); font-size:0.9rem; opacity:0.6; margin:0; font-weight:bold; letter-spacing:0.05em;">
                        ✓ <?php echo esc_html($val); ?>
                    </p>
                </div>
                <?php endif; ?>

            </a>
            <?php endwhile; else: ?>
                <p style="color:var(--white);">まだ成功事例が登録されていません。</p>
            <?php endif; ?>
        </div>
        
        <div class="pagination" style="margin-top: 60px; text-align:center;">
            <?php the_posts_pagination(array('mid_size' => 2)); ?>
        </div>
    </div>
</main>

<style>
.pagination .page-numbers {
    display: inline-block;
    padding: 10px 15px;
    margin: 0 5px;
    background: rgba(255,255,255,0.05);
    color: var(--white);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 5px;
    text-decoration: none;
    transition: all 0.3s;
}
.pagination .page-numbers:hover {
    background: var(--highlight-color);
    border-color: var(--highlight-color);
}
.pagination .page-numbers.current {
    background: var(--highlight-color);
    border-color: var(--highlight-color);
    font-weight:bold;
}
</style>

<?php get_footer(); ?>
