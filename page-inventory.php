<?php
/**
 * Template Name: 在庫管理 (Inventory Management)
 */

$is_authenticated = false;
$auth_error = '';

// Password Protection Logic (Cookie based)
if (isset($_POST['inventory_password'])) {
    if ($_POST['inventory_password'] === 'Torecamafia') {
        // Set secure cookie for 30 days
        setcookie('inventory_auth', md5('Torecamafia'), time() + 3600 * 24 * 30, COOKIEPATH, COOKIE_DOMAIN);
        $is_authenticated = true;
        // Redirect to avoid double submission
        wp_safe_redirect(wp_get_referer() ? wp_get_referer() : home_url($_SERVER['REQUEST_URI']));
        exit;
    } else {
        $auth_error = 'パスワードが正しくありません';
    }
} elseif (isset($_COOKIE['inventory_auth']) && $_COOKIE['inventory_auth'] === md5('Torecamafia')) {
    $is_authenticated = true;
}

get_header();

// Show modern premium login form if not authenticated
if (!$is_authenticated) {
?>
<style>
.login-overlay {
    min-height: calc(100vh - 120px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
}
.login-card {
    background: #fff;
    border: 1px solid rgba(145, 166, 180, 0.2);
    border-radius: 24px;
    padding: 50px 40px;
    max-width: 440px;
    width: 100%;
    box-shadow: 0 20px 60px rgba(15, 23, 42, 0.08);
    text-align: center;
    position: relative;
}
.login-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; height: 6px;
    background: linear-gradient(90deg, var(--highlight-color), var(--primary-color));
    border-radius: 24px 24px 0 0;
}
.login-card h2 {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary-color);
    margin-bottom: 12px;
    letter-spacing: -0.02em;
}
.login-card p {
    color: var(--accent-color);
    font-size: 0.95rem;
    margin-bottom: 35px;
    line-height: 1.6;
}
.login-input {
    width: 100%;
    padding: 16px 20px;
    border: 1.5px solid #e2e8f0;
    border-radius: 12px;
    font-size: 1.1rem;
    margin-bottom: 20px;
    outline: none;
    transition: all 0.3s;
    text-align: center;
    letter-spacing: 0.15em;
    font-weight: bold;
}
.login-input:focus {
    border-color: var(--highlight-color);
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
}
.login-btn {
    width: 100%;
    background: var(--primary-color);
    color: #fff;
    border: none;
    padding: 16px;
    border-radius: 12px;
    font-size: 1.1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s;
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.1);
}
.login-btn:hover {
    opacity: 0.95;
    transform: translateY(-1px);
}
.error-msg {
    color: #ef4444;
    font-size: 0.9rem;
    margin-bottom: 20px;
    font-weight: bold;
    background: #fef2f2;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #fca5a5;
}
</style>
<div class="login-overlay">
    <div class="login-card">
        <h2>🔒 SECURITY ACCESS</h2>
        <p>このページは保護されています。<br>在庫管理システムへログインするためのパスワードを入力してください。</p>
        <?php if (!empty($auth_error)): ?>
            <div class="error-msg"><?php echo esc_html($auth_error); ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="password" name="inventory_password" class="login-input" placeholder="パスワードを入力..." autocomplete="current-password" required autofocus>
            <button type="submit" class="login-btn">ログイン</button>
        </form>
    </div>
</div>
<?php
get_footer();
exit;
}

// Get and split data
$data = get_option('blank_inventory_data', []);
if (empty($data) || (isset($data[0]) && is_array($data[0]))) {
    $inventory = is_array($data) ? $data : [];
    $sales_history = [];
    $date_memos = [];
} else {
    $inventory = isset($data['inventory']) ? $data['inventory'] : [];
    $sales_history = isset($data['sales_history']) ? $data['sales_history'] : [];
    $date_memos = isset($data['date_memos']) ? $data['date_memos'] : [];
}

$product_names = array_unique(array_column($inventory, 'name'));
?>

