<h1>Want a change? Let's do it!</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$post['post_id']?>">

    <label for="image">New thumbnail</label>
    <img class="picnic" src="<?=$post['image']?>" 
    width="100%" alt="Thumbnail">
    <label class="dropimage">
        <input type="file" name="image" id="" accept="image/*" value="">
    
    </label>   

    <br>

    <label for="module_id">Module</label>
    <select name="module_id">
        <?php foreach ($modules as $module): ?>
            <option value="<?=$module['id']?>"><?=htmlspecialchars($module['name'], ENT_QUOTES, 'UTF-8')?></option>
        <?php endforeach; ?>
    </select>

    <br>

    <label for="title">Title</label>
    <input type="text" name="title" value="<?=htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8')?>" required>

    <br>

    <label for="content">Content</label>
    <textarea name="content" id="" cols="30" rows="10" required><?=htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8')?></textarea>

    <br>
    
    <input type="submit" value="Submit" name="submit">
</form>

<script> // Set the module drop list default value
    document.querySelector('form select option[value="<?=$post['module_id']?>"]').selected = true;
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
