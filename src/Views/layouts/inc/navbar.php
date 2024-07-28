<div class="nav_bar">
    <a href="home">হোম</a>
    <a href="login">লগইন</a>
    <a href="create_trade">নতুন ট্রেড লাইসেন্স</a>
    <a href="trade_search">সংশোধন</a>
    <a href="trade_search?nobayon=nobayon">নবায়ন</a>
    <a href="trade_search">খোজ করুন</a>
    <a href="info"> যোগাযোগ</a>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['user_id'])) { ?>
    <a href="logout">Logout</a>
    <?php } ?>
</div>