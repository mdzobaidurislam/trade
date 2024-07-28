<?php include_once __DIR__.'/../header.php'; ?>

<div class="container">
    <h1>Add New logo</h1>
    <form method="post" action="right_banner_store" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link">
            <input type="hidden" class="form-control" value="right_banner" id="type" name="type">
        </div>
        <button type="submit" class="btn btn-primary">Create logo</button>
    </form>
</div>


<?php include_once __DIR__.'/../footer.php'; ?>