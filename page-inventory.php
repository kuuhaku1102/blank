<?php
/**
 * Template Name: 在庫管理 (Inventory Management)
 */

get_header();

$inventory = get_option('blank_inventory_data', []);
$product_names = array_unique(array_column($inventory, 'name'));
?>

<style>
/* Inventory Page Styles */
.inventory-container {
    max-width: 1000px;
    margin: 120px auto 80px;
    padding: 0 5%;
}

.inventory-header {
    margin-bottom: 50px;
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
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
    margin-bottom: 40px;
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
    grid-template-columns: 2fr 1.2fr 1.2fr 1fr auto;
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

/* Profit Styles */
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

/* Inline Edit Input Style */
.inline-edit-input {
    width: 110px;
    padding: 6px 8px;
    border: 1px solid transparent;
    border-radius: 6px;
    font-family: 'Outfit', sans-serif;
    color: var(--primary-color);
    font-weight: bold;
    background: transparent;
    transition: all 0.2s;
    text-align: right;
}
.inline-edit-input:hover {
    border-color: #cbd5e1;
    background: #f8fafc;
}
.inline-edit-input:focus {
    outline: none;
    border-color: var(--highlight-color);
    background: #fff;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}
/* Chrome, Safari, Edge, Opera: Remove spin buttons */
.inline-edit-input::-webkit-outer-spin-button,
.inline-edit-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
/* Firefox: Remove spin buttons */
.inline-edit-input[type=number] {
    -moz-appearance: textfield;
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

/* Badge Styles */
.badge {
    display: inline-block;
    padding: 6px 12px;
    font-size: 0.75rem;
    font-weight: 800;
    border-radius: 6px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
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
    box-shadow: 0 2px 8px rgba(239, 68, 68, 0.15);
    animation: goldPulse 2s infinite alternate;
}

@keyframes goldPulse {
    0% {
        box-shadow: 0 0 4px rgba(239, 68, 68, 0.1);
    }
    100% {
        box-shadow: 0 0 10px rgba(239, 68, 68, 0.3);
    }
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

/* Table Style */
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
    padding: 15px 20px;
    text-align: left;
    font-size: 0.9rem;
    color: var(--secondary-color);
    border-bottom: 1px solid #e2e8f0;
}

.inventory-table td {
    padding: 20px;
    border-bottom: 1px solid #f1f5f9;
}

.item-name {
    font-weight: bold;
    color: var(--primary-color);
}

.item-price {
    color: var(--accent-color);
    font-family: 'Outfit', sans-serif;
}

.quantity-controls {
    display: flex;
    align-items: center;
    gap: 15px;
}

.qty-btn {
    width: 32px;
    height: 32px;
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
    font-size: 1.1rem;
    font-weight: bold;
    min-width: 40px;
    text-align: center;
}

.delete-btn {
    color: #ef4444;
    cursor: pointer;
    font-size: 0.85rem;
    background: transparent;
    border: none;
    opacity: 0.6;
}

.delete-btn:hover {
    opacity: 1;
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    .inventory-header h1 { font-size: 2rem; }
}

/* Summary Dashboard styles */
.inventory-summary {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
}
.summary-item {
    flex: 1;
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid rgba(145, 166, 180, 0.2);
    box-shadow: 0 4px 15px rgba(0,0,0,0.03);
}
.summary-label {
    font-size: 0.8rem;
    color: var(--secondary-color);
    margin-bottom: 5px;
    display: block;
}
.summary-value {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--primary-color);
}
.total-count { color: var(--highlight-color); }
</style>

<div class="inventory-container">
    <div class="inventory-header">
        <h1>INVENTORY</h1>
        <p>在庫管理システム</p>
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
            <button type="submit" class="add-btn">登録・追加</button>
        </form>
    </div>

    <!-- Summary Dashboard -->
    <?php
    $total_amount = 0;
    $total_sales = 0;
    $total_items = 0;
    foreach($inventory as $item) {
        $qty = intval($item['quantity']);
        $price = intval($item['price']);
        $selling_price = isset($item['selling_price']) ? intval($item['selling_price']) : $price;

        $total_amount += ($price * $qty);
        $total_sales += ($selling_price * $qty);
        $total_items += $qty;
    }
    $total_profit = $total_sales - $total_amount;
    $profit_class = 'profit-zero';
    if ($total_profit > 0) {
        $profit_class = 'profit-positive';
    } elseif ($total_profit < 0) {
        $profit_class = 'profit-negative';
    }
    ?>
    <div class="inventory-summary">
        <div class="summary-item">
            <span class="summary-label">総在庫数 / Total Items</span>
            <div class="summary-value"><span id="total-items-display" class="total-count"><?php echo number_format($total_items); ?></span> <small style="font-size:0.9rem;">pcs</small></div>
        </div>
        <div class="summary-item">
            <span class="summary-label">総仕入金額 / Total Cost</span>
            <div class="summary-value">&yen;<span id="total-amount-display"><?php echo number_format($total_amount); ?></span></div>
        </div>
        <div class="summary-item">
            <span class="summary-label">想定売上金額 / Estimated Sales</span>
            <div class="summary-value">&yen;<span id="total-sales-display"><?php echo number_format($total_sales); ?></span></div>
        </div>
        <div class="summary-item">
            <span class="summary-label">見込み損益 / Profit & Loss</span>
            <div class="summary-value"><span id="total-profit-display" class="<?php echo $profit_class; ?>"><?php echo ($total_profit > 0 ? '+' : '') . number_format($total_profit); ?>円</span></div>
        </div>
    </div>

    <!-- Inventory List Table -->
    <div class="inventory-table-wrap">
        <table class="inventory-table">
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>種類</th>
                    <th>仕入れ値</th>
                    <th>売値</th>
                    <th>見込み損益</th>
                    <th>在庫数</th>
                    <th>最終更新</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody id="inventory-list">
                <?php if(empty($inventory)): ?>
                    <tr class="empty-row"><td colspan="8" style="text-align:center; padding:40px; color:var(--accent-color);">項目がありません</td></tr>
                <?php else: ?>
                    <?php 
                    // Sort by last updated
                    usort($inventory, function($a, $b) {
                        return strtotime($b['last_updated']) - strtotime($a['last_updated']);
                    });
                    foreach($inventory as $item): 
                        $qty = intval($item['quantity']);
                        $price = intval($item['price']);
                        $selling_price = isset($item['selling_price']) ? intval($item['selling_price']) : $price;
                        $item_type = isset($item['type']) ? $item['type'] : 'BOX';
                        $badge_class = ($item_type === 'PSA10') ? 'badge-psa10' : 'badge-box';

                        $row_profit = ($selling_price - $price) * $qty;
                        $row_profit_class = 'profit-zero';
                        if ($row_profit > 0) {
                            $row_profit_class = 'profit-positive';
                        } elseif ($row_profit < 0) {
                            $row_profit_class = 'profit-negative';
                        }
                    ?>
                    <tr data-id="<?php echo esc_attr($item['id']); ?>">
                        <td><span class="item-name"><?php echo esc_html($item['name']); ?></span></td>
                        <td><span class="badge <?php echo $badge_class; ?>"><?php echo esc_html($item_type); ?></span></td>
                        <td><span class="item-price">&yen;<?php echo number_format($price); ?></span></td>
                        <td>
                            <div style="display:flex; align-items:center; justify-content:flex-end;">
                                <span style="color:#94a3b8; font-size:0.9rem; margin-right:2px;">&yen;</span>
                                <input type="number" class="inline-edit-input" value="<?php echo esc_attr($selling_price); ?>" onchange="updateSellingPrice('<?php echo $item['id']; ?>', this.value)" min="0" placeholder="未設定">
                            </div>
                        </td>
                        <td><span class="<?php echo $row_profit_class; ?>"><?php echo ($row_profit > 0 ? '+' : '') . number_format($row_profit); ?>円</span></td>
                        <td>
                            <div class="quantity-controls">
                                <button type="button" class="qty-btn" onclick="updateQty('<?php echo $item['id']; ?>', -1)">−</button>
                                <span class="qty-display"><?php echo esc_html($qty); ?></span>
                                <button type="button" class="qty-btn" onclick="updateQty('<?php echo $item['id']; ?>', 1)">+</button>
                            </div>
                        </td>
                        <td style="font-size:0.85rem; color:#94a3b8;"><?php echo date('Y/m/d H:i', strtotime($item['last_updated'])); ?></td>
                        <td><button type="button" class="delete-btn" onclick="deleteItem('<?php echo $item['id']; ?>')">削除</button></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
const ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
const nonce = '<?php echo wp_create_nonce('blank_inventory_nonce'); ?>';

// Add / Update item
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
            renderInventory(response.data);
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
            renderInventory(response.data);
        }
    });
}

