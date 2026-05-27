<?php
/**
 * Template Name: 在庫管理 (Inventory Management)
 */

get_header();

// Get and split data
$data = get_option('blank_inventory_data', []);
if (empty($data) || (isset($data[0]) && is_array($data[0]))) {
    $inventory = is_array($data) ? $data : [];
    $sales_history = [];
} else {
    $inventory = isset($data['inventory']) ? $data['inventory'] : [];
    $sales_history = isset($data['sales_history']) ? $data['sales_history'] : [];
}

$product_names = array_unique(array_column($inventory, 'name'));
?>

<style>
/* Inventory Page Styles */
.inventory-container {
    max-width: 1280px;
    margin: 120px auto 80px;
    padding: 0 3%;
}

.inventory-header {
    margin-bottom: 40px;
    text-align: center;
}

.inventory-header h1 {
    font-size: 3rem;
    font-weight: 800;
    color: var(--primary-color);
    margin-bottom: 10px;
}

.inventory-header p {
    color: var(--accent-color);
    letter-spacing: 0.1em;
}

/* Card Style for Form */
.inventory-card {
    background: #fff;
    border: 1px solid rgba(145, 166, 180, 0.2);
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.inventory-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 4px; height: 100%;
    background: var(--highlight-color);
}

.form-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr auto;
    gap: 20px;
    align-items: end;
}

.form-group label {
    display: block;
    font-size: 0.85rem;
    font-weight: bold;
    color: var(--secondary-color);
    margin-bottom: 8px;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-family: inherit;
    transition: border-color 0.3s;
    background-color: #fff;
}

.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: var(--highlight-color);
}

/* Custom Select Style */
.form-group select {
    cursor: pointer;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23475569' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 16px;
    padding-right: 40px;
}

.add-btn {
    background: var(--primary-color);
    color: #fff;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: opacity 0.3s, transform 0.2s;
}

.add-btn:hover {
    opacity: 0.9;
    transform: translateY(-2px);
}

/* Responsive Form */
@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}

/* Summary Dashboard styles */
.inventory-summary {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 40px;
}

@media (max-width: 900px) {
    .inventory-summary {
        grid-template-columns: repeat(2, 1fr);
    }
}

.summary-item {
    background: #fff;
    padding: 22px 20px;
    border-radius: 12px;
    border: 1px solid rgba(145, 166, 180, 0.2);
    box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    transition: transform 0.3s;
}
.summary-item:hover {
    transform: translateY(-3px);
}
.summary-label {
    font-size: 0.8rem;
    color: var(--secondary-color);
    margin-bottom: 8px;
    display: block;
    font-weight: bold;
}
.summary-value {
    font-size: 1.6rem;
    font-weight: 800;
    color: var(--primary-color);
    font-family: 'Outfit', sans-serif;
}
.total-count { color: var(--highlight-color); }

/* Layout Grid for Split Tables */
.inventory-layout-grid {
    display: grid;
    grid-template-columns: 1fr 1.1fr;
    gap: 30px;
    align-items: start;
}

@media (max-width: 1100px) {
    .inventory-layout-grid {
        grid-template-columns: 1fr;
    }
}

.section-title {
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--primary-color);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    border-bottom: 2px solid #e2e8f0;
    padding-bottom: 10px;
}

.inventory-table-wrap {
    background: #fff;
    border: 1px solid rgba(145, 166, 180, 0.2);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
}

.inventory-table {
    width: 100%;
    border-collapse: collapse;
}

.inventory-table th {
    background: #f8fafc;
    padding: 15px 15px;
    text-align: left;
    font-size: 0.85rem;
    color: var(--secondary-color);
    border-bottom: 1px solid #e2e8f0;
}

.inventory-table td {
    padding: 15px;
    border-bottom: 1px solid #f1f5f9;
    font-size: 0.95rem;
}

.item-name {
    font-weight: bold;
    color: var(--primary-color);
}

.item-price {
    color: var(--accent-color);
    font-family: 'Outfit', sans-serif;
}

/* Badge Styles */
.badge {
    display: inline-block;
    padding: 4px 10px;
    font-size: 0.7rem;
    font-weight: 800;
    border-radius: 6px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.03);
}

.badge-box {
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    color: #1e40af;
    border: 1px solid #bfdbfe;
}

