<?php
// バナー制作実績専用のカスタムフィールド（メタボックス）の追加
function blank_add_banner_meta_boxes() {
    add_meta_box( 'banner_details', 'バナー制作実績 詳細情報', 'blank_banner_meta_box_html', 'banner_works', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'blank_add_banner_meta_boxes' );

function blank_banner_meta_box_html( $post ) {
    wp_nonce_field( 'banner_meta_save', 'banner_meta_nonce' );

    $company = get_post_meta($post->ID, 'banner_company', true);
    $media = get_post_meta($post->ID, 'banner_media', true);
    $days = get_post_meta($post->ID, 'banner_days', true);
    $gallery = get_post_meta($post->ID, 'banner_gallery', true); // comma separated IDs

    ?>
    <style>
        .banner-meta-field { margin-bottom: 20px; }
        .banner-meta-field label { display: block; font-weight: bold; margin-bottom: 5px; }
        .banner-meta-field input[type="text"] { width: 100%; max-width: 400px; }
        
        .banner-gallery-wrap { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px; }
        .banner-gallery-item { position: relative; width: 120px; height: 120px; background: #f0f0f1; border: 1px solid #c3c4c7; display: flex; align-items: center; justify-content: center; }
        .banner-gallery-item img { max-width: 100%; max-height: 100%; object-fit: cover; }
        .banner-gallery-item .remove-img { position: absolute; top: -8px; right: -8px; background: red; color: white; border-radius: 50%; width: 20px; height: 20px; text-align: center; cursor: pointer; line-height: 18px; font-weight: bold; box-shadow: 0 2px 4px rgba(0,0,0,0.2); }
    </style>

    <div class="banner-meta-field">
        <label for="banner_company">会社名</label>
        <input type="text" name="banner_company" id="banner_company" value="<?php echo esc_attr($company); ?>" placeholder="例：株式会社〇〇">
    </div>
    
    <div class="banner-meta-field">
        <label for="banner_media">広告媒体</label>
        <input type="text" name="banner_media" id="banner_media" value="<?php echo esc_attr($media); ?>" placeholder="例：Meta広告、Googleディスプレイ広告など">
    </div>
    
    <div class="banner-meta-field">
        <label for="banner_days">製作日数</label>
        <input type="text" name="banner_days" id="banner_days" value="<?php echo esc_attr($days); ?>" placeholder="例：3営業日">
    </div>

    <hr>

    <div class="banner-meta-field">
        <label>バナー画像ギャラリー（複数選択可）</label>
        <p class="description">ここで登録した画像がアーカイブや詳細ページに一覧表示されます。※アーカイブの代表画像には「アイキャッチ画像」が使用されます。</p>
        
        <input type="hidden" name="banner_gallery" id="banner_gallery_input" value="<?php echo esc_attr($gallery); ?>">
        <button type="button" class="button" id="banner_gallery_btn">画像を追加・編集</button>

        <div class="banner-gallery-wrap" id="banner_gallery_preview">
            <?php
            if ($gallery) {
                $ids = explode(',', $gallery);
                foreach ($ids as $id) {
                    $img_url = wp_get_attachment_image_url($id, 'medium');
                    if ($img_url) {
                        echo '<div class="banner-gallery-item" data-id="'.esc_attr($id).'"><img src="'.esc_url($img_url).'"><span class="remove-img" title="削除">×</span></div>';
                    }
                }
            }
            ?>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($){
        var frame;
        $('#banner_gallery_btn').on('click', function(e) {
            e.preventDefault();
            
            if ( frame ) {
                frame.open();
                return;
            }
            
            frame = wp.media({
                title: 'バナー画像を選択',
                button: { text: 'ギャラリーに追加' },
                multiple: true
            });

            frame.on('select', function() {
                var selection = frame.state().get('selection');
                var currentIds = $('#banner_gallery_input').val();
                
                var newIdsArr = currentIds ? currentIds.split(',') : [];
                
                selection.forEach(function(attachment){
                    attachment = attachment.toJSON();
                    if (!newIdsArr.includes(attachment.id.toString())) {
                        newIdsArr.push(attachment.id);
                        var imgUrl = attachment.sizes.medium ? attachment.sizes.medium.url : attachment.url;
                        $('#banner_gallery_preview').append('<div class="banner-gallery-item" data-id="'+attachment.id+'"><img src="'+imgUrl+'"><span class="remove-img" title="削除">×</span></div>');
                    }
                });
                
                $('#banner_gallery_input').val(newIdsArr.join(','));
            });
            
            frame.open();
        });

        // 削除機能
        $('#banner_gallery_preview').on('click', '.remove-img', function(){
            var parent = $(this).closest('.banner-gallery-item');
            var idToRemove = parent.data('id').toString();
            var currentIds = $('#banner_gallery_input').val().split(',');
            
            var newIds = currentIds.filter(function(id){ return id !== idToRemove; });
            $('#banner_gallery_input').val(newIds.join(','));
            
            parent.remove();
        });
    });
    </script>
    <?php
}

function blank_save_banner_meta( $post_id ) {
    if ( !isset( $_POST['banner_meta_nonce'] ) || !wp_verify_nonce( $_POST['banner_meta_nonce'], 'banner_meta_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( !current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['banner_company'] ) ) update_post_meta( $post_id, 'banner_company', sanitize_text_field( $_POST['banner_company'] ) );
    if ( isset( $_POST['banner_media'] ) ) update_post_meta( $post_id, 'banner_media', sanitize_text_field( $_POST['banner_media'] ) );
    if ( isset( $_POST['banner_days'] ) ) update_post_meta( $post_id, 'banner_days', sanitize_text_field( $_POST['banner_days'] ) );
    if ( isset( $_POST['banner_gallery'] ) ) update_post_meta( $post_id, 'banner_gallery', sanitize_text_field( $_POST['banner_gallery'] ) );
}
add_action( 'save_post', 'blank_save_banner_meta' );

// 管理画面でメディアアップローダーのスクリプトを読み込むためのアクション
function blank_enqueue_banner_media_script() {
    global $typenow;
    if ( $typenow == 'banner_works' ) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'blank_enqueue_banner_media_script');
