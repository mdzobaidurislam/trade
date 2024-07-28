<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Bramus\Router\Router;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\BannerController;
use App\Controllers\LeftBannerController;
use App\Controllers\RightBannerController;
use App\Controllers\TradeLicenseController;
use App\Controllers\SiteController;
use App\Middleware\AuthMiddleware;

$router = new Router();

// Public routes
$router->get('/', [new HomeController(),'index']);
$router->get('/home', [new HomeController(),'home']);

$router->get('/info', function() {
    require_once __DIR__ . '/../src/Views/frontend/Pages/Info.php';
});

$router->get('/login', [new AuthController(), 'showLoginForm']);
$router->post('/login', [new AuthController(), 'login']);
$router->get('/register', [new AuthController(), 'showRegisterForm']);
$router->post('/register', [new AuthController(), 'register']);


$router->before('GET|POST', '/(admin|dashboard|create_trade|trade_search|trade_preview|storetrade|editTrade|updateTrade).*', function() {
    AuthMiddleware::handle();
});

// admin route start 
$router->get('/admin', function() {
    require_once __DIR__ . '/../src/Views/admin/index.php';
});

$router->get('/admin/add_user', function() {
    require_once __DIR__ . '/../src/Views/admin/User/Add.php';
});
$router->get('/admin/user/manage', [new AuthController(),'user_list' ]);
$router->post('/save_user', [new AuthController(), 'save_user']);
$router->get('/admin/user/edit', [new AuthController(), 'edit_user']);
$router->post('/update_user', [new AuthController(), 'update_user']);
$router->post('/delete_user', [new AuthController(), 'delete_user']);
$router->get('/admin/change_password', [new AuthController(), 'showChangePasswordForm']);
$router->post('/change_password', [new AuthController(), 'change_password']);
// banner 
$router->get('/admin/banner/manage', [new BannerController(),'index' ]);
$router->get('/admin/banner/create', [new BannerController(),'create' ]);
$router->post('/banner_store', [new BannerController(),'store' ]);
$router->get('/admin/banner/edit', [new BannerController(),'edit' ]);
$router->post('/banner_update', [new BannerController(),'update' ]);
$router->post('/banner_delete', [new BannerController(), 'delete']);

// left banner 
$router->get('/admin/left_banner/manage', [new LeftBannerController(),'index' ]);
$router->get('/admin/left_banner/create', [new LeftBannerController(),'create' ]);
$router->post('/left_banner_store', [new LeftBannerController(),'store' ]);
$router->get('/admin/left_banner/edit', [new LeftBannerController(),'edit' ]);
$router->post('/left_banner_update', [new LeftBannerController(),'update' ]);
$router->post('/left_banner_delete', [new LeftBannerController(), 'delete']);

// right banner 
$router->get('/admin/right_banner/manage', [new RightBannerController(),'index' ]);
$router->get('/admin/right_banner/create', [new RightBannerController(),'create' ]);
$router->post('/right_banner_store', [new RightBannerController(),'store' ]);
$router->get('/admin/right_banner/edit', [new RightBannerController(),'edit' ]);
$router->post('/right_banner_update', [new RightBannerController(),'update' ]);
$router->post('/right_banner_delete', [new RightBannerController(), 'delete']);

$router->get('/admin/setting', [new SiteController(), 'index']);
$router->post('/update_setting', [new SiteController(), 'update_setting']);
$router->get('/admin/trade', [new TradeLicenseController(), 'index']);




// admin route end 

$router->post('/storetrade', [new TradeLicenseController(), 'save']);

$router->get('/dashboard', function() {
    require_once __DIR__ . '/../src/Views/dashboard.php';
});

$router->get('/create_trade', function() {
    require_once __DIR__ . '/../src/Views/create_trade.php';
});

$router->get('/trade_search', function() {
    require_once __DIR__ . '/../src/Views/trade_search.php';
});

$router->get('/search_trade', function() {
    require_once __DIR__ . '/../src/Views/search_trade.php';
});





$router->get('/editTrade', [new TradeLicenseController(), 'showEditForm']);
$router->get('/trade_search', [new TradeLicenseController(), 'showsearchform']);
$router->post('/updateTrade', [new TradeLicenseController(), 'update']);
$router->get('/search_form', [new TradeLicenseController(), 'search_form_lang']);
$router->post('/search_form', [new TradeLicenseController(), 'search_form']);
$router->get('/trade_preview', [new TradeLicenseController(), 'showPreview']);
$router->get('/show_print_preview', [new TradeLicenseController(), 'show_print_preview']);
$router->get('/print_preview', [new TradeLicenseController(), 'print_preview']);


$router->get('/logout', [new AuthController(), 'logout']);

// Run the router
$router->run();