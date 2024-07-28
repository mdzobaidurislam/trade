<?php
date_default_timezone_set('Asia/Dhaka');
if (isset($pdo)) {
} else {

    $pdo = require_once  './../.../../config/database.php';
}
$stmtBanner = $pdo->query('SELECT * FROM banners WHERE type="banner" ');
$banners = $stmtBanner->fetchAll();

$stmtLeftBanner = $pdo->query('SELECT * FROM banners WHERE type="left_banner" ');
$left_banners = $stmtLeftBanner->fetchAll();

$stmtRightBanner = $pdo->query('SELECT * FROM banners WHERE type="right_banner" ');
$right_banners = $stmtRightBanner->fetchAll();

$settingStmt = $pdo->query('SELECT * FROM setting LIMIT 1 ');
$site_info = $settingStmt->fetchAll()[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= $_ENV['APP_URL'] ?>">
    <base href="http://localhost/trade/public/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css?v=6">
    <style>
        .marq {
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .geek1 {
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        marquee.marq {
            background: var(--green);
        }
    </style>
</head>

<body>
    <nav class=" bg-white ">
        <div class="container w-100 align-items-center justify-content-center py-2 ">

            <div>
                <div class="d-flex align-items-center justify-content-center ">
                    <a class=" navbar-brand logo " href=" #">
                        <img src="<?php echo $site_info['header_logo'] ?? ""; ?>" alt="">

                    </a>
                    <div>
                        <div class="text_green">
                            <h1> <?php echo $site_info['site_name'] ?? ""; ?> </h1>
                        </div>
                        <div class="text_green"><?php echo $site_info['site_sub_name'] ?? ""; ?> </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>
    <?php include_once __DIR__ . '/../frontend/banner.php'; ?>
    <div class="container">
        <?php include __DIR__ . '/inc/navbar.php'; ?>
        <marquee class="marq" direction="left" loop="">
            <div class="geek1">
                <?php echo $site_info['head_line'] ?? ""; ?>
            </div>
        </marquee>
        <div class="click_to_verify text-center ">
            <a href="search_trade" class="click_to_verify_link">Click here verify your trade license </a>
        </div>
        <div class="row">
            <?php include __DIR__ . '/inc/left_sidebar.php'; ?>
            <main class="col-md-8 ms-sm-auto col-lg-8 px-md-4 content_bg ">