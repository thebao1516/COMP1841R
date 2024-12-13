<h1>What can we help you?</h1>
<div class="container">

    <form action="" method="POST">
        <input type="hidden" name="email_from" value="<?=htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8')?>">
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="" required>
        <br>
        <label for="content">Message</label>
        <textarea name="content" id="" cols="40" rows="15" required></textarea>
        <br>
        <input type="submit" value="Send email">
    </form>
</div>