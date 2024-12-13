<?php
    include '../utils/databaseConnection.php';

    function addMessage($emailFrom, $subject, $content) {
        $sql = 'INSERT INTO message SET
            email_from = :email_from,
            subject = :subject,
            content = :content';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':email_from', $emailFrom);
        $stmt->bindValue(':subject', $subject);
        $stmt->bindValue(':content', $content);
        $stmt->execute();
    }

    function getAllMessages() {
        $sql = 'SELECT * FROM message
                ORDER BY createdAt DESC';
        return $GLOBALS['pdo']->query($sql);
    }

    function getMessage($id) {
        $sql = "SELECT message.*, user.avatar AS sender_avatar, CONCAT(user.firstname, ' ', user.lastname) AS sender_fullname
                FROM message
                INNER JOIN user ON message.email_from = user.email
                WHERE message.id = :id";
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
?>