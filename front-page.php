<?php get_header(); ?>

<!-- 1. TOP MV -->
<section class="mv">
    <div class="mv-bg-svg" aria-hidden="true">
        <svg viewBox="0 0 1440 800" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" role="img">
            <defs>
                <linearGradient id="freshGradMain" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#f88379" stop-opacity="0.6" />
                    <stop offset="100%" stop-color="#fda085" stop-opacity="0.2" />
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
            <path d="M-100,550 C300,400 600,750 1500,200" fill="none" stroke="#f88379" stroke-width="2" opacity="0.3" style="stroke-dasharray: 2000; stroke-dashoffset: 2000; animation: drawLine 8s ease-out forwards;" />
            <path d="M-100,450 C400,650 800,150 1500,450" fill="none" stroke="#5a67d8" stroke-width="1.5" opacity="0.2" style="stroke-dasharray: 2000; stroke-dashoffset: 2000; animation: drawLine 10s ease-out 0.5s forwards;" />

            <!-- Small Floating Particles -->
            <g opacity="0.6" style="animation: floatOrb 15s ease-in-out infinite alternate;">
                <circle cx="250" cy="200" r="4" fill="#f88379" />
                <circle cx="1150" cy="450" r="6" fill="#a18cd1" />
                <circle cx="850" cy="180" r="3" fill="#f88379" />
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

<!-- 斜め区切り装飾 SVG -->
<div class="section-divider">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" preserveAspectRatio="none">
        <polygon fill="var(--bg-color)" points="0,100 1440,0 1440,100" />
    </svg>
</div>

<!-- blankの強み (3〜4ブロック) -->
<section class="strengths container">
    <h2 class="section-title">blankの強み</h2>
    <div class="grid">
        <div class="strength-item">
            <h3>戦略設計から制作まで一気通貫</h3>
            <p>事業の目的を深く理解した上で、コンセプトの立案からデザイン、システム実装までをワンストップで提供します。</p>
        </div>
        <div class="strength-item">
            <h3>マーケティング視点のデザイン</h3>
            <p>見た目の美しさだけでなく、ユーザーを確実にコンバージョンへ導くためのUI/UX設計とデザインを行います。</p>
        </div>
        <div class="strength-item">
            <h3>データドリブン改善</h3>
            <p>作って終わりではありません。公開後もGA4などのデータを分析し、改善施策を継続的に打ち出します。</p>
        </div>
        <div class="strength-item">
            <h3>内製開発体制</h3>
            <p>システム開発や技術的に高度な要件も、自社のエンジニア体制でセキュアかつ高品質に対応します。</p>
        </div>
    </div>
</section>

<!-- サービス一覧 -->
<section class="services container" style="background:var(--bg-color);">
    <h2 class="section-title">サービス一覧</h2>
    <div class="grid">
        <div class="service-item">
            <h3>Web制作</h3>
            <p>コーポレートサイト、LP制作、採用サイト、ECサイト構築まで対応。</p>
            <a href="<?php echo esc_url( home_url( '/service/#web' ) ); ?>">詳しく見る &rarr;</a>
        </div>
        <div class="service-item">
            <h3>LP特化制作</h3>
            <p>広告のパフォーマンスを最大化するCVR特化型のランディングページ。</p>
            <a href="<?php echo esc_url( home_url( '/service/#lp' ) ); ?>">詳しく見る &rarr;</a>
        </div>
        <div class="service-item">
            <h3>デザイン制作</h3>
            <p>バナー、UI/UX設計、ブランドデザイン等のクリエイティブ。</p>
            <a href="<?php echo esc_url( home_url( '/service/#design' ) ); ?>">詳しく見る &rarr;</a>
        </div>
        <div class="service-item">
            <h3>マーケティング支援</h3>
            <p>Web広告運用(Google/Meta)、SEO対策、GA4導入支援。</p>
            <a href="<?php echo esc_url( home_url( '/service/#marketing' ) ); ?>">詳しく見る &rarr;</a>
        </div>
        <div class="service-item">
            <h3>システム開発</h3>
            <p>会員サイト、マッチングサイト、カスタムWebアプリ等の構築。</p>
            <a href="<?php echo esc_url( home_url( '/service/#system' ) ); ?>">詳しく見る &rarr;</a>
        </div>
    </div>
