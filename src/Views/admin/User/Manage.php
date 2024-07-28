<?php include_once __DIR__.'/../header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Manage User</h3>
        <a href="admin/add_user" class="btn btn-primary btn-sm"> + Add user</a>
    </div>

    <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo htmlspecialchars($_SESSION['message']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['message']); ?>
    <!-- Clear the message after displaying -->
    <?php endif; ?>
    <table class="table border">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th> <!-- New column for action buttons -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td class="border"><?php echo htmlspecialchars($user['id']); ?></td>
                <td class="border"><?php echo htmlspecialchars($user['name']); ?></td>
                <td class="border"><?php echo htmlspecialchars($user['email']); ?></td>
                <td class="border"><?php echo $user['role']=='user'?"User":''; ?></td>
                <td class="border">
                    <!-- Edit Button -->
                    <div class="d-flex gap-3">
                        <a href="admin/user/edit?id=<?php echo htmlspecialchars($user['id']); ?>"
                            class="btn btn-primary btn-sm">Edit</a>

                        <!-- Delete Button (with confirmation) -->
                        <form method="post" action="delete_user">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once __DIR__.'/../footer.php'; ?>