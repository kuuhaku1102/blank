<?php
// ==========================================
// WORKS (制作実績) 専用 カスタムメタボックス & JSONエディタ
// ==========================================

// JSONエディタのデフォルトスキーマ
function blank_works_get_default_schema() {
    return '{
  "tabs": {
    "industry": {
      "label": "業界・用途",
      "groups": [
        {
          "label": "業界",
          "fields": [
            {"id": "ind_it", "label": "IT・通信"},
            {"id": "ind_manu", "label": "製造業"},
            {"id": "ind_retail", "label": "小売・アパレル"},
            {"id": "ind_educ", "label": "教育・学習支援"},
            {"id": "ind_service", "label": "サービス業"}
          ]
        },
        {
          "label": "用途",
          "fields": [
            {"id": "use_corp", "label": "コーポレートサイト"},
            {"id": "use_lp", "label": "ランディングページ (LP)"},
            {"id": "use_ec", "label": "ECサイト"},
            {"id": "use_media", "label": "オウンドメディア"},
            {"id": "use_sys", "label": "業務システム"}
          ]
        }
      ]
    },
    "features": {
      "label": "実装機能（カテゴリ別）",
      "groups": [
        {
          "label": "CV獲得系",
          "fields": [
            {"id": "feat_contact", "label": "お問い合わせフォーム"},
            {"id": "feat_reserve", "label": "予約システム連携"},
            {"id": "feat_cta", "label": "CTA追従"},
            {"id": "feat_tel", "label": "電話タップ"},
            {"id": "feat_coupon", "label": "クーポン表示"},
            {"id": "feat_exitpop", "label": "離脱ポップ"},
            {"id": "feat_line", "label": "LINE追加（友だち追加／連携）"}
          ]
        },
        {
          "label": "UI／コンテンツ系",
          "fields": [
            {"id": "feat_vid", "label": "FV動画／スライダー"},
            {"id": "feat_bfaft", "label": "Before/Afterスライダー"},
            {"id": "feat_faq", "label": "FAQアコーディオン"},
            {"id": "feat_scrollanim", "label": "スクロールアニメーション"},
            {"id": "feat_gallery", "label": "実績ギャラリー"},
            {"id": "feat_voice", "label": "お客様の声"},
            {"id": "feat_badge", "label": "受賞歴・認証バッジ"},
            {"id": "feat_casestudy", "label": "事例掲載"},
            {"id": "feat_gmap", "label": "Googleマップ埋め込み"},
            {"id": "feat_sns", "label": "SNS埋め込み（Instagram／X／TikTok）"},
            {"id": "feat_3col", "label": "3カラムデザイン"},
            {"id": "feat_inlink", "label": "内部リンクデザイン（サイト内導線）"},
            {"id": "feat_ranking", "label": "ランキング機能"}
          ]
        },
        {
          "label": "計測／運用系",
          "fields": [
            {"id": "feat_ga4", "label": "GA4／GTM"},
            {"id": "feat_pixel", "label": "Meta/TikTokピクセル"}
          ]
        }
      ]
    },
    "unique": {
      "label": "ユニーク機能",
      "groups": [
        {
          "label": "特殊実装",
          "fields": [
            {"id": "uniq_sim", "label": "シミュレーション機能"},
            {"id": "uniq_mypage", "label": "マイページ機能"},
            {"id": "uniq_auth", "label": "会員認証・ログイン"},
            {"id": "uniq_api", "label": "外部API連携"}
          ]
        }
      ]
    },
    "cms": {
      "label": "CMS／運用機能",
      "groups": [
        {
          "label": "CMS環境",
          "fields": [
            {"id": "cms_wp", "label": "WordPress"},
            {"id": "cms_micro", "label": "microCMS"},
            {"id": "cms_shopify", "label": "Shopify"},
            {"id": "cms_custom", "label": "フルスクラッチCMS"}
          ]
        }
      ]
    }
  }
}';
}

// ==========================================
// 1. JSON設定ページ (Settings Page)
// ==========================================
function blank_works_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=works', // 親メニュー
        '機能項目設定 (JSON)', // ページタイトル
        '機能項目設定', // メニュータイトル
        'manage_options',
        'works-json-settings',
        'blank_works_json_settings_page'
    );
}
add_action('admin_menu', 'blank_works_admin_menu');

