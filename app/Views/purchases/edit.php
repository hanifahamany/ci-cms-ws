<?= $this->include('templates/header') ?>

<h2>Edit Data Pembelian</h2>

<form action="<?= base_url('purchases/update/' . $transaction['transaction_id']) ?>" method="post" class="form">
    <?= csrf_field() ?>

    <label>Produk</label>
    <input type="text" value="<?= esc($product['product_name']) ?>" disabled>

    <label for="user_id">User</label>
    <select name="user_id" id="user_id" required>
        <?php foreach ($users as $user) : ?>
            <option value="<?= $user['user_id'] ?>" <?= (string) $user['user_id'] === (string) old('user_id', $transaction['user_id']) ? 'selected' : '' ?>><?= esc($user['name']) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="payment_method">Metode Pembayaran</label>
    <input type="text" name="payment_method" id="payment_method" value="<?= old('payment_method', $transaction['payment_method']) ?>" required>

    <label for="qty">Jumlah</label>
    <input type="number" name="qty" id="qty" min="1" value="<?= old('qty', $transaction['qty']) ?>" required>

    <p class="hint">Stok produk saat ini: <?= (int) $product['qty_in_stock'] ?></p>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="<?= base_url('purchases') ?>" class="btn btn-secondary">Batal</a>
    </div>
</form>

<?= $this->include('templates/footer') ?>
