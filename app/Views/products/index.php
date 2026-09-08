<?= $this->include('templates/header') ?>

<div class="page-head">
    <h2>Daftar Produk</h2>
    <a href="<?= base_url('products/create') ?>" class="btn btn-primary">+ Tambah Produk</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($products)) : ?>
            <tr><td colspan="5">Belum ada produk. Silakan tambah produk baru.</td></tr>
        <?php else : ?>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= esc($product['product_name']) ?></td>
                    <td>Rp <?= number_format((float) $product['price'], 0, ',', '.') ?></td>
                    <td><?= (int) $product['qty_in_stock'] ?></td>
                    <td class="actions">
                        <a href="<?= base_url('products/edit/' . $product['product_id']) ?>" class="btn btn-small btn-primary">Edit</a>
                        <form action="<?= base_url('products/delete/' . $product['product_id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-small btn-accent">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->include('templates/footer') ?>
