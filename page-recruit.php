<?php
/* Template Name: RECRUITページ */
get_header(); ?>

<div class="page-header" style="background:var(--secondary-color); color:var(--white); padding:60px 0; text-align:center;">
    <h1>RECRUIT</h1>
    <p>採用情報</p>
</div>

<main class="container" style="padding: 60px 0; max-width: 900px; margin: 0 auto;">

    <!-- 9-1. blankのカルチャー -->
    <section id="culture" style="margin-bottom: 60px;">
        <h2 style="border-bottom: 3px solid var(--highlight-color); padding-bottom: 10px; color:var(--primary-color);">blankのカルチャー</h2>
        <div style="margin-top:20px; display:flex; gap:30px; flex-wrap:wrap;">
            <div style="background:var(--white); box-shadow:0 4px 10px rgba(0,0,0,0.05); padding:30px; border-radius:8px; flex:1; min-width:250px;">
                <h3 style="color:var(--accent-color);">1. 成果志向</h3>
                <p>美しいデザインを作るのは当たり前。私たちは「クライアントの事業成長に寄与しているか」に最もこだわります。</p>
            </div>
            <div style="background:var(--white); box-shadow:0 4px 10px rgba(0,0,0,0.05); padding:30px; border-radius:8px; flex:1; min-width:250px;">
                <h3 style="color:var(--accent-color);">2. 自律と挑戦</h3>
                <p>各メンバーの主体性を重んじます。失敗を恐れず、常に新しい技術やマーケティング手法に挑戦する姿勢を評価します。</p>
            </div>
            <div style="background:var(--white); box-shadow:0 4px 10px rgba(0,0,0,0.05); padding:30px; border-radius:8px; flex:1; min-width:250px;">
                <h3 style="color:var(--accent-color);">3. オープンなコミュニケーション</h3>
                <p>職種を横断したチームプロジェクトが基本です。肩書や年次を問わず、フラットに意見を出し合える環境を作っています。</p>
            </div>
        </div>
    </section>

    <!-- 9-2. 募集職種 -->
    <section id="jobs" style="margin-bottom: 60px;">
        <h2 style="border-bottom: 3px solid var(--highlight-color); padding-bottom: 10px; color:var(--primary-color);">募集職種</h2>
        
        <div style="margin-top:20px;">
            <div style="border:1px solid var(--light-gray); padding:30px; border-radius:8px; margin-bottom:20px; background:var(--bg-color);">
                <h3 style="font-size:1.3rem; margin-bottom:10px; color:var(--primary-color);">Webディレクター</h3>
                <p style="margin-bottom:20px;">クライアントのヒアリング、サイト設計から進行管理、公開後の改善提案までトータルでお任せします。</p>
                <div style="font-size:0.9rem; margin-bottom:20px;">
                    <strong>[応募条件]</strong> Webディレクション経験2年以上 / コミュニケーション能力
                </div>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn-outline" style="font-size:0.9rem; padding:8px 15px;">この職種にエントリー</a>
            </div>

            <div style="border:1px solid var(--light-gray); padding:30px; border-radius:8px; margin-bottom:20px; background:var(--bg-color);">
                <h3 style="font-size:1.3rem; margin-bottom:10px; color:var(--primary-color);">UI/UXデザイナー</h3>
                <p style="margin-bottom:20px;">コーポレートサイトやLPのデザインをお任せします。データに基づいたCVR改善のデザイン検証も行います。</p>
                <div style="font-size:0.9rem; margin-bottom:20px;">
                    <strong>[応募条件]</strong> Webデザイン経験2年以上 / Figma, Adobeツール等の使用経験
                </div>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn-outline" style="font-size:0.9rem; padding:8px 15px;">この職種にエントリー</a>
            </div>
            
            <div style="border:1px solid var(--light-gray); padding:30px; border-radius:8px; margin-bottom:20px; background:var(--bg-color);">
                <h3 style="font-size:1.3rem; margin-bottom:10px; color:var(--primary-color);">フロントエンドエンジニア</h3>
                <p style="margin-bottom:20px;">デザインのコーディング、WordPressの構築、アニメーション実装、システム連携などの開発全般。</p>
                <div style="font-size:0.9rem; margin-bottom:20px;">
                    <strong>[応募条件]</strong> HTML/CSS/JSによる開発経験 / WordPressの基本理解
                </div>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn-outline" style="font-size:0.9rem; padding:8px 15px;">この職種にエントリー</a>
            </div>
        </div>
    </section>

    <!-- 9-3. 働き方 -->
    <section id="workstyle" style="margin-bottom: 60px;">
        <h2 style="border-bottom: 3px solid var(--highlight-color); padding-bottom: 10px; color:var(--primary-color);">働き方 / 環境</h2>
        <ul style="list-style:disc; margin-left:20px; line-height:2; margin-top:20px;">
            <li>フレックスタイム制（コアタイム 11:00〜16:00）</li>
            <li>ハイブリッドワーク（週2回程度のリモートワーク可）</li>
            <li>最新PC支給・サブモニター貸与</li>
            <li>書籍購入補助 / セミナー参加費補助</li>
            <li>完全週休2日制（土日祝）、夏季・年末年始休暇</li>
        </ul>
    </section>

</main>

<!-- サポート部分 -->
<section class="contact-section">
    <div class="container" style="padding: 60px 0; text-align:center;">
        <h2 class="section-title">私たちと共に挑戦しませんか？</h2>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn" style="font-size: 1.2rem; padding: 15px 40px;">エントリーする</a>
    </div>
</section>

<?php get_footer(); ?>
