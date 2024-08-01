<?php

namespace App\Middleware;

class AuthMiddleware
{
    public static function handle()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: login');
            exit();
        }
    }
    public static function AdminHandle()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Check if the user is authenticated
        if (!isset($_SESSION['user_id']) && !isset($_SESSION['role'])) {
            header('Location: login');
            exit;
        }

        // Check if the user is an admin
        if ($_SESSION['role'] !== 'admin') {
            header('Location: /trade/public/home');
            exit;
        }
    }
}
