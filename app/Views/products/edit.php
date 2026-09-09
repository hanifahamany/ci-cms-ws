<?= $this->include('templates/header') ?>

<div class="page-head">
    <a href="<?= base_url('/') ?>" class="btn btn-secondary">← Kembali</a>
    <h2>Edit Produk</h2>
</div>

<form action="<?= base_url('products/update/' . $product['product_id']) ?>" method="post" class="form">
    <?= csrf_field() ?>

    <label for="product_name">Nama Produk</label>
    <input type="text" name="product_name" id="product_name" value="<?= old('product_name', $product['product_name']) ?>" required>

    <label for="price">Harga (Rp)</label>
    <input type="number" name="price" id="price" step="0.01" min="0" value="<?= old('price', $product['price']) ?>" required>

    <label for="qty_in_stock">Stok</label>
    <input type="number" name="qty_in_stock" id="qty_in_stock" min="0" value="<?= old('qty_in_stock', $product['qty_in_stock']) ?>" required>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="<?= base_url('products') ?>" class="btn btn-secondary">Batal</a>
    </div>
</form>

<?= $this->include('templates/footer') ?>
