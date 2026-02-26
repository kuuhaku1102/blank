<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-inner">
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
        </h1>
        <nav class="main-nav">
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">ABOUT</a></li>
                <li><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">SERVICE</a></li>
                <li><a href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">WORKS</a></li>
                <li><a href="<?php echo esc_url( get_post_type_archive_link( 'case_study' ) ); ?>">CASE STUDY</a></li>
                <li><a href="<?php echo esc_url( home_url( '/flow/' ) ); ?>">FLOW</a></li>
                <li><a href="<?php echo esc_url( home_url( '/price/' ) ); ?>">PRICE</a></li>
                <li><a href="<?php echo esc_url( home_url( '/syllabus/' ) ); ?>">SYLLABUS</a></li>
                <li><a href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">RECRUIT</a></li>
                <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn">無料相談 / お問い合わせ</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
