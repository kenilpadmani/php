<?php 
session_start();
if(!isset($_SESSION['loginId'])) {
    header('Location: login.php');
}

?>


<html>
    <head>
        <title>add new blog</title>
    </head>
    <body>

    <?php require_once "validationpage.php"; ?>

        <form action="addnewcategory.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>
                    Add Category
                </legend>
                <div class="data-title">
                    <label>Title</label>
                    <input type="text" name="addnewcategory[Title]" 
                    value="<?php echo getValueForDatabase('Title', 'category', 'categoryid')?>">
                </div>
                <div class="data-content">
                    <label>Content</label>
                    <textarea rows="5" cols="30" name="addnewcategory[Content]"> 
                     <?php echo getValueForDatabase('Content', 'category', 'categoryid')?>
                    </textarea>
                </div>
                <div class="data-url">
                    <label>URL</label>
                    <input type="text" name="addnewcategory[Url]"  
                    value="<?php echo getValueForDatabase('Url', 'category', 'categoryid')?>">
                </div>
                <div class="data-metatitle">
                    <label>Meta Title</label>
                    <input type="text" name="addnewcategory[MetaTitle]" 
                    value="<?php echo getValueForDatabase('MetaTitle', 'category', 'categoryid')?>">
                </div>
                <div class="data-categoryname">
                    <label>Parent Category</label>
                    <?php $categoryData = ['Lifestyle', 'health', 'eduction', 'Music'] ?>
                    <select name="addnewcategory[categoryName]">
                    <?php foreach($categoryData as $key => $value):?>
                        <?php $selectd = in_array($value, [getValueForDatabase('categoryName', 'category', 'categoryid',[])]) 
                                    ? 'selected = "selected"'
                                    : "";?>
                        <option value="<?php echo $value;?>"<?php echo $selectd ?> > <?php echo $value;?></option>
                    <?php endforeach?>
                    </select>
                </div>
                <div class="data-image">
                    <label>Image</label>
                    <input type="file" name="image" 
                    value="<?php echo getValueForDatabase('image', 'category', 'categoryid')?>">
                </div>
                <input type="submit" name="submit">
                <input type="submit" name="update" value="update">
            </fieldset>
        </form> 
        
    </body>
</html>