<?php get_header(); ?>

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
        <h1 style="font-size: 3.5rem; font-weight: 800; letter-spacing: 0.05em; margin-bottom: 10px; color:var(--primary-color);">CASE STUDIES</h1>
        <p style="color:var(--highlight-color); font-weight: 700; letter-spacing: 0.15em; font-size: 1rem;">成功事例・実装インパクト</p>
    </div>
</div>

<main style="background: #f8f9fa; padding: 80px 0; position:relative; overflow:hidden;">
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

    <div class="container" style="position:relative; z-index:1;">
        <p style="text-align:center; margin-bottom:60px; color:var(--accent-color); font-size:1.15rem; line-height:1.8; max-width:800px; margin-left:auto; margin-right:auto;">
            デジタルの“余白”に設計と実装を入れ込み、ビジネスの成長を加速させた具体的なプロジェクトの成果をご紹介します。</p>

        <div class="works-grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px;">
            <?php 
            $delay = 1;
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                $industry = get_post_meta(get_the_ID(), 'cs_industry', true);
            ?>
            <a href="<?php the_permalink(); ?>" class="work-card-elegant fade-up delay-<?php echo $delay; ?>" style="display:block; text-decoration:none; color:inherit; background:#ffffff; border-radius:12px; transition:transform 0.4s ease, box-shadow 0.4s ease; box-shadow:0 5px 20px rgba(0,0,0,0.03); border:1px solid rgba(0,0,0,0.05); padding:20px;" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.08)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.03)';">
                
                <div class="img-wrapper" style="border-radius:8px; overflow:hidden; margin-bottom:20px; position:relative; aspect-ratio: 16/10; background:#f4f7f6;">
                    <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('large', ['style' => 'width:100%; height:100%; object-fit:cover; transition:transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);', 'class' => 'work-img']); ?>
                    <?php else: ?>
                        <!-- カスタムプレースホルダー -->
                        <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:var(--primary-color); opacity:0.3; font-size:1.5rem; font-weight:bold; background:linear-gradient(135deg, rgba(11,19,43,0.05), rgba(11,19,43,0.1)); transition:transform 0.6s ease;" class="work-img">
                            CASE STUDY
                        </div>
                    <?php endif; ?>
                    <div class="overlay" style="position:absolute; inset:0; background:rgba(229,57,53,0.1); opacity:0; transition:opacity 0.4s ease;"></div>
                </div>

                <div class="work-meta" style="display:flex; gap:10px; margin-bottom:15px; flex-wrap:wrap;">
                    <?php if($industry): ?>
                    <span style="font-size:0.8rem; background:rgba(11,19,43,0.05); color:var(--primary-color); padding:6px 15px; border-radius:30px; font-weight:bold; border:1px solid rgba(11,19,43,0.1);"><?php echo esc_html($industry); ?></span>
                    <?php endif; ?>
                </div>

                <h3 style="font-size:1.35rem; font-weight:700; color:var(--primary-color); margin:0 0 15px; line-height:1.5;"><?php the_title(); ?></h3>
                
                <div style="font-size:0.95rem; color:var(--highlight-color); font-weight:bold; display:flex; align-items:center; gap:5px; margin-top:10px;">
                    Read More <span style="font-size:1.2rem;">&rarr;</span>
                </div>
            </a>
            <?php 
                $delay++;
                if($delay > 4) $delay = 1;
            endwhile; else: ?>
                <p style="color:var(--accent-color);">まだ成功事例が登録されていません。</p>
            <?php endif; ?>
        </div>
        
        <div class="pagination fade-up" style="margin-top: 60px; text-align:center;">
            <?php the_posts_pagination(array('mid_size' => 2)); ?>
        </div>
    </div>
</main>

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

.pagination .page-numbers {
    display: inline-block;
    padding: 10px 15px;
    margin: 0 5px;
    background: #ffffff;
    color: var(--primary-color);
    border: 1px solid rgba(0,0,0,0.1);
    border-radius: 5px;
    text-decoration: none;
    transition: all 0.3s;
    font-weight:bold;
}
.pagination .page-numbers:hover {
    background: var(--highlight-color);
    color: #ffffff;
    border-color: var(--highlight-color);
}
.pagination .page-numbers.current {
    background: var(--highlight-color);
    color: #ffffff;
    border-color: var(--highlight-color);
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
