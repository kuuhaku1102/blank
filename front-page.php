<?php get_header(); ?>

<!-- 1. TOP MV -->
<section class="mv">
    <div class="mv-bg-svg" aria-hidden="true">
        <svg viewBox="0 0 1440 800" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" role="img">
            <defs>
                <linearGradient id="freshGradMain" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#e53935" stop-opacity="0.6" />
                    <stop offset="100%" stop-color="#ef5350" stop-opacity="0.2" />
                </linearGradient>
                <linearGradient id="freshGradSub" x1="100%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#a18cd1" stop-opacity="0.5" />
                    <stop offset="100%" stop-color="#fbc2eb" stop-opacity="0.1" />
                </linearGradient>
                <filter id="blurEffect" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="80" />
                </filter>
            </defs>

            <!-- Organic Fluid Blobs for a fresh feel -->
            <g filter="url(#blurEffect)" opacity="0.8">
                <path d="M 900 0 Q 1200 -50 1400 200 T 1500 600 T 1100 800 T 900 0 Z" fill="url(#freshGradSub)" style="animation: fluidMorph 20s infinite alternate;" />
                <path d="M 50 300 Q 250 50 550 250 T 800 650 T 300 850 T 50 300 Z" fill="url(#freshGradMain)" style="animation: fluidMorph2 25s infinite alternate-reverse;" />
            </g>

            <!-- Crisp Modern Outline Accents -->
            <path d="M-100,550 C300,400 600,750 1500,200" fill="none" stroke="#e53935" stroke-width="2" opacity="0.3" style="stroke-dasharray: 2000; stroke-dashoffset: 2000; animation: drawLine 8s ease-out forwards;" />
            <path d="M-100,450 C400,650 800,150 1500,450" fill="none" stroke="#5a67d8" stroke-width="1.5" opacity="0.2" style="stroke-dasharray: 2000; stroke-dashoffset: 2000; animation: drawLine 10s ease-out 0.5s forwards;" />

            <!-- Small Floating Particles -->
            <g opacity="0.6" style="animation: floatOrb 15s ease-in-out infinite alternate;">
                <circle cx="250" cy="200" r="4" fill="#e53935" />
                <circle cx="1150" cy="450" r="6" fill="#a18cd1" />
                <circle cx="850" cy="180" r="3" fill="#e53935" />
                <circle cx="450" cy="650" r="4" fill="#5a67d8" />
            </g>
        </svg>
    </div>

    <div class="mv-content container">
        <p class="mv-kicker">CONTROL THE BLANK</p>
        <h2 class="mv-catch">空白を、支配せよ。</h2>
        <p class="mv-sub">デザインとデータの究極の融合。<br>私たちは、ビジネスを加速させるデジタル空間の最適解を創り出します。</p>
        <div class="mv-btns">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn">無料相談はこちら</a>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>" class="cta-btn-outline">実績を見る</a>
        </div>

        <div class="mv-highlight-data">
            <div class="mv-highlight-item">
                <span>平均CV改善率</span>
                <strong>250<i>%</i></strong>
            </div>
            <div class="mv-highlight-item">
                <span>制作実績</span>
                <strong>500<i>+</i></strong>
            </div>
            <div class="mv-highlight-item">
                <span>継続率</span>
                <strong>92<i>%</i></strong>
            </div>
        </div>
    </div>
</section>

