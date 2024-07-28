<?php include_once __DIR__ . '/../../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../banner.php'; ?>

<div class="login-container mt-5">

    <center>
        <div class="text_green">
            <h1><?php echo $site_info['site_name']??""; ?></h1>
        </div>
        <div class="text_green"><?php echo $site_info['site_sub_name']??""; ?> </div>
        <div class="text_green">E-mail: <?php echo $site_info['email']??""; ?> </div>
        <div class="text_green"> ফোনঃ- <?php echo $site_info['phone']??""; ?></div>
        <div class="text_green"> Website: <?php echo $site_info['website']??""; ?> </div>
    </center>

</div>
<?php include_once __DIR__ . '/../../layouts/footer.php'; ?>