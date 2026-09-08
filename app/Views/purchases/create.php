<?= $this->include('templates/header') ?>

<h2>Simulasi Pembelian Produk</h2>

<form action="<?= base_url('purchases/store') ?>" method="post" class="form">
    <?= csrf_field() ?>

    <label for="user_id">User</label>
    <select name="user_id" id="user_id" required>
        <option value="">-- Pilih User --</option>
        <?php foreach ($users as $user) : ?>
            <option value="<?= $user['user_id'] ?>"><?= esc($user['name']) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="product_id">Pilih Produk</label>
    <select name="product_id" id="product_id" required>
        <option value="">-- Pilih Produk --</option>
        <?php foreach ($products as $product) : ?>
            <option value="<?= $product['product_id'] ?>">
                <?= esc($product['product_name']) ?> (Stok: <?= (int) $product['qty_in_stock'] ?>, Rp <?= number_format((float) $product['price'], 0, ',', '.') ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <label for="payment_method">Metode Pembayaran</label>
    <input type="text" name="payment_method" id="payment_method" value="<?= old('payment_method') ?>" required>

    <label for="qty">Jumlah</label>
    <input type="number" name="qty" id="qty" min="1" value="<?= old('qty', 1) ?>" required>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Beli Sekarang</button>
        <a href="<?= base_url('purchases') ?>" class="btn btn-secondary">Batal</a>
    </div>
</form>

<?= $this->include('templates/footer') ?>
