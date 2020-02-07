<?php 
session_start();
if(!isset($_SESSION['loginId'])) {
    header('Location: login.php');
}

?>

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

        <?php 
        if(isset($_POST['addCategory'])) {
            unset($_SESSION['editId']);
            header('Location: addnewcategory.php');
        }
        if(isset($_POST['myProfile'])) {
            header('Location: updateregister.php');
        }

        if(isset($_POST['logOut'])) {
            session_destroy();
            header('Location: login.php');
        }
        
        ?>

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
                    echo "<td> <img src=' $numberRows[Image] ' height='30px' width='40px'    alt='Image not upload'> </td>";
                    echo "<td>" . $numberRows['Title'] . "</td>";
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
        if(isset($_GET['edit'])) {
                echo $id = array_search('edit', $_GET['edit']);
                $_SESSION['editId'] = $id;
                header('Location: addnewcategory.php');
            }
        ?>
    </body>
</html>