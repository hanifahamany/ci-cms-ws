<?= $this->include('templates/header') ?>

<h2>Tambah Produk</h2>

<form action="<?= base_url('products/store') ?>" method="post" class="form">
    <?= csrf_field() ?>

    <label for="product_id">ID Produk</label>
    <input type="number" name="product_id" id="product_id" value="<?= old('product_id') ?>" required>

    <label for="product_name">Nama Produk</label>
    <input type="text" name="product_name" id="product_name" value="<?= old('product_name') ?>" required>

    <label for="price">Harga (Rp)</label>
    <input type="number" name="price" id="price" step="0.01" min="0" value="<?= old('price') ?>" required>

    <label for="qty_in_stock">Stok</label>
    <input type="number" name="qty_in_stock" id="qty_in_stock" min="0" value="<?= old('qty_in_stock') ?>" required>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('products') ?>" class="btn btn-secondary">Batal</a>
    </div>
</form>

<?= $this->include('templates/footer') ?>
