<?= $this->include('templates/header') ?>

<div class="page-head">
    <a href="<?= base_url('/') ?>" class="btn btn-secondary">← Kembali</a>
    <h2>Tambah User</h2>
</div>

<form action="<?= base_url('users/store') ?>" method="post" class="form">
    <?= csrf_field() ?>

    <label for="user_id">ID User</label>
    <input type="number" name="user_id" id="user_id" value="<?= old('user_id') ?>" required>

    <label for="name">Nama User</label>
    <input type="text" name="name" id="name" value="<?= old('name') ?>" required>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('users') ?>" class="btn btn-secondary">Batal</a>
    </div>
</form>

<?= $this->include('templates/footer') ?>
