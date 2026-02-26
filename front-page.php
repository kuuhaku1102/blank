<?php get_header(); ?>

<!-- Three.js Background Canvas (Whole Page) -->
<canvas id="three-canvas" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<!-- 1. TOP MV -->
<section class="mv" style="position:relative; overflow:hidden; min-height: 100vh; display:flex; align-items:center; background: transparent;">
    
    <div class="mv-content container" style="position:relative; z-index:1; text-align:center; background: rgba(255, 255, 255, 0.5); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); padding: 80px 40px; border-radius: 30px; border: 1px solid rgba(255,255,255,0.7); box-shadow: 0 20px 50px rgba(0,0,0,0.05); max-width: 900px; margin-top: 50px;">
        <p class="mv-kicker" style="color:var(--highlight-color); font-weight:bold; letter-spacing:0.2em; margin-bottom:15px;">CONTROL THE BLANK</p>
        <h2 class="mv-catch" style="color:var(--primary-color); font-size:clamp(3.5rem, 7vw, 6rem); font-weight:900; margin-bottom:30px; line-height:1.2; letter-spacing:0.02em;">「」を、支配せよ。</h2>
        <p class="mv-sub" style="color:var(--primary-color); font-weight:bold; font-size:clamp(1.1rem, 1.5vw, 1.3rem); margin-bottom:0; line-height:1.8;">デザインとデータの究極の融合。<br>私たちは、ビジネスを加速させるデジタル空間の最適解を創り出します。</p>
    </div>
</section>

<!-- 2. News Ticker -->
<section class="top-news section-padding" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); padding: 40px 0; position:relative;">
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
<section class="top-vision section-padding" style="background: rgba(248, 249, 250, 0.7); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); position:relative; overflow:hidden; padding: 140px 0;">
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
<section class="top-services section-padding" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); padding: 120px 0; position:relative; overflow:hidden;">
    <!-- Abstract SVG Background for Services -->
    <svg style="position:absolute; top: -10%; left: -5%; width: 50%; height: 120%; opacity: 0.03; pointer-events: none; animation: floatOrb 25s infinite alternate-reverse;" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="40" fill="none" stroke="var(--primary-color)" stroke-width="0.5" stroke-dasharray="2 4" />
        <rect x="20" y="20" width="60" height="60" fill="none" stroke="var(--highlight-color)" stroke-width="0.2" transform="rotate(25 50 50)" />
        <polygon points="50,10 90,90 10,90" fill="none" stroke="var(--primary-color)" stroke-width="0.3" transform="rotate(-15 50 50)" />
    </svg>

    <div class="container" style="position:relative; z-index:1;">
        <div class="section-header" style="text-align:center; margin-bottom: 80px;">
            <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.9rem;">BUSINESS DOMAIN</p>
            <div style="overflow:hidden; padding-bottom:10px; perspective: 400px;"><h2 class="gsap-title" style="font-size: 3.5rem; font-weight: 800; margin:0; color:var(--primary-color);">Service</h2></div>
        </div>
        
        <div class="service-grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px;">
            <!-- Service 1 -->
            <div class="gsap-service">
                <a href="<?php echo esc_url(home_url('/service/#marketing')); ?>" class="service-card" style="background:var(--white); border-radius: 12px; transition: transform 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease; text-decoration: none; color: inherit; display:block; border: 1px solid rgba(0,0,0,0.03); box-shadow: 0 4px 20px rgba(0,0,0,0); overflow:hidden;">
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
            </div>
            
            <!-- Service 2 -->
            <div class="gsap-service">
                <a href="<?php echo esc_url(home_url('/service/#web')); ?>" class="service-card" style="background:var(--white); border-radius: 12px; transition: transform 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease; text-decoration: none; color: inherit; display:block; border: 1px solid rgba(0,0,0,0.03); box-shadow: 0 4px 20px rgba(0,0,0,0); overflow:hidden;">
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
            </div>

            <!-- Service 3 -->
            <div class="gsap-service">
                <a href="<?php echo esc_url(home_url('/service/#system')); ?>" class="service-card" style="background:var(--white); border-radius: 12px; transition: transform 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease; text-decoration: none; color: inherit; display:block; border: 1px solid rgba(0,0,0,0.03); box-shadow: 0 4px 20px rgba(0,0,0,0); overflow:hidden;">
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
    </div>