function updateSellingPrice(id, sellingPrice) {
    jQuery.post(ajaxUrl, {
        action: 'blank_inventory_action',
        security: nonce,
        inventory_action: 'update_selling_price',
        product_id: id,
        selling_price: sellingPrice
    }, function(response) {
        if(response.success) {
            renderInventory(response.data);
        }
    });
}

function deleteItem(id) {
    if(!confirm('本当に削除しますか？')) return;
    jQuery.post(ajaxUrl, {
        action: 'blank_inventory_action',
        security: nonce,
        inventory_action: 'delete',
        product_id: id
    }, function(response) {
        if(response.success) {
            renderInventory(response.data);
        }
    });
}

function renderInventory(data) {
    const listBody = document.getElementById('inventory-list');
    const datalist = document.getElementById('prod-suggestions');
    
    if(!data || data.length === 0) {
        listBody.innerHTML = '<tr class="empty-row"><td colspan="8" style="text-align:center; padding:40px; color:var(--accent-color);">項目がありません</td></tr>';
        return;
    }

    // Sort by last updated
    data.sort((a, b) => new Date(b.last_updated) - new Date(a.last_updated));

    let html = '';
    let names = new Set();
    data.forEach(item => {
        names.add(item.name);
        const qty = parseInt(item.quantity);
        const price = parseInt(item.price);
        const sellingPrice = parseInt(item.selling_price !== undefined ? item.selling_price : price);
        const itemType = item.type || 'BOX';
        const badgeClass = itemType === 'PSA10' ? 'badge-psa10' : 'badge-box';

        const rowProfit = (sellingPrice - price) * qty;
        let profitClass = 'profit-zero';
        if (rowProfit > 0) {
            profitClass = 'profit-positive';
        } else if (rowProfit < 0) {
            profitClass = 'profit-negative';
        }

        html += `
            <tr data-id="${item.id}">
                <td><span class="item-name">${escapeHtml(item.name)}</span></td>
                <td><span class="badge ${badgeClass}">${escapeHtml(itemType)}</span></td>
                <td><span class="item-price">&yen;${price.toLocaleString()}</span></td>
                <td>
                    <div style="display:flex; align-items:center; justify-content:flex-end;">
                        <span style="color:#94a3b8; font-size:0.9rem; margin-right:2px;">&yen;</span>
                        <input type="number" class="inline-edit-input" value="${sellingPrice}" onchange="updateSellingPrice('${item.id}', this.value)" min="0" placeholder="未設定">
                    </div>
                </td>
                <td><span class="${profitClass}">${rowProfit > 0 ? '+' : ''}${rowProfit.toLocaleString()}円</span></td>
                <td>
                    <div class="quantity-controls">
                        <button type="button" class="qty-btn" onclick="updateQty('${item.id}', -1)">−</button>
                        <span class="qty-display">${qty}</span>
                        <button type="button" class="qty-btn" onclick="updateQty('${item.id}', 1)">+</button>
                    </div>
                </td>
                <td style="font-size:0.85rem; color:#94a3b8;">${formatDate(item.last_updated)}</td>
                <td><button type="button" class="delete-btn" onclick="deleteItem('${item.id}')">削除</button></td>
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

    // Calculate totals
    let totalAmt = 0;
    let totalSales = 0;
    let totalQty = 0;
    data.forEach(item => {
        const qty = parseInt(item.quantity);
        const price = parseInt(item.price);
        const sellingPrice = parseInt(item.selling_price !== undefined ? item.selling_price : price);

        totalAmt += (price * qty);
        totalSales += (sellingPrice * qty);
        totalQty += qty;
    });

    const totalProfit = totalSales - totalAmt;
    let profitClass = 'profit-zero';
    if (totalProfit > 0) {
        profitClass = 'profit-positive';
    } else if (totalProfit < 0) {
        profitClass = 'profit-negative';
    }

    document.getElementById('total-items-display').textContent = totalQty.toLocaleString();
    document.getElementById('total-amount-display').textContent = totalAmt.toLocaleString();
    document.getElementById('total-sales-display').textContent = totalSales.toLocaleString();
    
    const profitDisplay = document.getElementById('total-profit-display');
    profitDisplay.className = profitClass;
    profitDisplay.textContent = (totalProfit > 0 ? '+' : '') + totalProfit.toLocaleString() + '円';
}

function formatDate(dateStr) {
    const d = new Date(dateStr.replace(/-/g, '/'));
    const y = d.getFullYear();
    const m = ('0' + (d.getMonth() + 1)).slice(-2);
    const day = ('0' + d.getDate()).slice(-2);
    const h = ('0' + d.getHours()).slice(-2);
    const min = ('0' + d.getMinutes()).slice(-2);
    return `${y}/${m}/${day} ${h}:${min}`;
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
