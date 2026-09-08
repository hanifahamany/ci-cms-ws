<?= $this->include('templates/header') ?>

<section class="hero">
    <h1>Selamat Datang di Content Management System</h1>
    <p>Sistem sederhana untuk mengelola produk dan mensimulasikan proses pembelian.</p>
    <div class="hero-actions">
        <a href="<?= base_url('products') ?>" class="btn btn-primary">Kelola Produk</a>
        <a href="<?= base_url('purchases') ?>" class="btn btn-accent">Lihat Riwayat Pembelian</a>
    </div>
</section>

<?= $this->include('templates/footer') ?>
