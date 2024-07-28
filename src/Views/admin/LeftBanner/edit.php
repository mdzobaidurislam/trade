<?php include_once __DIR__.'/../header.php'; ?>

<div class="container">
    <h1>Edit Logo</h1>
    <form method="post" action="left_banner_update" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($banner['id']); ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                value="<?php echo htmlspecialchars($banner['title']); ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($banner['image_path']); ?>">
            <img src="<?php echo htmlspecialchars($banner['image_path']); ?>" style="max-width: 100px;"
                alt="Current Banner Image">
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link"
                value="<?php echo htmlspecialchars($banner['link']); ?>">
            <input type="hidden" class="form-control" value="left_banner" id="type" name="type">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php include_once __DIR__.'/../footer.php'; ?>