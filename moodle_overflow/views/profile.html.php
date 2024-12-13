<h1>Here you are, <?=htmlspecialchars($user['firstname'], ENT_QUOTES, 'UTF-8')?>!</h1>
<h2>You wanna change your profile? Fill in the form and click 'Save'</h2>
<div class="container">
    <img class="profile-img" src="<?=$user['avatar']?>" alt="User avatar">

    <form id="edit-profile-form" action="editprofile.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id" value="<?=$user['id']?>">
        
        <label for="image">New avatar</label>
        <label class="dropimage">
            <input type="file" name="image" id="" accept="image/*" value="">
        </label>
        
        <br>
        <label for="firstname">First name:</label>
        <input type="text" name="firstname" value="<?=htmlspecialchars($user['firstname'], ENT_QUOTES, 'UTF-8')?>" required>
        <br>
        <label for="lastname">Last name:</label>
        <input type="text" name="lastname" value="<?=htmlspecialchars($user['lastname'], ENT_QUOTES, 'UTF-8')?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?=htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8')?>" size="30" readonly>
        <br>
        <label for="old-password">Old password:</label>
        <input type="password" name="old-password" size="30">
        <br>
        <label for="new-password">New password:</label>
        <input type="password" name="new-password" size="30">
        <br>
        <label for="new-password-confirm">Confirm new password:</label>
        <input type="password" name="new-password-confirm" size="30">
        <br>
        <input type="submit" value="Submit" name="submit">
    </form>
</div>

<script>
    document.getElementById('edit-profile-form').addEventListener('submit', (e) => {
        // Check if the new password is oke
        const newPassword = document.querySelector("input[name='new-password']")
        const newPasswordConfirm = document.querySelector("input[name='new-password-confirm']")
        if (newPassword.value == newPasswordConfirm.value) {
            e.target.submit()
        }
        alert('Your new password is not identical with the confirmation')
        e.preventDefault(); // Stop submitting the form to server
    })
</script>

<script> // Image upload UI processing
    document.addEventListener("DOMContentLoaded", function() {
        [].forEach.call(document.querySelectorAll('.dropimage'), function(img){
            img.onchange = function(e){
            var inputfile = this, reader = new FileReader();
            reader.onloadend = function(){
                inputfile.style['background-image'] = 'url('+reader.result+')';
            }
            reader.readAsDataURL(e.target.files[0]);
            }
        });
    });
</script>