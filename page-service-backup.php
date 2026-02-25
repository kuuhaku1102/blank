<?php
/* Template Name: SERVICEページ */
get_header(); ?>

<!-- Page Header -->
<div class="page-header" style="position:relative; background:var(--primary-color); color:var(--white); padding:80px 0; text-align:center; overflow:hidden;">
    <!-- Abstract SVG Background -->
    <svg style="position:absolute; top: -50%; left: -10%; width: 120%; height: 200%; opacity: 0.05; pointer-events: none; animation: floatOrb 30s infinite alternate;" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="40" fill="none" stroke="#fff" stroke-width="0.3" stroke-dasharray="2 4" />
        <rect x="20" y="20" width="60" height="60" fill="none" stroke="#fff" stroke-width="0.2" transform="rotate(45 50 50)" />
    </svg>
    <div class="container" style="position:relative; z-index:1;">
        <h1 style="font-size: 3rem; font-weight: 700; letter-spacing: 0.1em; margin-bottom: 10px;">SERVICES</h1>
        <p style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 0.95rem;">事業内容と強み</p>
    </div>
</div>

<main class="service-content" style="background: var(--bg-color);">
    
    <!-- 1. Concept -->
    <section class="service-concept" style="padding: 120px 0; background: var(--white); text-align:center; position:relative; overflow:hidden;">
        <!-- Delicate SVG decorative lines -->
        <svg style="position:absolute; top:10%; right:-10%; width:40%; opacity:0.04; transform:rotate(-15deg);" viewBox="0 0 200 200">
            <path d="M0 100 Q 50 50 100 100 T 200 100" fill="none" stroke="var(--primary-color)" stroke-width="2"/>
            <path d="M0 120 Q 50 70 100 120 T 200 120" fill="none" stroke="var(--primary-color)" stroke-width="2"/>
        </svg>

        <div class="container fade-up">
            <h2 style="font-size: 2.2rem; font-weight: 700; color:var(--primary-color); margin-bottom: 20px; line-height:1.5;">デジタルの“余白”を、<br>価値に変える。</h2>
            <p style="color:var(--highlight-color); font-weight:bold; letter-spacing:0.15em; margin-bottom: 50px;">■ 企業コンセプト</p>
            
            <p style="font-size: 1.5rem; font-weight:bold; color:var(--primary-color); margin-bottom:40px;">「構想を、実装へ。」</p>
            
            <p style="font-size: 1.1rem; line-height: 2.2; color:var(--accent-color); margin-bottom: 40px;">
                株式会社blankは、<br>
                Web制作 × マーケティング × テクノロジーを統合し、<br>
                企業の成長を“設計”から“成果”まで一気通貫で支援する<br>
                実装型デジタルパートナーです。<br><br>
                単なる制作会社ではありません。<br>
                単なる広告代理店でもありません。<br><br>
                私たちは、<br>
                <strong>構想 → 設計 → 実装 → 改善 → 収益化</strong><br>
                までを一社で完結させます。
            </p>
        </div>
    </section>

    <!-- 2. Business Domains -->
    <section class="business-domains" style="padding: 120px 0;">
        <div class="container">
            <div class="section-header fade-up" style="text-align:center; margin-bottom: 80px;">
                <p style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.9rem;">BUSINESS DOMAIN</p>
                <h2 style="font-size: 2.8rem; font-weight: 700; margin:0; color:var(--primary-color);">事業内容</h2>
            </div>

            <div style="display:grid; grid-template-columns: 1fr; gap: 60px;">
                <!-- Domain 1 -->
                <div class="domain-block fade-up delay-1" id="web" style="background:var(--white); padding: 50px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.03); border-top: 5px solid var(--highlight-color);">
                    <div style="display:flex; align-items:center; gap: 20px; margin-bottom:30px;">
                        <span style="font-size: 3rem; font-weight:900; color:rgba(229, 57, 53, 0.1); line-height:1;">01</span>
                        <h3 style="font-size:1.8rem; font-weight:700; color:var(--primary-color); margin:0;">Web制作事業（Design & Build）</h3>
                    </div>
                    <p style="font-size:1.1rem; font-weight:bold; color:var(--accent-color); margin-bottom:30px;">成果直結型Webサイト制作</p>
                    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
                        <div>
                            <ul style="list-style:none; padding:0; line-height:2.2;">
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>コーポレートサイト制作
                                </li>
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>LP（ランディングページ）制作
                                </li>
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>採用サイト制作
                                </li>
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>ECサイト構築
                                </li>
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>ブランドサイト制作
                                </li>
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>CMS構築（WordPress等）
                                </li>
                            </ul>
                        </div>
                        <div style="background:var(--bg-color); padding: 30px; border-radius: 8px;">
                            <h4 style="color:var(--primary-color); font-weight:bold; margin-bottom:15px; font-size:1.1rem;">特徴</h4>
                            <ul style="list-style:none; padding:0; line-height:2;">
                                <li>・心理導線設計に基づいたUI/UX</li>
                                <li>・CVR最大化構造設計</li>
                                <li>・モバイルファースト</li>
                                <li>・表示速度最適化</li>
                                <li>・SEO内部設計標準対応</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Domain 2 -->
                <div class="domain-block fade-up delay-2" id="system" style="background:var(--white); padding: 50px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.03); border-top: 5px solid var(--highlight-color);">
                    <div style="display:flex; align-items:center; gap: 20px; margin-bottom:30px;">
                        <span style="font-size: 3rem; font-weight:900; color:rgba(229, 57, 53, 0.1); line-height:1;">02</span>
                        <h3 style="font-size:1.8rem; font-weight:700; color:var(--primary-color); margin:0;">高機能Webシステム開発</h3>
                    </div>
                    <p style="font-size:1.1rem; font-weight:bold; color:var(--accent-color); margin-bottom:30px;">“見た目”だけでなく、“ビジネスを動かす”Webへ。</p>
                    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
                        <div>
                            <ul style="list-style:none; padding:0; line-height:2.2;">
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>予約システム構築
                                </li>
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>会員制サイト構築
                                </li>
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>マイページ機能
                                </li>
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>CRM連携 / API連携
                                </li>
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>決済連携（Stripe / PayPay等）
                                </li>
                                <li style="position:relative; padding-left:20px;">
                                    <span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>多言語対応 / AI連携システム
                                </li>
                            </ul>
                        </div>
                        <div style="background:var(--bg-color); padding: 30px; border-radius: 8px;">
                            <h4 style="color:var(--primary-color); font-weight:bold; margin-bottom:15px; font-size:1.1rem;">強み</h4>
                            <ul style="list-style:none; padding:0; line-height:2;">
                                <li>・サーバーレス設計対応</li>
                                <li>・Github Actions活用自動化</li>
                                <li>・セキュリティ設計標準実装</li>
                                <li>・業務効率化を前提とした設計</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Domain 3 -->
                <div class="domain-block fade-up delay-1" id="lp" style="background:var(--white); padding: 50px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.03); border-top: 5px solid var(--highlight-color);">
                    <div style="display:flex; align-items:center; gap: 20px; margin-bottom:30px;">
                        <span style="font-size: 3rem; font-weight:900; color:rgba(229, 57, 53, 0.1); line-height:1;">03</span>
                        <h3 style="font-size:1.8rem; font-weight:700; color:var(--primary-color); margin:0;">LP特化制作（成果特化型）</h3>
                    </div>
                    <p style="font-size:1.1rem; font-weight:bold; color:var(--accent-color); margin-bottom:30px;">400件以上の制作思想を踏襲。</p>
                    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
                        <div>
                            <h4 style="color:var(--primary-color); font-weight:bold; margin-bottom:15px; font-size:1.1rem;">機能性LPラインナップ</h4>
                            <div style="display:flex; flex-wrap:wrap; gap:10px;">
                                <span style="background:var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">予約完結型LP</span>
                                <span style="background:var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">診断型LP</span>
                                <span style="background:var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">シミュレーションLP</span>
                                <span style="background:var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">スライドフォームLP</span>
                                <span style="background:var(--highlight-color); color:var(--white); padding:5px 15px; border-radius:20px; font-size:0.9rem;">KW連動型LP</span>
                                <span style="background:var(--highlight-color); color:var(--white); padding:5px 15px; border-radius:20px; font-size:0.9rem;">EC連動LP</span>
                            </div>
                        </div>
                        <div style="background:var(--bg-color); padding: 30px; border-radius: 8px;">
                            <h4 style="color:var(--primary-color); font-weight:bold; margin-bottom:15px; font-size:1.1rem;">実現できること</h4>
                            <ul style="list-style:none; padding:0; line-height:2;">
                                <li>・CVR 1.3〜2.8倍改善設計</li>
                                <li>・A/Bテスト前提構造</li>
                                <li>・広告連動型構成</li>
                                <li>・計測タグ自動埋設</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Domain 4 -->
                <div class="domain-block fade-up delay-2" id="marketing" style="background:var(--white); padding: 50px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.03); border-top: 5px solid var(--highlight-color);">
                    <div style="display:flex; align-items:center; gap: 20px; margin-bottom:30px;">
                        <span style="font-size: 3rem; font-weight:900; color:rgba(229, 57, 53, 0.1); line-height:1;">04</span>
                        <h3 style="font-size:1.8rem; font-weight:700; color:var(--primary-color); margin:0;">デジタルマーケティング支援</h3>
                    </div>
                    <p style="font-size:1.1rem; font-weight:bold; color:var(--accent-color); margin-bottom:30px;">制作して終わりではなく、成果が出るまで伴走。</p>
                    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
                        <div>
                            <h4 style="color:var(--primary-color); font-weight:bold; margin-bottom:15px; font-size:1.1rem;">対応領域</h4>
                            <div style="display:flex; flex-wrap:wrap; gap:10px;">
                                <span style="border:1px solid var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">Google広告</span>
                                <span style="border:1px solid var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">Meta広告</span>
                                <span style="border:1px solid var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">P-MAX運用</span>
                                <span style="border:1px solid var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">SEO対策</span>
                                <span style="border:1px solid var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">SNS運用</span>
                                <span style="border:1px solid var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">MEO対策</span>
                                <span style="border:1px solid var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">LPO改善</span>
                                <span style="border:1px solid var(--light-gray); padding:5px 15px; border-radius:20px; font-size:0.9rem;">データ可視化</span>
                            </div>
                        </div>
                        <div style="background:var(--bg-color); padding: 30px; border-radius: 8px;">
                            <h4 style="color:var(--primary-color); font-weight:bold; margin-bottom:15px; font-size:1.1rem;">使用ツール</h4>
                            <ul style="list-style:none; padding:0; line-height:2;">
                                <li>・GA4 / Clarity</li>
                                <li>・Looker Studio</li>
                                <li>・Ahrefs / DEJAM</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Domain 5 & 6 -->
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 60px;">
                    <!-- Domain 5 -->
                    <div class="domain-block fade-up delay-1" id="ai" style="background:var(--white); padding: 50px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.03); border-top: 5px solid var(--highlight-color);">
                        <div style="display:flex; align-items:center; gap: 20px; margin-bottom:20px;">
                            <span style="font-size: 3rem; font-weight:900; color:rgba(229, 57, 53, 0.1); line-height:1;">05</span>
                            <h3 style="font-size:1.5rem; font-weight:700; color:var(--primary-color); margin:0;">AI × 自動化ソリューション</h3>
                        </div>
                        <p style="font-size:0.95rem; font-weight:bold; color:var(--accent-color); margin-bottom:20px;">Python × ChatGPT × Github Actions</p>
                        <h4 style="color:var(--primary-color); font-weight:bold; margin-bottom:10px; font-size:1rem;">提供サービス</h4>
                        <ul style="list-style:disc; margin-left:20px; line-height:2;">
                            <li>コンテンツ自動生成システム</li>
                            <li>競合自動監視</li>
                            <li>ハイパーパーソナライズ営業自動化</li>
                            <li>広告文自動生成 / データ自動レポート生成</li>
                        </ul>
                        <h4 style="color:var(--highlight-color); font-weight:bold; margin-top:20px; margin-bottom:10px; font-size:1rem;">強み</h4>
                        <p style="font-size:0.95rem; line-height:1.8;">24時間自動稼働 / サーバーレス低コスト構成 / セキュリティ設計済み / 実務レベル実装</p>
                    </div>

                    <!-- Domain 6 -->
                    <div class="domain-block fade-up delay-2" id="consulting" style="background:var(--white); padding: 50px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.03); border-top: 5px solid var(--highlight-color);">
                        <div style="display:flex; align-items:center; gap: 20px; margin-bottom:20px;">
                            <span style="font-size: 3rem; font-weight:900; color:rgba(229, 57, 53, 0.1); line-height:1;">06</span>
                            <h3 style="font-size:1.5rem; font-weight:700; color:var(--primary-color); margin:0;">コンサルティング事業</h3>
                        </div>
                        <ul style="list-style:disc; margin-left:20px; line-height:2.2; margin-top:30px;">
                            <li>新規事業立ち上げ支援</li>
                            <li>DX推進支援 / 事業再設計</li>
                            <li>収益構造改善</li>
                            <li>デジタル戦略設計 / KPI設計</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. Strengths -->
    <section class="service-strengths" style="padding: 120px 0; background: var(--secondary-color); color:var(--white);">
        <div class="container">
            <div class="section-header fade-up" style="text-align:center; margin-bottom: 80px;">
                <p style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.9rem;">OUR STRENGTHS</p>
                <h2 style="font-size: 2.8rem; font-weight: 700; margin:0; color:var(--white);">blankの強み</h2>
            </div>
            
            <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                <div class="fade-up delay-1" style="background:rgba(255,255,255,0.05); padding: 40px; border-radius: 8px; border:1px solid rgba(255,255,255,0.1);">
                    <div style="font-size:2rem; font-weight:bold; color:var(--highlight-color); margin-bottom:15px;">01</div>
                    <h3 style="font-size:1.3rem; margin-bottom:15px; font-weight:bold;">一気通貫設計</h3>
                    <p style="color:rgba(255,255,255,0.7); line-height:1.8;">制作・広告・システム・改善を分断しない。</p>
                </div>
                <div class="fade-up delay-2" style="background:rgba(255,255,255,0.05); padding: 40px; border-radius: 8px; border:1px solid rgba(255,255,255,0.1);">
                    <div style="font-size:2rem; font-weight:bold; color:var(--highlight-color); margin-bottom:15px;">02</div>
                    <h3 style="font-size:1.3rem; margin-bottom:15px; font-weight:bold;">実装力</h3>
                    <p style="color:rgba(255,255,255,0.7); line-height:1.8;">机上の空論ではなく、動くものを作る。</p>
                </div>
                <div class="fade-up delay-3" style="background:rgba(255,255,255,0.05); padding: 40px; border-radius: 8px; border:1px solid rgba(255,255,255,0.1);">
                    <div style="font-size:2rem; font-weight:bold; color:var(--highlight-color); margin-bottom:15px;">03</div>
                    <h3 style="font-size:1.3rem; margin-bottom:15px; font-weight:bold;">スピード</h3>
                    <p style="color:rgba(255,255,255,0.7); line-height:1.8;">最短2週間納品。</p>
                </div>
                <div class="fade-up delay-4" style="background:rgba(255,255,255,0.05); padding: 40px; border-radius: 8px; border:1px solid rgba(255,255,255,0.1);">
                    <div style="font-size:2rem; font-weight:bold; color:var(--highlight-color); margin-bottom:15px;">04</div>
                    <h3 style="font-size:1.3rem; margin-bottom:15px; font-weight:bold;">データドリブン</h3>
                    <p style="color:rgba(255,255,255,0.7); line-height:1.8;">全て数値で判断。</p>
                </div>
                <div class="fade-up delay-1" style="background:rgba(255,255,255,0.05); padding: 40px; border-radius: 8px; border:1px solid rgba(255,255,255,0.1);">
                    <div style="font-size:2rem; font-weight:bold; color:var(--highlight-color); margin-bottom:15px;">05</div>
                    <h3 style="font-size:1.3rem; margin-bottom:15px; font-weight:bold;">スタートアップ思考</h3>
                    <p style="color:rgba(255,255,255,0.7); line-height:1.8;">常識に縛られない提案。</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Plans -->
    <section class="service-plans" style="padding: 120px 0; background: var(--white);">
        <div class="container">
            <div class="section-header fade-up" style="text-align:center; margin-bottom: 80px;">
                <p style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.9rem;">PLANS</p>
                <h2 style="font-size: 2.8rem; font-weight: 700; margin:0; color:var(--primary-color);">提供プラン（参考）</h2>
            </div>

            <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
                <div class="fade-up delay-1" style="border:1px solid var(--light-gray); padding: 40px; text-align:center; border-radius:8px;">
                    <h3 style="font-size:1.2rem; font-weight:bold; margin-bottom:20px;">スピード構築プラン</h3>
                    <p style="font-size:2rem; font-weight:900; color:var(--highlight-color); margin-bottom:20px;">10<span style="font-size:1rem;">万円〜</span></p>
                    <p style="font-size:0.95rem; color:var(--accent-color);">テンプレベース高速制作</p>
                </div>
                <div class="fade-up delay-2" style="border:1px solid var(--highlight-color); padding: 40px; text-align:center; border-radius:8px; position:relative; box-shadow:0 10px 20px rgba(229,57,53,0.1);">
                    <div style="position:absolute; top:-15px; left:50%; transform:translateX(-50%); background:var(--highlight-color); color:var(--white); padding:5px 20px; border-radius:20px; font-size:0.8rem; font-weight:bold;">おすすめ</div>
                    <h3 style="font-size:1.2rem; font-weight:bold; margin-bottom:20px;">スタンダードプラン</h3>
                    <p style="font-size:2rem; font-weight:900; color:var(--highlight-color); margin-bottom:20px;">45<span style="font-size:1rem;">万円〜</span></p>
                    <p style="font-size:0.95rem; color:var(--accent-color);">企業向け標準設計</p>
                </div>
                <div class="fade-up delay-3" style="border:1px solid var(--light-gray); padding: 40px; text-align:center; border-radius:8px;">
                    <h3 style="font-size:1.2rem; font-weight:bold; margin-bottom:20px;">ビジネス加速プラン</h3>
                    <p style="font-size:2rem; font-weight:900; color:var(--highlight-color); margin-bottom:20px;">68<span style="font-size:1rem;">万円〜</span></p>
                    <p style="font-size:0.95rem; color:var(--accent-color);">SEO・予約・分析込み</p>
                </div>
                <div class="fade-up delay-4" style="background:var(--primary-color); color:var(--white); padding: 40px; text-align:center; border-radius:8px;">
                    <h3 style="font-size:1.2rem; font-weight:bold; margin-bottom:20px;">プレミアムシステム構築</h3>
                    <p style="font-size:2rem; font-weight:900; color:var(--white); margin-bottom:20px;">135<span style="font-size:1rem;">万円〜</span></p>
                    <p style="font-size:0.95rem; opacity:0.8;">会員・決済・API・AI連携対応</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Target -->
    <section class="service-target" style="padding: 100px 0; background: var(--bg-color);">
        <div class="container fade-up" style="max-width: 800px; text-align:center;">
            <p style="color:var(--highlight-color); font-weight:bold; letter-spacing: 0.15em; margin:0 0 15px; font-size:0.9rem;">TARGET</p>
            <h2 style="font-size: 2.5rem; font-weight: 700; margin:0 0 50px; color:var(--primary-color);">こんな企業様におすすめです</h2>
            <div style="background:var(--white); padding:50px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.02); text-align:left;">
                <ul style="list-style:none; padding:0; line-height:3; font-size:1.15rem; font-weight:bold; color:var(--primary-color);">
                    <li style="border-bottom:1px solid var(--light-gray);"><span style="color:var(--highlight-color); margin-right:15px; font-size:1.5rem;">✔</span>スタートアップ企業</li>
                    <li style="border-bottom:1px solid var(--light-gray);"><span style="color:var(--highlight-color); margin-right:15px; font-size:1.5rem;">✔</span>事業成長フェーズ企業</li>
                    <li style="border-bottom:1px solid var(--light-gray);"><span style="color:var(--highlight-color); margin-right:15px; font-size:1.5rem;">✔</span>経営者直下プロジェクト</li>
                    <li style="border-bottom:1px solid var(--light-gray);"><span style="color:var(--highlight-color); margin-right:15px; font-size:1.5rem;">✔</span>Webに本気で投資したい企業</li>
                    <li><span style="color:var(--highlight-color); margin-right:15px; font-size:1.5rem;">✔</span>既存制作会社に限界を感じている企業</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 6. Vision -->
    <section class="service-vision" style="padding: 140px 0; background: var(--primary-color); color:var(--white); text-align:center; position:relative; overflow:hidden;">
        <!-- Delicate SVG decorative lines -->
        <svg style="position:absolute; top:20%; left:-10%; width:40%; opacity:0.04; transform:rotate(15deg);" viewBox="0 0 200 200">
            <path d="M0 100 Q 50 50 100 100 T 200 100" fill="none" stroke="#fff" stroke-width="2"/>
            <path d="M0 120 Q 50 70 100 120 T 200 120" fill="none" stroke="#fff" stroke-width="2"/>
        </svg>

        <div class="container fade-up" style="position:relative; z-index:1;">
            <p style="font-size:0.9rem; font-weight:bold; letter-spacing:0.2em; color:var(--highlight-color); margin-bottom:30px;">MESSAGE</p>
            <h2 style="font-size: 2.2rem; font-weight: 700; margin-bottom: 50px; line-height:1.6;">blankが目指すもの</h2>
            <p style="font-size: 1.25rem; line-height: 2.4; letter-spacing:0.05em;">
                blankとは、<br>
                「何もない」という意味ではない。<br><br>
                まだ価値化されていない“余白”。<br><br>
                その余白に、<br>
                設計を入れ、<br>
                構造を作り、<br>
                実装し、<br>
                成果へ変える。<br><br>
                それが、<br>
                <strong>株式会社blank。</strong>
            </p>
        </div>
    </section>

</main>

<!-- お問い合わせ導線 -->
<section class="contact-section fade-up" style="padding: 120px 0; background:var(--bg-color); text-align:center;">
    <div class="container">
        <h2 style="font-size: 2.5rem; color:var(--primary-color); margin-bottom: 25px; font-weight:700;">ビジネスを加速させませんか？</h2>
        <p style="margin-bottom: 50px; color:var(--accent-color); font-size:1.15rem; line-height:1.8;">新規プロジェクトのご相談、お見積り、DX推進に関するお悩みなど<br>些細なことでもお気軽にお問い合わせください。</p>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn" style="font-size: 1.25rem; padding: 20px 60px;">無料相談・お問い合わせフォームへ</a>
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

    const fadeElements = document.querySelectorAll('.fade-up, .fade-in, .delay-1, .delay-2, .delay-3, .delay-4');
    fadeElements.forEach(el => observer.observe(el));
});
</script>

<?php get_footer(); ?>
