<?php
/* Template Name: PRICEページ */
get_header(); ?>

<div class="page-header" style="background:var(--secondary-color); color:var(--white); padding:60px 0; text-align:center;">
    <h1>PRICE</h1>
    <p>料金プラン</p>
</div>

<main class="container" style="padding: 60px 0; max-width: 1000px; margin: 0 auto;">
    
    <p style="text-align:center; margin-bottom: 60px; font-size:1.1rem;">プロジェクト規模や目標ごとの目安となる料金体系です。<br>詳細はお見積りをご依頼ください。</p>

    <!-- プラン一式 -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 60px;">
        
        <!-- Web制作プラン -->
        <div class="price-card" style="border:1px solid #ddd; border-top:5px solid var(--highlight-color); border-radius:8px; background:var(--white); box-shadow:0 4px 8px rgba(0,0,0,0.05); text-align:center;">
            <div style="padding:40px 20px;">
                <h3 style="font-size:1.5rem; color:var(--primary-color); margin-bottom:10px;">Web制作プラン</h3>
                <p style="color:#666; font-size:0.9rem; margin-bottom:30px;">企業ブランディングを強化する<br>高品質なコーポレートサイト</p>
                <div style="font-size:2.5rem; font-weight:bold; color:var(--accent-color); margin-bottom:30px;">
                    <span style="font-size:1.5rem;">¥</span>800,000<span style="font-size:1rem;">〜</span>
                </div>
                <ul style="text-align:left; margin-bottom:30px; border-top:1px solid #eee; padding-top:20px; line-height:2;">
                    <li>✓ 戦略設計・要件定義</li>
                    <li>✓ オリジナルデザイン (〜10P)</li>
                    <li>✓ スマホ対応 (レスポンシブ)</li>
                    <li>✓ WordPress基本構築機能</li>
                    <li>✓ お問い合わせフォーム実装</li>
                    <li>✓ 基本SEO対策設定</li>
                </ul>
            </div>
            <div style="padding:20px; background:var(--bg-color); border-bottom-left-radius:8px; border-bottom-right-radius:8px;">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn-outline" style="display:block;">お見積りを依頼する</a>
            </div>
        </div>

        <!-- LP制作プラン -->
        <div class="price-card" style="border:1px solid #ddd; border-top:5px solid var(--primary-color); border-radius:8px; background:var(--white); transform: scale(1.05); box-shadow:0 8px 15px rgba(0,0,0,0.1); position:relative; text-align:center;">
            <div style="position:absolute; top:-15px; left:50%; transform:translateX(-50%); background:var(--primary-color); color:var(--white); padding:5px 20px; border-radius:20px; font-weight:bold; font-size:0.9rem;">一番人気</div>
            <div style="padding:40px 20px;">
                <h3 style="font-size:1.5rem; color:var(--primary-color); margin-bottom:10px;">LP制作プラン</h3>
                <p style="color:#666; font-size:0.9rem; margin-bottom:30px;">圧倒的なコンバージョンを生む<br>成果特化型のランディングページ</p>
                <div style="font-size:2.5rem; font-weight:bold; color:var(--accent-color); margin-bottom:30px;">
                    <span style="font-size:1.5rem;">¥</span>400,000<span style="font-size:1rem;">〜</span>
                </div>
                <ul style="text-align:left; margin-bottom:30px; border-top:1px solid #eee; padding-top:20px; line-height:2;">
                    <li>✓ 競合調査・ペルソナ設計</li>
                    <li>✓ 刺さるコピーライティング</li>
                    <li>✓ CVR特化型デザイン</li>
                    <li>✓ スマホ対応 (レスポンシブ)</li>
                    <li>✓ スクロール追従CTA</li>
                    <li>✓ ヒートマップ導入支援</li>
                </ul>
            </div>
            <div style="padding:20px; background:var(--bg-color); border-bottom-left-radius:8px; border-bottom-right-radius:8px;">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn" style="display:block;">お見積りを依頼する</a>
            </div>
        </div>

        <!-- 月額改善プラン -->
        <div class="price-card" style="border:1px solid #ddd; border-top:5px solid var(--accent-color); border-radius:8px; background:var(--white); box-shadow:0 4px 8px rgba(0,0,0,0.05); text-align:center;">
            <div style="padding:40px 20px;">
                <h3 style="font-size:1.5rem; color:var(--primary-color); margin-bottom:10px;">月額改善プラン</h3>
                <p style="color:#666; font-size:0.9rem; margin-bottom:30px;">サイト公開後のLPO・CRO<br>継続的なデータドリブン改善</p>
                <div style="font-size:2.5rem; font-weight:bold; color:var(--accent-color); margin-bottom:30px;">
                    <span style="font-size:1.5rem;">¥</span>100,000<span style="font-size:1rem;">/月〜</span>
                </div>
                <ul style="text-align:left; margin-bottom:30px; border-top:1px solid #eee; padding-top:20px; line-height:2;">
                    <li>✓ GA4/ヒートマップ解析</li>
                    <li>✓ 月次改善レポート提出</li>
                    <li>✓ ABテスト実施</li>
                    <li>✓ 月1〜3箇所の改修実装</li>
                    <li>✓ 定例ミーティング</li>
                    <li>✓ 広告運用連携</li>
                </ul>
            </div>
            <div style="padding:20px; background:var(--bg-color); border-bottom-left-radius:8px; border-bottom-right-radius:8px;">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn-outline" style="display:block;">詳細を問い合わせる</a>
            </div>
        </div>

    </div>

    <section id="ad-plan" style="background:var(--bg-color); padding: 40px; border-radius: 8px;">
        <h2 style="border-bottom: 3px solid var(--highlight-color); padding-bottom: 10px; color:var(--primary-color);">広告運用プラン</h2>
        <p style="margin-top:20px; line-height:2;">Google広告、Meta（Facebook/Instagram）広告などの運用代行を行います。LP制作と合わせてご依頼いただくことで、仮説検証のサイクルを最速で回し、CPAを引き下げながら売上最大化を図ります。</p>
        <div style="margin-top:20px; background:var(--white); padding:20px; border-left:4px solid var(--accent-color);">
            <strong>運用代行手数料: 広告費の20% （最低手数料制あり）</strong><br>
            ※広告の初期セットアップ費用が別途発生する場合があります。
        </div>
    </section>

</main>

<!-- お問い合わせ導線 -->
<section class="contact-section">
    <div class="container" style="padding: 60px 0; text-align:center;">
        <h2 class="section-title">最適なプランをご提案します</h2>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn" style="font-size: 1.2rem; padding: 15px 40px;">無料相談・お問い合わせ</a>
    </div>
</section>

<?php get_footer(); ?>
