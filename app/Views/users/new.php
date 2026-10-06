<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2>Add New User</h2>

    <?php if (isset($validation)): ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <form action="/users/create" method="post" enctype="multipart/form-data" class="mt-3">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="<?= old('username') ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="full_name" class="form-control" value="<?= old('full_name') ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Profile Avatar (JPG/PNG, Max 2MB)</label>
            <input type="file" name="avatar" class="form-control" accept="image/png, image/jpeg">
        </div>
        <button type="submit" class="btn btn-primary">Save User</button>
        <a href="/users" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>