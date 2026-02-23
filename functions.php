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

    // 4. パートナーロゴ (Partner)
    register_post_type( 'partner', array(
        'labels' => array(
            'name' => 'パートナーロゴ',
            'singular_name' => 'パートナーロゴ',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-groups',
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
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ));
}
add_action( 'init', 'blank_register_post_types' );