<!-- 2. News Ticker -->
<section class="top-news section-padding" style="background: var(--white); padding: 40px 0;">
    <div class="container flex-row fade-up" style="display:flex; flex-wrap: wrap; align-items:flex-start; border-top: 1px solid var(--light-gray); padding-top: 40px;">
        <h2 class="news-heading" style="flex:0 0 150px; font-size: 1.2rem; letter-spacing: 0.1em; font-weight:700; color:var(--primary-color); margin-top:0;">NEWS</h2>
        <div class="news-list" style="flex: 1; min-width:300px;">
            <?php
            $news_args = array('post_type' => 'news', 'posts_per_page' => 3);
            $news_query = new WP_Query($news_args);
            if($news_query->have_posts()): while($news_query->have_posts()): $news_query->the_post();
            ?>
            <article class="news-item" style="border-bottom: 1px solid var(--light-gray); padding-bottom: 20px; margin-bottom: 20px;">
                <a href="<?php the_permalink(); ?>" class="news-link" style="display: flex; gap: 20px; align-items:center; text-decoration:none; color: var(--text-color); transition: opacity 0.3s;">
                    <time style="color: var(--highlight-color); font-weight: bold; font-size: 0.95rem; flex:0 0 100px;"><?php echo get_the_date('Y.m.d'); ?></time>
                    <h3 style="margin: 0; font-size: 1.05rem; font-weight: 500; flex: 1;"><?php the_title(); ?></h3>
                    <span class="arrow" style="color: var(--light-gray); font-size: 1.2rem;">&rarr;</span>
                </a>
            </article>
            <?php endwhile; wp_reset_postdata(); else: ?>
            <p style="font-size:0.95rem; color:var(--accent-color);">現在お知らせはありません。</p>
            <?php endif; ?>
        </div>
        <div style="flex: 0 0 150px; text-align:right; margin-top: 5px;">
            <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>" class="view-all-link" style="color:var(--primary-color); font-weight:bold; border-bottom:1px solid var(--primary-color); padding-bottom:3px; text-decoration:none;">VIEW ALL &rarr;</a>
        </div>
    </div>
</section>

<!-- 3. Vision / Concept -->
<section class="top-vision section-padding" style="position:relative; overflow:hidden; background: var(--bg-color); padding: 140px 0;">
    <div class="bg-text fade-in" style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); font-size: 16vw; color: rgba(11, 19, 43, 0.03); font-weight:900; white-space:nowrap; pointer-events:none; z-index:0;">PHILOSOPHY</div>
    <div class="container fade-up" style="position:relative; z-index:1; text-align:center;">
        <h2 style="font-size: 3rem; color: var(--primary-color); margin-bottom: 40px; font-weight:700; line-height:1.4;">デジタルとクリエイティブで、<br>次の「当たり前」を創る。</h2>
        <p style="font-size: 1.15rem; line-height: 2.2; margin-bottom: 50px; color: var(--accent-color);">
            株式会社blankは、単なるWeb制作会社ではありません。<br>
            事業戦略に基づいたUI/UX設計、データドリブンなマーケティング運用、<br>
            そして最新テクノロジーを駆使したシステム開発を通じて、<br>
            クライアントのビジネス成長を強固に推進するDXパートナーです。
        </p>
        <a href="<?php echo esc_url(home_url('/about/')); ?>" class="cta-btn-outline" style="color:var(--primary-color) !important; border-color:var(--primary-color); padding: 14px 40px; font-size:1.1rem;">企業情報を見る</a>
    </div>
</section>

