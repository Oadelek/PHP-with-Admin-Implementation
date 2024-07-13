<?php

Class Log {
        public function log_attempt($username, $attempt) {
            if ($username === null) {
                // Log or handle the case where username is null
                error_log("Attempted to log login attempt with null username");
                return;
            }

            $db = db_connect();
            $statement = $db->prepare("INSERT INTO login_attempts (username, attempt) VALUES (:username, :attempt)");
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
            $statement->bindParam(':attempt', $attempt, PDO::PARAM_STR);
            $statement->execute();
        }

        public function getBadCount($username) {
            $db = db_connect();
            $statement = $db->prepare("SELECT COUNT(*) FROM login_attempts WHERE username = :username AND attempt = 'bad' AND timestamp > (NOW() - INTERVAL 60 SECOND)");
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
            $statement->execute();
            return $statement->fetchColumn();
        }

        public function is_user_locked_out($username) {
            $failed_attempts = $this->getBadCount($username);
            return $failed_attempts >= 3;
        }
}
?>