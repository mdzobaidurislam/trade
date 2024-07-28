<?php include_once __DIR__.'/../header.php'; ?>

<div class="container">
    <h1>Edit User</h1>
    <form method="post" action="update_user">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name"
                value="<?php echo htmlspecialchars($user['name']); ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?php echo htmlspecialchars($user['email']); ?>">
        </div>
        <div class="form-group  mb-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>

<?php include_once __DIR__.'./../footer.php'; ?>