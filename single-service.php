<?php
get_header(); ?>

<!-- Global Three.js Background for Service Detail -->
<canvas id="three-canvas-service-single" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<?php 
// 判定フラグ: 現在の投稿がWeb制作関連のものか、LP関連のものか簡易判定
$t_title = urldecode($post->post_title);
$t_slug = urldecode($post->post_name);
$is_web_service = (strpos($t_slug, 'web') !== false || strpos($t_title, 'Web') !== false || strpos($t_title, 'コーポレート') !== false);
$is_lp_service = (strpos($t_slug, 'lp') !== false || strpos($t_title, 'LP') !== false || strpos($t_title, 'ランディングページ') !== false);
?>

<?php if($is_lp_service): ?>
    <?php get_template_part('template-parts/service', 'lp'); ?>
<?php elseif($is_web_service): ?>
<!-- ==========================================
     WEB DESIGN SERVICE SPECIAL LAYOUT
=========================================== -->
<div class="service-detail-wrapper" style="background:transparent; overflow:hidden;">

    <!-- 1. HERO SECTION -->
    <section class="service-hero" style="position:relative; width:100%; min-height:90vh; display:flex; align-items:center; justify-content:center; text-align:center; padding:120px 20px 80px;">
        <div class="container" style="position:relative; z-index:2; max-width:1000px;">
            <span class="gsap-hero-elem" style="display:inline-block; font-size:0.85rem; font-weight:bold; letter-spacing:0.15em; color:var(--white); padding:8px 20px; background:var(--primary-color); border-radius:30px; margin-bottom:25px; box-shadow:0 10px 20px rgba(11,19,43,0.15);">WEB DESIGN & DEVELOPMENT</span>
            <h1 class="gsap-hero-elem" style="font-size: clamp(2.5rem, 5vw, 4.5rem); font-weight:900; color:var(--primary-color); line-height:1.2; letter-spacing:0.02em; margin-bottom:35px;">
                企業の<span style="color:#1a56db;">“信頼”</span>を、<br>デジタル上に設計する。
            </h1>
            <p class="gsap-hero-elem" style="font-size: clamp(1rem, 2vw, 1.25rem); color:var(--accent-color); font-weight:bold; line-height:2.2; max-width:850px; margin:0 auto;">
                企業サイトは、単なる会社案内や名刺代わりの存在ではありません。<br>
                それは「信用をつくる装置」であり、「採用・営業・ブランディングの中核を担う基盤」です。<br>
                株式会社blankは、表面的なデザインだけで終わらない、戦略設計ファーストのコーポレートサイト制作を提供します。
            </p>
            
            <div class="gsap-hero-elem scroll-down-indicator" style="margin-top: 80px; opacity:0.6;">
                <span style="display:block; font-size:0.8rem; font-weight:bold; letter-spacing:0.2em; color:var(--primary-color); margin-bottom:10px;">SCROLL TO EXPLORE</span>
                <div style="width:2px; height:60px; background:var(--primary-color); margin:0 auto; animation: scrollFlow 2s infinite ease-in-out;"></div>
            </div>
        </div>
    </section>

    <style>
        @keyframes scrollFlow {
            0% { transform: scaleY(0); transform-origin: top; }
            50% { transform: scaleY(1); transform-origin: top; }
            51% { transform: scaleY(1); transform-origin: bottom; }
            100% { transform: scaleY(0); transform-origin: bottom; }
        }
        .concept-card {
            background: rgba(255,255,255,0.7); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.5); border-radius: 20px; padding: 40px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.03); transition: transform 0.4s ease, box-shadow 0.4s ease;
            height: 100%;
        }
        .concept-card:hover { transform: translateY(-10px); box-shadow: 0 25px 45px rgba(0,0,0,0.06); }
        .num-badge {
            display:inline-flex; align-items:center; justify-content:center; width:45px; height:45px;
            background:linear-gradient(135deg, #1a56db, #e53935); color:white; font-size:1.3rem;
            font-weight:900; border-radius:50%; margin-bottom:20px; box-shadow:0 8px 15px rgba(26,86,219,0.3);
        }
    </style>

    <!-- 2. CORE PRINCIPLES (5 PILLARS) -->
    <section class="service-principles section-padding" style="padding: 100px 0; position:relative;">
        <div class="container" style="max-width:1200px;">
            <div class="section-header gsap-fade-up" style="text-align:center; margin-bottom:80px;">
                <p style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.95rem;">CORE PRINCIPLES</p>
                <h2 style="font-size: 3rem; font-weight: 800; color:var(--primary-color); margin:0;">blankのWebサイト制作とは</h2>
            </div>

            <div style="display:flex; flex-direction:column; gap:40px;">
                <!-- Step 1 & 2 -->
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap:40px;">
                    <div class="concept-card gsap-fade-up">
                        <div class="num-badge">1</div>
                        <h3 style="font-size:1.5rem; font-weight:800; color:var(--primary-color); margin-bottom:20px; border-bottom:2px solid; border-image:linear-gradient(to right, #1a56db, transparent) 1; padding-bottom:15px;">戦略から始める</h3>
                        <p style="color:var(--accent-color); font-weight:bold; line-height:2; margin-bottom:20px;">私たちは、いきなりデザインを始めません。<br>ターゲットは誰か、何を伝えるべきか、競合との明確な差別化要因は何か。</p>
                        <p style="color:#50575e; line-height:1.8; font-size:0.95rem;">ヒアリングを通してサイト本来の「役割」と「ゴール」を策定し、KPIを精緻に定義した上で緻密な設計フェーズへと移行します。</p>
                    </div>
                    <div class="concept-card gsap-fade-up" style="transition-delay:0.1s;">
                        <div class="num-badge">2</div>
                        <h3 style="font-size:1.5rem; font-weight:800; color:var(--primary-color); margin-bottom:20px; border-bottom:2px solid; border-image:linear-gradient(to right, #1a56db, transparent) 1; padding-bottom:15px;">心理導線設計（UX設計）</h3>
                        <p style="color:var(--accent-color); font-weight:bold; line-height:2; margin-bottom:20px;">「情報が整理されていない」「強みが伝わらない」「次に何を見れば良いか分からない」。こうした企業サイトの機会損失を防ぎます。</p>
                        <p style="color:#50575e; line-height:1.8; font-size:0.95rem;">ユーザーの深層心理に基づき、ファーストビュー設計、情報階層の整理、CTAの最適配置を実施。「なんとなくかっこいい」ではなく、「確実に読まれ、行動を促す構造」を構築します。</p>
                    </div>
                </div>
                
                <!-- Step 3 : Full width for emphasis -->
                <div class="concept-card gsap-fade-up" style="background:linear-gradient(135deg, rgba(11,19,43,0.95), rgba(26,86,219,0.9)); color:white; border:none;">
                    <div class="num-badge" style="background:#ffffff; color:#1a56db;">3</div>
                    <h3 style="font-size:1.8rem; font-weight:800; color:#ffffff; margin-bottom:20px;">ブランドを言語化し、視覚化する</h3>
                    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap:30px;">
                        <div>
                            <p style="font-weight:bold; line-height:2; margin-bottom:20px; font-size:1.1rem;">企業サイトはブランディングの中心地です。<br>単なるデザイン制作ではなく、企業の世界観を一貫して表現します。</p>
                        </div>
                        <div>
                            <ul style="list-style:none; padding:0; margin:0; line-height:2.2; font-weight:bold; color:rgba(255,255,255,0.9);">
                                <li><span style="color:#e53935; margin-right:8px;">✔</span> ミッション・ビジョンの整理</li>
                                <li><span style="color:#e53935; margin-right:8px;">✔</span> 強みの再定義とトーン＆マナー設計</li>
                                <li><span style="color:#e53935; margin-right:8px;">✔</span> 高解像度な写真・ビジュアル選定</li>
                                <li><span style="color:#e53935; margin-right:8px;">✔</span> 美しいタイポグラフィ設計</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Step 4 & 5 -->
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap:40px;">
                    <div class="concept-card gsap-fade-up">
                        <div class="num-badge">4</div>
                        <h3 style="font-size:1.5rem; font-weight:800; color:var(--primary-color); margin-bottom:20px; border-bottom:2px solid; border-image:linear-gradient(to right, #1a56db, transparent) 1; padding-bottom:15px;">スマホファースト設計</h3>
                        <p style="color:var(--accent-color); font-weight:bold; line-height:2; margin-bottom:20px;">現代のトラフィックの大部分はモバイルデバイスからのアクセスとなるため、PC至上主義のデザインを脱却します。</p>
                        <p style="color:#50575e; line-height:1.8; font-size:0.95rem;">レスポンシブ標準対応にとどまらず、Core Web Vitals対策を含む表示速度の強烈な最適化、タップ領域の調整、可読性を極限まで高めたレイアウトを標準で実装します。</p>
                    </div>
                    <div class="concept-card gsap-fade-up" style="transition-delay:0.1s;">
                        <div class="num-badge">5</div>
                        <h3 style="font-size:1.5rem; font-weight:800; color:var(--primary-color); margin-bottom:20px; border-bottom:2px solid; border-image:linear-gradient(to right, #1a56db, transparent) 1; padding-bottom:15px;">SEO内部設計を標準搭載</h3>
                        <p style="color:var(--accent-color); font-weight:bold; line-height:2; margin-bottom:20px;">「公開したけれど誰も訪れない」。その悲劇を防ぐため、初期段階から高度なSEO内部設計を組み込みます。</p>
                        <p style="color:#50575e; line-height:1.8; font-size:0.95rem;">見出し構造の最適化、メタ情報の設計、構造化データのマークアップ、そしてページ速度最適化により、検索エンジンから持続的に評価される強靭な“土台”を構築します。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. AVAILABLE TYPES & RECOMMENDED -->
    <section class="service-types section-padding" style="background:#f8f9fa; padding: 100px 0;">
        <div class="container" style="max-width:1200px; display:flex; flex-wrap:wrap; gap:60px;">
            
            <!-- Left: Types -->
            <div style="flex:1 1 45%;" class="gsap-fade-up">
                <h3 style="font-size: 2rem; font-weight: 800; color:var(--primary-color); margin-bottom:30px; display:flex; align-items:center; gap:15px;"><span style="display:block; width:5px; height:30px; background:#e53935;"></span>制作可能なサイトタイプ</h3>
                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:15px;">
                    <?php 
                    $site_types = ['コーポレートサイト', '企業ブランディングサイト', '採用サイト', 'サービス紹介サイト', 'BtoB営業用サイト', '事業特化型ミニサイト'];
                    foreach($site_types as $type): ?>
                        <div style="background:#ffffff; border:1px solid #e2e8f0; padding:15px 20px; border-radius:10px; font-weight:bold; color:var(--primary-color); font-size:0.95rem; display:flex; align-items:center; gap:10px; transition:transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.05)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                            <span style="color:#1a56db;">&diams;</span> <?php echo $type; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Right: Target -->
            <div style="flex:1 1 45%;" class="gsap-fade-up" style="transition-delay:0.2s;">
                <h3 style="font-size: 2rem; font-weight: 800; color:var(--primary-color); margin-bottom:30px; display:flex; align-items:center; gap:15px;"><span style="display:block; width:5px; height:30px; background:#1a56db;"></span>こんな企業様におすすめ</h3>
                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:18px;">
                    <?php 
                    $targets = [
                        '企業サイトを刷新し、業界内での存在感を高めたい',
                        '採用力を強化し、優秀な人材を獲得できる基盤が欲しい',
                        '独自の強みを可視化し、競合他社と明確な差別化を図りたい',
                        'スタートアップとして盤石な「信頼」と「信用」を築き上げたい',
                        'スマホ対応や速度改善など、古いサイトをモダン化・最適化したい'
                    ];
                    foreach($targets as $idx => $tgt): ?>
                        <li style="display:flex; align-items:flex-start; gap:15px; color:var(--accent-color); font-weight:bold; font-size:1.05rem; line-height:1.6; background:#ffffff; padding:20px; border-radius:10px; border-left:4px solid transparent; transition:all 0.3s;" onmouseover="this.style.borderLeftColor='#e53935';" onmouseout="this.style.borderLeftColor='transparent';">
                            <span style="color:#e53935; font-size:1.2rem; transform:translateY(2px);">✔</span>
                            <?php echo $tgt; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </section>

    <!-- 4. WORKFLOW & WHY US -->
    <section class="service-workflow section-padding" style="padding: 100px 0; background:rgba(255,255,255,0.7); backdrop-filter:blur(5px); position:relative;">
        <div class="container" style="max-width:1200px;">
            
            <div class="section-header gsap-fade-up" style="text-align:center; margin-bottom:80px;">
                <p style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.95rem;">WORKFLOW & STRENGTH</p>
                <h2 style="font-size: 3rem; font-weight: 800; color:var(--primary-color); margin:0;">blankの制作フローと強み</h2>
            </div>

            <!-- Flow -->
            <div class="workflow-container gsap-fade-up" style="display:flex; justify-content:space-between; flex-wrap:wrap; gap:20px; margin-bottom:100px;">
                <?php
                $flows = [
                    ['ヒアリング', 'ビジョン・課題・競合分析'],
                    ['戦略設計', '情報構造設計・KPI定義'],
                    ['ワイヤーフレーム制作', 'ページ構成と導線の綿密な設計'],
                    ['デザイン制作', 'ブランドに最適化されたUI設計'],
                    ['実装・開発', 'HTML/CSS/JS・CMSの組込'],
                    ['テスト・公開', '表示速度・表示崩れの厳格な検証'],
                    ['公開後サポート', '改善提案・解析レポートによる伴走']
                ];
                foreach($flows as $index => $f): 
                    $step = $index + 1;
                ?>
                <div style="flex:1 1 12%; min-width:140px; position:relative; padding-top:40px; text-align:center;">
                    <div style="position:absolute; top:0; left:50%; transform:translateX(-50%); width:30px; height:30px; background:#1a56db; color:white; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:0.9rem; z-index:2;"><?php echo $step; ?></div>
                    <?php if($step < count($flows)): ?>
                        <div style="position:absolute; top:15px; left:50%; width:100%; height:2px; background:linear-gradient(to right, #1a56db, transparent); z-index:1; opacity:0.3;"></div>
                    <?php endif; ?>
                    <h4 style="color:var(--primary-color); font-size:1.05rem; font-weight:800; margin-bottom:10px;"><?php echo $f[0]; ?></h4>
                    <p style="color:#50575e; font-size:0.8rem; font-weight:bold; line-height:1.5; word-break:keep-all;"><?php echo $f[1]; ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Why Us -->
            <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap:30px;">
                <?php 
                $whys = [
                    ['icon' => '👥', 'title' => '一気通貫体制', 'desc' => 'マーケター × デザイナー × エンジニアが横断的に関与し、ブレのない高速なアウトプットを実現。'],
                    ['icon' => '⚡', 'title' => '圧倒的なスピード', 'desc' => '効率化された自社フローにより、クオリティを担保しながら最短2週間〜での制作開始・納品が可能。'],
                    ['icon' => '📈', 'title' => '改善前提の構造設計', 'desc' => '作って終わりではなく、公開後のデータ分析・グロースハックまでを見据えた強靭なサイトアーキテクチャ。'],
                    ['icon' => '🧩', 'title' => '柔軟なプランニング', 'desc' => 'スタートアップの初期フェーズから、上場企業のリブランディングまで、予算・目的に合わせた段階設計が可能。']
                ];
                foreach($whys as $w): ?>
                <div class="gsap-fade-up" style="background:#ffffff; border:1px solid rgba(0,0,0,0.05); border-radius:16px; padding:30px; text-align:center; box-shadow:0 10px 30px rgba(0,0,0,0.02); transition:transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div style="font-size:3rem; margin-bottom:15px;"><?php echo $w['icon']; ?></div>
                    <h4 style="color:var(--primary-color); font-size:1.2rem; font-weight:800; margin-bottom:15px;"><?php echo $w['title']; ?></h4>
                    <p style="color:#50575e; font-size:0.95rem; line-height:1.7; font-weight:bold;"><?php echo $w['desc']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 5. PRICING -->
    <section class="service-pricing section-padding" style="padding: 100px 0; background:var(--primary-color); color:white; position:relative; overflow:hidden;">
        <!-- decorative background -->
        <div style="position:absolute; top:-50%; right:-20%; width:80%; height:200%; background:radial-gradient(ellipse at center, rgba(229,57,53,0.15) 0%, rgba(11,19,43,0) 70%); pointer-events:none; transform:rotate(-45deg);"></div>
        
        <div class="container" style="max-width:1200px; position:relative; z-index:2;">
            <div class="section-header gsap-fade-up" style="text-align:center; margin-bottom:60px;">
                <h2 style="font-size: 3rem; font-weight: 800; color:var(--white); margin:0;">料金目安</h2>
                <p style="color:rgba(255,255,255,0.7); font-weight:bold; margin-top:20px;">※プロジェクトの規模・要件により変動いたします。詳細はヒアリング後にお見積りを作成します。</p>
            </div>

            <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap:30px;">
                <div class="gsap-fade-up" style="background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:16px; padding:40px; text-align:center; backdrop-filter:blur(10px);">
                    <h4 style="color:var(--white); font-size:1.4rem; font-weight:800; margin-bottom:15px;">スタンダード企業サイト</h4>
                    <div style="font-size:2.5rem; font-weight:900; color:#e53935; margin-bottom:20px;">45万円<span style="font-size:1rem; color:rgba(255,255,255,0.7);">〜</span></div>
                    <p style="color:rgba(255,255,255,0.7); font-size:0.95rem; line-height:1.8; font-weight:bold;">名刺代わりとなる高品質なサイトを、スピーディかつコストを抑えて構築したい企業様向け。</p>
                </div>
                <div class="gsap-fade-up" style="background:linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.02)); border:2px solid #1a56db; border-radius:16px; padding:40px; text-align:center; backdrop-filter:blur(10px); transform:scale(1.05); z-index:2; box-shadow:0 20px 40px rgba(0,0,0,0.2);">
                    <div style="background:#1a56db; color:white; font-size:0.8rem; font-weight:bold; padding:5px 15px; border-radius:20px; display:inline-block; margin-bottom:20px; letter-spacing:0.1em;">MOST POPULAR</div>
                    <h4 style="color:var(--white); font-size:1.6rem; font-weight:800; margin-bottom:15px;">オリジナル設計企業サイト</h4>
                    <div style="font-size:3rem; font-weight:900; color:#4fc3f7; margin-bottom:20px;">68万円<span style="font-size:1.2rem; color:rgba(255,255,255,0.7);">〜</span></div>
                    <p style="color:rgba(255,255,255,0.9); font-size:1rem; line-height:1.8; font-weight:bold;">戦略的な導線設計と完全オリジナルのデザインで、競合との明確な差別化を図る本格プラン。</p>
                </div>
                <div class="gsap-fade-up" style="background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:16px; padding:40px; text-align:center; backdrop-filter:blur(10px);">
                    <h4 style="color:var(--white); font-size:1.4rem; font-weight:800; margin-bottom:15px;">フルブランディングサイト</h4>
                    <div style="font-size:2.5rem; font-weight:900; color:#ffcc80; margin-bottom:20px;">135万円<span style="font-size:1rem; color:rgba(255,255,255,0.7);">〜</span></div>
                    <p style="color:rgba(255,255,255,0.7); font-size:0.95rem; line-height:1.8; font-weight:bold;">大規模なサイトリニューアルや、CI/VIの策定からシステム連携までを伴う最上位プラン。</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. PHILOSOPHY & CONTACT -->
    <section class="service-philosophy section-padding" style="padding: 150px 0; background:transparent; text-align:center; position:relative;">
        <div class="container gsap-fade-up" style="max-width:800px; position:relative; z-index:2;">
            <p style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.2em; margin:0 0 30px; font-size:1rem;">PHILOSOPHY</p>
            <h2 style="font-size: clamp(2rem, 4vw, 3.5rem); font-weight: 900; color:var(--primary-color); line-height:1.4; margin-bottom:50px; letter-spacing:0.05em;">
                私たちは、<br>
                「ただ作るだけの制作会社」<br>
                ではありません。
            </h2>
            <p style="font-size: clamp(1.1rem, 2vw, 1.5rem); color:var(--accent-color); font-weight:bold; line-height:2.2;">
                企業の<span style="color:#1a56db;">“信用”</span>と<span style="color:#e53935;">“可能性”</span>を<br>
                デジタル空間上に実装するパートナーです。
            </p>
        </div>
    </section>

    <!-- Generic Contact Footer attached inside the layout -->
    <section class="contact-section" style="padding:140px 0; background:var(--secondary-color); text-align:center; color:var(--white); position:relative; z-index:2;">
        <div class="container">
            <h2 style="font-size: 2.5rem; color:var(--white); margin-bottom: 25px; font-weight:700;">ビジネスをデジタルで加速させませんか？</h2>
            <p style="margin-bottom: 50px; color:rgba(255,255,255,0.8); font-size:1.15rem; line-height:1.8;">新規サイト構築のご相談、予算に合わせたお見積りなど<br>些細なことでもお気軽にお問い合わせください。専門のコンサルタントが伴走いたします。</p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cta-btn" style="font-size: 1.25rem; padding: 20px 60px; background:#e53935; color:white; border:none;">無料相談・お問い合わせへ進む</a>
        </div>
    </section>

</div>

<?php else: ?>
<!-- ==========================================
     DEFAULT SERVICE LAYOUT (For other services)
=========================================== -->
<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <h1 class="gsap-title" style="font-size: 3.5rem; font-weight: 900; letter-spacing: 0.05em; margin-bottom: 20px;"><?php the_title(); ?></h1>
        <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 1rem;">SERVICE DETAILS</p>
    </div>
</div>

<main class="service-single-content" style="background: transparent;">
    <div class="container" style="max-width:900px; padding-bottom: 120px;">
        <div class="service-single-card" style="background:rgba(255,255,255,0.85); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); padding: 60px; border-radius:20px; box-shadow:0 15px 40px rgba(0,0,0,0.04); border-top: 5px solid var(--highlight-color); border-bottom: 1px solid rgba(0,0,0,0.05); border-left: 1px solid rgba(0,0,0,0.05); border-right: 1px solid rgba(0,0,0,0.05);">
            
            <?php if(has_post_thumbnail()): ?>
            <div class="service-img fade-up" style="margin-bottom: 40px; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <?php the_post_thumbnail('large', ['style' => 'width:100%; height:auto; display:block;']); ?>
            </div>
            <?php endif; ?>

            <div class="service-content gsap-content" style="font-size:1.15rem; line-height:2.2; color:var(--primary-color);">
                <?php the_content(); ?>
            </div>
            
            <div class="back-link" style="margin-top: 60px; text-align:center;">
                <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" style="display:inline-flex; align-items:center; gap:8px; font-weight:bold; color:var(--accent-color); border:1px solid var(--accent-color); padding:12px 30px; border-radius:30px; transition:all 0.3s ease;" onmouseover="this.style.background='var(--accent-color)'; this.style.color='var(--white)';" onmouseout="this.style.background='transparent'; this.style.color='var(--accent-color)';">
                    &larr; サービス一覧へ戻る
                </a>
            </div>
        </div>
    </div>

    <!-- Contact -->
    <section class="contact-section" style="padding:140px 0; background:var(--secondary-color); text-align:center; color:var(--white); position:relative; z-index:2;">
        <div class="container">
            <h2 style="font-size: 2.5rem; color:var(--white); margin-bottom: 25px; font-weight:700;">ビジネスを加速させませんか？</h2>
            <p style="margin-bottom: 50px; color:rgba(255,255,255,0.8); font-size:1.15rem; line-height:1.8;">新規プロジェクトのご相談、お見積り、DX推進に関するお悩みなど<br>些細なことでもお気軽にお問い合わせください。</p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cta-btn" style="font-size: 1.25rem; padding: 20px 60px;">無料相談・お問い合わせフォームへ</a>
        </div>
    </section>
</main>
<?php endif; ?>

<?php endwhile; endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    gsap.registerPlugin(ScrollTrigger);

    // Initial load animations
    const isWebLayout = document.querySelector('.service-hero');
    const isLpLayout = document.querySelector('.lp-layout');
    
    if(isWebLayout || isLpLayout) {
        const tl = gsap.timeline();
        tl.from(".gsap-hero-elem", {
            y: 50,
            opacity: 0,
            stagger: 0.2,
            duration: 1.2,
            ease: "power4.out"
        });
    } else {
        const tl = gsap.timeline();
        tl.from(".gsap-subtitle", {opacity: 0, y: -20, duration: 1, ease: "power3.out"})
          .from(".gsap-title", {opacity: 0, y: 30, rotationX: -90, duration: 1.2, ease: "expo.out"}, "-=0.6")
          .from(".service-single-card", {opacity: 0, y: 50, duration: 1.5, ease: "power4.out"}, "-=0.8");
    }

    // Common fade-ups
    gsap.utils.toArray('.gsap-fade-up, .fade-up').forEach((el) => {
        gsap.from(el, {
            scrollTrigger: { trigger: el, start: "top 85%" },
            y: 50, opacity: 0, duration: 1.2, ease: "power3.out"
        });
    });

    // Three.js Complex Setup for Service Page
    const canvas = document.getElementById('three-canvas-service-single');
    if(canvas) {
        const scene = new THREE.Scene();
        // Light fog to blend into background
        scene.fog = new THREE.FogExp2('#f4f7f9', 0.002);
        
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 25;
        camera.position.y = 5;

        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        const group = new THREE.Group();
        scene.add(group);

        let mouseX = 0, mouseY = 0;
        let targetX = 0, targetY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - window.innerWidth / 2);
            mouseY = (e.clientY - window.innerHeight / 2);
        });

        const clock = new THREE.Clock();

        if (isLpLayout) {
            // LP layout gets a fast "Vortex/Conversion Tunnel" effect
            scene.fog = new THREE.FogExp2('#ffffff', 0.005);
            
            const tubeGeo = new THREE.CylinderGeometry(15, 2, 80, 24, 10, true);
            const tubeMat = new THREE.MeshBasicMaterial({ 
                color: '#e53935', 
                wireframe: true, 
                transparent: true, 
                opacity: 0.1 
            });
            const tube = new THREE.Mesh(tubeGeo, tubeMat);
            tube.rotation.x = Math.PI / 2;
            tube.position.z = -20;
            group.add(tube);
            
            const pGeo = new THREE.BufferGeometry();
            const pCount = 600;
            const pArr = new Float32Array(pCount * 3);
            for(let i=0; i<pCount*3; i++) { pArr[i] = (Math.random() - 0.5) * 60; }
            pGeo.setAttribute('position', new THREE.BufferAttribute(pArr, 3));
            const pMat = new THREE.PointsMaterial({ size: 0.2, color: '#1a56db', transparent: true, opacity: 0.6 });
            const particles = new THREE.Points(pGeo, pMat);
            group.add(particles);

            function animateLP() {
                requestAnimationFrame(animateLP);
                tube.rotation.y -= 0.005;
                particles.rotation.z += 0.001;
                particles.position.z += 0.1;
                if(particles.position.z > 20) particles.position.z = -20;
                
                targetX = mouseX * 0.005;
                targetY = mouseY * 0.005;
                camera.position.x += (targetX - camera.position.x) * 0.05;
                camera.position.y += (-targetY - camera.position.y) * 0.05;
                camera.lookAt(scene.position);
                renderer.render(scene, camera);
            }
            animateLP();
            
        } else {
            // Default Web Layout (Terrain)
            // Advanced Wireframe terrain/architecture to match "Design/Build"
            const geometry = new THREE.PlaneGeometry(200, 200, 50, 50);
            const vertices = geometry.attributes.position.array;
            for ( let i = 0; i < vertices.length; i += 3 ) {
                vertices[i + 2] = Math.sin(vertices[i]*0.1) * Math.cos(vertices[i+1]*0.1) * 3;
            }
            geometry.computeVertexNormals();

            const material = new THREE.MeshBasicMaterial({ 
                color: '#1a56db', 
                wireframe: true, 
                transparent: true, 
                opacity: 0.06 
            });
            
            const plane = new THREE.Mesh(geometry, material);
            plane.rotation.x = -Math.PI / 2.5; 
            plane.position.y = -10;
            group.add(plane);

            const accentGeo = new THREE.OctahedronGeometry(1.5, 0);
            const accentMat = new THREE.MeshBasicMaterial({ color: '#e53935', wireframe: true, transparent: true, opacity: 0.2 });
            const floaters = [];
            for(let i = 0; i < 15; i++) {
                const mesh = new THREE.Mesh(accentGeo, accentMat);
                mesh.position.set(
                    (Math.random() - 0.5) * 80,
                    Math.random() * 20 - 5,
                    (Math.random() - 0.5) * 80
                );
                floaters.push({
                    mesh: mesh,
                    speed: Math.random() * 0.02 + 0.005,
                    rotY: Math.random() * 0.02
                });
                group.add(mesh);
            }

            function animateTerrain() {
                requestAnimationFrame(animateTerrain);
                const time = clock.getElapsedTime();

                // Make the terrain wave continuously
                const positions = plane.geometry.attributes.position.array;
                for ( let i = 0; i < positions.length; i += 3 ) {
                    positions[i + 2] = Math.sin((positions[i]*0.1) + time * 0.5) * Math.cos((positions[i+1]*0.1) + time * 0.5) * 4;
                }
                plane.geometry.attributes.position.needsUpdate = true;

                // Animate floaters
                floaters.forEach(f => {
                    f.mesh.position.y += Math.sin(time * f.speed * 10) * 0.05;
                    f.mesh.rotation.y += f.rotY;
                    f.mesh.rotation.x += f.rotY * 0.5;
                });

                // Smooth mouse camera parallax
                targetX = mouseX * 0.005;
                targetY = mouseY * 0.005;
                camera.position.x += (targetX - camera.position.x) * 0.02;
                camera.position.y += (-targetY - camera.position.y + 5) * 0.02; 
                camera.lookAt(scene.position);

                renderer.render(scene, camera);
            }
            animateTerrain();
        }

        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    }
});
</script>

<?php get_footer(); ?>
