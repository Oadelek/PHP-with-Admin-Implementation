<?php

Class User {
    public $username;
    public $password;
    public $auth = false;

    public function __construct() {

    }
    
  public function get_all_users () {
      $db = db_connect();
      $statement = $db->prepare("SELECT * FROM users");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows; 
  }

  public function get_user_by_username($username){
      $db = db_connect();
      $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
      $statement->bindParam(':username', $username, PDO::PARAM_STR);
      $statement->execute();
      $row = $statement->fetch(PDO::FETCH_ASSOC);
      return $row;
  }

  public function create_user($username, $password){
      // Check if the username already exists
      if ($this->get_user_by_username($username)) {
          return "Username already exists";
      }

      // Validate password strength
      if (!$this->validate_password($password)) {
          return "Password does not meet the minimum security requirements";
      }

      // Hash the password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $db = db_connect();
      $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
      $statement->bindParam(':username', $username, PDO::PARAM_STR);
      $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);

      if ($statement->execute()) {
          return "User created successfully";
      } else {
          return "Error creating user";
      }
  }

  public function get_user_id_by_username($username) {
      $db = db_connect();
      $statement = $db->prepare("SELECT id FROM users WHERE username = :username");
      $statement->bindParam(':username', $username, PDO::PARAM_STR);
      $statement->execute();
      $result = $statement->fetch(PDO::FETCH_ASSOC);
      return $result ? $result['id'] : null;
  }

  private function validate_password($password){
      // Minimum length
      $min_length = 8;
      if (strlen($password) < $min_length) {
          return false;
      }

      // At least one uppercase letter
      if (!preg_match('/[A-Z]/', $password)) {
          return false;
      }

      // At least one lowercase letter
      if (!preg_match('/[a-z]/', $password)) {
          return false;
      }

      // At least one digit
      if (!preg_match('/\d/', $password)) {
          return false;
      }

      // At least one special character
      if (!preg_match('/[^a-zA-Z\d]/', $password)) {
          return false;
      }
      return true;
  }

    public function create_admin_user() {
        $username = 'admin';
        $password = 'admin';
    
        if (!$this->get_user_by_username($username)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            $db = db_connect();
            $statement = $db->prepare("INSERT INTO users (username, password, is_admin) VALUES (:username, :password, 1)");
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
            $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);
    
            if ($statement->execute()) {
                return "Admin user created successfully";
            } else {
                return "Error creating admin user";
            }
        } else {
            // If the admin user already exists, update their is_admin status
            $db = db_connect();
            $statement = $db->prepare("UPDATE users SET is_admin = 1 WHERE username = :username");
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
    
            if ($statement->execute()) {
                return "Admin user updated successfully";
            } else {
                return "Error updating admin user";
            }
        }
    }

        public function get_login_counts() {
            $db = db_connect();
            $statement = $db->prepare("
                SELECT username, COUNT(*) as login_count 
                FROM login_attempts 
                WHERE attempt = 'good' 
                GROUP BY username 
                ORDER BY login_count DESC
            ");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }


}
?>