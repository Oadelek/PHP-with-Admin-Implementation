<?php
class Register extends Controller {
    public function index($error = null) {     
        $this->view('register/index', ['error' => $error]);
    }

    public function create() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->model('User');
        $result = $user->create_user($username, $password);

        if ($result === "User created successfully") {
            $_SESSION['success'] = 'Registration successful. You can now login.';
            header('Location: /login');
            exit();
        } else {
            $_SESSION['error'] = $result;
            header('Location: /register');
            exit();
        }
    }
}