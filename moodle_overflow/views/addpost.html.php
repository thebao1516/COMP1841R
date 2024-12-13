
<h1>Sharing and questioning are keys to success. Keep going!</h1>
<div class="container">

    <form action="" method="post" enctype="multipart/form-data" class="form">
        <label for="image">Thumbnail</label>
        <label class="dropimage">
            <input type="file" name="image" id="" accept="image/*" required>
        </label>
        
    
        <br>
    
        <label for="module_id">Module</label>
        <select name="module_id" class="select">
            <?php foreach ($modules as $module): ?>
                <option value="<?=$module['id']?>"><?=htmlspecialchars($module['name'], ENT_QUOTES, 'UTF-8')?></option>
            <?php endforeach; ?>
        </select>
    
        <br>
    
        <label for="title">Title</label>
        <input type="text" name="title" class="input" required>
    
        <br>
    
        <label for="content">Content</label>
        <textarea name="content" id="" cols="30" rows="10" class="textarea" required></textarea>
    
        <br>
        
        <input type="submit" value="Submit" name="submit" class="button">
    </form>
</div>

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