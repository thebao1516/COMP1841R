<h1><?=htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8')?></h1>
<p class="small-details">
    <b>Module:</b> <?=htmlspecialchars($post['module_name'], ENT_QUOTES, 'UTF-8')?>
    <br>
    <b><?=htmlspecialchars($post['author_fullname'], ENT_QUOTES, 'UTF-8')?></b> 
    <span class="creation-time-post" style="color: grey; font-size: 80%;"></span>
</p>
<img class="picnic" src="<?=$post['image']?>" 
    width="100%" alt="Thumbnail">
<p><?=htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8')?></p>

<?=$commentSection?>

<script>
    // Parse the timestamp in the Vietnam timezone
    var formattedTime = moment("<?=$post['createdAt']?>").utc().fromNow();
    document.getElementsByClassName('creation-time-post')[0].innerText = '-- ' + formattedTime
</script>