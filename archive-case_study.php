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

        <div class="works-grid fade-up" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px;">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                $industry = get_post_meta(get_the_ID(), 'cs_industry', true);
            ?>
            <a href="<?php the_permalink(); ?>" class="work-card-elegant" style="display:block; text-decoration:none; color:inherit; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); border-radius:12px; padding:25px; transition:transform 0.4s ease, border-color 0.4s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.borderColor='rgba(229, 57, 53, 0.5)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(255,255,255,0.08)';">
                
                <!-- Background decorative accent -->
                <div style="position:absolute; top:0; right:0; width:100px; height:100px; background:radial-gradient(circle at top right, rgba(229,57,53,0.1), transparent 70%); border-radius:0 12px 0 0; pointer-events:none;"></div>

                <div class="img-wrapper" style="border-radius:8px; overflow:hidden; margin-bottom:20px; position:relative; aspect-ratio: 16/10; background:rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.05);">
                    <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('large', ['style' => 'width:100%; height:100%; object-fit:cover; transition:transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);', 'class' => 'work-img']); ?>
                    <?php else: ?>
                        <!-- カスタムプレースホルダー -->
                        <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:rgba(255,255,255,0.5); font-size:1.5rem; font-weight:bold; background:linear-gradient(135deg, rgba(229,57,53,0.2), rgba(11,19,43,0.5)); transition:transform 0.6s ease;" class="work-img">
                            CASE STUDY
                        </div>
                    <?php endif; ?>
                    <div class="overlay" style="position:absolute; inset:0; background:rgba(11,19,43,0.4); opacity:0; transition:opacity 0.4s ease;"></div>
                </div>

                <div class="work-meta" style="display:flex; gap:10px; margin-bottom:15px; flex-wrap:wrap;">
                    <?php if($industry): ?>
                    <span style="font-size:0.8rem; background:var(--highlight-color); padding:5px 15px; border-radius:30px; color:var(--white); font-weight:bold;"><?php echo esc_html($industry); ?></span>
                    <?php endif; ?>
                </div>

                <h3 style="font-size:1.3rem; font-weight:bold; color:var(--white); margin:0; line-height:1.6;"><?php the_title(); ?></h3>
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

<!-- Scroll Animation Script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const fadeElements = document.querySelectorAll('.fade-up, .fade-in');
    fadeElements.forEach(el => observer.observe(el));
});
</script>

<?php get_footer(); ?>
