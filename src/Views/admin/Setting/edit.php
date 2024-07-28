<?php include_once __DIR__.'/../header.php'; ?>

<div class="container">
    <h1>Setting </h1>
    <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo htmlspecialchars($_SESSION['message']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <form method="post" action="update_setting" enctype="multipart/form-data">
        <?php foreach($setting as $item){  ?>
        <div class="mb-3">
            <label for="site_name" class="form-label">SIte Name</label>
            <input type="text" class="form-control" id="site_name" name="site_name"
                value="<?php echo htmlspecialchars($item['site_name']); ?>">
        </div>
        <div class="mb-3">
            <label for="site_sub_name" class="form-label">Site sub Name</label>
            <input type="text" class="form-control" id="site_sub_name" name="site_sub_name"
                value="<?php echo htmlspecialchars($item['site_sub_name']); ?>">
        </div>
        <div class="mb-3">
            <label for="head_line" class="form-label">Head line</label>
            <input type="text" class="form-control" id="head_line" name="head_line"
                value="<?php echo htmlspecialchars($item['head_line']); ?>">
        </div>
        <div class="mb-3">
            <label for="copy_right" class="form-label">Copy right</label>
            <input type="text" class="form-control" id="copy_right" name="copy_right"
                value="<?php echo htmlspecialchars($item['copy_right']); ?>">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone"
                value="<?php echo htmlspecialchars($item['phone'] ?? ""); ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email"
                value="<?php echo htmlspecialchars($item['email'] ?? ""); ?>">
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="text" class="form-control" id="website" name="website"
                value="<?php echo htmlspecialchars($item['website'] ?? ""); ?>">
        </div>
        <div class="mb-3">
            <label for="header_logo" class="form-label">Header Logo</label>
            <input type="file" class="form-control" id="header_logo" name="header_logo">
            <img src="<?php echo htmlspecialchars($item['header_logo'] ?? ""); ?>" style="max-width: 100px;" alt="">
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Inner Logo</label>
            <input type="file" class="form-control" id="logo" name="logo">
            <img src="<?php echo htmlspecialchars($item['logo']); ?>" style="max-width: 100px;"
                alt="Current logo Image">
        </div>


        <?php } ?>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php include_once __DIR__.'/../footer.php'; ?>