.badge-psa10 {
    background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
    color: #991b1b;
    border: 1px solid #fca5a5;
    box-shadow: 0 2px 8px rgba(239, 68, 68, 0.1);
    animation: goldPulse 2s infinite alternate;
}

@keyframes goldPulse {
    0% { box-shadow: 0 0 4px rgba(239, 68, 68, 0.05); }
    100% { box-shadow: 0 0 8px rgba(239, 68, 68, 0.2); }
}

/* Quantity Controls */
.quantity-controls {
    display: flex;
    align-items: center;
    gap: 12px;
}

.qty-btn {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 1px solid #e2e8f0;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.2s;
    color: var(--primary-color);
}

.qty-btn:hover {
    background: #f1f5f9;
    border-color: var(--highlight-color);
}

.qty-display {
    font-size: 1rem;
    font-weight: bold;
    min-width: 25px;
    text-align: center;
}

/* Action Buttons */
.sell-action-btn {
    background: #10b981;
    color: #fff;
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: bold;
    cursor: pointer;
    transition: opacity 0.2s;
    margin-right: 5px;
}
.sell-action-btn:hover { opacity: 0.9; }

.delete-btn {
    color: #ef4444;
    cursor: pointer;
    font-size: 0.8rem;
    background: transparent;
    border: none;
    opacity: 0.6;
    padding: 6px 10px;
}
.delete-btn:hover {
    opacity: 1;
    text-decoration: underline;
}

/* Sell Panel UI */
.sell-panel-row td {
    padding: 0 !important;
    border-bottom: none !important;
}

.sell-panel {
    background: #f8fafc;
    border-left: 4px solid #10b981;
    padding: 20px;
    border-bottom: 1px solid #e2e8f0;
    display: none;
}

.sell-panel-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1.2fr;
    gap: 15px;
    margin-bottom: 15px;
}

/* Profit / Loss styles */
.profit-positive {
    color: #10b981 !important;
    font-weight: bold;
}
.profit-negative {
    color: #ef4444 !important;
    font-weight: bold;
}
.profit-zero {
    color: #64748b !important;
    font-weight: bold;
}

/* Sortable Header */
.sortable-th {
    cursor: pointer;
    user-select: none;
    transition: background-color 0.2s;
}
.sortable-th:hover {
    background-color: #f1f5f9 !important;
}
.sort-indicator {
    font-size: 0.75rem;
    color: var(--accent-color);
    margin-left: 4px;
}
</style>

