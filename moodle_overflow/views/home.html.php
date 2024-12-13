<?php $title = 'Moodle OverFlow' ?>

<h1>Have a nice day, <?=htmlspecialchars($user['firstname'], ENT_QUOTES, 'UTF-8')?>!</h1>
<div class="browse-btns">
    <button id="feed-btn">Feeds</button>
    <button id="module-btn">My Modules</button>
</div>
<div id="browse-content">
    
</div>

<script type="text/javascript">
    // Switching between the Feeds and the My Modules tabs
    document.getElementById('feed-btn').addEventListener('click', (e) => {
        $('#browse-content').load('../controllers/feeds.php')
    })
    document.getElementById('module-btn').addEventListener('click', (e) => {
        $('#browse-content').load('../controllers/modules.php')
    })
    // Display Feeds when page is first load
    $('#feed-btn').click()
</script>