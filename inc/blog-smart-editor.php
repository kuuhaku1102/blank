<?php
// Blog (Post) Smart Editor Meta Box & Display

// Add Meta Box for Smart Editor on standard 'post' type
function blank_add_blog_smart_editor() {
    add_meta_box( 'blog_smart_editor', '【スマートエディタ】記事コンテンツ作成', 'blank_blog_smart_editor_html', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'blank_add_blog_smart_editor' );

function blank_blog_smart_editor_html( $post ) {
    $smart_intro = get_post_meta($post->ID, 'blog_smart_intro', true);
    
    // Get array of sections (each has heading, content, image)
    $smart_sections = get_post_meta($post->ID, 'blog_smart_sections', true);
    if (!is_array($smart_sections)) $smart_sections = [];
    
    // Nonce
    wp_nonce_field( 'blog_smart_editor_nonce_action', 'blog_smart_editor_nonce' );
    
    ?>
    <style>
        .smart-editor-wrap { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif; background: #fafcff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 8px; }
        .smart-editor-wrap label { font-weight: bold; color: #1c2541; display: block; margin-bottom: 8px; font-size: 14px; }
        .smart-editor-wrap textarea, .smart-editor-wrap input[type="text"] { width: 100%; max-width: 100%; border: 1px solid #ccd0d4; border-radius: 4px; padding: 10px; box-sizing: border-box; }
        .smart-editor-wrap textarea:focus, .smart-editor-wrap input[type="text"]:focus { border-color: #1a56db; outline: none; box-shadow: 0 0 0 1px #1a56db; }
        .smart-editor-section { background: #fff; padding: 20px; border: 1px solid #e1e8f0; border-radius: 6px; margin-bottom: 20px; position:relative; }
        .smart-editor-section-header { font-size: 16px; font-weight: bold; color: #1a56db; margin-bottom: 15px; border-bottom: 1px dashed #e1e8f0; padding-bottom: 10px; display:flex; justify-content:space-between; align-items:center; }
        .smart-editor-field { margin-bottom: 15px; }
        .remove-section-btn { color: #e53935; cursor: pointer; font-size: 13px; font-weight: normal; text-decoration: underline; background:none; border:none; }
        .add-section-btn { display: inline-block; background: #1a56db; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; cursor: pointer; transition: background 0.3s; border:none; }
        .add-section-btn:hover { background: #113f99; color: #fff; }
        
        .img-preview-area { display: flex; align-items: center; gap: 15px; margin-top: 10px; }
        .img-preview-area img { max-width: 150px; max-height: 100px; border-radius: 4px; border: 1px solid #ccc; background:#eee; }
        .img-select-btn { background: #fff; border: 1px solid #1a56db; color: #1a56db; padding: 6px 12px; border-radius: 4px; cursor: pointer; }
        .img-clear-btn { color: #999; cursor: pointer; font-size: 13px; text-decoration:underline; border:none; background:none; }
    </style>

    <div class="smart-editor-wrap">
        <p style="margin-top:0; font-size:13px; color:#666;">※通常の本文エディタを使わずに、以下のフォームに入力するだけで自動的にお洒落な記事デザインが出力されます。</p>
        
        <div class="smart-editor-field">
            <label>💬 リード文（記事の導入）</label>
            <textarea name="blog_smart_intro" id="blog_smart_intro" rows="4" placeholder="この記事の概要を記入してください..."><?php echo esc_textarea($smart_intro); ?></textarea>
        </div>

        <div id="smart-sections-container">
            <?php 
            $i = 0;
            foreach ($smart_sections as $sec) : 
                $h = isset($sec['heading']) ? $sec['heading'] : '';
                $c = isset($sec['content']) ? $sec['content'] : '';
                $img = isset($sec['img']) ? $sec['img'] : '';
            ?>
                <div class="smart-editor-section" data-index="<?php echo $i; ?>">
                    <div class="smart-editor-section-header">
                        <span class="sec-title-num">セクション <?php echo $i+1; ?></span>
                        <button type="button" class="remove-section-btn" onclick="removeSmartSection(this)">削除</button>
                    </div>
                    
                    <div class="smart-editor-field">
                        <label>見出し</label>
                        <input type="text" name="smart_section[<?php echo $i; ?>][heading]" class="tpl-heading" value="<?php echo esc_attr($h); ?>" placeholder="例：〇〇機能の強力なメリット" />
                    </div>
                    <div class="smart-editor-field">
                        <label>🖼️ アニメーション / ビジュアル選択</label>
                        <?php 
                        $anim = isset($sec['anim']) ? $sec['anim'] : 'none';
                        ?>
                        <select name="smart_section[<?php echo $i; ?>][anim]" class="tpl-anim" style="width:100%; max-width:400px; padding:8px; border-radius:4px; border:1px solid #ccd0d4; margin-bottom:10px;" onchange="toggleImageUploader(this)">
                            <option value="none" <?php selected($anim, 'none'); ?>>アニメーション・画像なし</option>
                            <option value="tech_server" <?php selected($anim, 'tech_server'); ?>>【アニメ】サーバー / クラウド (Tech)</option>
                            <option value="tech_code" <?php selected($anim, 'tech_code'); ?>>【アニメ】コーディング / 開発 (Tech)</option>
                            <option value="tech_data" <?php selected($anim, 'tech_data'); ?>>【アニメ】データ解析 / AI (Tech)</option>
                            <option value="tech_security" <?php selected($anim, 'tech_security'); ?>>【アニメ】セキュリティ / ロック (Tech)</option>
                            <option value="custom_image" <?php selected($anim, 'custom_image'); ?>>自分で画像をアップロードする</option>
                        </select>
                        
                        <div class="img-preview-area" style="display: <?php echo ($anim === 'custom_image') ? 'flex' : 'none'; ?>;">
                            <input type="hidden" name="smart_section[<?php echo $i; ?>][img]" class="tpl-img img-url-input" value="<?php echo esc_url($img); ?>" />
                            <img src="<?php echo $img ? esc_url($img) : ''; ?>" class="img-preview" style="display: <?php echo $img ? 'block' : 'none'; ?>;" />
                            <div>
                                <button type="button" class="img-select-btn" onclick="openMediaUploader(this)">画像を選択</button>
                                <button type="button" class="img-clear-btn" style="display: <?php echo $img ? 'inline' : 'none'; ?>;" onclick="clearMedia(this)">クリア</button>
                            </div>
                        </div>
                    </div>
                    <div class="smart-editor-field">
                        <label>本文（テキスト）</label>
                        <textarea name="smart_section[<?php echo $i; ?>][content]" class="tpl-content" rows="6" placeholder="見出しに対する本文を記入してください。改行は自動的に反映されます。"><?php echo esc_textarea($c); ?></textarea>
                    </div>
                </div>
            <?php $i++; endforeach; ?>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="button" class="add-section-btn" onclick="addSmartSection()">＋ 新しいセクションを追加</button>
        </div>
    </div>

    <!-- Template for new sections -->
    <template id="smart-section-template">
        <div class="smart-editor-section">
            <div class="smart-editor-section-header">
                <span class="sec-title-num">新セクション</span>
                <button type="button" class="remove-section-btn" onclick="removeSmartSection(this)">削除</button>
            </div>
            
            <div class="smart-editor-field">
                <label>見出し</label>
                <input type="text" class="tpl-heading" value="" placeholder="例：〇〇機能の強力なメリット" />
            </div>
            
            <div class="smart-editor-field">
                <label>🖼️ アニメーション / ビジュアル選択</label>
                <select class="tpl-anim" style="width:100%; max-width:400px; padding:8px; border-radius:4px; border:1px solid #ccd0d4; margin-bottom:10px;" onchange="toggleImageUploader(this)">
                    <option value="none">アニメーション・画像なし</option>
                    <option value="tech_server">【アニメ】サーバー / クラウド (Tech)</option>
                    <option value="tech_code">【アニメ】コーディング / 開発 (Tech)</option>
                    <option value="tech_data">【アニメ】データ解析 / AI (Tech)</option>
                    <option value="tech_security">【アニメ】セキュリティ / ロック (Tech)</option>
                    <option value="custom_image">自分で画像をアップロードする</option>
                </select>
                
                <div class="img-preview-area" style="display: none;">
                    <input type="hidden" class="tpl-img img-url-input" value="" />
                    <img src="" class="img-preview" style="display: none;" />
                    <div>
                        <button type="button" class="img-select-btn" onclick="openMediaUploader(this)">画像を選択</button>
                        <button type="button" class="img-clear-btn" style="display: none;" onclick="clearMedia(this)">クリア</button>
                    </div>
                </div>
            </div>

            <div class="smart-editor-field">
                <label>本文（テキスト）</label>
                <textarea class="tpl-content" rows="6" placeholder="見出しに対する本文を記入してください。改行は自動的に反映されます。"></textarea>
            </div>
        </div>
    </template>

    <script>
    var smartSectionCount = <?php echo $i; ?>;

    function addSmartSection() {
        var container = document.getElementById('smart-sections-container');
        var tmpl = document.getElementById('smart-section-template').content.cloneNode(true);
        var newSec = tmpl.querySelector('.smart-editor-section');
        
        newSec.setAttribute('data-index', smartSectionCount);
        newSec.querySelector('.sec-title-num').innerText = 'セクション ' + (smartSectionCount + 1);
        
        newSec.querySelector('.tpl-heading').name = 'smart_section[' + smartSectionCount + '][heading]';
        newSec.querySelector('.tpl-anim').name = 'smart_section[' + smartSectionCount + '][anim]';
        newSec.querySelector('.tpl-img').name = 'smart_section[' + smartSectionCount + '][img]';
        newSec.querySelector('.tpl-content').name = 'smart_section[' + smartSectionCount + '][content]';
        
        container.appendChild(newSec);
        smartSectionCount++;
    }

    function removeSmartSection(btn) {
        if(confirm('このセクションを削除してもよろしいですか？')) {
            btn.closest('.smart-editor-section').remove();
            reindexSections();
        }
    }

    function reindexSections() {
        var sections = document.querySelectorAll('#smart-sections-container .smart-editor-section');
        smartSectionCount = 0;
        sections.forEach(function(sec){
            sec.setAttribute('data-index', smartSectionCount);
            sec.querySelector('.sec-title-num').innerText = 'セクション ' + (smartSectionCount + 1);
            sec.querySelector('.tpl-heading').name = 'smart_section[' + smartSectionCount + '][heading]';
            sec.querySelector('.tpl-anim').name = 'smart_section[' + smartSectionCount + '][anim]';
            sec.querySelector('.tpl-img').name = 'smart_section[' + smartSectionCount + '][img]';
            sec.querySelector('.tpl-content').name = 'smart_section[' + smartSectionCount + '][content]';
            smartSectionCount++;
        });
    }

    function toggleImageUploader(selectEl) {
        var area = selectEl.closest('.smart-editor-field').querySelector('.img-preview-area');
        if(selectEl.value === 'custom_image') {
            area.style.display = 'flex';
        } else {
            area.style.display = 'none';
        }
    }

    // WP Media Uploader scoped correctly
    function openMediaUploader(btn) {
        var wpMedia;
        if (wpMedia) { wpMedia.open(); return; }
        wpMedia = wp.media({ title: '画像を選択', button: {text: 'この画像を使用'}, multiple: false });
        
        wpMedia.on('select', function() {
            var attachment = wpMedia.state().get('selection').first().toJSON();
            var container = btn.closest('.img-preview-area');
            container.querySelector('.img-url-input').value = attachment.url;
            container.querySelector('.img-preview').src = attachment.url;
            container.querySelector('.img-preview').style.display = 'block';
            container.querySelector('.img-clear-btn').style.display = 'inline';
        });
        wpMedia.open();
    }

    function clearMedia(btn) {
        var container = btn.closest('.img-preview-area');
        container.querySelector('.img-url-input').value = '';
        container.querySelector('.img-preview').src = '';
        container.querySelector('.img-preview').style.display = 'none';
        btn.style.display = 'none';
    }
    </script>
    <?php
}

function blank_save_blog_smart_editor( $post_id ) {
    if ( !isset($_POST['blog_smart_editor_nonce']) || !wp_verify_nonce($_POST['blog_smart_editor_nonce'], 'blog_smart_editor_nonce_action') ) return;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( !current_user_can('edit_post', $post_id) ) return;

    if ( isset($_POST['blog_smart_intro']) ) {
        update_post_meta( $post_id, 'blog_smart_intro', sanitize_textarea_field($_POST['blog_smart_intro']) );
    }

    if ( isset($_POST['smart_section']) && is_array($_POST['smart_section']) ) {
        $clean_sections = [];
        foreach ($_POST['smart_section'] as $sec) {
            // Check if at least one field is filled out to avoid saving completely empty ghost rows
            if(!empty($sec['heading']) || !empty($sec['img']) || !empty($sec['content']) || (isset($sec['anim']) && $sec['anim'] !== 'none')) {
                $clean_sections[] = [
                    'heading' => sanitize_text_field($sec['heading'] ?? ''),
                    'anim'    => sanitize_text_field($sec['anim'] ?? 'none'),
                    'img'     => esc_url_raw($sec['img'] ?? ''),
                    'content' => sanitize_textarea_field($sec['content'] ?? '')
                ];
            }
        }
        update_post_meta( $post_id, 'blog_smart_sections', $clean_sections );
    } else {
        delete_post_meta( $post_id, 'blog_smart_sections' );
    }
}
add_action( 'save_post', 'blank_save_blog_smart_editor' );

// Enqueue media script for custom image uploader
function blank_enqueue_media_smart_editor() {
    global $typenow;
    if( $typenow == 'post' ) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'blank_enqueue_media_smart_editor');
