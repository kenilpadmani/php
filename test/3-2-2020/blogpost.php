<html>
    <head>
        <title>blog post</title>
    </head>
    <body>
        <form method="POST">
            <div>
            <input type="submit" name="Mange category" value="Mange category">
            <input type="submit" name="My profile" value="My profile">
            <input type="submit" name="Log out" value="Log out">
            </div>
            <div>
                <h2>Blog Post</h2>
            </div>
            <div>
                <input type="submit" name="addBlogPost" value="Add Blog Post">
            </div>
        </form>
        <form>
            <?php
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Post Id</th>";
                echo "<th>Category Name</th>";
                echo "<th>Title</th>";
                echo "<th>Published Date</th>";
                echo "<th>action</th>";
                echo "</tr>";
                echo "</table>";
        ?>
        </form>
        <?php 
        if(isset($_POST['addBlogPost'])) {
            header('Location: addnewblogpost.php');
        }
        
        
        ?>
        
    </body>
</html>