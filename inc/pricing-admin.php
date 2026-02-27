<?php
// Admin page for Pricing Simulator
add_action('admin_menu', 'blank_pricing_menu');
function blank_pricing_menu() {
    add_menu_page('料金シミュレーター', '料金シミュレーター', 'manage_options', 'blank-pricing', 'blank_pricing_page_html', 'dashicons-calculator', 25);
}

function blank_pricing_page_html() {
    if (!current_user_can('manage_options')) return;
    
    // Save data
    if (isset($_POST['blank_pricing_nonce']) && wp_verify_nonce($_POST['blank_pricing_nonce'], 'blank_pricing_save')) {
        $json = stripslashes($_POST['pricing_data']);
        update_option('blank_pricing_schema', $json);
        echo '<div class="updated"><p>保存しました。</p></div>';
    }
    
    $default_data = [
        'hp' => [
            ['name' => 'ディレクション・基本設計', 'price' => 150000, 'type' => 'checkbox'],
            ['name' => 'トップページデザイン・構築', 'price' => 100000, 'type' => 'checkbox'],
            ['name' => '下層ページデザイン・構築', 'price' => 20000, 'type' => 'number'],
            ['name' => 'お問い合わせフォーム実装', 'price' => 30000, 'type' => 'checkbox'],
            ['name' => 'WordPress構築・CMS化', 'price' => 100000, 'type' => 'checkbox']
        ],
        'lp' => [
            ['name' => 'LP構成・ワイヤーフレーム設計', 'price' => 100000, 'type' => 'checkbox'],
            ['name' => 'LPデザイン・コーディング', 'price' => 200000, 'type' => 'checkbox'],
            ['name' => '特急対応（2週間以内）', 'price' => 100000, 'type' => 'checkbox']
        ],
        'marketing' => [
            ['name' => '広告アカウント初期構築', 'price' => 100000, 'type' => 'checkbox'],
            ['name' => '月額広告運用代行（最低出稿額ベース）', 'price' => 50000, 'type' => 'checkbox'],
            ['name' => '月次改善定例ミーティング', 'price' => 30000, 'type' => 'checkbox']
        ]
    ];
    
    $saved_data = get_option('blank_pricing_schema');
    $data = $saved_data ? json_decode($saved_data, true) : null;
    if(!$data || !is_array($data)) $data = $default_data;
    
    ?>
    <div class="wrap">
        <h1>料金シミュレーター設定</h1>
        <p>「HP制作」「LP制作」「マーケティング」の各タブで表示されるシミュレーション項目を設定します。</p>
        
        <form method="post" action="">
            <?php wp_nonce_field('blank_pricing_save', 'blank_pricing_nonce'); ?>
            <input type="hidden" name="pricing_data" id="pricing_data" value="<?php echo esc_attr(json_encode($data)); ?>">
            
            <div id="pricing-editor" style="margin-top:20px;"></div>
            
            <p class="submit">
                <button type="submit" class="button button-primary button-hero" id="save-pricing-btn">変更を保存</button>
            </p>
        </form>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        let data = JSON.parse(document.getElementById('pricing_data').value);
        const container = document.getElementById('pricing-editor');
        
        const render = () => {
            let html = '';
            ['hp', 'lp', 'marketing'].forEach(tab => {
                let tabName = tab === 'hp' ? 'HP制作' : (tab === 'lp' ? 'LP制作' : 'マーケティング');
                html += `<div style="background:#fff; border:1px solid #ccd0d4; padding:20px; margin-bottom:20px; box-shadow:0 1px 1px rgba(0,0,0,0.04);">
                    <h2 style="margin-top:0; border-bottom:1px solid #eee; padding-bottom:10px;">${tabName} タブ</h2>
                    <table class="wp-list-table widefat fixed striped" style="margin-bottom:15px; border:none;">
                        <thead><tr>
                            <th>項目名</th>
                            <th style="width:150px;">金額 (円)</th>
                            <th style="width:180px;">入力タイプ</th>
                            <th style="width:80px;">操作</th>
                        </tr></thead>
                        <tbody>`;
                
                if(data[tab]) {
                    data[tab].forEach((item, index) => {
                        html += `<tr>
                            <td><input type="text" value="${item.name.replace(/"/g, '&quot;')}" onchange="updateData('${tab}', ${index}, 'name', this.value)" style="width:100%;"></td>
                            <td><input type="number" value="${item.price}" onchange="updateData('${tab}', ${index}, 'price', this.value)" style="width:100%;"></td>
                            <td>
                                <select onchange="updateData('${tab}', ${index}, 'type', this.value)" style="width:100%;">
                                    <option value="checkbox" ${item.type === 'checkbox' ? 'selected' : ''}>チェックボックス</option>
                                    <option value="number" ${item.type === 'number' ? 'selected' : ''}>個数入力（掛け算）</option>
                                </select>
                            </td>
                            <td><button type="button" class="button button-link-delete" style="color:#b32d2e;" onclick="removeRow('${tab}', ${index})">削除</button></td>
                        </tr>`;
                    });
                } else {
                    data[tab] = [];
                }
                
                html += `</tbody></table>
                    <button type="button" class="button" onclick="addRow('${tab}')">+ 項目を追加</button>
                </div>`;
            });
            container.innerHTML = html;
            document.getElementById('pricing_data').value = JSON.stringify(data);
        };
        
        window.updateData = (tab, index, key, value) => {
            if(key === 'price') value = parseInt(value, 10) || 0;
            data[tab][index][key] = value;
            document.getElementById('pricing_data').value = JSON.stringify(data);
        };
        
        window.addRow = (tab) => {
            if(!data[tab]) data[tab] = [];
            data[tab].push({ name: '', price: 0, type: 'checkbox' });
            render();
        };
        
        window.removeRow = (tab, index) => {
            data[tab].splice(index, 1);
            render();
        };
        
        render(); // initial render
    });
    </script>
    <?php
}
