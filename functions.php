<?php
function blank_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'blank_theme_setup' );

function blank_enqueue_scripts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap', array(), null );
    wp_enqueue_style( 'blank-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'blank_enqueue_scripts' );

// カスタム投稿タイプの登録
function blank_register_post_types() {

    // 1. お知らせ (News)
    register_post_type( 'news', array(
        'labels' => array(
            'name' => 'お知らせ',
            'singular_name' => 'お知らせ',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ));

    // 2. 制作実績 (Works)
    register_post_type( 'works', array(
        'labels' => array(
            'name' => '制作実績',
            'singular_name' => '制作実績',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest' => true,
    ));

    // 制作実績のカスタムタクソノミー（カテゴリ別：LP, コーポレートサイトなど）
    register_taxonomy( 'work_cat', 'works', array(
        'label' => '実績カテゴリ',
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
    ));

    // 3. 広告実績 (Ad Works)
    register_post_type( 'ad_works', array(
        'labels' => array(
            'name' => '広告実績',
            'singular_name' => '広告実績',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-chart-bar',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest' => true,
    ));

    // 3.5 バナー制作実績 (Banner Works)
    register_post_type( 'banner_works', array(
        'labels' => array(
            'name' => 'バナー制作実績',
            'singular_name' => 'バナー制作実績',
            'add_new' => '新規追加',
            'add_new_item' => '新しいバナー実績を追加',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-format-image',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest' => true,
    ));

    // 4. 取引先 (Trading Companies) / パートナーロゴ
    register_post_type( 'partner', array(
        'labels' => array(
            'name' => 'Trading Companies (取引先)',
            'singular_name' => 'Trading Companies (取引先)',
            'add_new' => 'ロゴを追加',
            'add_new_item' => '新しい取引先ロゴを追加',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-building',
        'supports' => array( 'title', 'thumbnail' ),
        'show_in_rest' => true,
    ));

    // 5. 成功事例 (Case Study) ※サイトマップ5番にあるため追加
    register_post_type( 'case_study', array(
        'labels' => array(
            'name' => '成功事例',
            'singular_name' => '成功事例',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 9,
        'menu_icon' => 'dashicons-awards',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest' => true,
    ));
    // 6. サービス (Service)
    register_post_type( 'service', array(
        'labels' => array(
            'name' => 'サービス',
            'singular_name' => 'サービス',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest' => true,
    ));

    flush_rewrite_rules(false); // Temporary flush to enable the new CPT URLs

    // ONE TIME MIGRATION: Convert Service blocks to CPT posts, rename old Page to avoid conflict
    if ( !get_option('blank_service_migrated_v2') ) {
        $old_page = get_page_by_path('service');
        if ($old_page && $old_page->post_type === 'page') {
            wp_update_post([ 'ID' => $old_page->ID, 'post_name' => 'service-old' ]);
        }
        $services = [
            ["title" => "Web制作事業（Design & Build）", "content" => "成果直結型Webサイト制作。心理導線設計に基づいたUI/UX、CVR最大化構造設計、モバイルファースト等を特徴とします。"],
            ["title" => "高機能Webシステム開発", "content" => "“見た目”だけでなく、“ビジネスを動かす”Webへ。予約システムや会員制サイト等の構築を行います。"],
            ["title" => "LP特化制作（成果特化型）", "content" => "400件以上の制作思想を踏襲。CVR 1.3〜2.8倍改善設計など、広告連動型構成を得意とします。"],
            ["title" => "デジタルマーケティング支援", "content" => "制作して終わりではなく、成果が出るまで伴走。Google広告、Meta広告、SEO対策、SNS運用など。"],
            ["title" => "AI × 自動化ソリューション", "content" => "Python × ChatGPT × Github Actions。24時間自動稼働、コンテンツ自動生成システム、競合連携など。"],
            ["title" => "コンサルティング事業", "content" => "新規事業立ち上げ支援、DX推進支援、事業再設計、収益構造改善、デジタル戦略設計など。"]
        ];
        foreach ($services as $s) {
            if (!get_page_by_title($s["title"], OBJECT, "service")) {
                wp_insert_post([
                    "post_title" => $s["title"],
                    "post_content" => $s["content"],
                    "post_type" => "service",
                    "post_status" => "publish",
                    "post_excerpt" => $s["content"]
                ]);
            }
        }
        update_option('blank_service_migrated_v2', 1);
    }
}
add_action( 'init', 'blank_register_post_types' );

// カスタムフィールド（メタボックス）の追加: Case Study詳細
function blank_add_cs_meta_boxes() {
    add_meta_box( 'cs_details', 'Case Study 詳細情報', 'blank_cs_meta_box_html', 'case_study', 'normal', 'default' );
}
add_action( 'add_meta_boxes', 'blank_add_cs_meta_boxes' );

function blank_cs_meta_box_html( $post ) {
    $cs_industry = get_post_meta($post->ID, 'cs_industry', true);
    $cs_issue = get_post_meta($post->ID, 'cs_issue', true);
    $cs_implementation = get_post_meta($post->ID, 'cs_implementation', true);
    $cs_result = get_post_meta($post->ID, 'cs_result', true);
    $cs_value = get_post_meta($post->ID, 'cs_value', true);
    ?>
    <style>
        .cs-meta-field { margin-bottom: 20px; }
        .cs-meta-field label { display: block; font-weight: bold; margin-bottom: 5px; }
        .cs-meta-field textarea, .cs-meta-field input { width: 100%; max-width: 100%; }
    </style>
    <div class="cs-meta-field">
        <label>■ 業界</label>
        <input type="text" name="cs_industry" value="<?php echo esc_attr($cs_industry); ?>" />
    </div>
    <div class="cs-meta-field">
        <label>■ 課題</label>
        <textarea name="cs_issue" rows="4"><?php echo esc_textarea($cs_issue); ?></textarea>
    </div>
    <div class="cs-meta-field">
        <label>■ 実装ブロック / 施策設計</label>
        <textarea name="cs_implementation" rows="8"><?php echo esc_textarea($cs_implementation); ?></textarea>
    </div>
    <div class="cs-meta-field">
        <label>■ 成果 / KPI改善</label>
        <textarea name="cs_result" rows="4"><?php echo esc_textarea($cs_result); ?></textarea>
    </div>
    <div class="cs-meta-field">
        <label>■ blankの役割 / 価値</label>
        <textarea name="cs_value" rows="3"><?php echo esc_textarea($cs_value); ?></textarea>
    </div>
    <?php
}

function blank_save_cs_meta_data( $post_id ) {
    if ( array_key_exists( 'cs_industry', $_POST ) ) { update_post_meta( $post_id, 'cs_industry', sanitize_text_field( $_POST['cs_industry'] ) ); }
    if ( array_key_exists( 'cs_issue', $_POST ) ) { update_post_meta( $post_id, 'cs_issue', sanitize_textarea_field( $_POST['cs_issue'] ) ); }
    if ( array_key_exists( 'cs_implementation', $_POST ) ) { update_post_meta( $post_id, 'cs_implementation', sanitize_textarea_field( $_POST['cs_implementation'] ) ); }
    if ( array_key_exists( 'cs_result', $_POST ) ) { update_post_meta( $post_id, 'cs_result', sanitize_textarea_field( $_POST['cs_result'] ) ); }
    if ( array_key_exists( 'cs_value', $_POST ) ) { update_post_meta( $post_id, 'cs_value', sanitize_textarea_field( $_POST['cs_value'] ) ); }
}
add_action( 'save_post', 'blank_save_cs_meta_data' );

// 自動シードスクリプト：4つのCase Studyを作成
function blank_seed_case_studies() {
    if ( get_option( 'blank_case_studies_seeded_v3' ) ) return;
    $case_studies = [
        [
            'title' => 'Case Study 01: 美容クリニック｜CVR 2倍を実現した予約完結型LP',
            'industry' => '美容医療',
            'issue' => "・広告流入はあるが予約率が低い（CVR 4.8%）\n・フォーム離脱が多い\n・競合との差別化ができていない",
            'impl' => "1. 心理導線再設計\n→ 悩み別ブロック構造に再構築\n→ 医師紹介をファーストビュー直下へ\n→ 社会的証明（症例）をCTA前に配置\n\n2. 予約完結型実装\n→ LP内予約完結\n→ Googleカレンダー自動連携\n→ 自動リマインド通知\n\n3. UI最適化\n→ スライドフォーム導入\n→ 入力ステップ簡略化\n→ 表示速度改善",
            'result' => "CVR：4.8% → 9.5%\n予約数：210%増\nフォーム完了率：1.7倍\nCPA：22%改善",
            'value' => "デザインではなく「予約が増える構造」を実装。"
        ],
        [
            'title' => 'Case Study 02: 地域工務店｜問い合わせ4.8倍',
            'industry' => '建築・リフォーム',
            'issue' => "・月12件の問い合わせ\n・価格競争に巻き込まれていた\n・地域検索で弱い",
            'impl' => "■ 地域特化型LP制作\n■ KW反応型ヘッドライン導入\n■ 施工事例のストーリー化\n■ EFO改善\n■ Google × Metaクロス運用",
            'result' => "問い合わせ：12件 → 58件\n客単価：22%UP\nCTR：+44%\n品質スコア改善",
            'value' => "競合と戦わず、ポジションを作る設計。"
        ],
        [
            'title' => 'Case Study 03: SaaSスタートアップ｜トライアル申込235%増',
            'industry' => 'IT / SaaS',
            'issue' => "・サービスが難解\n・直帰率63%\n・価格理解で離脱",
            'impl' => "■ 料金シミュレーター実装\n■ 機能別UI再整理\n■ FAQ再構築\n■ マイクロCV設計\n■ Looker可視化",
            'result' => "トライアル申込：235%増\n直帰率：▲43pt\n有料転換率：1.6倍",
            'value' => "「分かりにくい」を「触りたくなる」に変える。"
        ],
        [
            'title' => 'Case Study 04: 美容サロン｜月商180%成長',
            'industry' => '美容サロン',
            'issue' => "・集客が広告依存\n・リピート率が低い\n・顧客管理がアナログ",
            'impl' => "■ 会員機能導入\n→ マイページ構築\n→ 来店履歴表示\n→ 次回予約促進\n\n■ CRM連携\n→ LINE自動連携\n→ 来店3日後フォロー\n\n■ 定期キャンペーン自動化\n→ 月次自動配信\n→ セグメント別配信\n\n☑ 会員システム\n☑ LINE自動連携\n☑ API構築\n☑ マーケ設計",
            'result' => "リピート率：+32%\n来店単価：+18%\n月商：180%成長\n業務工数：▲40%",
            'value' => "店舗全体の「仕組み化」と「システム構築」。"
        ]
    ];
    foreach($case_studies as $cs) {
        $post_id = wp_insert_post( [
            'post_title' => $cs['title'],
            'post_type' => 'case_study',
            'post_status' => 'publish'
        ] );
        update_post_meta($post_id, 'cs_industry', $cs['industry']);
        update_post_meta($post_id, 'cs_issue', $cs['issue']);
        update_post_meta($post_id, 'cs_implementation', $cs['impl']);
        update_post_meta($post_id, 'cs_result', $cs['result']);
        update_post_meta($post_id, 'cs_value', $cs['value']);
    }
    
    // パーマリンク設定の更新（404エラー解消のため）
    flush_rewrite_rules();
    
    update_option( 'blank_case_studies_seeded_v3', true );
}
add_action( 'init', 'blank_seed_case_studies' );

// カスタム制作実績 JSONメタ管理の読み込み
require_once get_template_directory() . '/inc/works-admin.php';

// バナー制作実績専用メタボックスの読み込み
require_once get_template_directory() . '/inc/banner-admin.php';

// 料金シミュレーター管理の読み込み
require_once get_template_directory() . '/inc/pricing-admin.php';

// ブロックパターン（エディター用テンプレート）の読み込み
require_once get_template_directory() . '/inc/blocks/patterns.php';

// ブログ用スマートエディタ（管理画面メタボックス＆処理）の読み込み
require_once get_template_directory() . '/inc/blog-smart-editor.php';

// アニメーションロゴ出力関数の読み込み
require_once get_template_directory() . '/inc/animated-logo.php';

/* =========================================================
   WordPress セキュリティ対策（Basic Hardenings）
========================================================= */

// 1. WordPressプレーンバーション情報の非表示（攻撃対象にならないため）
remove_action('wp_head','wp_generator');

// 2. XML-RPCの無効化（DDoS攻撃やブルートフォース攻撃を防ぐ）
add_filter('xmlrpc_enabled', '__return_false');

// 3. 基本的なHTTPセキュリティヘッダーの付与（XSS、クリックジャッキング対策）
function blank_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-XSS-Protection: 1; mode=block');
        header('X-Frame-Options: SAMEORIGIN');
        header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
    }
}
add_action('send_headers', 'blank_security_headers');

// 4. ユーザー名の列挙（Authorスキャン）の防止（/author=1 へのアクセスをリダイレクト）
function blank_disable_author_scans() {
    if (is_admin()) return;
    if (isset($_GET['author']) || preg_match('/^\/author\//', $_SERVER['REQUEST_URI'])) {
        wp_redirect(home_url(), 301);
        exit;
    }
}
add_action('init', 'blank_disable_author_scans');

/* =========================================================
   管理画面：記事の複製（コピー）機能
========================================================= */
function blank_duplicate_post_link( $actions, $post ) {
    // カスタム投稿タイプを含め、すべてでコピー機能を表示（特に「制作実績」など）
    if ( current_user_can( 'edit_posts' ) ) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url( admin_url( 'admin.php?action=blank_duplicate_post&post=' . $post->ID ), 'blank_duplicate_post_' . $post->ID ) . '" title="この記事を複製する" style="color:#2271b1; font-weight:bold;">コピー（複製）</a>';
    }
    return $actions;
}
// 管理画面の記事一覧にアクションリンクを追加
add_filter( 'post_row_actions', 'blank_duplicate_post_link', 10, 2 );
add_filter( 'page_row_actions', 'blank_duplicate_post_link', 10, 2 );

function blank_duplicate_post_action() {
    if ( ! ( isset( $_GET['post'] ) || isset( $_POST['post'] ) ) || ! isset( $_REQUEST['action'] ) ) {
        wp_die( '複製する記事が見つかりません。' );
    }

    $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
    check_admin_referer( 'blank_duplicate_post_' . $post_id );

    $post = get_post( $post_id );
    $current_user = wp_get_current_user();
    
    if ( $post ) {
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $current_user->ID,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name . '-copy-' . wp_rand(100,999),
            'post_parent'    => $post->post_parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft', // コピー後は必ず下書きにする
            'post_title'     => $post->post_title . '（コピー）',
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order
        );

        $new_post_id = wp_insert_post( $args );

        // タクソノミー（カテゴリやタグ等）の複製
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( $taxonomies as $taxonomy ) {
            $post_terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'slugs' ) );
            wp_set_object_terms( $new_post_id, $post_terms, $taxonomy, false );
        }

        // カスタムフィールド（Post Meta）の複製
        $post_meta_infos = get_post_custom( $post_id );
        foreach ( $post_meta_infos as $meta_key => $meta_values ) {
            if ( $meta_key === '_wp_old_slug' ) continue;
            foreach ( $meta_values as $meta_value ) {
                add_post_meta( $new_post_id, $meta_key, maybe_unserialize( $meta_value ) );
            }
        }

        // 複製した記事の編集画面へ直接リダイレクトする
        wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
        exit;
    } else {
        wp_die( '記事の複製に失敗しました。' );
    }
}
// 実行用のアクションフック
add_action( 'admin_action_blank_duplicate_post', 'blank_duplicate_post_action' );
