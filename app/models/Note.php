<?php
class Note {
    public function get_all_notes_by_user($user_id) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM notes WHERE user_id = :user_id AND deleted = 0");
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_note_by_id($id) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM notes WHERE id = :id AND deleted = 0");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create_note($user_id, $subject) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO notes (user_id, subject, created_at) VALUES (:user_id, :subject, NOW())");
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function update_note($id, $subject) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE notes SET subject = :subject WHERE id = :id AND deleted = 0");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function delete_note($id) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE notes SET deleted = 1 WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }
}
?>