<?php
/* Template Name: FLOWページ */
get_header(); ?>

<div class="page-header" style="background:var(--secondary-color); color:var(--white); padding:60px 0; text-align:center;">
    <h1>FLOW</h1>
    <p>制作の流れ</p>
</div>

<main class="container" style="padding: 60px 0; max-width: 800px; margin: 0 auto;">
    
    <p style="text-align:center; margin-bottom: 40px; font-size:1.1rem;">お問い合わせから公開、そしてその後の運用・改善までの基本的な流れをご紹介します。</p>

    <div class="flow-steps" style="position:relative;">
        <div style="border-left: 3px solid var(--accent-color); position:absolute; top:20px; bottom:20px; left:25px;"></div>

        <!-- Step 1 -->
        <div style="display:flex; gap: 30px; margin-bottom: 40px; position:relative;">
            <div style="width:50px; height:50px; background:var(--highlight-color); color:var(--white); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.5rem; z-index:2; flex-shrink:0;">1</div>
            <div style="background:var(--white); padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); width:100%;">
                <h3 style="color:var(--primary-color); margin-top:0;">ヒアリング・無料相談</h3>
                <p>貴社の抱える課題、達成したい目標、ご予算やスケジュール感について詳しくお伺いします。オンラインでのミーティングも可能です。</p>
            </div>
        </div>

        <!-- Step 2 -->
        <div style="display:flex; gap: 30px; margin-bottom: 40px; position:relative;">
            <div style="width:50px; height:50px; background:var(--highlight-color); color:var(--white); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.5rem; z-index:2; flex-shrink:0;">2</div>
            <div style="background:var(--white); padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); width:100%;">
                <h3 style="color:var(--primary-color); margin-top:0;">戦略設計・ご提案</h3>
                <p>ヒアリング内容をもとに、ターゲット分析、競合調査を行い、最適なWeb戦略とサイト構造（情報設計）をご提案。合わせてお見積りとスケジュールも提出いたします。</p>
            </div>
        </div>

        <!-- Step 3 -->
        <div style="display:flex; gap: 30px; margin-bottom: 40px; position:relative;">
            <div style="width:50px; height:50px; background:var(--highlight-color); color:var(--white); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.5rem; z-index:2; flex-shrink:0;">3</div>
            <div style="background:var(--white); padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); width:100%;">
                <h3 style="color:var(--primary-color); margin-top:0;">ワイヤー設計</h3>
                <p>各ページのレイアウトやコンテンツ配置を決定する「ワイヤーフレーム（画面設計図）」を作成します。ユーザーの視線誘導やコンバージョンへの導線を緻密に計算します。</p>
            </div>
        </div>

        <!-- Step 4 -->
        <div style="display:flex; gap: 30px; margin-bottom: 40px; position:relative;">
            <div style="width:50px; height:50px; background:var(--highlight-color); color:var(--white); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.5rem; z-index:2; flex-shrink:0;">4</div>
            <div style="background:var(--white); padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); width:100%;">
                <h3 style="color:var(--primary-color); margin-top:0;">デザイン作成</h3>
                <p>ワイヤーフレームをもとに、ブランドイメージに合わせたビジュアルデザインを制作します。PC、スマートフォンそれぞれで最適な見え方になるよう調整します。</p>
            </div>
        </div>

        <!-- Step 5 -->
        <div style="display:flex; gap: 30px; margin-bottom: 40px; position:relative;">
            <div style="width:50px; height:50px; background:var(--highlight-color); color:var(--white); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.5rem; z-index:2; flex-shrink:0;">5</div>
            <div style="background:var(--white); padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); width:100%;">
                <h3 style="color:var(--primary-color); margin-top:0;">実装（コーディング・システム開発）</h3>
                <p>確定したデザインをもとに、HTML/CSS/JavaScriptによるコーディング、WordPress等のCMS構築、必要な機能のシステム開発を行います。テスト環境で動作確認を重ねます。</p>
            </div>
        </div>

        <!-- Step 6 -->
        <div style="display:flex; gap: 30px; margin-bottom: 40px; position:relative;">
            <div style="width:50px; height:50px; background:var(--highlight-color); color:var(--white); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.5rem; z-index:2; flex-shrink:0;">6</div>
            <div style="background:var(--white); padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); width:100%;">
                <h3 style="color:var(--primary-color); margin-top:0;">公開（納品）</h3>
                <p>最終確認をお客様に行っていただき、問題がなければ本番サーバーにアップロードし、公開となります。公開後の操作マニュアルのお渡しも行います。</p>
            </div>
        </div>

        <!-- Step 7 -->
        <div style="display:flex; gap: 30px; margin-bottom: 40px; position:relative;">
            <div style="width:50px; height:50px; background:var(--primary-color); color:var(--highlight-color); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.5rem; z-index:2; flex-shrink:0;">7</div>
            <div style="background:var(--bg-color); border:2px solid var(--accent-color); padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); width:100%;">
                <h3 style="color:var(--primary-color); margin-top:0;">改善・運用（オプション）</h3>
                <p>公開後が本当のスタートです。GA4などのアクセス解析をもとにした改善提案、SEO対策、広告運用などの継続的なマーケティング支援を提供します。</p>
            </div>
        </div>
    </div>

</main>

<!-- お問い合わせ導線 -->
<section class="contact-section">
    <div class="container" style="padding: 60px 0; text-align:center;">
        <h2 class="section-title">まずは無料でご相談ください</h2>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn" style="font-size: 1.2rem; padding: 15px 40px;">無料相談・お問い合わせ</a>
    </div>
</section>

<?php get_footer(); ?>
