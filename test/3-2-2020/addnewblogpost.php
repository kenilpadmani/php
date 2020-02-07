<html>
    <head>
        <title>add new blog</title>
    </head>
    <body>

    <?php 
    require_once "validationpage.php";
    require_once "connectionfile.php";
    ?>
        <form method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>
                    Add New Blog Post
                </legend>
                <div>
                    <label>Title</label>
                    <input type="text" name="addnewblog[Title]" 
                    value="<?php echo getValueForDatabase('Title', 'blogpost', 'blogid')?>">
                </div>
                <div>
                    <label>Content</label>
                    <textarea rows="5" cols="15" name="addnewblog[Content]">
                    <?php echo getValueForDatabase('Content', 'blogpost', 'blogid')?>
                    </textarea>
                </div>
                <div>
                    <label>URL</label>
                    <input type="text" name="addnewblog[Url]" 
                    value="<?php echo getValueForDatabase('Url', 'blogpost', 'blogid')?>">
                </div>
                <div>
                    <label>Published At</label>
                    <input type="date" name="addnewblog[PublishedAt]" 
                    value="<?php echo getValueForDatabase('PublishedAt', 'blogpost', 'blogid')?>">
                </div>
                
                <div>
                    <label>Category</label>
                    <select name="addnewblog[Category]" multiple>
                    <?php fetchCategoryName();?>
                    </select>
                </div>
                <div>
                <label>Image</label>
                    <input type="file" name="Imagename" 
                    value="<?php echo getValueForDatabase('Imagename', 'blogpost', 'blogid')?>">
                </div>
                    
                <input type="submit" name="submit">
                <input type="submit" name="update" value="update">
            </fieldset>
        </form>
    </body>
</html>