<div class="inventory-container">
    <div class="inventory-header">
        <h1>INVENTORY</h1>
        <p>在庫・売却管理システム</p>
    </div>

    <!-- Input Form Card -->
    <div class="inventory-card">
        <form id="inventory-form" class="form-grid">
            <div class="form-group">
                <label>商品名</label>
                <input type="text" id="prod-name" list="prod-suggestions" placeholder="商品を入力..." required>
                <datalist id="prod-suggestions">
                    <?php foreach($product_names as $name): ?>
                        <option value="<?php echo esc_attr($name); ?>">
                    <?php endforeach; ?>
                </datalist>
            </div>
            <div class="form-group">
                <label>種類</label>
                <select id="prod-type" required>
                    <option value="BOX">BOX</option>
                    <option value="PSA10">PSA10</option>
                </select>
            </div>
            <div class="form-group">
                <label>仕入れ値 (円)</label>
                <input type="number" id="prod-price" placeholder="1000" min="0" required>
            </div>
            <div class="form-group">
                <label>追加個数</label>
                <input type="number" id="prod-qty" value="1" min="1" required>
            </div>
            <button type="submit" class="add-btn">仕入登録</button>
        </form>
    </div>

    <!-- Summary Dashboard -->
    <?php
    $total_active_items = 0;
    $total_active_cost = 0;
    $total_sold_items = 0;
    $total_realized_profit = 0;

    foreach($inventory as $item) {
        $qty = intval($item['quantity']);
        $total_active_items += $qty;
        $total_active_cost += (intval($item['price']) * $qty);
    }

    foreach($sales_history as $sale) {
        $qty = intval($sale['quantity']);
        $total_sold_items += $qty;
        $total_realized_profit += ((intval($sale['sell_price']) - intval($sale['cost_price'])) * $qty);
    }

    $profit_class = 'profit-zero';
    if ($total_realized_profit > 0) {
        $profit_class = 'profit-positive';
    } elseif ($total_realized_profit < 0) {
        $profit_class = 'profit-negative';
    }
    ?>
    <div class="inventory-summary">
        <div class="summary-item">
            <span class="summary-label">現在庫数 / Active Items</span>
            <div class="summary-value"><span id="active-items-display" class="total-count"><?php echo number_format($total_active_items); ?></span> <small style="font-size:0.8rem;">pcs</small></div>
        </div>
        <div class="summary-item">
            <span class="summary-label">現在庫仕入額 / Stock Value</span>
            <div class="summary-value">&yen;<span id="active-cost-display"><?php echo number_format($total_active_cost); ?></span></div>
        </div>
        <div class="summary-item">
            <span class="summary-label">累計売却数 / Total Sold</span>
            <div class="summary-value"><span id="sold-items-display" style="color:var(--primary-color);"><?php echo number_format($total_sold_items); ?></span> <small style="font-size:0.8rem;">pcs</small></div>
        </div>
        <div class="summary-item">
            <span class="summary-label">確定損益 / Realized P&L</span>
            <div class="summary-value"><span id="realized-profit-display" class="<?php echo $profit_class; ?>"><?php echo ($total_realized_profit > 0 ? '+' : '') . number_format($total_realized_profit); ?>円</span></div>
        </div>
    </div>

    <!-- Layout Grid for Two Tables -->
    <div class="inventory-layout-grid">
        
        <!-- Left: Active Inventory -->
        <div class="inventory-section">
            <h2 class="section-title">📂 保有在庫一覧</h2>
            <div class="inventory-table-wrap">
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th>商品名</th>
                            <th>種類</th>
                            <th>仕入れ値</th>
                            <th>在庫数</th>
                            <th style="width:120px; text-align:center;">操作</th>
                        </tr>
                    </thead>
                    <tbody id="inventory-list">
                        <?php if(empty($inventory)): ?>
                            <tr class="empty-row"><td colspan="5" style="text-align:center; padding:40px; color:var(--accent-color);">保有在庫はありません</td></tr>
                        <?php else: ?>
                            <?php 
                            usort($inventory, function($a, $b) {
                                return strtotime($b['last_updated']) - strtotime($a['last_updated']);
                            });
                            foreach($inventory as $item): 
                                $qty = intval($item['quantity']);
                                $price = intval($item['price']);
                                $item_type = isset($item['type']) ? $item['type'] : 'BOX';
                                $badge_class = ($item_type === 'PSA10') ? 'badge-psa10' : 'badge-box';
                            ?>
                            <tr data-id="<?php echo esc_attr($item['id']); ?>">
                                <td><span class="item-name"><?php echo esc_html($item['name']); ?></span></td>
                                <td><span class="badge <?php echo $badge_class; ?>"><?php echo esc_html($item_type); ?></span></td>
                                <td><span class="item-price">&yen;<?php echo number_format($price); ?></span></td>
                                <td>
                                    <div class="quantity-controls">
                                        <button type="button" class="qty-btn" onclick="updateQty('<?php echo $item['id']; ?>', -1)">−</button>
                                        <span class="qty-display"><?php echo $qty; ?></span>
                                        <button type="button" class="qty-btn" onclick="updateQty('<?php echo $item['id']; ?>', 1)">+</button>
                                    </div>
                                </td>
                                <td style="text-align:center;">
                                    <button type="button" class="sell-action-btn" onclick="toggleSellPanel('<?php echo $item['id']; ?>')">売却</button>
                                    <button type="button" class="delete-btn" onclick="deleteItem('<?php echo $item['id']; ?>')">削除</button>
                                </td>
                            </tr>
                            <tr id="sell-row-<?php echo $item['id']; ?>" class="sell-panel-row">
                                <td colspan="5">
                                    <div class="sell-panel" id="sell-panel-<?php echo $item['id']; ?>">
                                        <div class="sell-panel-grid">
                                            <div class="form-group" style="margin-bottom:0;">
                                                <label>売却個数 (最大 <?php echo $qty; ?>)</label>
                                                <input type="number" id="sell-qty-<?php echo $item['id']; ?>" value="1" min="1" max="<?php echo $qty; ?>">
                                            </div>
                                            <div class="form-group" style="margin-bottom:0;">
                                                <label>売値 (1個あたり/円)</label>
                                                <input type="number" id="sell-price-<?php echo $item['id']; ?>" placeholder="<?php echo $price; ?>">
                                            </div>
                                            <div class="form-group" style="margin-bottom:0;">
                                                <label>売却日</label>
                                                <input type="date" id="sell-date-<?php echo $item['id']; ?>" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div style="display:flex; gap:15px; align-items:end; margin-top:15px;">
                                            <div class="form-group" style="flex:1; margin-bottom:0;">
                                                <label>メモ (販売先など)</label>
                                                <input type="text" id="sell-memo-<?php echo $item['id']; ?>" placeholder="例: メルカリ、〇〇様へ直接販売など">
                                            </div>
                                            <div style="display:flex; gap:10px;">
                                                <button type="button" class="add-btn" onclick="executeSell('<?php echo $item['id']; ?>')" style="padding:10px 18px; font-size:0.85rem; background:#10b981;">確定</button>
                                                <button type="button" class="qty-btn" onclick="toggleSellPanel('<?php echo $item['id']; ?>')" style="border-radius:6px; font-size:0.85rem; height:43px; padding:0 12px;">閉じる</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right: Sales History -->
        <div class="inventory-section">
            <h2 class="section-title">📊 売却実績（確定損益）</h2>
            <div class="inventory-table-wrap" style="border-top: 3px solid #10b981;">
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th class="sortable-th" onclick="toggleSalesSort()" style="width: 200px;">
                                売却日 &amp; 商品名 <span id="sort-indicator" class="sort-indicator">▼</span>
                            </th>
                            <th>単価 (仕入&rarr;売値)</th>
                            <th>数量</th>
                            <th>損益</th>
                            <th style="width:50px; text-align:center;">操作</th>
                        </tr>
                    </thead>
                    <tbody id="sales-list">
                        <?php if(empty($sales_history)): ?>
                            <tr class="empty-row"><td colspan="5" style="text-align:center; padding:40px; color:var(--accent-color);">売却実績はありません</td></tr>
                        <?php else: ?>
                            <?php 
                            // デフォルトは新しい順にソート
                            usort($sales_history, function($a, $b) {
                                return strtotime($b['sold_at']) - strtotime($a['sold_at']);
                            });
                            foreach($sales_history as $sale):
                                $cost = intval($sale['cost_price']);
                                $sell = intval($sale['sell_price']);
                                $qty = intval($sale['quantity']);
                                $profit = ($sell - $cost) * $qty;
                                $row_profit_class = 'profit-zero';
                                if ($profit > 0) $row_profit_class = 'profit-positive';
                                elseif ($profit < 0) $row_profit_class = 'profit-negative';
                                $memo = isset($sale['memo']) ? $sale['memo'] : '';
                            ?>
                            <tr data-sale-id="<?php echo esc_attr($sale['id']); ?>">
                                <td>
                                    <span style="font-size:0.75rem; color:#64748b; display:block; font-weight:bold;"><?php echo date('Y/m/d', strtotime($sale['sold_at'])); ?></span>
                                    <span class="item-name" style="font-size:0.9rem;"><?php echo esc_html($sale['name']); ?></span>
                                    <?php if(!empty($memo)): ?>
                                        <span style="font-size:0.8rem; color:#64748b; display:block; margin-top:4px; font-weight:500; background:#f1f5f9; padding:4px 8px; border-radius:4px; border-left:2px solid #cbd5e1; max-width: 180px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; cursor: help;" title="<?php echo esc_attr($memo); ?>">📝 <?php echo esc_html($memo); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td style="font-size:0.85rem;">
                                    <span style="color:#64748b;">&yen;<?php echo number_format($cost); ?></span>
                                    <span style="color:#94a3b8; margin:0 2px;">&rarr;</span>
                                    <span style="font-weight:bold; color:var(--primary-color);">&yen;<?php echo number_format($sell); ?></span>
                                </td>
                                <td style="font-weight:bold;"><?php echo $qty; ?></td>
                                <td><span class="<?php echo $row_profit_class; ?>"><?php echo ($profit > 0 ? '+' : '') . number_format($profit); ?>円</span></td>
                                <td style="text-align:center;"><button type="button" class="delete-btn" onclick="deleteSale('<?php echo $sale['id']; ?>')" style="padding:0; color:#64748b;">取消</button></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
const ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
const nonce = '<?php echo wp_create_nonce('blank_inventory_nonce'); ?>';

// グローバルデータとソート順の保持
let latestData = {
    inventory: <?php echo json_encode($inventory); ?>,
    sales_history: <?php echo json_encode($sales_history); ?>
};
let salesSortOrder = 'desc'; // 'desc' (新しい順) または 'asc' (古い順)

// Add item
document.getElementById('inventory-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const name = document.getElementById('prod-name').value;
    const type = document.getElementById('prod-type').value;
    const price = document.getElementById('prod-price').value;
    const qty = document.getElementById('prod-qty').value;

    if(!name || !type || !price || !qty) return;

    jQuery.post(ajaxUrl, {
        action: 'blank_inventory_action',
        security: nonce,
        inventory_action: 'add',
        product_name: name,
        product_type: type,
        product_price: price,
        product_quantity: qty
    }, function(response) {
        if(response.success) {
            latestData = response.data;
            renderInventory(latestData);
            // reset form
            document.getElementById('prod-name').value = '';
            document.getElementById('prod-type').value = 'BOX';
            document.getElementById('prod-price').value = '';
            document.getElementById('prod-qty').value = '1';
        }
    });
});

function updateQty(id, change) {
    jQuery.post(ajaxUrl, {
        action: 'blank_inventory_action',
        security: nonce,
        inventory_action: 'update_quantity',
        product_id: id,
        change: change
    }, function(response) {
        if(response.success) {
            latestData = response.data;
            renderInventory(latestData);
        }
    });
}