<!-- 4. Services / Business Domain -->
<section class="top-services section-padding" style="background: var(--white); padding: 120px 0; position:relative; overflow:hidden;">
    <!-- Abstract SVG Background for Services -->
    <svg style="position:absolute; top: -10%; left: -5%; width: 50%; height: 120%; opacity: 0.03; pointer-events: none; animation: floatOrb 25s infinite alternate-reverse;" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="40" fill="none" stroke="var(--primary-color)" stroke-width="0.5" stroke-dasharray="2 4" />
        <rect x="20" y="20" width="60" height="60" fill="none" stroke="var(--highlight-color)" stroke-width="0.2" transform="rotate(25 50 50)" />
        <polygon points="50,10 90,90 10,90" fill="none" stroke="var(--primary-color)" stroke-width="0.3" transform="rotate(-15 50 50)" />
    </svg>

    <div class="container" style="position:relative; z-index:1;">
        <div class="section-header fade-up" style="text-align:center; margin-bottom: 80px;">
            <p style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.9rem;">BUSINESS DOMAIN</p>
            <h2 style="font-size: 2.8rem; font-weight: 700; margin:0; color:var(--primary-color);">提供領域</h2>
        </div>
        
        <div class="service-grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px;">
            <!-- Service 1 -->
            <a href="<?php echo esc_url(home_url('/service/#marketing')); ?>" class="service-card fade-up delay-1" style="background:var(--bg-color); border-radius: 12px; transition: all 0.4s ease; text-decoration: none; color: inherit; display:block; border: 1px solid rgba(0,0,0,0.03); box-shadow: 0 4px 20px rgba(0,0,0,0); overflow:hidden;">
                <div class="icon" style="height:200px; overflow:hidden; position:relative;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/service1.jpg" alt="マーケティングDX" style="width:100%; height:100%; object-fit:cover; transition: transform 0.6s ease;" class="card-img" />
                    <div style="position:absolute; inset:0; background:linear-gradient(to bottom, rgba(0,0,0,0), rgba(229, 57, 53, 0.4)); blend-mode:multiply;"></div>
                </div>
                <div style="padding: 40px;">
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 20px; color: var(--primary-color);">マーケティングDX</h3>
                <p style="font-size: 1rem; color: var(--accent-color); line-height: 1.7; margin-bottom:30px;">データ分析に基づく戦略立案から、Google/Meta広告・SEOなどの実行支援まで一気通貫で行います。</p>
                <div class="btn-arrow" style="font-weight:bold; color:var(--highlight-color); display:flex; align-items:center; gap:8px;">詳しく見る <span style="font-size:1.2rem;">&rarr;</span></div>
                </div>
            </a>
            
            <!-- Service 2 -->
            <a href="<?php echo esc_url(home_url('/service/#web')); ?>" class="service-card fade-up delay-2" style="background:var(--bg-color); border-radius: 12px; transition: all 0.4s ease; text-decoration: none; color: inherit; display:block; border: 1px solid rgba(0,0,0,0.03); box-shadow: 0 4px 20px rgba(0,0,0,0); overflow:hidden;">
                <div class="icon" style="height:200px; overflow:hidden; position:relative;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/service2.jpg" alt="クリエイティブ・Web制作" style="width:100%; height:100%; object-fit:cover; transition: transform 0.6s ease;" class="card-img" />
                    <div style="position:absolute; inset:0; background:linear-gradient(to bottom, rgba(0,0,0,0), rgba(90, 103, 216, 0.4)); blend-mode:multiply;"></div>
                </div>
                <div style="padding: 40px;">
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 20px; color: var(--primary-color);">クリエイティブ・Web制作</h3>
                <p style="font-size: 1rem; color: var(--accent-color); line-height: 1.7; margin-bottom:30px;">コーポレートサイトやCV特化型LPなど、最新のUI/UXを取り入れたハイクオリティなデザインを提供します。</p>
                <div class="btn-arrow" style="font-weight:bold; color:var(--highlight-color); display:flex; align-items:center; gap:8px;">詳しく見る <span style="font-size:1.2rem;">&rarr;</span></div>
                </div>
            </a>

            <!-- Service 3 -->
            <a href="<?php echo esc_url(home_url('/service/#system')); ?>" class="service-card fade-up delay-3" style="background:var(--bg-color); border-radius: 12px; transition: all 0.4s ease; text-decoration: none; color: inherit; display:block; border: 1px solid rgba(0,0,0,0.03); box-shadow: 0 4px 20px rgba(0,0,0,0); overflow:hidden;">
                <div class="icon" style="height:200px; overflow:hidden; position:relative;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/service3.jpg" alt="システム・アプリ開発" style="width:100%; height:100%; object-fit:cover; transition: transform 0.6s ease;" class="card-img" />
                    <div style="position:absolute; inset:0; background:linear-gradient(to bottom, rgba(0,0,0,0), rgba(11, 19, 43, 0.4)); blend-mode:multiply;"></div>
                </div>
                <div style="padding: 40px;">
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 20px; color: var(--primary-color);">システム・アプリ開発</h3>
                <p style="font-size: 1rem; color: var(--accent-color); line-height: 1.7; margin-bottom:30px;">業務のデジタルトランスフォーメーションを支えるシステムや、専用Webアプリケーションをスクラッチで開発します。</p>
                <div class="btn-arrow" style="font-weight:bold; color:var(--highlight-color); display:flex; align-items:center; gap:8px;">詳しく見る <span style="font-size:1.2rem;">&rarr;</span></div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- 5. Case Studies -->
