<?php include_once __DIR__.'/../header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
        <h3>Manage Right Logo</h3>
        <a href="admin/right_banner/create" class="btn btn-primary">Add New logo</a>
    </div>

    <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo htmlspecialchars($_SESSION['message']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <!-- Display error message -->
    <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo htmlspecialchars($_SESSION['error']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($banners as $banner): ?>
            <tr>
                <td><?php echo htmlspecialchars($banner['id']); ?></td>
                <td><?php echo htmlspecialchars($banner['title']); ?></td>
                <td><img src="<?php echo htmlspecialchars($banner['image_path']); ?>" style="max-width: 100px;"
                        alt="Banner Image"></td>
                <td><?php echo htmlspecialchars($banner['link']); ?></td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="admin/right_banner/edit?id=<?php echo htmlspecialchars($banner['id']); ?>"
                            class="btn btn-sm btn-warning">Edit</a>
                        <form method="post" action="right_banner_delete">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($banner['id']); ?>">
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this banner?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once __DIR__.'/../footer.php'; ?>