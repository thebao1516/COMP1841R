<?php foreach ($posts as $post): ?>
    <div class="container">
        <a class="post" href="../controllers/readpost.php?id=<?= $post['post_id']?>">
            <p><?=$post['no_comments']?> Comment(s)</p>
            <h3>
                <?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?>
            </h3>
            <p><b>Module: </b>
                <?= htmlspecialchars($post['module_name'], ENT_QUOTES, 'UTF-8') ?>
            </p>
            <p>By
                <?= htmlspecialchars($post['author_firstname'] . ' ' . $post['author_lastname'], ENT_QUOTES, 'UTF-8') ?>
                - 
                <span class="small-details">
                    <span class="creation-time-<?=$post['id']?>"></span>
                </span>
            </p>

            <?php if ($post['author_id'] == $user['id']): ?>
                <!-- Edit link -->
                <form action="editpost.php">
                    <input type="hidden" name="id" value="<?=$post['post_id']?>">
                    <input type="submit" value="Edit" />
                </form>

                <!-- Delete button -->
                <form action="deletepost.php" method="POST">
                    <input type="hidden" name="id" value="<?= $post['post_id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            <?php endif; ?>
        </a>
    </div>

    <script>
        // Parse the timestamp in the Vietnam timezone
        var formattedTime = moment("<?=$post['createdAt']?>").utc().fromNow();
        var creationTimeBoxes = document.getElementsByClassName('creation-time-<?=$post['id']?>')
        creationTimeBoxes[0].innerText = formattedTime

        // Somehow the creationTimeBoxes array doesn't correctly display elements
        // So I have to manually style those elements 
        creationTimeBoxes[0].style.color = 'grey'
        creationTimeBoxes[0].style.fontSize = '80%'
    </script>

<?php endforeach; ?>