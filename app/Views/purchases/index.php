<?= $this->include('templates/header') ?>

<div class="page-head">
    <a href="<?= base_url('/') ?>" class="btn btn-secondary">← Kembali</a>
    <h2>Riwayat Pembelian</h2>
    <div class="actions">
        <a href="<?= base_url('purchases/create') ?>" class="btn btn-primary">+ Simulasikan Pembelian</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Produk</th>
            <th>User</th>
            <th>Metode Pembayaran</th>
            <th>Qty</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($transactions)) : ?>
            <tr><td colspan="6">Belum ada transaksi.</td></tr>
        <?php else : ?>
            <?php foreach ($transactions as $transaction) : ?>
                <tr>
                    <td><?= esc($transaction['product_name']) ?></td>
                    <td><?= esc($transaction['user_name']) ?></td>
                    <td><?= esc($transaction['payment_method']) ?></td>
                    <td><?= (int) $transaction['qty'] ?></td>
                    <td class="actions">
                        <a href="<?= base_url('purchases/edit/' . $transaction['transaction_id']) ?>" class="btn btn-small btn-primary">Edit</a>
                        <form action="<?= base_url('purchases/delete/' . $transaction['transaction_id']) ?>" method="post" onsubmit="return confirm('Hapus transaksi ini? Stok akan dikembalikan.')">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-small btn-accent">Batalkan</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->include('templates/footer') ?>
