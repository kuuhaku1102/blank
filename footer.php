</main>
<footer class="site-footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-info">
                <h2><?php bloginfo( 'name' ); ?></h2>
                <p>成果から逆算するクリエイティブ</p>
            </div>
            <div class="footer-links">
                <h3>企業情報</h3>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">ABOUT (会社情報)</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">RECRUIT (採用)</a></li>
                    <li><a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>">NEWS (お知らせ)</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h3>サービス</h3>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">Web制作</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">LP特化制作</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">マーケティング支援</a></li>
                    <li><a href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">WORKS (制作実績)</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h3>法的情報</h3>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">プライバシーポリシー</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>">利用規約</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/legal/' ) ); ?>">特商法</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> Inc. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
