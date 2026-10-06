<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>User Accounts</h2>
        <a href="/users/new" class="btn btn-primary">+ Add User</a>
    </div>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
    <?php endif; ?>

    <table class="table table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Avatar</th>
                <th>ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td class="text-center" style="width: 70px;">
                        <?php if (!empty($user['avatar']) && file_exists(FCPATH . 'uploads/avatars/' . $user['avatar'])): ?>
                            <img src="/uploads/avatars/<?= $user['avatar'] ?>" alt="Avatar" class="rounded-circle" width="45" height="45" style="object-fit: cover;">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/45?text=User" alt="Placeholder" class="rounded-circle" width="45" height="45">
                        <?php endif; ?>
                    </td>
                    <td><?= $user['id'] ?></td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= $user['created_at'] ?></td>
                    <td>
                        <a href="/users/edit/<?= $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 px-3 rounded">
    <a class="navbar-brand" href="/customers">POS System</a>
    <div class="navbar-nav me-auto">
        <a class="nav-link" href="/customers">Customers</a>
        <a class="nav-link" href="/users">Users</a>
    </div>
    <div class="d-flex align-items-center text-white gap-3">
        <span>Logged in as: <strong><?= esc(session()->get('full_name')) ?></strong></span>
        <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
</nav>
</html>