function deleteItem(id) {
    if(!confirm('本当にこの在庫を削除しますか？')) return;
    jQuery.post(ajaxUrl, {
        action: 'blank_inventory_action',
        security: nonce,
        inventory_action: 'delete',
        product_id: id
    }, function(response) {
        if(response.success) {
            latestData = response.data;
            renderInventory(latestData);
        }
    });
}

// Toggle inline sell panel
function toggleSellPanel(id) {
    const panel = document.getElementById('sell-panel-' + id);
    const row = document.getElementById('sell-row-' + id);
    
    if (panel.style.display === 'none' || panel.style.display === '') {
        // Show panel
        row.style.display = 'table-row';
        jQuery(panel).slideDown(200);
        // Default sell price to cost price if empty
        const priceInput = document.getElementById('sell-price-' + id);
        if(!priceInput.value) {
            priceInput.value = priceInput.placeholder;
        }
    } else {
        // Hide panel
        jQuery(panel).slideUp(200, function() {
            row.style.display = 'none';
        });
    }
}

// Execute Sell action
function executeSell(id) {
    const qty = parseInt(document.getElementById('sell-qty-' + id).value);
    const price = parseInt(document.getElementById('sell-price-' + id).value);
    const date = document.getElementById('sell-date-' + id).value;
    const memo = document.getElementById('sell-memo-' + id).value;

    if(!qty || qty < 1 || isNaN(price)) {
        alert('正しい数量と売値を入力してください。');
        return;
    }

    jQuery.post(ajaxUrl, {
        action: 'blank_inventory_action',
        security: nonce,
        inventory_action: 'sell',
        product_id: id,
        sell_quantity: qty,
        sell_price: price,
        sell_date: date,
        sell_memo: memo
    }, function(response) {
        if(response.success) {
            latestData = response.data;
            renderInventory(latestData);
        }
    });
}

// Delete Sale action (Cancel sale and restore to stock)
function deleteSale(saleId) {
    if(!confirm('この売却実績を取り消して在庫に戻しますか？')) return;
    jQuery.post(ajaxUrl, {
        action: 'blank_inventory_action',
        security: nonce,
        inventory_action: 'delete_sale',
        sale_id: saleId
    }, function(response) {
        if(response.success) {
            latestData = response.data;
            renderInventory(latestData);
        }
    });
}

