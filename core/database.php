<?php

namespace Core;

use PDO;
use PDOException;

class Database {

    public $conn;

    public function __construct($config, $username, $password) {
        $this->conn = null;
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        try {
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }

    public function closeConnection() {
        $this->conn = null;
    }

    public function getAllNotes() {
        $query = "SELECT * FROM notes where user_id = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getNote($id) {
        $query = "SELECT * FROM notes WHERE user_id = 1 AND note_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createNote($user_id, $title, $content) {
        $query = "INSERT INTO notes (user_id, title, content) VALUES (:user_id, :title, :content)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function deleteNote($id) {
        $query = "DELETE FROM notes WHERE note_id = :id AND user_id = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function userOwnsNote($user_id, $note_id) {
        $query = "SELECT COUNT(*) FROM notes WHERE note_id = :note_id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':note_id', $note_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    public function updateNote($note_id, $user_id, $title, $content) {
        $query = "UPDATE notes SET title = :title, content = :content WHERE note_id = :note_id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':note_id', $note_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function getAllNotesByUser($user_id) {
        $query = "SELECT * FROM notes WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getNoteByUser($note_id, $user_id) {
        $query = "SELECT * FROM notes WHERE note_id = :note_id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':note_id', $note_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function deleteNoteByUser($note_id, $user_id) {
        $query = "DELETE FROM notes WHERE note_id = :note_id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':note_id', $note_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}