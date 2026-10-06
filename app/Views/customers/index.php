<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Customer Accounts</h2>
        <a href="/customers/new" class="btn btn-primary">+ Add Customer</a>
    </div>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
    <?php endif; ?>

    <table class="table table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= $customer['id'] ?></td>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                    <td><?= $customer['created_at'] ?></td>
                    <td>
                        <a href="/customers/edit/<?= $customer['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
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