function blank_works_json_settings_page() {
    $message = '';
    // JSON保存処理
    if (isset($_POST['works_schema_json']) && check_admin_referer('works_json_save')) {
        $json_raw = wp_unslash($_POST['works_schema_json']);
        
        // JSONバリデーション
        json_decode($json_raw);
        if (json_last_error() === JSON_ERROR_NONE) {
            update_option('blank_works_schema', $json_raw);
            $message = '<div class="updated notice is-dismissible"><p>JSONを保存し、項目設定を更新しました。</p></div>';
        } else {
            $message = '<div class="error notice is-dismissible"><p>JSONの構文にエラーがあります： ' . esc_html(json_last_error_msg()) . '</p></div>';
        }
    }
    
    $current_json = get_option('blank_works_schema', blank_works_get_default_schema());
    ?>
    <div class="wrap">
        <h1>機能項目設定 (JSONエディタ)</h1>
        <p>制作実績の入力画面・フロントエンドに表示する「タブ」や「チェックボックス（機能一覧）」をJSON形式で自由に追加・編集できます。<br>
        <code>"tabs"</code> の中に各タブ（<code>industry</code>, <code>features</code> 等）を定義し、その直下に <code>"groups"</code>（見出し）と <code>"fields"</code>（チェックボックス項目）を記述してください。</p>
        
        <?php echo $message; ?>

        <form method="post">
            <?php wp_nonce_field('works_json_save'); ?>
            <textarea name="works_schema_json" rows="30" style="width:100%; font-family:monospace; background:#1e1e1e; color:#d4d4d4; padding:15px; border-radius:5px;"><?php echo esc_textarea($current_json); ?></textarea>
            <p class="submit">
                <input type="submit" class="button button-primary" value="JSONを保存して設定を更新">
            </p>
        </form>
    </div>
    <?php
}

