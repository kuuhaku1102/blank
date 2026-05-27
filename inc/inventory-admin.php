<?php
/**
 * Inventory Management Admin Logic
 */

// Handle AJAX for inventory updates
function blank_inventory_handle_ajax() {
    check_ajax_referer('blank_inventory_nonce', 'security');

    $action_type = sanitize_text_field($_POST['inventory_action']);
    
    // Get and migrate data if needed
    $data = get_option('blank_inventory_data', []);
    if (empty($data) || (isset($data[0]) && is_array($data[0]))) {
        // 従来のフラット配列データを新構造へマイグレーション
        $inventory = is_array($data) ? $data : [];
        foreach ($inventory as &$item) {
            unset($item['selling_price']); // 暫定キーを削除
        }
        $data = [
            'inventory' => $inventory,
            'sales_history' => []
        ];
        update_option('blank_inventory_data', $data);
    }
    
    $inventory = isset($data['inventory']) ? $data['inventory'] : [];
    $sales_history = isset($data['sales_history']) ? $data['sales_history'] : [];

    if ($action_type === 'add') {
        $name = sanitize_text_field($_POST['product_name']);
        $price = intval($_POST['product_price']);
        $type = isset($_POST['product_type']) ? sanitize_text_field($_POST['product_type']) : 'BOX';
        $quantity = intval($_POST['product_quantity']);

        $found = false;
        foreach ($inventory as &$item) {
            $item_type = isset($item['type']) ? $item['type'] : 'BOX';
            if ($item['name'] === $name && $item['price'] === $price && $item_type === $type) {
                $item['quantity'] += $quantity;
                $item['last_updated'] = current_time('mysql');
                $found = true;
                break;
            }
        }

        if (!$found) {
            $inventory[] = [
                'id' => uniqid(),
                'name' => $name,
                'price' => $price,
                'type' => $type,
                'quantity' => $quantity,
                'last_updated' => current_time('mysql')
            ];
        }
    } elseif ($action_type === 'update_quantity') {
        $id = sanitize_text_field($_POST['product_id']);
        $change = intval($_POST['change']);

        foreach ($inventory as &$item) {
            if ($item['id'] === $id) {
                $item['quantity'] += $change;
                if ($item['quantity'] < 0) $item['quantity'] = 0;
                $item['last_updated'] = current_time('mysql');
                break;
            }
        }
    } elseif ($action_type === 'sell') {
        $id = sanitize_text_field($_POST['product_id']);
        $sell_qty = intval($_POST['sell_quantity']);
        $sell_price = intval($_POST['sell_price']);
        $sell_date = isset($_POST['sell_date']) ? sanitize_text_field($_POST['sell_date']) : current_time('Y-m-d');
        $sell_memo = isset($_POST['sell_memo']) ? sanitize_textarea_field($_POST['sell_memo']) : '';
        $sold_at = $sell_date . ' ' . current_time('H:i:s');

        foreach ($inventory as &$item) {
            if ($item['id'] === $id) {
                if ($item['quantity'] >= $sell_qty) {
                    $item['quantity'] -= $sell_qty;
                    $item['last_updated'] = current_time('mysql');

                    // 売却履歴に追加
                    $sales_history[] = [
                        'id' => uniqid(),
                        'inventory_id' => $item['id'],
                        'name' => $item['name'],
                        'type' => isset($item['type']) ? $item['type'] : 'BOX',
                        'cost_price' => $item['price'],
                        'sell_price' => $sell_price,
                        'quantity' => $sell_qty,
                        'sold_at' => $sold_at,
                        'memo' => $sell_memo
                    ];
                }
                break;
            }
        }
        // 在庫数が0になったアイテムを削除
        $inventory = array_filter($inventory, function($item) {
            return $item['quantity'] > 0;
        });
        $inventory = array_values($inventory);

    } elseif ($action_type === 'delete_sale') {
        $sale_id = sanitize_text_field($_POST['sale_id']);
        $canceled_sale = null;

        // 履歴から削除
        $sales_history = array_filter($sales_history, function($sale) use ($sale_id, &$canceled_sale) {
            if ($sale['id'] === $sale_id) {
                $canceled_sale = $sale;
                return false;
            }
            return true;
        });
        $sales_history = array_values($sales_history);

        if ($canceled_sale) {
            // 在庫への復元処理
            $found = false;
            foreach ($inventory as &$item) {
                if ($item['id'] === $canceled_sale['inventory_id']) {
                    $item['quantity'] += $canceled_sale['quantity'];
                    $item['last_updated'] = current_time('mysql');
                    $found = true;
                    break;
                }
            }
            // 在庫が完全に無くなっていた場合は新規レコードとして復元
            if (!$found) {
                $inventory[] = [
                    'id' => $canceled_sale['inventory_id'],
                    'name' => $canceled_sale['name'],
                    'price' => $canceled_sale['cost_price'],
                    'type' => $canceled_sale['type'],
                    'quantity' => $canceled_sale['quantity'],
                    'last_updated' => current_time('mysql')
                ];
            }
        }
    } elseif ($action_type === 'delete') {
        $id = sanitize_text_field($_POST['product_id']);
        $inventory = array_filter($inventory, function($item) use ($id) {
            return $item['id'] !== $id;
        });
        $inventory = array_values($inventory);
    }

    $data = [
        'inventory' => $inventory,
        'sales_history' => $sales_history
    ];
    update_option('blank_inventory_data', $data);
    wp_send_json_success($data);
}
add_action('wp_ajax_blank_inventory_action', 'blank_inventory_handle_ajax');
add_action('wp_ajax_nopriv_blank_inventory_action', 'blank_inventory_handle_ajax');

// Seed some initial data if empty
function blank_inventory_seed_init() {
    if (!get_option('blank_inventory_data')) {
        update_option('blank_inventory_data', [
            'inventory' => [],
            'sales_history' => []
        ]);
    }
}
add_action('admin_init', 'blank_inventory_seed_init');
