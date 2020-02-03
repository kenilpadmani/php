<html>
    <head>
        <title>add new blog</title>
    </head>
    <body>

    <?php 
    
    require_once "validationpage.php";

    ?>
        <form>
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
                    <textarea rows="5" cols="15" name="addnewblog[content]"></textarea>
                </div>
                <div>
                    <label>URL</label>
                    <input type="text" name="addnewblog[Url]">
                </div>
                <div>
                    <label>Published At</label>
                    <input type="text" name="addnewblog[Published]">
                </div>
                <div>
                    <label>Category</label>
                    <textarea rows="5" cols="15" name="addnewblog[Category]"></textarea>
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="addnewblog[image]">
                </div>
                <input type="submit" name="submit">
            </fieldset>
        </form>
    </body>
</html>