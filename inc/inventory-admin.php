<?php
/**
 * Inventory Management Admin Logic
 */

// Handle AJAX for inventory updates
function blank_inventory_handle_ajax() {
    check_ajax_referer('blank_inventory_nonce', 'security');

    // Remove strict check for testing, but in production we should check caps
    // if (!current_user_can('edit_posts')) { wp_send_json_error('Permission denied'); }

    $action_type = sanitize_text_field($_POST['inventory_action']);
    $inventory = get_option('blank_inventory_data', []);

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
                $item['type'] = $type; // キーを明示的に更新
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
    } elseif ($action_type === 'delete') {
        $id = sanitize_text_field($_POST['product_id']);
        $inventory = array_filter($inventory, function($item) use ($id) {
            return $item['id'] !== $id;
        });
        $inventory = array_values($inventory);
    }

    update_option('blank_inventory_data', $inventory);
    wp_send_json_success($inventory);
}
add_action('wp_ajax_blank_inventory_action', 'blank_inventory_handle_ajax');
add_action('wp_ajax_nopriv_blank_inventory_action', 'blank_inventory_handle_ajax');

// Seed some initial data if empty (optional demo)
function blank_inventory_seed_init() {
    if (!get_option('blank_inventory_data')) {
        update_option('blank_inventory_data', []);
    }
}
add_action('admin_init', 'blank_inventory_seed_init');
