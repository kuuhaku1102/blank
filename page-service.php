<?php
/* Template Name: SERVICEページ */
get_header(); ?>

<div class="page-header" style="background:var(--secondary-color); color:var(--white); padding:60px 0; text-align:center;">
    <h1>SERVICE</h1>
    <p>提供サービス一覧</p>
</div>

<main class="container" style="padding: 60px 0;">
    
    <!-- 3-1. Web制作 -->
    <section id="web" style="margin-bottom: 60px;">
        <h2 style="border-bottom: 3px solid var(--highlight-color); padding-bottom: 10px; color:var(--primary-color);">Web制作</h2>
        <div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:20px;">
            <ul style="list-style:disc; margin-left:20px; line-height:2;">
                <li><strong>コーポレートサイト制作</strong> - 企業のブランド価値を最大化するサイト構築</li>
                <li><strong>LP制作</strong> - コンバージョン獲得特化型のランディングページ</li>
                <li><strong>採用サイト制作</strong> - 理念への共感を呼ぶリクルートサイト</li>
                <li><strong>ECサイト構築</strong> - 売上が伸びる導線設計</li>
                <li><strong>WordPress構築</strong> - 更新しやすいオリジナルテーマ作成</li>
                <li><strong>保守運用</strong> - 公開後のセキュリティ対策・定期更新</li>
            </ul>
        </div>
    </section>

    <!-- 3-2. LP特化制作 -->
    <section id="lp" style="margin-bottom: 60px;">
        <h2 style="border-bottom: 3px solid var(--highlight-color); padding-bottom: 10px; color:var(--primary-color);">LP特化制作</h2>
        <p>CVRの最大化を実現する特化型LP設計。</p>
        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:20px;">
            <span style="background:var(--light-gray); padding:5px 15px; border-radius:20px;">CVR設計</span>
            <span style="background:var(--light-gray); padding:5px 15px; border-radius:20px;">広告用LP</span>
            <span style="background:var(--highlight-color); color:var(--white); padding:5px 15px; border-radius:20px;">美容・医療特化LP</span>
            <span style="background:var(--highlight-color); color:var(--white); padding:5px 15px; border-radius:20px;">士業LP</span>
            <span style="background:var(--highlight-color); color:var(--white); padding:5px 15px; border-radius:20px;">不動産LP</span>
            <span style="background:var(--highlight-color); color:var(--white); padding:5px 15px; border-radius:20px;">外壁塗装LP</span>
        </div>
    </section>

    <!-- 3-3. デザイン制作 -->
    <section id="design" style="margin-bottom: 60px;">
        <h2 style="border-bottom: 3px solid var(--highlight-color); padding-bottom: 10px; color:var(--primary-color);">デザイン制作</h2>
        <p>ユーザー心理に基づいたクリエイティブ制作。</p>
        <ul style="list-style:disc; margin-left:20px; line-height:2; margin-top:20px;">
            <li>バナー制作</li>
            <li>クリエイティブ制作</li>
            <li>UI/UX設計</li>
            <li>ブランドデザイン</li>
        </ul>
    </section>

    <!-- 3-4. マーケティング支援 -->
    <section id="marketing" style="margin-bottom: 60px;">
        <h2 style="border-bottom: 3px solid var(--highlight-color); padding-bottom: 10px; color:var(--primary-color);">マーケティング支援</h2>
        <p>集客から分析までのデジタルマーケティング支援。</p>
        <ul style="list-style:disc; margin-left:20px; line-height:2; margin-top:20px;">
            <li>Google広告運用 / Meta広告運用</li>
            <li>SEO対策</li>
            <li>コンテンツ設計</li>
            <li>GA4導入・分析</li>
        </ul>
    </section>

    <!-- 3-5. システム開発 -->
    <section id="system" style="margin-bottom: 60px;">
        <h2 style="border-bottom: 3px solid var(--highlight-color); padding-bottom: 10px; color:var(--primary-color);">システム開発</h2>
        <p>事業課題を解決するためのカスタムプラットフォーム開発。</p>
        <ul style="list-style:disc; margin-left:20px; line-height:2; margin-top:20px;">
            <li>会員サイト構築</li>
            <li>マッチングサイト</li>
            <li>カスタムWebアプリ</li>
            <li>API連携 / LINEチャットボット連携</li>
        </ul>
    </section>

</main>

<!-- お問い合わせ導線 -->
<section class="contact-section">
    <div class="container" style="padding: 60px 0;">
        <h2 class="section-title">ビジネスを加速させませんか？</h2>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn" style="font-size: 1.2rem; padding: 15px 40px;">無料相談・お問い合わせ</a>
    </div>
</section>

<?php get_footer(); ?>
