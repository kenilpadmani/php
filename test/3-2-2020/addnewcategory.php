<html>
    <head>
        <title>add new blog</title>
    </head>
    <body>

    <?php 
    
    require_once "validationpage.php";

    ?>
        <form method="POST">
            <fieldset>
                <legend>
                    Add Category
                </legend>
                <div>
                    <label>Title</label>
                    <input type="text" name="addnewcategory[Title]">
                </div>
                <div>
                    <label>Content</label>
                    <textarea rows="5" cols="15" name="addnewcategory[Content]"></textarea>
                </div>
                <div>
                    <label>URL</label>
                    <input type="text" name="addnewcategory[Url]">
                </div>
                <div>
                    <label>Meta Title</label>
                    <input type="text" name="addnewcategory[MetaTitle]">
                </div>
                <div>
                    <label>Parent Category</label>
                    <?php $categoryData = ['Lifestyle', 'health', 'eduction', 'Music'] ?>
                    <select name="addnewcategory[categoryName]">
                    <?php $selectd = in_array($value, [getValue('addnewcategory', 'categoryName',[])]) 
                                    ? 'selected = "selected"'
                                    : "";?>
                    <?php foreach($categoryData as $key => $value):?>
                        <option value="<?php echo $value;?>" <?php echo $selectd; ?>> <?php echo $value;?></option>
                    <?php endforeach?>
                    </select>
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="addnewcategory[Image]">
                </div>
                <input type="submit" name="submit">
            </fieldset>
        </form>

        <?php
        if(isset($_POST['submit'])) {
            fileuploading();
            //header('Location: blogcategory.php');
        }
        
        
        ?>
    </body>
</html>