// Toggle Sort direction for Sales history
function toggleSalesSort() {
    salesSortOrder = (salesSortOrder === 'desc') ? 'asc' : 'desc';
    const indicator = document.getElementById('sort-indicator');
    if (indicator) {
        indicator.textContent = (salesSortOrder === 'desc') ? '▼' : '▲';
    }
    renderInventory(latestData);
}

function renderInventory(data) {
    const listBody = document.getElementById('inventory-list');
    const salesBody = document.getElementById('sales-list');
    const datalist = document.getElementById('prod-suggestions');
    
    const inventory = data.inventory || [];
    const sales_history = data.sales_history || [];

    // Sort Active Inventory (always last updated first)
    inventory.sort((a, b) => new Date(b.last_updated) - new Date(a.last_updated));

    // Sort Sales History dynamically based on state
    if (salesSortOrder === 'desc') {
        sales_history.sort((a, b) => new Date(b.sold_at) - new Date(a.sold_at));
    } else {
        sales_history.sort((a, b) => new Date(a.sold_at) - new Date(b.sold_at));
    }

    // --- Render Active Inventory ---
    if(inventory.length === 0) {
        listBody.innerHTML = '<tr class="empty-row"><td colspan="5" style="text-align:center; padding:40px; color:var(--accent-color);">保有在庫はありません</td></tr>';
    } else {
        const todayStr = new Date().toISOString().split('T')[0];
        let html = '';
        let names = new Set();
        inventory.forEach(item => {
            names.add(item.name);
            const qty = parseInt(item.quantity);
            const price = parseInt(item.price);
            const itemType = item.type || 'BOX';
            const badgeClass = itemType === 'PSA10' ? 'badge-psa10' : 'badge-box';

            html += `
                <tr data-id="${item.id}">
                    <td><span class="item-name">${escapeHtml(item.name)}</span></td>
                    <td><span class="badge ${badgeClass}">${escapeHtml(itemType)}</span></td>
                    <td><span class="item-price">&yen;${price.toLocaleString()}</span></td>
                    <td>
                        <div class="quantity-controls">
                            <button type="button" class="qty-btn" onclick="updateQty('${item.id}', -1)">−</button>
                            <span class="qty-display">${qty}</span>
                            <button type="button" class="qty-btn" onclick="updateQty('${item.id}', 1)">+</button>
                        </div>
                    </td>
                    <td style="text-align:center;">
                        <button type="button" class="sell-action-btn" onclick="toggleSellPanel('${item.id}')">売却</button>
                        <button type="button" class="delete-btn" onclick="deleteItem('${item.id}')">削除</button>
                    </td>
                </tr>
                <tr id="sell-row-${item.id}" class="sell-panel-row">
                    <td colspan="5">
                        <div class="sell-panel" id="sell-panel-${item.id}">
                            <div class="sell-panel-grid">
                                <div class="form-group" style="margin-bottom:0;">
                                    <label>売却個数 (最大 ${qty})</label>
                                    <input type="number" id="sell-qty-${item.id}" value="1" min="1" max="${qty}">
                                </div>
                                <div class="form-group" style="margin-bottom:0;">
                                    <label>売値 (1個あたり/円)</label>
                                    <input type="number" id="sell-price-${item.id}" placeholder="${price}" value="${price}">
                                </div>
                                <div class="form-group" style="margin-bottom:0;">
                                    <label>売却日</label>
                                    <input type="date" id="sell-date-${item.id}" value="${todayStr}">
                                </div>
                            </div>
                            <div style="display:flex; gap:15px; align-items:end; margin-top:15px;">
                                <div class="form-group" style="flex:1; margin-bottom:0;">
                                    <label>メモ (販売先など)</label>
                                    <input type="text" id="sell-memo-${item.id}" placeholder="例: メルカリ、〇〇様へ直接販売など">
                                </div>
                                <div style="display:flex; gap:10px;">
                                    <button type="button" class="add-btn" onclick="executeSell('${item.id}')" style="padding:10px 18px; font-size:0.85rem; background:#10b981;">確定</button>
                                    <button type="button" class="qty-btn" onclick="toggleSellPanel('${item.id}')" style="border-radius:6px; font-size:0.85rem; height:43px; padding:0 12px;">閉じる</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            `;
        });
        listBody.innerHTML = html;

        // Update autocomplete list
        let dHtml = '';
        names.forEach(name => {
            dHtml += `<option value="${escapeHtml(name)}">`;
        });
        datalist.innerHTML = dHtml;
    }

    // --- Render Sales History ---
    if(sales_history.length === 0) {
        salesBody.innerHTML = '<tr class="empty-row"><td colspan="5" style="text-align:center; padding:40px; color:var(--accent-color);">売却実績はありません</td></tr>';
    } else {
        let html = '';
        sales_history.forEach(sale => {
            const cost = parseInt(sale.cost_price);
            const sell = parseInt(sale.sell_price);
            const qty = parseInt(sale.quantity);
            const profit = (sell - cost) * qty;
            const memo = sale.memo || '';

            let rowProfitClass = 'profit-zero';
            if (profit > 0) rowProfitClass = 'profit-positive';
            else if (profit < 0) rowProfitClass = 'profit-negative';

            let memoHtml = '';
            if (memo) {
                memoHtml = `
                    <span class="sales-memo-tag" style="font-size:0.8rem; color:#64748b; display:block; margin-top:4px; font-weight:500; background:#f1f5f9; padding:4px 8px; border-radius:4px; border-left:2px solid #cbd5e1; max-width: 180px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; cursor: help;" title="${escapeHtml(memo)}">📝 ${escapeHtml(memo)}</span>
                `;
            }

            html += `
                <tr data-sale-id="${sale.id}">
                    <td>
                        <span style="font-size:0.75rem; color:#64748b; display:block; font-weight:bold;">${formatDateOnly(sale.sold_at)}</span>
                        <span class="item-name" style="font-size:0.9rem;">${escapeHtml(sale.name)}</span>
                        ${memoHtml}
                    </td>
                    <td style="font-size:0.85rem;">
                        <span style="color:#64748b;">&yen;${cost.toLocaleString()}</span>
                        <span style="color:#94a3b8; margin:0 2px;">&rarr;</span>
                        <span style="font-weight:bold; color:var(--primary-color);">&yen;${sell.toLocaleString()}</span>
                    </td>
                    <td style="font-weight:bold;">${qty}</td>
                    <td><span class="${rowProfitClass}">${profit > 0 ? '+' : ''}${profit.toLocaleString()}円</span></td>
                    <td style="text-align:center;"><button type="button" class="delete-btn" onclick="deleteSale('${sale.id}')" style="padding:0; color:#64748b;">取消</button></td>
                </tr>
            `;
        });
        salesBody.innerHTML = html;
    }

    // --- Calculate Totals & Update Dashboard ---
    let totalActiveItems = 0;
    let totalActiveCost = 0;
    inventory.forEach(item => {
        const qty = parseInt(item.quantity);
        totalActiveItems += qty;
        totalActiveCost += (parseInt(item.price) * qty);
    });

    let totalSoldItems = 0;
    let totalRealizedProfit = 0;
    sales_history.forEach(sale => {
        const qty = parseInt(sale.quantity);
        totalSoldItems += qty;
        totalRealizedProfit += ((parseInt(sale.sell_price) - parseInt(sale.cost_price)) * qty);
    });

    document.getElementById('active-items-display').textContent = totalActiveItems.toLocaleString();
    document.getElementById('active-cost-display').textContent = totalActiveCost.toLocaleString();
    document.getElementById('sold-items-display').textContent = totalSoldItems.toLocaleString();
    
    const profitDisplay = document.getElementById('realized-profit-display');
    let profitClass = 'profit-zero';
    if (totalRealizedProfit > 0) {
        profitClass = 'profit-positive';
    } else if (totalRealizedProfit < 0) {
        profitClass = 'profit-negative';
    }
    profitDisplay.className = profitClass;
    profitDisplay.textContent = (totalRealizedProfit > 0 ? '+' : '') + totalRealizedProfit.toLocaleString() + '円';
}

function formatDateOnly(dateStr) {
    const d = new Date(dateStr.replace(/-/g, '/'));
    const y = d.getFullYear();
    const m = ('0' + (d.getMonth() + 1)).slice(-2);
    const day = ('0' + d.getDate()).slice(-2);
    return `${y}/${m}/${day}`;
}

function escapeHtml(str) {
    return str.replace(/[&<>"']/g, function(m) {
        return {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        }[m];
    });
}
</script>

<?php get_footer(); ?>
