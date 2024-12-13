<?php
    // Connect to database
    include '../utils/databaseConnection.php';

    function getAllPosts() {
        $sql = 'SELECT
                    post.id as post_id,
                    post.*,
                    module.name as module_name,
                    user.firstname as author_firstname,
                    user.lastname as author_lastname,
                    COUNT(comment.id) as no_comments
                FROM post
                INNER JOIN module ON post.module_id = module.id
                INNER JOIN user ON post.author_id = user.id
                LEFT JOIN comment ON post.id = comment.post_id AND comment.is_deleted = False
                WHERE post.is_deleted = False AND module.is_deleted = False
                GROUP BY post.id, module_name, author_firstname, author_lastname
                ORDER BY post.createdAt DESC;';
        return $GLOBALS['pdo']->query($sql);
    }
    
    function getPostsInModule($moduleId) {
        $sql = 'SELECT 
                    post.id as post_id, 
                    post.*, 
                    module.name as module_name, 
                    user.firstname as author_firstname, 
                    user.lastname as author_lastname,
                    COUNT(comment.id) as no_comments
                FROM post INNER JOIN module ON post.module_id = module.id
                INNER JOIN user ON post.author_id = user.id
                LEFT JOIN comment ON post.id = comment.post_id AND comment.is_deleted = False
                WHERE module_id = :module_id AND post.is_deleted = False
                GROUP BY post.id, module_name, author_firstname, author_lastname
                ORDER BY post.createdAt DESC;';

        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':module_id', $moduleId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getPost() {
        $sql = "SELECT 
                    post.*,
                    module.name as module_name, 
                    post.id as post_id, 
                    module.id as module_id,
                    CONCAT(user.firstname, ' ', user.lastname) as author_fullname
                FROM post 
                INNER JOIN module ON post.module_id = module.id
                INNER JOIN user ON post.author_id = user.id
                WHERE post.id = :id AND post.is_deleted = False AND module.is_deleted = False";
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        return $stmt->fetch();
    }

    function addPost($title, $content, $image, $moduleId, $authorId) {
        $sql = 'INSERT INTO post SET
            title = :title,
            content = :content,
            image = :image,
            module_id = :module_id,
            author_id = :author_id';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':content', $content);
        $stmt->bindValue(':image', $image);
        $stmt->bindValue(':module_id', $moduleId);
        $stmt->bindValue(':author_id', $authorId);
        $stmt->execute();
    }

    function deletePost($id, $authorId) {
        $sql = 'UPDATE post SET 
                is_deleted = True
                WHERE id = :id AND author_id = :author_id';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':author_id', $authorId);
        $stmt->execute();
    }

    function updatePost($id, $title, $content, $image, $moduleId, $authorId) {
        $sql = 'UPDATE post SET 
                title = :title,
                content = :content,
                image = CASE WHEN :image IS NOT NULL THEN :image ELSE image END, -- Only update image if there is value
                module_id = :module_id
                WHERE id = :id AND author_id = :author_id AND is_deleted = False';
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':content', $content);
        $stmt->bindValue(':image', $image);
        $stmt->bindValue(':module_id', $moduleId);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':author_id', $authorId);
        $stmt->execute();
    }
?>