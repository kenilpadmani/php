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
                    <input type="text" name="addnewblog[Title]">
                </div>
                <div>
                    <label>Content</label>
                    <textarea rows="5" cols="15" name="addnewblog[Content]"></textarea>
                </div>
                <div>
                    <label>URL</label>
                    <input type="text" name="addnewblog[Url]">
                </div>
                <div>
                    <label>Published At</label>
                    <input type="date" name="addnewblog[PublishedAt]">
                </div>
                
                <div>
                    <label>Category</label>
                    <select name="addnewblog[Category]" multiple>
                    <?php fetchCategoryName();?>
                    </select>
                </div>
                <div>
                <label>Image</label>
                    <input type="file" name="Imagename">
                </div>
                    
                <input type="submit" name="submit">
            </fieldset>
        </form>


    <?php 
    
    // if(isset($_POST['submit'])) {
    //     
    // }

    ?>
    </body>
</html>