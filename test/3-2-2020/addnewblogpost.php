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
                    <textarea rows="5" cols="30" name="addnewblog[Content]">
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
                    <select name="addnewblog[selectedcategory][]" multiple>
                    <?php $select = "SELECT categoryName FROM parentcategory";
                            $result = mysqli_query(openConnection(), $select);
                            while($rows = mysqli_fetch_assoc($result)) {
                                $selected = in_array($rows['categoryName'], explode(",",getValueForDatabase('selectedcategory', 'blogpost', 'blogid',[]))) 
                            ? 'selected = "selected"'
                            : "";
                            echo "<option value= '".$rows['categoryName']."'$selected>".$rows['categoryName'];
                            
                            echo "</option>";
                            }
                            ?>
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