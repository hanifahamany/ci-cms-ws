<?= $this->include('templates/header') ?>

<div class="page-head">
    <a href="<?= base_url('/') ?>" class="btn btn-secondary">← Kembali</a>
    <h2>Edit User</h2>
</div>

<form action="<?= base_url('users/update/' . $user['user_id']) ?>" method="post" class="form">
    <?= csrf_field() ?>

    <label for="name">Nama User</label>
    <input type="text" name="name" id="name" value="<?= old('name', $user['name']) ?>" required>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="<?= base_url('users') ?>" class="btn btn-secondary">Batal</a>
    </div>
</form>

<?= $this->include('templates/footer') ?>
