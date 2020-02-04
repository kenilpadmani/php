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
                <h2>Blog Category</h2>
            </div>
            <div>
                <input type="submit" name="addCategory" value="Add Category">
            </div>
        </form>
        <form method="GET">
            <?php
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Category Id</th>";
                echo "<th>Category Image</th>";
                echo "<th>Category Name</th>";
                echo "<th>Created Date</th>";
                echo "<th>action</th>";
                echo "</tr>";
                $rows = displayDataForcategory();
                while($numberRows = mysqli_fetch_assoc($rows)) {
                    echo "<tr>";
                    echo "<td>" . $numberRows['categoryid'] . "</td>";
                    echo "<td>" . $numberRows['Image'] . "</td>";
                    echo "<td>" . $numberRows['categoryName'] . "</td>";
                    echo "<td>" . $numberRows['CreatedAt'] . "</td>";
                    $buttonId = $numberRows['categoryid'];
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
        if(isset($_POST['addCategory'])) {
            header('Location: addnewcategory.php');
        }
        if(isset($_POST['myProfile'])) {
            header('Location: register.php');
        }
        
        ?>
        
    </body>
</html>