<style>
/* Inventory Page Styles */
.inventory-container {
    max-width: 1320px;
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
    grid-template-columns: 1fr 1.25fr;
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
    padding: 15px;
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

/* Date Tabs UI */
.date-tabs-wrap {
    background: #fff;
    border: 1px solid rgba(145, 166, 180, 0.2);
    border-radius: 12px;
    padding: 12px;
    margin-bottom: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    overflow-x: auto;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}
.date-tabs-wrap::-webkit-scrollbar {
    height: 6px;
}
.date-tabs-wrap::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}
.date-tab {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    padding: 10px 16px;
    margin-right: 8px;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    background: #fff;
    cursor: pointer;
    transition: all 0.2s;
    min-width: 90px;
    text-align: center;
    font-family: inherit;
}
.date-tab:hover {
    border-color: var(--highlight-color);
    background: #f8fafc;
    transform: translateY(-1px);
}
.date-tab.active {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: #fff;
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
}
.date-tab.active .date-tab-sub,
.date-tab.active .date-tab-profit {
    color: #fff !important;
    opacity: 0.95;
}
.date-tab-main {
    font-size: 0.95rem;
    font-weight: 800;
    color: var(--primary-color);
    line-height: 1.1;
}
.date-tab.active .date-tab-main {
    color: #fff;
}
.date-tab-sub {
    font-size: 0.65rem;
    color: var(--accent-color);
    margin-top: 2px;
    font-weight: bold;
    letter-spacing: 0.05em;
}
.date-tab-profit {
    font-size: 0.7rem;
    margin-top: 4px;
    font-weight: bold;
}
.date-tab-profit.positive { color: #10b981; }
.date-tab-profit.negative { color: #ef4444; }

/* Daily Summary Cards */
.daily-summary {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    margin-bottom: 15px;
    padding: 14px;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border: 1px solid #e2e8f0;
    border-radius: 12px;
}
.daily-summary-item {
    text-align: center;
}
.daily-summary-label {
    font-size: 0.7rem;
    color: var(--accent-color);
    font-weight: bold;
    letter-spacing: 0.05em;
    margin-bottom: 4px;
}
.daily-summary-value {
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--primary-color);
    font-family: 'Outfit', sans-serif;
}

/* Inventory Search Box */
.inv-search-wrap {
    position: relative;
    margin-bottom: 15px;
}
.inv-search-input {
    width: 100%;
    padding: 12px 16px 12px 42px;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    font-size: 0.95rem;
    background: #fff;
    transition: all 0.2s;
    font-family: inherit;
    outline: none;
}
.inv-search-input:focus {
    border-color: var(--highlight-color);
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.08);
}
.inv-search-wrap::before {
    content: '🔍';
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    font-size: 0.9rem;
    opacity: 0.6;
    pointer-events: none;
}
.inv-search-clear {
    position: absolute;
    top: 50%;
    right: 12px;
    transform: translateY(-50%);
    background: #f1f5f9;
    border: none;
    border-radius: 50%;
    width: 22px;
    height: 22px;
    font-size: 0.7rem;
    cursor: pointer;
    color: #64748b;
    display: none;
    align-items: center;
    justify-content: center;
}
.inv-search-clear:hover { background: #e2e8f0; color: #1e293b; }
.inv-search-clear.visible { display: flex; }

/* Daily summary row in 「すべて」 view */
.daily-row {
    cursor: pointer;
    transition: background 0.2s;
}
.daily-row:hover {
    background: #f8fafc;
}
.daily-row td {
    padding: 18px 15px !important;
}
.daily-row-date {
    font-weight: 800;
    color: var(--primary-color);
    font-size: 1rem;
}
.daily-row-weekday {
    font-size: 0.75rem;
    color: var(--accent-color);
    margin-left: 6px;
}
.daily-row-jump {
    font-size: 0.7rem;
    color: var(--highlight-color);
    font-weight: bold;
    letter-spacing: 0.05em;
}

/* Memo Cell */
.memo-cell {
    font-size: 0.8rem;
    color: #475569;
    background: #f8fafc;
    border: 1px dashed #e2e8f0;
    padding: 5px 8px;
    border-radius: 6px;
    display: inline-block;
    max-width: 160px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    transition: all 0.2s;
}
.memo-cell:hover {
    background: #fff;
    border-color: var(--highlight-color);
    border-style: solid;
}
.memo-cell.empty {
    color: #cbd5e1;
    font-style: italic;
    background: transparent;
}
.memo-edit-input {
    width: 100%;
    padding: 5px 8px;
    border: 1.5px solid var(--highlight-color);
    border-radius: 6px;
    font-size: 0.8rem;
    outline: none;
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

            <!-- 検索窓 -->
            <div class="inv-search-wrap">
                <input type="text" id="inv-search-input" class="inv-search-input" placeholder="商品名で検索..." oninput="filterInventory()" autocomplete="off">
                <button type="button" class="inv-search-clear" id="inv-search-clear" onclick="clearInventorySearch()" title="クリア">✕</button>
            </div>

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
                                                <label>販売先メモ <span style="font-weight:normal; color:#94a3b8; font-size:0.7rem;">(その日のメモがまだ無い場合のみ保存)</span></label>
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

            <!-- Date Tabs -->
            <div class="date-tabs-wrap" id="date-tabs-wrap">
                <!-- 日付タブはJSで動的生成 -->
            </div>

            <!-- Daily Summary (選択日付の集計) -->
            <div class="daily-summary" id="daily-summary">
                <div class="daily-summary-item">
                    <div class="daily-summary-label">売却点数</div>
                    <div class="daily-summary-value" id="daily-qty">0 <small style="font-size:0.7rem;">pcs</small></div>
                </div>
                <div class="daily-summary-item">
                    <div class="daily-summary-label">売上合計</div>
                    <div class="daily-summary-value" id="daily-revenue">¥0</div>
                </div>
                <div class="daily-summary-item">
                    <div class="daily-summary-label">損益</div>
                    <div class="daily-summary-value" id="daily-profit">¥0</div>
                </div>
            </div>
            <!-- 日付ごとの「販売先メモ」(1個) -->
            <div id="date-memo-card" style="display:none; background:#fff; border:1px solid rgba(145,166,180,0.2); border-left:4px solid var(--highlight-color); border-radius:10px; padding:12px 16px; margin-bottom:12px; box-shadow:0 2px 8px rgba(0,0,0,0.03);">
                <div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
                    <span style="font-size:0.75rem; font-weight:bold; color:var(--accent-color); letter-spacing:0.05em;">📝 販売先メモ</span>
                    <span id="date-memo-display" onclick="enableDateMemoEdit()" style="flex:1; min-width:200px; font-size:0.9rem; color:#475569; padding:6px 10px; border-radius:6px; cursor:pointer; background:#f8fafc; border:1px dashed #e2e8f0; transition:all 0.2s;"></span>
                </div>
            </div>

            <div class="inventory-table-wrap" style="border-top: 3px solid #10b981;">
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th>商品名</th>
                            <th style="width: 130px;">単価 (仕入→売値)</th>
                            <th style="width:60px;">数量</th>
                            <th style="width:110px;">損益</th>
                            <th style="width:60px; text-align:center;">操作</th>
                        </tr>
                    </thead>
                    <tbody id="sales-list">
                        <!-- 初期描画はJS (renderInventory) に任せる -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
const ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
const nonce = '<?php echo wp_create_nonce('blank_inventory_nonce'); ?>';

// グローバルデータの保持
let latestData = {
    inventory: <?php echo json_encode($inventory); ?>,
    sales_history: <?php echo json_encode($sales_history); ?>,
    date_memos: <?php echo json_encode((object)$date_memos); ?>
};
let selectedDateFilter = 'all'; // 選択されている日付フィルター ('all' または 'YYYY/MM/DD')
let inventorySearchTerm = ''; // 保有在庫の検索キーワード

// 在庫検索：入力に応じてフィルタ
function filterInventory() {
    const input = document.getElementById('inv-search-input');
    inventorySearchTerm = (input.value || '').trim().toLowerCase();
    const clearBtn = document.getElementById('inv-search-clear');
    if (clearBtn) {
        clearBtn.classList.toggle('visible', inventorySearchTerm.length > 0);
    }
    renderInventory(latestData);
}

function clearInventorySearch() {
    const input = document.getElementById('inv-search-input');
    if (input) input.value = '';
    inventorySearchTerm = '';
    document.getElementById('inv-search-clear').classList.remove('visible');
    renderInventory(latestData);
    input && input.focus();
}

// 'YYYY/MM/DD' → 'YYYY-MM-DD' に変換 (バックエンドのキー形式に合わせる)
function dateKeyFromDisplay(dStr) {
    return dStr.replace(/\//g, '-');
}

// 初期描画（セレクトボックス作成のため実行）
jQuery(document).ready(function() {
    renderInventory(latestData);
});

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

// Set Date Filter from Tab Click
function setDateFilter(dateValue) {
    selectedDateFilter = dateValue;
    renderInventory(latestData);
}

// Update date memo (販売先メモ。日付ごとに1個)
function saveDateMemoEdit(dateKey, newMemo) {
    jQuery.post(ajaxUrl, {
        action: 'blank_inventory_action',
        security: nonce,
        inventory_action: 'update_date_memo',
        date_key: dateKey,
        memo: newMemo
    }, function(response) {
        if(response.success) {
            latestData = response.data;
            renderInventory(latestData);
        }
    });
}

// Enable Date Memo Inline Edit (販売先メモ編集)
function enableDateMemoEdit() {
    if (selectedDateFilter === 'all') {
        alert('日付タブを選択してから、その日のメモを編集してください。');
        return;
    }
    const dateKey = dateKeyFromDisplay(selectedDateFilter);
    const memos = latestData.date_memos || {};
    const currentMemo = memos[dateKey] || '';

    const display = document.getElementById('date-memo-display');
    const input = document.createElement('input');
    input.type = 'text';
    input.value = currentMemo;
    input.style.flex = '1';
    input.style.minWidth = '200px';
    input.style.padding = '6px 10px';
    input.style.borderRadius = '6px';
    input.style.fontSize = '0.9rem';
    input.style.border = '1.5px solid var(--highlight-color)';
    input.style.outline = 'none';
    input.placeholder = '例: メルカリ / ヤフオク / 〇〇様へ手渡し';

    display.replaceWith(input);
    input.focus();
    input.select();

    const commit = () => {
        const newVal = input.value.trim();
        if (newVal !== currentMemo) {
            saveDateMemoEdit(dateKey, newVal);
        } else {
            renderInventory(latestData);
        }
    };
    input.addEventListener('blur', commit);
    input.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            input.blur();
        } else if (e.key === 'Escape') {
            renderInventory(latestData);
        }
    });
}