// ==========================================
// 2. カスタムメタボックス (Meta Box)
// ==========================================
function blank_works_add_meta_box() {
    add_meta_box(
        'blank_works_meta',
        '制作実績 詳細情報・実装機能',
        'blank_works_meta_html',
        'works',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'blank_works_add_meta_box' );

function blank_works_meta_html( $post ) {
    wp_nonce_field( '_blank_works_meta_nonce', 'blank_works_meta_nonce' );

    $issue = get_post_meta( $post->ID, 'issue', true );
    $scope = get_post_meta( $post->ID, 'scope', true );
    if (!is_array($scope)) $scope = [];
    $works_url = get_post_meta( $post->ID, 'works_url', true );
    
    $schema_json = get_option('blank_works_schema', blank_works_get_default_schema());
    $schema = json_decode($schema_json, true);
    
    $selected_features = get_post_meta( $post->ID, 'works_features', true ) ?: [];
    if (!is_array($selected_features)) $selected_features = [];

    ?>
    <style>
        .blank-meta-row { margin-bottom: 25px; border-bottom:1px solid #eee; padding-bottom:15px; }
        .blank-meta-row:last-child { border-bottom:none; margin-bottom:0; padding-bottom:0; }
        .blank-meta-row label { display: block; font-weight: bold; margin-bottom: 8px; font-size:14px; color:#2271b1; }
        .blank-meta-row input[type="text"], .blank-meta-row textarea { width: 100%; max-width: 100%; }
        
        /* Tab UI */
        .blank-tabs { border-bottom: 2px solid #ddd; margin: 30px 0 0; display: flex; gap: 5px; flex-wrap:wrap; }
        .blank-tab { padding: 12px 25px; background: #f0f0f1; cursor: pointer; border: 1px solid #ccc; border-bottom: none; border-radius: 6px 6px 0 0; transition:background 0.2s; font-weight:bold; }
        .blank-tab:hover { background: #e0e0e1; }
        .blank-tab.active { background: #fff; border-top:3px solid #2271b1; position: relative; top: 2px; border-bottom: 2px solid #fff; color:#2271b1; }
        
        .blank-tab-content { display: none; padding: 25px 20px; border: 1px solid #ccc; background: #fff; border-top:none; margin-top:-2px; }
        .blank-tab-content.active { display: block; }

        .blank-group-title { margin-top: 0; border-bottom: 1px solid #eee; padding-bottom: 8px; color: #50575e; font-size:15px; display:block; margin-bottom:15px; }
        .blank-checkbox-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 12px; margin-bottom: 30px; }
        .blank-checkbox-grid label { font-weight:normal; font-size:13px; cursor:pointer; display:flex; align-items:flex-start; gap:8px; line-height:1.4; color:#3c434a;}
        .blank-checkbox-grid label input { margin-top:2px; }
    </style>

    <div class="blank-meta-row">
        <label>リンクURL (ウェブサイトへのリンク)</label>
        <input type="text" name="works_url" value="<?php echo esc_attr($works_url); ?>" placeholder="https://..." />
    </div>

    <div class="blank-meta-row">
        <label>課題 (PROBLEM)</label>
        <textarea name="issue" rows="3"><?php echo esc_textarea($issue); ?></textarea>
    </div>

    <div class="blank-meta-row">
        <label>制作範囲 (SCOPE OF WORK)</label>
        <div class="blank-checkbox-grid" style="margin-bottom:0;">
            <?php 
            $scope_options = ['テキスト構築', 'デザイン構築', 'コーディング', 'システム設計', 'ディレクション'];
            foreach($scope_options as $opt): 
                $checked = in_array($opt, $scope) ? 'checked' : '';
            ?>
                <label>
                    <input type="checkbox" name="scope[]" value="<?php echo esc_attr($opt); ?>" <?php echo $checked; ?>>
                    <?php echo esc_html($opt); ?>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <hr style="margin-top:30px;">
    <h3 style="font-size:16px; margin-bottom:0;">実装機能・カテゴリ設定（JSON管理）</h3>
    <p class="description">実績に付与するタグや実装機能を選択してください。この選択肢は「機能項目設定」メニューで自由に変更可能です。</p>

    <?php if(!empty($schema) && isset($schema['tabs'])): ?>
        <div class="blank-tabs">
            <?php $i = 0; foreach($schema['tabs'] as $tab_id => $tab): ?>
                <div class="blank-tab <?php echo $i===0 ? 'active' : ''; ?>" data-target="tab-<?php echo esc_attr($tab_id); ?>">
                    <?php echo esc_html($tab['label'] ?? '無題'); ?>
                </div>
            <?php $i++; endforeach; ?>
        </div>
        
        <?php $i = 0; foreach($schema['tabs'] as $tab_id => $tab): ?>
            <div id="tab-<?php echo esc_attr($tab_id); ?>" class="blank-tab-content <?php echo $i===0 ? 'active' : ''; ?>">
                <?php if(isset($tab['groups'])): foreach($tab['groups'] as $group): ?>
                    <b class="blank-group-title"><?php echo esc_html($group['label'] ?? ''); ?></b>
                    <div class="blank-checkbox-grid">
                        <?php if(isset($group['fields'])): foreach($group['fields'] as $field): 
                            $checked = in_array($field['id'], $selected_features) ? 'checked' : '';
                        ?>
                            <label>
                                <input type="checkbox" name="works_features[]" value="<?php echo esc_attr($field['id']); ?>" <?php echo $checked; ?>>
                                <?php echo esc_html($field['label'] ?? ''); ?>
                            </label>
                        <?php endforeach; endif; ?>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        <?php $i++; endforeach; ?>
        
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.blank-tab');
            const contents = document.querySelectorAll('.blank-tab-content');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const target = this.getAttribute('data-target');
                    
                    tabs.forEach(t => t.classList.remove('active'));
                    contents.forEach(c => c.classList.remove('active'));
                    
                    this.classList.add('active');
                    document.getElementById(target).classList.add('active');
                });
            });
        });
        </script>
    <?php endif; ?>

    <?php
}

function blank_works_save_meta( $post_id ) {
    if ( ! isset( $_POST['blank_works_meta_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['blank_works_meta_nonce'], '_blank_works_meta_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = ['issue', 'works_url'];
    foreach($fields as $field) {
        if(isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_textarea_field($_POST[$field]));
        } else {
            delete_post_meta($post_id, $field);
        }
    }
    
    // Clear removed old fields just in case
    delete_post_meta($post_id, 'measure');
    delete_post_meta($post_id, 'result');
    
    if(isset($_POST['scope']) && is_array($_POST['scope'])) {
        $scope_arr = array_map('sanitize_text_field', $_POST['scope']);
        update_post_meta($post_id, 'scope', $scope_arr);
    } else {
        update_post_meta($post_id, 'scope', []);
    }
    
    if(isset($_POST['works_features']) && is_array($_POST['works_features'])) {
        $features = array_map('sanitize_text_field', $_POST['works_features']);
        update_post_meta($post_id, 'works_features', $features);
    } else {
        update_post_meta($post_id, 'works_features', []);
    }
}
add_action( 'save_post_works', 'blank_works_save_meta' );
