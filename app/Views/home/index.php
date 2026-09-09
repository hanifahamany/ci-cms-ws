<?= $this->include('templates/header') ?>

<section class="hero">
    <h1>Selamat Datang di Content Management System</h1>
    <p>Sistem berbasis CodeIgniter 4 untuk mengelola produk dan proses pembelian.</p>
    <div class="hero-actions">
        <a href="<?= base_url('products') ?>" class="btn btn-accent">Kelola Produk</a>
        <a href="<?= base_url('purchases') ?>" class="btn btn-accent">Riwayat Pembelian</a>
        <a href="<?= base_url('users') ?>" class="btn btn-accent">Kelola Pengguna</a>
    </div>
</section>

<?= $this->include('templates/footer') ?>