function renderInventory(data) {
    const listBody = document.getElementById('inventory-list');
    const salesBody = document.getElementById('sales-list');
    const datalist = document.getElementById('prod-suggestions');
    const dateTabsWrap = document.getElementById('date-tabs-wrap');

    const inventory = data.inventory || [];
    const sales_history = data.sales_history || [];

    // Sort Active Inventory (always last updated first)
    inventory.sort((a, b) => new Date(b.last_updated) - new Date(a.last_updated));

    // Sales: Always newest first (タブ内では時系列順)
    sales_history.sort((a, b) => new Date(b.sold_at) - new Date(a.sold_at));

    // --- Build Date Tabs (with daily profit per date) ---
    let dateProfitMap = {}; // { 'YYYY/MM/DD': { qty, revenue, profit } }
    sales_history.forEach(sale => {
        const dStr = formatDateOnly(sale.sold_at);
        if (!dateProfitMap[dStr]) {
            dateProfitMap[dStr] = { qty: 0, revenue: 0, profit: 0 };
        }
        const qty = parseInt(sale.quantity);
        const sell = parseInt(sale.sell_price);
        const cost = parseInt(sale.cost_price);
        dateProfitMap[dStr].qty += qty;
        dateProfitMap[dStr].revenue += sell * qty;
        dateProfitMap[dStr].profit += (sell - cost) * qty;
    });

    let sortedDates = Object.keys(dateProfitMap).sort((a, b) => new Date(b) - new Date(a));

    // Validate current selection
    if (selectedDateFilter !== 'all' && !dateProfitMap[selectedDateFilter]) {
        selectedDateFilter = 'all';
    }

    // Render Date Tabs
    if (dateTabsWrap) {
        let totalProfit = 0;
        let totalQty = 0;
        sales_history.forEach(sale => {
            totalProfit += (parseInt(sale.sell_price) - parseInt(sale.cost_price)) * parseInt(sale.quantity);
            totalQty += parseInt(sale.quantity);
        });

        let tabsHtml = '';
        // "すべて" タブ
        const allActive = selectedDateFilter === 'all' ? 'active' : '';
        const allProfitClass = totalProfit > 0 ? 'positive' : (totalProfit < 0 ? 'negative' : '');
        const allProfitText = totalProfit === 0 ? '—' : (totalProfit > 0 ? '+' : '') + formatYen(totalProfit);
        tabsHtml += `
            <button type="button" class="date-tab ${allActive}" onclick="setDateFilter('all')">
                <span class="date-tab-main">すべて</span>
                <span class="date-tab-sub">${totalQty} 件</span>
                <span class="date-tab-profit ${allProfitClass}">${allProfitText}</span>
            </button>
        `;
        // 日付タブ
        sortedDates.forEach(dStr => {
            const isActive = selectedDateFilter === dStr ? 'active' : '';
            const dp = dateProfitMap[dStr];
            const pCls = dp.profit > 0 ? 'positive' : (dp.profit < 0 ? 'negative' : '');
            const pTxt = dp.profit === 0 ? '±0' : (dp.profit > 0 ? '+' : '') + formatYen(dp.profit);
            // M/D (曜日) 表示にして見やすく
            const d = new Date(dStr.replace(/\//g, '-'));
            const weekday = ['日','月','火','水','木','金','土'][d.getDay()];
            const mainLabel = `${d.getMonth()+1}/${d.getDate()}`;
            const subLabel = `${d.getFullYear()} (${weekday})`;
            tabsHtml += `
                <button type="button" class="date-tab ${isActive}" onclick="setDateFilter('${dStr}')" title="${dStr}">
                    <span class="date-tab-main">${mainLabel}</span>
                    <span class="date-tab-sub">${subLabel}</span>
                    <span class="date-tab-profit ${pCls}">${pTxt}</span>
                </button>
            `;
        });
        if (sortedDates.length === 0) {
            tabsHtml = '<div style="padding:10px 14px; color:#94a3b8; font-size:0.85rem;">売却実績がまだありません</div>';
        }
        dateTabsWrap.innerHTML = tabsHtml;
    }

    // Apply Date Filter to Sales History
    let filteredSales = sales_history;
    if (selectedDateFilter !== 'all') {
        filteredSales = sales_history.filter(sale => formatDateOnly(sale.sold_at) === selectedDateFilter);
    }

    // --- Update Daily Summary ---
    const dailySummary = document.getElementById('daily-summary');
    if (dailySummary) {
        let dQty = 0, dRev = 0, dProf = 0;
        filteredSales.forEach(sale => {
            const q = parseInt(sale.quantity);
            const s = parseInt(sale.sell_price);
            const c = parseInt(sale.cost_price);
            dQty += q;
            dRev += s * q;
            dProf += (s - c) * q;
        });
        document.getElementById('daily-qty').innerHTML = dQty.toLocaleString() + ' <small style="font-size:0.7rem;">pcs</small>';
        document.getElementById('daily-revenue').textContent = '¥' + dRev.toLocaleString();
        const profitEl = document.getElementById('daily-profit');
        profitEl.textContent = (dProf > 0 ? '+' : '') + '¥' + dProf.toLocaleString();
        profitEl.style.color = dProf > 0 ? '#10b981' : (dProf < 0 ? '#ef4444' : '#64748b');
    }

    // --- Update Date Memo Card (販売先メモ) ---
    const dateMemoCard = document.getElementById('date-memo-card');
    if (dateMemoCard) {
        if (selectedDateFilter === 'all') {
            // 「すべて」表示中は日付メモ非表示
            dateMemoCard.style.display = 'none';
        } else {
            dateMemoCard.style.display = 'block';
            const memos = latestData.date_memos || {};
            const dateKey = dateKeyFromDisplay(selectedDateFilter);
            const memoTxt = memos[dateKey] || '';
            const display = document.getElementById('date-memo-display');
            if (display) {
                if (memoTxt) {
                    display.textContent = memoTxt;
                    display.style.color = '#475569';
                    display.style.fontStyle = 'normal';
                } else {
                    display.textContent = '＋ 販売先を入力（クリックで編集）';
                    display.style.color = '#94a3b8';
                    display.style.fontStyle = 'italic';
                }
            }
        }
    }

    // --- Render Active Inventory ---
    // 全在庫からオートコンプリート用の名前リストを先に作成（検索フィルタ前）
    let allNames = new Set();
    inventory.forEach(item => allNames.add(item.name));

    // 検索キーワードでフィルタ
    let displayInventory = inventory;
    if (inventorySearchTerm) {
        displayInventory = inventory.filter(item =>
            (item.name || '').toLowerCase().includes(inventorySearchTerm)
        );
    }

    if(displayInventory.length === 0) {
        const emptyMsg = inventorySearchTerm
            ? `「${escapeHtml(inventorySearchTerm)}」に一致する在庫はありません`
            : '保有在庫はありません';
        listBody.innerHTML = `<tr class="empty-row"><td colspan="5" style="text-align:center; padding:40px; color:var(--accent-color);">${emptyMsg}</td></tr>`;
    } else {
        const todayStr = new Date().toISOString().split('T')[0];
        let html = '';
        displayInventory.forEach(item => {
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
                                    <label>販売先メモ <span style="font-weight:normal; color:#94a3b8; font-size:0.7rem;">(その日のメモがまだ無い場合のみ保存)</span></label>
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
    }

    // Update autocomplete list (検索フィルタとは独立に全在庫の名前を入れる)
    if (datalist) {
        let dHtml = '';
        allNames.forEach(name => {
            dHtml += `<option value="${escapeHtml(name)}">`;
        });
        datalist.innerHTML = dHtml;
    }

    // --- Render Filtered Sales History ---
    if(filteredSales.length === 0) {
        const emptyMsg = selectedDateFilter === 'all'
            ? '売却実績はありません'
            : `${selectedDateFilter} の売却実績はありません`;
        salesBody.innerHTML = `<tr class="empty-row"><td colspan="5" style="text-align:center; padding:40px; color:var(--accent-color);">${emptyMsg}</td></tr>`;
    } else if (selectedDateFilter === 'all') {
        // 「すべて」表示時は、日付ごとに集計した1行のサマリー行のみ表示（商品個別行は出さない）
        const weekdayJa = ['日','月','火','水','木','金','土'];
        let html = '';
        // sortedDates は新しい順
        sortedDates.forEach(dStr => {
            const dp = dateProfitMap[dStr];
            const memos = latestData.date_memos || {};
            const memoTxt = memos[dateKeyFromDisplay(dStr)] || '';
            const d = new Date(dStr.replace(/\//g, '-'));
            const weekday = weekdayJa[d.getDay()];

            let profitCls = 'profit-zero';
            if (dp.profit > 0) profitCls = 'profit-positive';
            else if (dp.profit < 0) profitCls = 'profit-negative';

            const memoBadge = memoTxt
                ? `<span style="font-size:0.7rem; color:#64748b; background:#f8fafc; padding:2px 8px; border-radius:4px; margin-left:8px; border:1px dashed #e2e8f0;">📝 ${escapeHtml(memoTxt)}</span>`
                : '';

            html += `
                <tr class="daily-row" onclick="setDateFilter('${dStr}')" title="クリックでこの日の詳細を表示">
                    <td>
                        <span class="daily-row-date">${d.getMonth()+1}/${d.getDate()}</span>
                        <span class="daily-row-weekday">${d.getFullYear()} (${weekday})</span>
                        ${memoBadge}
                    </td>
                    <td style="font-size:0.85rem; color:#64748b;">売上 <span style="color:var(--primary-color); font-weight:bold;">¥${dp.revenue.toLocaleString()}</span></td>
                    <td style="font-weight:bold;">${dp.qty} <small style="font-weight:normal; color:#94a3b8;">pcs</small></td>
                    <td><span class="${profitCls}">${dp.profit > 0 ? '+' : ''}${dp.profit.toLocaleString()}円</span></td>
                    <td style="text-align:center;"><span class="daily-row-jump">詳細 →</span></td>
                </tr>
            `;
        });
        salesBody.innerHTML = html;
    } else {
        // 単一日付選択時は、商品ごとの行を従来通り表示
        let html = '';
        filteredSales.forEach(sale => {
            const cost = parseInt(sale.cost_price);
            const sell = parseInt(sale.sell_price);
            const qty = parseInt(sale.quantity);
            const profit = (sell - cost) * qty;
            const itemType = sale.type || 'BOX';
            const badgeClass = itemType === 'PSA10' ? 'badge-psa10' : 'badge-box';

            let rowProfitClass = 'profit-zero';
            if (profit > 0) rowProfitClass = 'profit-positive';
            else if (profit < 0) rowProfitClass = 'profit-negative';

            html += `
                <tr data-sale-id="${sale.id}">
                    <td>
                        <span class="item-name" style="font-size:0.9rem;">${escapeHtml(sale.name)}</span>
                        <span class="badge ${badgeClass}" style="font-size:0.6rem; padding:2px 6px; margin-left:4px;">${escapeHtml(itemType)}</span>
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

// 金額を ¥1.2万 / ¥34万 / ¥1.5億 のような短縮表記にする
function formatYen(num) {
    const abs = Math.abs(num);
    const sign = num < 0 ? '-' : '';
    if (abs >= 100000000) {
        return `${sign}¥${(abs / 100000000).toFixed(1)}億`;
    } else if (abs >= 10000) {
        return `${sign}¥${(abs / 10000).toFixed(abs >= 100000 ? 0 : 1)}万`;
    } else {
        return `${sign}¥${abs.toLocaleString()}`;
    }
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