<section class="top-works section-padding" style="background: #f8f9fa; padding: 120px 0; position:relative; overflow:hidden;">
    <!-- Elegant geometric abstract data network for professional tech feel -->
    <svg style="position:absolute; top:-20%; right:-10%; width:60%; opacity:0.04; pointer-events:none; animation: fluidMorph2 25s infinite alternate ease-in-out;" viewBox="0 0 100 100">
        <circle cx="20" cy="50" r="3" fill="var(--primary-color)" />
        <circle cx="80" cy="20" r="4" fill="var(--highlight-color)" />
        <circle cx="50" cy="80" r="5" fill="var(--primary-color)" />
        <path d="M20,50 L80,20 L50,80 Z" fill="none" stroke="var(--primary-color)" stroke-width="0.3"/>
        <path d="M0,0 M20,50 Q40,20 80,20 Q60,60 50,80 Q30,60 20,50 Z" fill="none" stroke="var(--primary-color)" stroke-width="0.1" />
        <line x1="20" y1="50" x2="-20" y2="60" stroke="var(--primary-color)" stroke-width="0.2"/>
        <line x1="80" y1="20" x2="120" y2="10" stroke="var(--primary-color)" stroke-width="0.2"/>
        <line x1="50" y1="80" x2="60" y2="120" stroke="var(--primary-color)" stroke-width="0.2"/>
    </svg>

    <div class="container" style="position:relative; z-index:1;">
        <div class="section-header fade-up" style="margin-bottom: 60px; display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px;">
            <div>
                <p style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.9rem;">CASE STUDIES</p>
                <h2 style="font-size: 2.8rem; font-weight: 700; margin:0; color:var(--primary-color);">成功事例（実装インパクト）</h2>
            </div>
            <a href="<?php echo esc_url(get_post_type_archive_link('case_study')); ?>" class="view-all-link" style="color: var(--primary-color); font-weight:bold; border-bottom: 2px solid var(--primary-color); text-decoration:none; padding-bottom:5px; transition:all 0.3s;" onmouseover="this.style.color='var(--highlight-color)'; this.style.borderColor='var(--highlight-color)';" onmouseout="this.style.color='var(--primary-color)'; this.style.borderColor='var(--primary-color)';">VIEW ALL 事例一覧 &rarr;</a>
        </div>

        <div class="works-grid fade-up delay-1" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
            <?php
            $cs_query = new WP_Query( array('post_type' => 'case_study', 'posts_per_page' => 4) );
            if($cs_query->have_posts()): while($cs_query->have_posts()): $cs_query->the_post();
                $industry = get_post_meta(get_the_ID(), 'cs_industry', true);
            ?>
            <a href="<?php the_permalink(); ?>" class="work-card-elegant" style="display:block; text-decoration:none; color:inherit; background:#ffffff; border-radius:12px; transition:transform 0.4s ease, box-shadow 0.4s ease; box-shadow:0 5px 20px rgba(0,0,0,0.03); border:1px solid rgba(0,0,0,0.05); padding:20px;" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.08)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.03)';">
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
                <div class="work-meta" style="display:flex; gap:10px; margin-bottom:12px; flex-wrap:wrap;">
                    <?php if($industry): ?>
                    <span style="font-size:0.75rem; background:rgba(11,19,43,0.05); color:var(--primary-color); padding:6px 14px; border-radius:20px; font-weight:bold; border:1px solid rgba(11,19,43,0.1);"><?php echo esc_html($industry); ?></span>
                    <?php endif; ?>
                </div>
                <h3 style="font-size:1.25rem; font-weight:700; color:var(--primary-color); margin:0 0 10px; line-height:1.5;"><?php the_title(); ?></h3>
                <div style="font-size:0.9rem; color:var(--highlight-color); font-weight:bold; display:flex; align-items:center; gap:5px; margin-top:20px;">
                    Read More <span style="font-size:1.2rem;">&rarr;</span>
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); else: ?>
                <p style="color:var(--accent-color);">成功事例は現在準備中です。</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- 6. Recruit & Culture (Half image layout) -->
