<?php 
require_once 'app/init.php';

// Initialize the app
$app = new App;

// Add admin user creation logic
require_once 'app/models/User.php';
$user_model = new User();

// Only try to create the admin user if it doesn't already exist
if (!$user_model->get_user_by_username('admin')) {
    $result = $user_model->create_admin_user();
    error_log("Admin user creation result: " . $result);
}

// The app will continue its normal execution