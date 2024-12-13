<?php
    // Connect to database
    include '../utils/databaseConnection.php';

    function getAllModules() {
        $sql = 'SELECT module.*, COUNT(post.id) as no_posts 
                FROM module
                LEFT JOIN post ON module.id = post.module_id AND post.is_deleted = False
                WHERE module.is_deleted = False
                GROUP BY module.id';
        return $GLOBALS['pdo']->query($sql);
    }

    function getModule($id) {
        $sql = 'SELECT * FROM module
                WHERE id = :id AND is_deleted = False';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function updateModule($id, $name, $teacher) {
        $sql = 'UPDATE module SET 
                name = :name,
                teacher = :teacher
                WHERE id = :id AND is_deleted = False';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':teacher', $teacher);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    function deleteModule($id) {
        $sql = 'UPDATE module SET 
                is_deleted = True
                WHERE id = :id';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    function createModule($name, $teacher) {
        $sql = 'INSERT INTO module SET
            name = :name,
            teacher = :teacher';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':teacher', $teacher);
        $stmt->execute();
    }
?>