<section class="top-recruit" style="background:var(--white); display:flex; flex-wrap:wrap;">
    <div class="fade-up" style="flex:1 1 50%; min-width:300px; padding: 120px 5% 120px 10%; display:flex; flex-direction:column; justify-content:center;">
        <p style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.9rem;">RECRUIT</p>
        <h2 style="font-size: 2.8rem; font-weight: 700; margin:0 0 30px; color:var(--primary-color);">共に、デジタルの<br>最前線を開拓する。</h2>
        <p style="color:var(--accent-color); line-height:2; margin-bottom:50px; font-size:1.1rem;">
            私たちは、熱意と専門性を持った新しい才能を常に探しています。<br>
            圧倒的なスピードで成長する環境で、クライアントの課題解決に挑み、<br>
            あなた自身のキャリアも劇的にアップデートさせませんか？
        </p>
        <div>
            <a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="cta-btn" style="display:inline-block; font-size:1.1rem; padding: 16px 40px;">採用情報を見る</a>
        </div>
    </div>
    <div class="fade-in" style="flex:1 1 50%; min-width:300px; background:linear-gradient(135deg, rgba(229,57,53,0.9), rgba(11,19,43,0.95)); position:relative; min-height:400px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
        <!-- Geometric pattern to represent digital space -->
        <svg style="position:absolute; width:150%; height:150%; top:-25%; left:-25%; opacity:0.1; animation: fluidMorph 30s infinite linear;" viewBox="0 0 100 100">
             <circle cx="50" cy="50" r="40" fill="none" stroke="#fff" stroke-width="0.5" stroke-dasharray="2 4" />
             <polygon points="50,10 90,90 10,90" fill="none" stroke="#fff" stroke-width="0.5" />
             <rect x="25" y="25" width="50" height="50" fill="none" stroke="#e53935" stroke-width="0.8" />
        </svg>
        <div style="position:absolute; inset:0; background: url('<?php echo get_template_directory_uri(); ?>/assets/img/service1.jpg') center/cover no-repeat; opacity: 0.2; mix-blend-mode: luminosity;"></div>
        <div style="text-align:center; position:relative; z-index:1;">
            <p style="color:rgba(255,255,255,0.8); font-size:1.5rem; letter-spacing:0.3em; font-weight:300;">JOIN OUR TEAM</p>
        </div>
    </div>
</section>

<!-- 7. Contact -->
<section class="contact-section" style="padding:140px 0; background:var(--bg-color); text-align:center;">
    <div class="container fade-up">
        <h2 style="font-size: 2.5rem; color:var(--primary-color); margin-bottom: 25px; font-weight:700;">ビジネスを加速させませんか？</h2>
        <p style="margin-bottom: 50px; color:var(--accent-color); font-size:1.15rem; line-height:1.8;">新規プロジェクトのご相談、お見積り、DX推進に関するお悩みなど<br>些細なことでもお気軽にお問い合わせください。専門のコンサルタントが的確に対応いたします。</p>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cta-btn" style="font-size: 1.25rem; padding: 20px 60px;">無料相談・お問い合わせフォームへ</a>
    </div>
</section>

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

    const fadeElements = document.querySelectorAll('.fade-up, .fade-in, .fade-left, .fade-right');
    fadeElements.forEach(el => observer.observe(el));
});
</script>

<?php get_footer(); ?>
