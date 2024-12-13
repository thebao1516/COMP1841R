<?php
    include '../utils/databaseConnection.php';

    function getAllUsers() {
        $sql = 'SELECT * FROM user
                WHERE is_deleted = False';
        return $GLOBALS['pdo']->query($sql);
    }

    function getUser($email) {
        $sql = 'SELECT * FROM user
                WHERE email = :email AND is_deleted = False';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    function updateUser($id, $isAdmin=null, $firstname, $lastname, $email, $newPassword=null, $avatar=null) {
        $sql = 'UPDATE user SET
                is_admin = CASE WHEN :is_admin IS NOT NULL THEN :is_admin ELSE is_admin END, -- Only update password if there is value
                firstname = :firstname,
                lastname = :lastname,
                email = :email,
                password = CASE WHEN :password IS NOT NULL THEN :password ELSE password END, -- Only update password if there is value
                avatar = CASE WHEN :avatar IS NOT NULL THEN :avatar ELSE avatar END -- Only update password if there is value
                WHERE id = :id AND is_deleted = False';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':is_admin', $isAdmin);
        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':password', $newPassword);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':avatar', $avatar);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    function deleteUser($id) {
        $sql = 'UPDATE user SET
                is_deleted = True
                WHERE id = :id';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    function createUser($isAdmin, $firstname, $lastname, $email, $password) {
        $sql = 'INSERT INTO user SET
            is_admin = :is_admin,
            firstname = :firstname,
            lastname = :lastname,
            email = :email,
            password = :password';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':is_admin', $isAdmin);
        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
    }
?>