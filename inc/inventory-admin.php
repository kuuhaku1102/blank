<?php
/**
 * Inventory Management Admin Logic
 */

// Handle AJAX for inventory updates
function blank_inventory_handle_ajax() {
    check_ajax_referer('blank_inventory_nonce', 'security');

    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Permission denied');
    }

    $action_type = sanitize_text_field($_POST['inventory_action']);
    $inventory = get_option('blank_inventory_data', []);

    if ($action_type === 'add') {
        $name = sanitize_text_field($_POST['product_name']);
        $price = intval($_POST['product_price']);
        $quantity = intval($_POST['product_quantity']);

        $found = false;
        foreach ($inventory as &$item) {
            if ($item['name'] === $name && $item['price'] === $price) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $inventory[] = [
                'id' => uniqid(),
                'name' => $name,
                'price' => $price,
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

// Seed some initial data if empty (optional demo)
function blank_inventory_seed_init() {
    if (!get_option('blank_inventory_data')) {
        update_option('blank_inventory_data', []);
    }
}
add_action('admin_init', 'blank_inventory_seed_init');
