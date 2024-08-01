<?php

namespace App\Controllers;

class AuthController
{
    public function showLoginForm()
    {
        require_once __DIR__ . '/../Views/frontend/Pages/Login.php';
    }

    public function login()
    {
        $email = $_POST['email'];
        $hashpassword = $_POST['password'];

        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($hashpassword, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header('Location: home');
        } else {
            echo 'Invalid credentials';
        }
    }

    public function showRegisterForm()
    {
        require_once __DIR__ . '/../Views/register.php';
    }

    public function register()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $hashedPassword  = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, $hashedPassword]);

        echo 'Registration successful';
    }
    public function save_user()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $hashedPassword  = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, $hashedPassword]);

        header('Location: admin/user/manage');
    }

    // show all user 
    public function user_list()
    {
        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare("SELECT * FROM users WHERE role = 'user'");
        $stmt->execute();
        $users = $stmt->fetchAll();

        // Render the view to display users
        require_once __DIR__ . '/../Views/admin/User/Manage.php';
    }

    public function edit_user()
    {
        $id = $_GET['id']; // Assuming you pass the user ID through a GET parameter

        // Fetch user details from database
        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        $user = $stmt->fetch();

        // Render the edit form
        require_once __DIR__ . '/../Views/admin/User/edit_user.php';
    }

    public function update_user()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $hashedPassword = null;

        if (!empty($_POST['password'])) {
            $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
        }

        // Update user information in database
        $pdo = require_once __DIR__ . '/../../config/database.php';

        if ($hashedPassword) {
            $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?');
            $stmt->execute([$name, $email, $hashedPassword, $id]);
        } else {
            $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?');
            $stmt->execute([$name, $email, $id]);
        }

        session_start();
        $_SESSION['message'] = 'User updated successfully';

        // Redirect to user list or appropriate page
        header('Location: admin/user/manage');
        exit;
    }


    public function delete_user()
    {
        $id = $_POST['id']; // Assuming you pass the user ID through a GET parameter

        // Delete user from database
        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$id]);
        session_start();
        $_SESSION['message'] = 'User deleted successfully';
        // Redirect to user list or appropriate page
        header('Location: admin/user/manage');
        exit;
    }

    public function showChangePasswordForm()
    {


        // Render change password form
        require_once __DIR__ . '/../Views/admin/Setting/ChangePassword.php';
    }

    public function change_password()
    {

        session_start();
        $user_id = $_SESSION['user_id'];
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Check if new password and confirm password match
        if ($new_password !== $confirm_password) {
            $_SESSION['error'] = 'New password and confirm password do not match';
            header('Location: admin/change_password');
            exit;
        }

        // Fetch user details from the database
        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();

        // Verify current password
        if ($user && password_verify($current_password, $user['password'])) {
            // Update password in the database
            $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare('UPDATE users SET password = ? WHERE id = ?');
            $stmt->execute([$hashedPassword, $user_id]);

            $_SESSION['message'] = 'Password changed successfully';
            header('Location: admin/change_password');
            exit;
        } else {
            $_SESSION['error'] = 'Current password is incorrect';
            header('Location: admin/change_password');
            exit;
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: login');
    }
}
