<?php

namespace App\Controllers;

class BannerController
{
    public function index()
    {
        // Fetch all banners from database
        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->query('SELECT * FROM banners WHERE type="banner"');
        $banners = $stmt->fetchAll();

        // Render view to display banners
        require_once __DIR__ . '/../Views/admin/Banner/index.php';
    }

    public function create()
    {
        // Render view to create new banner
        require_once __DIR__ . '/../Views/admin/Banner/create.php';
    }

    public function store()
    {
        $title = $_POST['title'] ?? '';
        $link = $_POST['link'] ?? '';
        $type = $_POST['type'] ?? '';

        $uploadDir = __DIR__ . '/../../public/uploads/banners/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $image_path = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image_path = 'uploads/banners/' . basename($_FILES['image']['name']);
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . basename($_FILES['image']['name']))) {
                echo "Failed to upload image.";
                return;
            }
        }

        // Insert banner into database
        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('INSERT INTO banners (title, image_path, link,type) VALUES (?, ?, ?,?)');
        $stmt->execute([$title, $image_path, $link,$type]);

        // Redirect after creation
        header('Location: admin/banner/manage');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id']; // Assuming you pass the banner ID through a GET parameter

        // Fetch banner details from database
        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('SELECT * FROM banners WHERE id = ?');
        $stmt->execute([$id]);
        $banner = $stmt->fetch();

        // Render the edit form
        require_once __DIR__ . '/../Views/admin/Banner/edit.php';
    }

 

    public function update()
    {
        session_start();
        $id = $_POST['id'];
        $title = $_POST['title'] ?? '';
        $link = $_POST['link'] ?? '';
        $type = $_POST['type'] ?? '';

        // Fetch current banner information
        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('SELECT * FROM banners WHERE id = ?');
        $stmt->execute([$id]);
        $banner = $stmt->fetch();

        // Handle image upload
        $uploadDir = __DIR__ . '/../../public/uploads/banners/';
        $image_path = $banner['image_path']; // Default to current image path

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Delete the previous image file
            if ($banner['image_path'] && file_exists(__DIR__ . '/../../public/' . $banner['image_path'])) {
                unlink(__DIR__ . '/../../public/' . $banner['image_path']);
            }

            // Upload new image
            $image_path = 'uploads/banners/' . basename($_FILES['image']['name']);
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . basename($_FILES['image']['name']))) {
                $_SESSION['error'] = "Failed to upload image.";
                header('Location: admin/banner/manage');
                exit;
            }
        }

        // Update banner information in database
        
        $stmt = $pdo->prepare('UPDATE banners SET title = ?, image_path = ?, link = ?,type=? WHERE id = ?');
        if ($stmt->execute([$title, $image_path, $link,$type, $id])) {
            $_SESSION['message'] = 'Banner updated successfully';
        } else {
            $_SESSION['error'] = 'Failed to update banner';
        }

        // Redirect after update
        header('Location: admin/banner/manage');
        exit;
    }

    

    public function delete()
    {
        session_start();
        $id = $_POST['id']; // Assuming you pass the banner ID through a GET parameter
    
        // Fetch banner information
        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('SELECT * FROM banners WHERE id = ?');
        $stmt->execute([$id]);
        $banner = $stmt->fetch();
    
        if ($banner) {
            // Delete the image file associated with the banner
            $image_path = __DIR__ . '/../../public/' . $banner['image_path'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }
    
            // Delete banner from database
            $stmt = $pdo->prepare('DELETE FROM banners WHERE id = ?');
            $stmt->execute([$id]);
    
            $_SESSION['message'] = 'Banner deleted successfully';
        } else {
            $_SESSION['error'] = 'Banner not found';
        }
    
        header('Location: admin/banner/manage');
        exit;
    }
}