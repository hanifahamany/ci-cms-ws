<?= $this->include('templates/header') ?>

<div class="page-head">
    <a href="<?= base_url('/') ?>" class="btn btn-secondary">← Kembali</a>
    <h2>Daftar User</h2>
    <div class="actions">
        <a href="<?= base_url('users/create') ?>" class="btn btn-primary">+ Tambah User</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID User</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($users)) : ?>
            <tr><td colspan="3">Belum ada user. Silakan tambah user baru.</td></tr>
        <?php else : ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= (int) $user['user_id'] ?></td>
                    <td><?= esc($user['name']) ?></td>
                    <td class="actions">
                        <a href="<?= base_url('users/edit/' . $user['user_id']) ?>" class="btn btn-small btn-primary">Edit</a>
                        <form action="<?= base_url('users/delete/' . $user['user_id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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
