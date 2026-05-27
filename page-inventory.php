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
    grid-template-columns: 2fr 1fr 1fr auto;
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

.form-group input {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-family: inherit;
    transition: border-color 0.3s;
}

.form-group input:focus {
    outline: none;
    border-color: var(--highlight-color);
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
                <label>値段 (円)</label>
                <input type="number" id="prod-price" placeholder="1000" min="0" required>
            </div>
            <div class="form-group">
                <label>追加個数</label>
                <input type="number" id="prod-qty" value="1" min="1" required>
            </div>
            <button type="submit" class="add-btn">登録・追加</button>
        </form>
    </div>

    <!-- Inventory List Table -->
    <div class="inventory-table-wrap">
        <table class="inventory-table">
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>最終更新</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody id="inventory-list">
                <?php if(empty($inventory)): ?>
                    <tr class="empty-row"><td colspan="5" style="text-align:center; padding:40px; color:var(--accent-color);">項目がありません</td></tr>
                <?php else: ?>
                    <?php 
                    // Sort by last updated
                    usort($inventory, function($a, $b) {
                        return strtotime($b['last_updated']) - strtotime($a['last_updated']);
                    });
                    foreach($inventory as $item): ?>
                    <tr data-id="<?php echo esc_attr($item['id']); ?>">
                        <td><span class="item-name"><?php echo esc_html($item['name']); ?></span></td>
                        <td><span class="item-price">&yen;<?php echo number_format($item['price']); ?></span></td>
                        <td>
                            <div class="quantity-controls">
                                <button type="button" class="qty-btn" onclick="updateQty('<?php echo $item['id']; ?>', -1)">−</button>
                                <span class="qty-display"><?php echo esc_html($item['quantity']); ?></span>
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
    const price = document.getElementById('prod-price').value;
    const qty = document.getElementById('prod-qty').value;

    if(!name || !price || !qty) return;

    jQuery.post(ajaxUrl, {
        action: 'blank_inventory_action',
        security: nonce,
        inventory_action: 'add',
        product_name: name,
        product_price: price,
        product_quantity: qty
    }, function(response) {
        if(response.success) {
            renderInventory(response.data);
            // reset form
            document.getElementById('prod-name').value = '';
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
        listBody.innerHTML = '<tr class="empty-row"><td colspan="5" style="text-align:center; padding:40px; color:var(--accent-color);">項目がありません</td></tr>';
        return;
    }

    // Sort by last updated
    data.sort((a, b) => new Date(b.last_updated) - new Date(a.last_updated));

    let html = '';
    let names = new Set();
    data.forEach(item => {
        names.add(item.name);
        html += `
            <tr data-id="${item.id}">
                <td><span class="item-name">${escapeHtml(item.name)}</span></td>
                <td><span class="item-price">&yen;${parseInt(item.price).toLocaleString()}</span></td>
                <td>
                    <div class="quantity-controls">
                        <button type="button" class="qty-btn" onclick="updateQty('${item.id}', -1)">−</button>
                        <span class="qty-display">${item.quantity}</span>
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
