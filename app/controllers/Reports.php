<?php

class Reports extends Controller {
    private $user;
    private $note;

    public function __construct() {
        $this->user = $this->model('User');
        $this->note = $this->model('Note');
    }

    public function index() {
        if (!$this->is_admin()) {
            $_SESSION['toast'] = "Access denied. Admin privileges required.";
            header('Location: /home');
            exit();
        }

        $data = [
            'all_reminders' => $this->note->get_all_notes(),
            'most_reminders' => $this->note->get_user_with_most_reminders(),
            'login_counts' => $this->user->get_login_counts()
        ];

        $this->view('reports/index', $data);
    }

    private function is_admin() {
        if (!isset($_SESSION['username'])) {
            return false;
        }

        $user = $this->user->get_user_by_username($_SESSION['username']);
        return $user && $user['is_admin'] == 1;
    }
}