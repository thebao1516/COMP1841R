<div class="container">
    <div class="message">
        <h1><?=htmlspecialchars($message['subject'], ENT_QUOTES, 'UTF-8')?></h1>
        <div id="sender">
            <?php 
                if ($message['sender_avatar'][0] == '.') 
                    $imgUrl = '../' . $message['sender_avatar'];
                else $imgUrl = $message['sender_avatar'];
            ?>
            <img src="<?=$imgUrl?>" alt="Sender avatar" width="50">
            <b><?=htmlspecialchars($message['sender_fullname'], ENT_QUOTES, 'UTF-8')?></b> - <?=htmlspecialchars($message['email_from'], ENT_QUOTES, 'UTF-8')?>
            <span class="small-details">
                <span class="creation-time"></span>
            </span>
        </div>
        <div class="message-content">
            <p><?=htmlspecialchars($message['content'], ENT_QUOTES, 'UTF-8')?></p>
        </div>        
    </div>    
</div>

<script>
    // Parse the timestamp in the Vietnam timezone
    var formattedTime = moment("<?=$message['createdAt']?>").utc().fromNow();
    var creationTimeBoxes = document.getElementsByClassName('creation-time')
    creationTimeBoxes[creationTimeBoxes.length - 1].innerText = formattedTime
</script>
