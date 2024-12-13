<div class="container" >
    <div class="comment">
        <form action="addcomment.php" method="POST">
            <input type="hidden" name="post_id" value="<?=$post['post_id']?>">
            <textarea name="content" id="" cols="30" rows="3" placeholder="Put your comments here." required></textarea>
            <input type="submit" value="Add comment" name="submit">
        </form>
    </div>

    <?php foreach ($comments as $comment): ?>
        <div class="comment box">
            <p>
                <img src="<?=$comment['author_avatar']?>" alt="Author Avatar" width="50px"> <?=htmlspecialchars($comment['author_firstname'] . ' ' . $comment['author_lastname'], ENT_QUOTES, 'UTF-8')?>
                <span class="small-details">
                    <span class="creation-time"></span>
                </span>
            </p>
            <p id="comment-content-<?=$comment['comment_id']?>"><?=htmlspecialchars($comment['content'], ENT_QUOTES, 'UTF-8')?></p>

            <?php if ($comment['author_id'] == $user['id']): ?>
                <form id="editcomment-form-<?=$comment['comment_id']?>" action="editcomment.php" method="POST" style="display: none;">
                    <input type="hidden" name="id" value="<?=$comment['comment_id']?>">
                    <input type="hidden" name="post_id" value="<?=$post['post_id']?>">
                    <textarea name="content" id="" cols="30" rows="3"><?=htmlspecialchars($comment['content'], ENT_QUOTES, 'UTF-8')?></textarea>
                    <input type="submit" value="Save" name="submit">
                    <button type="button" onclick="cancelCommentEditing(<?=$comment['comment_id']?>)">Cancel</button>
                </form>

                <button class="btn" style="display: inline-block;" id="edit-comment-btn-<?=$comment['comment_id']?>" onclick="enableCommentEditing(<?=$comment['comment_id']?>)">Edit</button>
                <form action="deletecomment.php" method="POST" style="display: inline-block;" >
                    <input type="hidden" name="id" value="<?=$comment['comment_id']?>">
                    <input type="hidden" name="post_id" value="<?=$post['post_id']?>">
                    <button class="btn" style="display: inline-block;" type="submit" name="submit">Delete</button>
                </form>
                
            <?php endif; ?>
        </div>

        <script>
            // Parse the timestamp in the Vietnam timezone
            var formattedTime = moment("<?=$comment['createdAt']?>").utc().fromNow();
            var creationTimeBoxes = document.getElementsByClassName('creation-time')
            creationTimeBoxes[creationTimeBoxes.length - 1].innerText = formattedTime
        </script>
    <?php endforeach; ?>
</div>

<script>
    function enableCommentEditing(commentId) {
        document.getElementById(`edit-comment-btn-${commentId}`).style.display = 'none'
        document.getElementById(`comment-content-${commentId}`).style.display = 'none'
        document.getElementById(`editcomment-form-${commentId}`).style.display = 'block'
    }

    function cancelCommentEditing(commentId) {
        document.getElementById(`edit-comment-btn-${commentId}`).style.display = 'block'
        document.getElementById(`comment-content-${commentId}`).style.display = 'block'
        document.getElementById(`editcomment-form-${commentId}`).style.display = 'none'
    }
</script>