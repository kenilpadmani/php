<html>
    <head>
        <title>blog post</title>
    </head>
    <body>
        <?php 
            require_once "connectionfile.php";
            require_once "validationpage.php";
        ?>
        <form method="POST">
            <div>
            <input type="submit" name="mangeCategory" value="Mange category">
            <input type="submit" name="myProfile" value="My profile">
            <input type="submit" name="logOut" value="Log out">
            </div>
            <div>
                <h2>Blog Post</h2>
            </div>
            <div>
                <input type="submit" name="addBlogPost" value="Add Blog Post">
            </div>
        </form>

        <?php 
            if(isset($_POST['addBlogPost'])) {
                unset($_SESSION['editId']);
                header('Location:addnewblogpost.php');
            }
            
            if(isset($_POST['mangeCategory'])) {
                header('Location: blogcategory.php');
            }

            if(isset($_POST['myProfile'])) {
                header('Location: register.php');
            }

            if(isset($_POST['logOut'])) {
                session_destroy();
                header('Location: login.php');
            }
        ?>

        <form method='GET'>
            <?php
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Post Id</th>";
                echo "<th>Category Name</th>";
                echo "<th>Title</th>";
                echo "<th>Published Date</th>";
                echo "<th>action</th>";
                echo "</tr>";
                $row = displayDataForblogpost();
                while($numberRows = mysqli_fetch_assoc($row)) {
                    echo "<tr>";
                    echo "<td>" . $numberRows['blogid'] . "</td>";
                    echo "<td>" . $numberRows['categoryName'] . "</td>";
                    echo "<td>" . $numberRows['Title'] . "</td>";
                    echo "<td>" . $numberRows['PublishedAt'] . "</td>";
                    $buttonId = $numberRows['blogid'];
                    echo "<td>
                    <input type='submit' name='edit[$buttonId]' value='edit'>
                    <input type='submit' name='delete[$buttonId]' value='delete'>
                    </td>";
                echo "</tr>";
                }
                echo "</table>";
        
        ?>
        </form>
        <?php
            if(isset($_GET['edit'])) {
                echo $id = array_search('edit', $_GET['edit']);
                $_SESSION['editId'] = $id;
                header('Location: addnewblogpost.php');
            }
        ?>
    </body>
</html>