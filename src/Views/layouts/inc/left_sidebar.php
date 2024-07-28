<nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block p-3 sidebar collapse primary_bg">
    <div class="image_logo  ">
        <?php foreach($left_banners as $banner){ ?>
        <div class="image_item">
            <img class="d-block w-100" src="<?php echo $banner['image_path']; ?>">
        </div>
        <?php } ?>
    </div>
</nav>