</section>

<!-- 実績ハイライト -->
<section class="works-highlight container">
    <h2 class="section-title">実績ハイライト</h2>
    <div class="grid" style="display:grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
        <?php
        $args = array( 'post_type' => 'works', 'posts_per_page' => 3 );
        $works_query = new WP_Query( $args );
        if( $works_query->have_posts() ) :
            while( $works_query->have_posts() ) : $works_query->the_post();
        ?>
            <div class="work-card" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden; background:var(--white);">
                <?php if( has_post_thumbnail() ): ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php else: ?>
                    <div style="background:#ddd; height: 200px; width: 100%;"></div>
                <?php endif; ?>
                <div style="padding: 15px;">
                    <h3 style="font-size: 1.2rem; margin-bottom: 10px;"><?php the_title(); ?></h3>
                    <a href="<?php the_permalink(); ?>">詳細を見る &rarr;</a>
                </div>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else:
        ?>
            <p>実績は準備中です。</p>
        <?php endif; ?>
    </div>
    <div style="text-align: center; margin-top: 50px;">
        <a href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>" class="cta-btn-outline" style="color:var(--primary-color) !important; border-color:var(--primary-color);">すべての実績を見る &rarr;</a>
    </div>
</section>

<!-- 波形区切り装飾 SVG -->
<div class="section-divider" style="background:var(--white);">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
        <path fill="var(--secondary-color)" d="M0,0 C320,120 420,120 720,60 C1020,0 1120,0 1440,60 L1440,120 L0,120 Z" />
    </svg>
</div>

<!-- 数字で見るblank -->
<section class="numbers" style="padding: 60px 0;">
    <div class="container">
        <h2 class="section-title" style="color:var(--white);">数字で見るblank</h2>
        <div class="grid">
            <div class="number-item">
                <div class="num">500+</div>
                <div class="label">制作実績数</div>
            </div>
            <div class="number-item">
                <div class="num">250%</div>
                <div class="label">CV改善率(平均)</div>
            </div>
            <div class="number-item">
                <div class="num">92%</div>
                <div class="label">継続率</div>
            </div>
        </div>
    </div>
</section>

<!-- 導入事例 (成功事例) -->
<section class="casestudy-highlight container">
    <h2 class="section-title">導入事例</h2>
    <div class="grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
        <?php
        $args2 = array( 'post_type' => 'case_study', 'posts_per_page' => 2 );
        $case_query = new WP_Query( $args2 );
        if( $case_query->have_posts() ) :
            while( $case_query->have_posts() ) : $case_query->the_post();
        ?>
        <div class="case-card" style="border: 1px solid var(--light-gray); padding: 20px; border-radius: 8px;">
            <h3 style="font-size: 1.2rem; margin-bottom: 10px;"><?php the_title(); ?></h3>
            <div style="margin-bottom: 15px;"><?php the_excerpt(); ?></div>
            <a href="<?php the_permalink(); ?>" style="font-weight: bold;">事例の詳細を読む &rarr;</a>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else:
        ?>
        <p>事例は現在公開準備中です。</p>
        <?php endif; ?>
    </div>
</section>

<!-- お問い合わせ導線 -->
<section class="contact-section">
    <div class="container" style="padding: 60px 0;">
        <h2 class="section-title">ビジネスを加速させませんか？</h2>
        <p style="margin-bottom: 30px;">些細なことでもお気軽にご相談ください。専門のコンサルタントが対応いたします。</p>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn" style="font-size: 1.2rem; padding: 15px 40px;">無料相談・お問い合わせ</a>
    </div>
</section>

<?php get_footer(); ?>