</section>

<!-- 5. Work (制作実績) -->
<section class="top-portfolio section-padding" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); padding: 100px 0; position:relative; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <div class="section-header" style="text-align:center; margin-bottom: 60px;">
            <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.9rem;">PORTFOLIO</p>
            <div style="overflow:hidden; padding-bottom:10px; perspective: 400px;"><h2 class="gsap-title" style="font-size: 3.5rem; font-weight: 800; margin:0; color:var(--primary-color);">Work</h2></div>
        </div>
    </div>

    <!-- Infinite Scroll Marquee -->
    <div class="marquee-wrapper gsap-marquee-anim" style="width: 100vw; overflow:hidden; margin-left: calc(50% - 50vw); position:relative; z-index:1; padding: 20px 0;">
        <style>
            .marquee-track {
                display: flex;
                gap: 30px;
                width: max-content;
                animation: marquee-scroll 50s linear infinite;
            }
            .marquee-track:hover {
                animation-play-state: paused;
            }
            .marquee-item {
                flex: 0 0 400px;
                border-radius: 16px;
                position: relative;
                box-shadow: 0 5px 25px rgba(0,0,0,0.03);
                transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
                background: #ffffff;
                border: 1px solid rgba(11,19,43,0.1);
                display: block;
                padding: 25px;
                text-decoration: none;
                color: inherit;
            }
            .marquee-item:hover {
                transform: translateY(-8px);
                box-shadow: 0 15px 35px rgba(0,0,0,0.08);
            }
            .marquee-img-wrap {
                width: 130px; flex-shrink: 0; border-radius: 10px; overflow: hidden; position: relative; aspect-ratio: 5/6; background: #edf2f6; display: flex; align-items: center; justify-content: center; padding: 15px;
            }
            .marquee-img {
                width: 100%; height: 100%; object-fit: contain; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.15)); transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            }
            .marquee-item:hover .marquee-img { transform: translateY(-4px) scale(1.05); }
            
            .marquee-btn {
                display:flex; align-items:center; justify-content:center; box-sizing:border-box; gap:8px; font-size:1rem; font-weight:bold; color:#ffffff; background:#e53935; border-radius:8px; padding:12px 30px; transition:all 0.3s cubic-bezier(0.16, 1, 0.3, 1); width:100%; text-align:center;
            }
            .marquee-item:hover .marquee-btn {
                background: #c62828; transform: translateY(-2px); box-shadow: 0 8px 15px rgba(229,57,53,0.3);
            }
            .marquee-item:hover .arrow { transform: translateX(5px); }

            @keyframes marquee-scroll {
                0% { transform: translateX(0); }
                100% { transform: translateX(calc(-50% - 15px)); } /* 15px is half of 30px gap */
            }
            @media (max-width: 768px) {
                .marquee-item { flex: 0 0 340px; padding: 20px; }
                .marquee-img-wrap { width: 110px; padding: 10px; }
            }
        </style>
        
        <div class="marquee-track">
            <?php
            // Custom Post Type "works" (制作実績) query
            $work_query = new WP_Query( array('post_type' => 'works', 'posts_per_page' => 6) );
            $works_html = '';
            
            if($work_query->have_posts()):
                ob_start();
                while($work_query->have_posts()): $work_query->the_post();
            ?>
            <a href="<?php the_permalink(); ?>" class="marquee-item">
                <div style="display:flex; gap:20px; margin-bottom:20px; align-items:flex-start;">
                    <div class="marquee-img-wrap">
                        <?php if(has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('medium', ['class' => 'marquee-img']); ?>
                        <?php else: ?>
                            <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:var(--primary-color); opacity:0.3; font-size:1rem; font-weight:bold;">NO IMG</div>
                        <?php endif; ?>
                    </div>
                    <div style="flex-grow:1; display:flex; flex-direction:column; padding-top:5px;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                            <span style="font-size:0.8rem; color:#91a6b4; font-weight:bold; font-family:'Courier New', monospace;">
                                <?php echo get_the_date('Y.m.d'); ?>
                            </span>
                        </div>
                        <h3 style="font-size:1.15rem; font-weight:800; color:#1c2541; margin:0 0 12px; line-height:1.4; text-align:left;"><?php the_title(); ?></h3>
                        
                        <!-- 業種 & 制作範囲 タグ -->
                        <div style="display:flex; flex-wrap:wrap; gap:6px;">
                            <?php 
                            // 業種 (Category / Industry from Taxonomy & JSON)
                            $industry_tags = [];
                            
                            // 1. Taxonomy
                            $terms = get_the_terms($post->ID, 'work_cat'); 
                            if($terms) {
                                foreach($terms as $t) {
                                    $industry_tags[] = $t->name;
                                }
                            }
                            
                            // 2. JSON Schema (works_features) - 業界・用途
                            $selected_features = get_post_meta( $post->ID, 'works_features', true ) ?: [];
                            if(!empty($selected_features) && function_exists('blank_works_get_default_schema')) {
                                $schema_json = get_option('blank_works_schema') ?: blank_works_get_default_schema();
                                $schema = json_decode($schema_json, true) ?: [];
                                
                                if(isset($schema['tabs']['industry']['groups'])) {
                                    foreach($schema['tabs']['industry']['groups'] as $group) {
                                        if(isset($group['fields'])) {
                                            foreach($group['fields'] as $field) {
                                                if(in_array($field['id'], $selected_features)) {
                                                    $industry_tags[] = $field['label'] ?? '';
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            // Clean up empty tags if any
                            $industry_tags = array_filter($industry_tags);
                            
                            // Fallback
                            if(empty($industry_tags)) {
                                $industry_tags[] = '実績';
                            }
                            
                            // Output
                            $industry_tags = array_unique($industry_tags);
                            foreach($industry_tags as $tag_name): ?>
                                <span style="font-size:0.7rem; background:#ffebee; color:#c62828; border:1px solid #ffcdd2; padding:3px 8px; border-radius:4px; font-weight:bold; white-space:nowrap;">
                                    <?php echo esc_html($tag_name); ?>
                                </span>
                            <?php endforeach; ?>
                            
                            <?php 
                            // 制作範囲 (Scope)
                            $scope = get_post_meta( $post->ID, 'scope', true ) ?: [];
                            if (!is_array($scope)) $scope = [];
                            foreach($scope as $s): ?>
                                <span style="font-size:0.7rem; background:#f0f4f8; color:#4a5568; border:1px solid #e2e8f0; padding:3px 8px; border-radius:4px; font-weight:bold; white-space:nowrap;">
                                    <?php echo esc_html($s); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div style="display:block; width:100%;">
                    <div class="marquee-btn">
                        詳しく見る <span style="font-size:1.2rem; transition:transform 0.3s;" class="arrow">&rarr;</span>
                    </div>
                </div>
            </a>
            <?php 
                endwhile; 
                $works_html = ob_get_clean();
                // Output twice for seamless infinite scroll
                echo $works_html . $works_html;
            else: 
            ?>
                <!-- Placeholder for visual preview when no posts exist -->
                <?php ob_start(); for($i=1; $i<=5; $i++): ?>
                <span class="marquee-item">
                    <div style="display:flex; gap:20px; margin-bottom:20px; align-items:flex-start;">
                        <div class="marquee-img-wrap">
                            <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:var(--primary-color); opacity:0.3; font-size:1rem; font-weight:bold;">WORK <?php echo $i; ?></div>
                        </div>
                        <div style="flex-grow:1; display:flex; flex-direction:column; padding-top:5px;">
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                                <span style="font-size:0.8rem; color:#91a6b4; font-weight:bold; font-family:'Courier New', monospace;">
                                    2024.01.01
                                </span>
                            </div>
                            <h3 style="font-size:1.15rem; font-weight:800; color:#1c2541; margin:0 0 12px; line-height:1.4; text-align:left;">Sample Work <?php echo $i; ?></h3>
                            <div style="display:flex; flex-wrap:wrap; gap:6px;">
                                <span style="font-size:0.7rem; background:#ffebee; color:#c62828; border:1px solid #ffcdd2; padding:3px 8px; border-radius:4px; font-weight:bold; white-space:nowrap;">LP制作</span>
                                <span style="font-size:0.7rem; background:#f0f4f8; color:#4a5568; border:1px solid #e2e8f0; padding:3px 8px; border-radius:4px; font-weight:bold; white-space:nowrap;">デザイン構築</span>
                            </div>
                        </div>
                    </div>
                    <div class="marquee-btn">詳しく見る <span class="arrow">&rarr;</span></div>
                </span>
                <?php endfor; $works_html = ob_get_clean(); echo $works_html . $works_html; ?>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
    
    <div class="fade-up" style="text-align:center; margin-top: 60px; position:relative; z-index:1;">
        <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="cta-btn-outline" style="color:var(--primary-color); border-color:var(--primary-color); padding: 14px 40px; border-radius:30px; border-width:2px;">VIEW ALL WORKS &rarr;</a>
    </div>
</section>

<!-- 5.5. Digital Marketing -->
<section class="top-marketing section-padding" style="background:#f4f7f9; padding: 120px 0; position:relative; overflow:hidden;">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <div class="container" style="display:flex; flex-wrap:wrap; align-items:center; gap:60px; position:relative; z-index:2;">
        
        <!-- Left Text Area -->
        <div class="fade-up" style="flex:1 1 400px; display:flex; flex-direction:column; justify-content:center;">
            <div style="border-left: 5px solid #1a56db; padding-left: 20px; margin-bottom: 30px;">
                <h2 style="font-size: 2.2rem; font-weight: 800; color:var(--primary-color); margin:0; line-height:1.4;">デジタルマーケティング領域</h2>
            </div>
            <p style="color:var(--accent-color); font-size:1.1rem; line-height:2; font-weight:bold;">
                蓄積されたナレッジと最新のノウハウを駆使し、<br>
                成果創出に向けた導線設計をデータドリブンで最適化します。
            </p>
        </div>

        <!-- Right Circular Icons Area -->
        <div class="fade-in" style="flex:1 1 500px; display:flex; justify-content:center; position:relative; min-height:500px;">
            <!-- Subtle gradient glow -->
            <div style="position:absolute; width:450px; height:450px; background:radial-gradient(circle, rgba(229,57,53,0.06) 0%, rgba(229,57,53,0) 60%); top:50%; left:50%; transform:translate(-50%, -50%); pointer-events:none; border-radius:50%;"></div>
            
            <div class="marketing-circle-container" style="position:relative; width:480px; height:480px; display:flex; align-items:center; justify-content:center;">
                <!-- Center Text -->
                <div style="position:absolute; z-index:10; text-align:center;">
                    <span style="display:block; color:#1a56db; font-size:1.3rem; font-weight:900; letter-spacing:0.05em; margin-bottom:6px;">Marketing Medias</span>
                    <span style="display:block; color:#1a56db; font-size:0.95rem; font-weight:bold;">対応可能なメディア</span>
                </div>

                <!-- Orbit Container -->
                <div class="orbit-run" style="position:absolute; width:100%; height:100%; animation: spinOrbit 50s linear infinite;">
                    <?php
                    $medias = [
                        ['name' => 'ジモティー', 'icon' => 'mdi:bullhorn', 'color' => '#000000'],
                        ['name' => 'グノシー', 'icon' => 'icon-park-solid:send', 'color' => '#E53935'],
                        ['name' => 'メルカリ', 'icon' => 'mdi:alpha-m-box', 'color' => '#e60012'],
                        ['name' => 'ABEMA', 'icon' => 'mdi:television-classic', 'color' => '#000000'],
                        ['name' => 'Google', 'icon' => 'logos:google-icon'],
                        ['name' => 'LINEYahoo', 'icon' => 'none', 'text_logo' => 'LY', 'color' => '#000000'],
                        ['name' => 'Meta', 'icon' => 'logos:meta-icon'],
                        ['name' => 'Microsoft', 'icon' => 'logos:microsoft-edge', 'color' => '#0078D7'],
                        ['name' => 'X', 'icon' => 'ri:twitter-x-fill', 'color' => '#000000'],
                        ['name' => 'TikTok', 'icon' => 'logos:tiktok-icon'],
                        ['name' => 'Smart News', 'icon' => 'fluent:news-28-filled', 'color' => '#000']
                    ];
                    $total = count($medias);
                    $radius = 190; 
                    $center = 240; 
                    
                    foreach($medias as $index => $media) {
                        $angle = ($index / $total) * 2 * pi() - (pi() / 2); // Start from top
                        $x = $center + $radius * cos($angle) - 40; 
                        $y = $center + $radius * sin($angle) - 40;
                        
                        $icon_color = isset($media['color']) ? 'style="color:'.$media['color'].';"' : '';
                        
                        echo '<div class="marketing-node" style="position:absolute; left:'.$x.'px; top:'.$y.'px; width:80px; height:80px; display:flex; flex-direction:column; align-items:center; justify-content:center; background:#ffffff; border-radius:50%; box-shadow:0 8px 25px rgba(0,0,0,0.06); animation: spinCounter 50s linear infinite; gap:4px; padding:10px; box-sizing:border-box;">';
                        
                        if(isset($media['text_logo'])) {
                            echo '<span style="font-size:1.4rem; font-weight:900; letter-spacing:-0.1em; line-height:1;" '.$icon_color.'>'.$media['text_logo'].'</span>';
                        } else {
                            echo '<iconify-icon icon="'.$media['icon'].'" width="28" height="28" '.$icon_color.'></iconify-icon>';
                        }
                        
                        echo '<span style="font-size:0.5rem; color:#50575e; font-weight:bold; text-align:center; line-height:1.2; word-break:keep-all; transform:scale(0.95);">'.$media['name'].'</span>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes spinOrbit {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
@keyframes spinCounter {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(-360deg); }
}
.marketing-circle-container:hover .orbit-run {
    animation-play-state: paused;
}
.marketing-circle-container:hover .marketing-node {
    animation-play-state: paused;
}
@media (max-width: 768px) {
    .marketing-circle-container { transform: scale(0.65); transform-origin: center center; }
}
</style>

<!-- 6. Case Studies -->
<section class="top-works section-padding" style="background: rgba(248, 249, 250, 0.7); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); padding: 120px 0; position:relative; overflow:hidden;">
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
        <div class="section-header" style="margin-bottom: 60px; display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px;">
            <div>
                <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.9rem;">WORKS</p>
                <div style="overflow:hidden; padding-bottom:10px; perspective: 400px;"><h2 class="gsap-title" style="font-size: 3.5rem; font-weight: 800; margin:0; color:var(--primary-color);">CaseStudy</h2></div>
            </div>
            <a href="<?php echo esc_url(get_post_type_archive_link('case_study')); ?>" class="view-all-link" style="color: var(--primary-color); font-weight:bold; border-bottom: 2px solid var(--primary-color); text-decoration:none; padding-bottom:5px; transition:all 0.3s;" onmouseover="this.style.color='var(--highlight-color)'; this.style.borderColor='var(--highlight-color)';" onmouseout="this.style.color='var(--primary-color)'; this.style.borderColor='var(--primary-color)';">VIEW ALL 事例一覧 &rarr;</a>
        </div>
    </div> <!-- Close container to allow full width scrolling -->

    <div class="works-horizontal-wrapper" style="width: 100vw; margin-left: calc(50% - 50vw); position:relative; z-index:1;">
        <style>
            .works-grid-horizontal {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                gap: 40px;
                /* Matches exactly with .container's left margin so the cards align properly */
                padding-left: max(20px, calc((100vw - 1200px) / 2));
                padding-right: max(20px, calc((100vw - 1200px) / 2));
                padding-bottom: 60px;
                scroll-behavior: smooth;
                scroll-snap-type: x mandatory;
                scrollbar-width: none; /* Firefox */
                -ms-overflow-style: none;  /* IE and Edge */
                -webkit-overflow-scrolling: touch;
            }
            .works-grid-horizontal::-webkit-scrollbar {
                display: none; /* Chrome, Safari and Opera */
            }
            .gsap-work-horizontal {
                flex: 0 0 420px;
                scroll-snap-align: start;
            }
            @media (max-width: 768px) {
                .gsap-work-horizontal {
                    flex: 0 0 85vw;
                }
            }
        </style>
        <div class="works-grid-horizontal">
            <?php
            $cs_query = new WP_Query( array('post_type' => 'case_study', 'posts_per_page' => 4) );
            if($cs_query->have_posts()): while($cs_query->have_posts()): $cs_query->the_post();
                $industry = get_post_meta(get_the_ID(), 'cs_industry', true);
            ?>
            <div class="gsap-work-horizontal">
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
            </div>
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

<!-- Scroll Animation Script for Generic Fade Elements -->
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

    // Only observe elements that aren't being fully overtaken by advanced GSAP from() tweens, 
    // or simply observe all of them so they get the necessary opacity:1 from .is-visible base class 
    // while GSAP handles the secondary animations.
    const fadeElements = document.querySelectorAll('.fade-up, .fade-in, .fade-left, .fade-right');
    fadeElements.forEach(el => observer.observe(el));
});
</script>

<!-- GSAP & ScrollTrigger Animations -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    gsap.registerPlugin(ScrollTrigger);

    // Dynamic Typography Animation for MV
    const catchTitle = document.querySelector('.mv-catch');
    if (catchTitle) {
        // Split text into characters. Isolate brackets.
        const chars = catchTitle.innerHTML.split('');
        catchTitle.innerHTML = chars.map(char => {
            if (char === ' ') return ' ';
            if (char === '「' || char === '」') {
                return `<span style="display:inline-block;" class="mv-bracket">${char}</span>`;
            } else {
                return `<span style="display:inline-block; transform-origin: left bottom;" class="mv-char">${char}</span>`;
            }
        }).join('');

        const tl = gsap.timeline();

        // 1. Kicker fade in
        tl.from(".mv-kicker", { opacity: 0, y: -20, duration: 1, ease: "power3.out" }, "+=0.1");

        // 2. Brackets fall from top
        tl.from(".mv-bracket", {
            y: -150,
            opacity: 0,
            scale: 1.2,
            duration: 1.0,
            ease: "bounce.out",
            stagger: 0.15 // Let them drop slightly offset for extra flair
        }, "-=0.2");

        // 3. Main title characters drop in with slight 3D rotation and stagger
        tl.from(".mv-char", {
            y: 80,
            opacity: 0,
            rotationZ: 5,
            rotationX: 90,
            scale: 0.8,
            stagger: 0.08,
            duration: 1.2,
            ease: "expo.out"
        }, "-=0.3"); // Overlap slightly with the brackets dropping

        // 4. Subtext slide up smoothly later
        tl.from(".mv-sub", {
            y: 40,
            opacity: 0,
            duration: 1.5,
            ease: "power4.out"
        }, "-=0.8");
    }

    // Fade out and scale down MV completely smoothly on scroll
    gsap.to(".mv-content", {
        y: -150,
        opacity: 0,
        scale: 0.9,
        scrollTrigger: {
            trigger: ".mv",
            start: "top top",
            end: "bottom center",
            scrub: 1.5
        }
    });

    // Vision Philosophy Background Text Scrub
    gsap.to(".bg-text", {
        xPercent: -30,
        scrollTrigger: {
            trigger: ".top-vision",
            start: "top bottom",
            end: "bottom top",
            scrub: 2
        }
    });

    // Vision Content Reveal Strategy
    gsap.from(".top-vision h2", {
        y: 60,
        opacity: 0,
        duration: 1.5,
        ease: "power3.out",
        scrollTrigger: { trigger: ".top-vision", start: "top 70%" }
    });
    gsap.from(".top-vision p", {
        y: 40,
        opacity: 0,
        duration: 1.5,
        delay: 0.3,
        ease: "power3.out",
        scrollTrigger: { trigger: ".top-vision", start: "top 70%" }
    });

    // Apple-style Service Cards Entrance
    gsap.from(".gsap-service", {
        y: 80,
        opacity: 0,
        stagger: 0.15,
        duration: 1.0,
        ease: "power3.out",
        scrollTrigger: {
            trigger: ".service-grid",
            start: "top 80%"
        }
    });

    // Case Studies Horizontal Reveal
    gsap.from(".gsap-work-horizontal", {
        x: 100, // Slide in horizontally
        opacity: 0,
        stagger: 0.15,
        duration: 1.0,
        ease: "power3.out",
        scrollTrigger: {
            trigger: ".works-horizontal-wrapper",
            start: "top 80%"
        }
    });

    // Work Marquee Fade In from the side (Stylish Benchmark Style)
    gsap.from(".gsap-marquee-anim", {
        opacity: 0,
        x: 300, // Slide in horizontally from the right
        duration: 1.8,
        ease: "power3.out",
        scrollTrigger: {
            trigger: ".top-portfolio",
            start: "top 75%"
        }
    });

    // News Items Side Sweep
    gsap.from(".news-item", {
        x: -50,
        opacity: 0,
        stagger: 0.1,
        duration: 1,
        ease: "power3.out",
        scrollTrigger: {
            trigger: ".news-list",
            start: "top 90%"
        }
    });
    
    // Recruit section parallax
    gsap.from(".top-recruit .fade-in", {
        backgroundPosition: "50% 100%",
        scrollTrigger: {
            trigger: ".top-recruit",
            start: "top bottom",
            end: "bottom top",
            scrub: true
        }
    });

    // Stylish Title Reveals
    gsap.utils.toArray('.gsap-title').forEach(title => {
        gsap.from(title, {
            y: 80,
            opacity: 0,
            rotationX: -45,
            transformOrigin: "0% 50% -50",
            duration: 1.2,
            ease: "expo.out",
            scrollTrigger: {
                trigger: title.closest('.section-header'),
                start: "top 85%"
            }
        });
    });

    gsap.utils.toArray('.gsap-subtitle').forEach(sub => {
        gsap.from(sub, {
            x: -20,
            opacity: 0,
            duration: 1.0,
            delay: 0.1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: sub.closest('.section-header'),
                start: "top 85%"
            }
        });
    });
});
</script>

<!-- Three.js CDN and Animation Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const canvas = document.getElementById('three-canvas');
    if (!canvas) return;

    // Scene Setup
    const scene = new THREE.Scene();
    
    // Camera Setup
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.z = 30;

    // Renderer Setup
    const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    // Particle Setup (Tech/Data feel)
    const particlesGeometry = new THREE.BufferGeometry();
    const particlesCount = 800;
    
    const posArray = new Float32Array(particlesCount * 3);
    const colorsArray = new Float32Array(particlesCount * 3);

    const color1 = new THREE.Color('#91a6b4'); // Primary Slate Gray text color
    const color2 = new THREE.Color('#e53935'); // Highlight Red

    for(let i = 0; i < particlesCount * 3; i+=3) {
        // Spread particles
        posArray[i] = (Math.random() - 0.5) * 80;     // x
        posArray[i+1] = (Math.random() - 0.5) * 80;   // y
        posArray[i+2] = (Math.random() - 0.5) * 40;   // z

        // Mix colors
        const mixedColor = color1.clone().lerp(color2, Math.random() * 0.3); // Mostly navy, some red hint
        colorsArray[i] = mixedColor.r;
        colorsArray[i+1] = mixedColor.g;
        colorsArray[i+2] = mixedColor.b;
    }

    particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
    particlesGeometry.setAttribute('color', new THREE.BufferAttribute(colorsArray, 3));

    const particlesMaterial = new THREE.PointsMaterial({
        size: 0.15,
        vertexColors: true,
        transparent: true,
        opacity: 0.7,
        blending: THREE.NormalBlending
    });

    const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
    scene.add(particlesMesh);

    // Connecting Lines (Network effect)
    const lineMaterial = new THREE.LineBasicMaterial({
        color: 0x0b132b,
        transparent: true,
        opacity: 0.12
    });

    // We only connect a few to keep performance high
    const lineGeometry = new THREE.BufferGeometry();
    const linePositions = [];
    for(let i=0; i<300; i++) {
        const x = (Math.random() - 0.5) * 60;
        const y = (Math.random() - 0.5) * 60;
        const z = (Math.random() - 0.5) * 20;
        linePositions.push(x, y, z);
    }
    lineGeometry.setAttribute('position', new THREE.Float32BufferAttribute(linePositions, 3));
    const linesMesh = new THREE.LineSegments(lineGeometry, lineMaterial);
    scene.add(linesMesh);

    // Mouse Interaction
    let mouseX = 0;
    let mouseY = 0;
    let targetX = 0;
    let targetY = 0;

    const windowHalfX = window.innerWidth / 2;
    const windowHalfY = window.innerHeight / 2;

    document.addEventListener('mousemove', (event) => {
        mouseX = (event.clientX - windowHalfX) * 0.001;
        mouseY = (event.clientY - windowHalfY) * 0.001;
    });

    // Scroll Interaction
    let scrollY = window.scrollY;
    window.addEventListener('scroll', () => {
        scrollY = window.scrollY;
    });

    // Animation Loop
    const clock = new THREE.Clock();

    const animate = () => {
        const elapsedTime = clock.getElapsedTime();

        // Parallax & smooth rotation based on mouse
        targetX = mouseX * 0.5;
        targetY = mouseY * 0.5;
        
        particlesMesh.rotation.y += 0.001;
        particlesMesh.rotation.x += 0.0005;
        
        linesMesh.rotation.y -= 0.0005;

        // Interactive mouse movement
        camera.position.x += (mouseX - camera.position.x) * 0.05;
        camera.position.y += (-mouseY - camera.position.y) * 0.05;

        // Scroll effect: move elements upwards as user scrolls down
        const scrollOffset = scrollY * 0.005;
        particlesMesh.position.y = scrollOffset;
        linesMesh.position.y = scrollOffset * 1.5;

        // Slightly pulse particles
        particlesMaterial.size = 0.15 + Math.sin(elapsedTime * 2) * 0.05;

        renderer.render(scene, camera);
        requestAnimationFrame(animate);
    }

    animate();

    // Responsive
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
});
</script>

<?php get_footer(); ?>
