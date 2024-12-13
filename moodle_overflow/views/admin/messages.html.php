<h1>Contact us messages</h1>
<?php foreach ($messages as $message): ?>
    <div class="container">
        <a class="message" href="message.php?id=<?=$message['id']?>">
            <div id='<?=$message['id']?>'>
                <h3><?=htmlspecialchars($message['subject'], ENT_QUOTES, 'UTF-8') ?></h3>
                <p>
                    From: <?=htmlspecialchars($message['email_from'], ENT_QUOTES, 'UTF-8') ?>
                    -
                    <span class="small-details">
                        <span class="creation-time"></span>
                    </span>
                </p>
            </div>
        </a>
    </div>

    <script>
        // Parse the timestamp in the Vietnam timezone
        var formattedTime = moment("<?=$message['createdAt']?>").utc().fromNow();
        var creationTimeBoxes = document.getElementsByClassName('creation-time')
        creationTimeBoxes[creationTimeBoxes.length - 1].innerText = formattedTime
    </script>    
<?php endforeach; ?>