<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        
 require_once __DIR__ . '/../Views/frontend/Pages/Login.php';
    }
     public function home()
    {
       
    
        require_once __DIR__ . '/../Views/home.php';
    }


}