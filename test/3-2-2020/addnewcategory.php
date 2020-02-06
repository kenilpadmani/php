<html>
    <head>
        <title>add new blog</title>
    </head>
    <body>

    <?php 
    require_once "validationpage.php";
    

    ?>
        <form action="addnewcategory.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>
                    Add Category
                </legend>
                <div>
                    <label>Title</label>
                    <input type="text" name="addnewcategory[Title]" value="<?php echo getValueForDatabase('Title', 'category', 'categoryid')?>">
                </div>
                <div>
                    <label>Content</label>
                    <textarea rows="5" cols="15" name="addnewcategory[Content]"> 
                     <?php echo getValueForDatabase('Content', 'category', 'categoryid')?></textarea>
                </div>
                <div>
                    <label>URL</label>
                    <input type="text" name="addnewcategory[Url]"  value="<?php echo getValueForDatabase('Url', 'category', 'categoryid')?>">
                </div>
                <div>
                    <label>Meta Title</label>
                    <input type="text" name="addnewcategory[MetaTitle]" value="<?php echo getValueForDatabase('MetaTitle', 'category', 'categoryid')?>">
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
                    <input type="file" name="image" value="<?php echo getValueForDatabase('image', 'category', 'categoryid')?>">
                </div>
                <input type="submit" name="submit">
                <input type="submit" name="update" value="update">
            </fieldset>
        </form> 
        
    </body>
</html>