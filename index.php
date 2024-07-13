<?php 
require_once 'app/init.php';

// Initialize the app
$app = new App;

// Add admin user creation logic
require_once 'app/models/User.php';
$user_model = new User();
$result = $user_model->create_admin_user();

// Log the result instead of echoing it to avoid interfering with the app's output
error_log("Admin user creation result: " . $result);

// The app will continue its normal execution