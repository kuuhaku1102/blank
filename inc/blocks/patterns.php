<?php
// Function to register custom block patterns to provide readymade beautiful templates

function blank_register_block_patterns() {
    
    // 1. Register a dedicated Pattern Category for the theme
    register_block_pattern_category(
        'blank-theme-patterns',
        array( 'label' => 'blankテーマ専用テンプレート' )
    );

    // 2. Beautiful Content Area (Title + Description + Image)
    register_block_pattern(
        'blank-theme/beautiful-content-row',
        array(
            'title'       => '【テンプレート】左テキスト・右画像の美しいコンテンツ',
            'description' => 'A visually appealing two-column layout with a stylish title and an image.',
            'categories'  => array('blank-theme-patterns'),
            'content'     => '<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"5%","right":"0","bottom":"5%","left":"0"}}}} -->
<div class="wp-block-columns alignwide" style="padding-top:5%;padding-right:0;padding-bottom:5%;padding-left:0"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"1.4","fontSize":"2rem"},"color":{"text":"#1c2541"}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#1c2541;font-size:2rem;line-height:1.4">ここに魅力的な<br>見出しを入力します</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.8"}}} -->
<p style="line-height:1.8">見出しを補足する詳細な文章をここに入力します。ユーザーの課題や、御社が提供できる具体的なメリット、サービスの特徴などを分かりやすく記載してください。文章は2〜3行程度が最も読みやすく、デザインにフィットします。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"20px"},"shadow":"0px 15px 40px rgba(0, 0, 0, 0.08)"}} -->
<figure class="wp-block-image aligncenter size-large has-custom-border" style="border-radius:20px;box-shadow:0px 15px 40px rgba(0, 0, 0, 0.08)"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder.jpg" alt="特徴画像"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
        )
    );

    // 3. Feature Highlights (3 Column grid)
    register_block_pattern(
        'blank-theme/feature-highlights',
        array(
            'title'       => '【テンプレート】3列の特徴ハイライト（強み・ポイント）',
            'description' => 'Three columns highlighting specific features or benefits.',
            'categories'  => array('blank-theme-patterns'),
            'content'     => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"40px","bottom":"40px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:40px;padding-bottom:40px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"1.8rem"},"color":{"text":"#1c2541"}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#1c2541;font-size:1.8rem">3つの選ばれる理由</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"},"blockGap":"15px"},"border":{"radius":"12px"}},"backgroundColor":"#f8fafc"} -->
<div class="wp-block-column has-background" style="background-color:#f8fafc;border-radius:12px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:heading {"level":3,"style":{"color":{"text":"#1a56db"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#1a56db">01. 徹底したヒアリング</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.7"}}} -->
<p style="line-height:1.7">お客様の課題を深く理解するため、まずは徹底的なヒアリングを実施します。表面的な要望だけでなく、根本的な課題をみつけます。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"},"blockGap":"15px"},"border":{"radius":"12px"}},"backgroundColor":"#f8fafc"} -->
<div class="wp-block-column has-background" style="background-color:#f8fafc;border-radius:12px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:heading {"level":3,"style":{"color":{"text":"#1a56db"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#1a56db">02. 成果に直結する戦略</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.7"}}} -->
<p style="line-height:1.7">デザインの綺麗さだけでなく、最終的な「売上」や「コンバージョン」などの成果から逆算した戦略設計を行います。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"},"blockGap":"15px"},"border":{"radius":"12px"}},"backgroundColor":"#f8fafc"} -->
<div class="wp-block-column has-background" style="background-color:#f8fafc;border-radius:12px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:heading {"level":3,"style":{"color":{"text":"#1a56db"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#1a56db">03. 迅速かつ柔軟な対応</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.7"}}} -->
<p style="line-height:1.7">プロジェクト進行中はチャットツール等を用いて、スピーディーかつ柔軟にコミュニケーションをとりながら進めます。</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
        )
    );

}
add_action( 'init', 'blank_register_block_patterns' );
