<?php

namespace App\Controllers;

class SiteController
{
    public function index()
    {
        // Fetch all banners from database
        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->query('SELECT * FROM setting LIMIT 1');
        $setting = $stmt->fetchAll();
       
        // Initialize default values if $setting is empty
    if (!$setting) {
        $setting = [
            'site_name' => '',
            'site_sub_name' => '',
            'head_line' => '',
            'copy_right' => '',
            'logo' => '',
            'header_logo' => '',
            'phone' => '',
            'email' => '',
            'website' => '',
        ];
    }
        // Render view to display banners
        require_once __DIR__ . '/../Views/admin/Setting/edit.php';
    }
    
    public function update_setting()
    {
        session_start();
        // Handle form submission to update settings
        $pdo = require_once __DIR__ . '/../../config/database.php';
        $site_name = $_POST['site_name'];
        $site_sub_name = $_POST['site_sub_name'];
        $head_line = $_POST['head_line'];
        $copy_right = $_POST['copy_right'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $logo = $_FILES['logo'];

        // Check if settings exist
        $stmt = $pdo->query('SELECT * FROM setting LIMIT 1');
        $settings = $stmt->fetch();

        $uploadDir = __DIR__ . '/../../public/uploads/logo/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if ($settings) {
            // Handle existing logo
            $image_path = $settings['logo'] ?? null;
            $image_path_header = $settings['header_logo'] ?? null;
        } else {
            $image_path = null;
            $image_path_header = null;
        }

        // Handle image upload
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
            $image_path = 'uploads/logo/' . basename($_FILES['logo']['name']);
            if (!move_uploaded_file($_FILES['logo']['tmp_name'], $uploadDir . basename($_FILES['logo']['name']))) {
                echo "Failed to upload logo.";
                return;
            }
        }

        // Handle image upload
        if (isset($_FILES['header_logo']) && $_FILES['header_logo']['error'] == 0) {
            $image_path_header = 'uploads/logo/' . basename($_FILES['header_logo']['name']);
            if (!move_uploaded_file($_FILES['header_logo']['tmp_name'], $uploadDir . basename($_FILES['header_logo']['name']))) {
                echo "Failed to upload header logo.";
                return;
            }
        }


        if ($settings) {
            // Update settings
            $stmt = $pdo->prepare('UPDATE setting SET site_name = ?, site_sub_name = ?, head_line = ?, copy_right = ?, logo = ?,header_logo=?,phone=?,email=?,website=? WHERE id = ?');
            $stmt->execute([$site_name, $site_sub_name, $head_line, $copy_right, $image_path,$image_path_header,$phone,$email,$website, $settings['id']]);
        } else {
            // Insert settings
            $stmt = $pdo->prepare('INSERT INTO setting (site_name, site_sub_name, head_line, copy_right, logo,header_logo,email,phone,website) VALUES (?, ?, ?, ?, ?,?)');
            $stmt->execute([$site_name, $site_sub_name, $head_line, $copy_right, $image_path,$image_path_header,$phone,$email,$website]);
        }
        $_SESSION['message'] = 'Setting updated successfully';
        // Redirect back to the form
        header('Location: admin/setting');
        exit;
    }
}