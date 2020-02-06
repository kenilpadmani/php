<html>
    <head>
        <title>Login</title>
    </head>
    <body>
    <?php
    
    require_once "connectionfile.php";
    
    ?>
        <form method="POST">
            <fieldset>
                <legend>Login</legend>
                <div>
                <label>Email</label>
                <input type="text" name="loginEmail" value="">
                </div>
                <div>
                <label>password</label>
                <input type="text" name="loginPassword" value="">
                </div>
                <input type="submit" name="login" value="LOGIN">
                <input type="submit" name="register" value="REGISTER">
            </fieldset>
        </form>

        <?php 

        function validation() {
            if($_POST['loginEmail'] && !empty($_POST['loginEmail'])) {
                if(!preg_match('/^[a-zA-Z-0-9.]+\@[a-zA-Z-0-9.]+\.[a-z]{2,3}$/', $_POST['loginEmail'])) {
                    echo "login email is invalid format";
                } 
            }
            if(!$_POST['loginPassword'] && !empty($_POST['loginPassword'])) {
                if(preg_match('/^[a-zA-Z-0-9]*\w*[a-zA-Z-0-9]$/', $_POST['loginPassword'])) {
                   echo "login password invalid format";
                }
            }
            $selectQuery = "select userid,Email,PasswordHash from user";
            $result = mysqli_query(openConnection(), $selectQuery);
            $flag = 0;
            while($rows = mysqli_fetch_assoc($result)) {
                if(($rows['Email'] == $_POST['loginEmail']) && ($rows['PasswordHash'] == $_POST['loginPassword'])) {
                    echo $_SESSION['loginId'] = $rows['userid'];
                    $flag = 1;
                }
            }
            return $flag;
        }
        
        if(isset($_POST['login'])) {
            if(validation()){
                $loginTime = date("h:i:s", time());
                //$_SESSION['lastlogin'] = date("h:i:s", time());
                $updateQuery = "UPDATE user SET LastLoginAt = '$loginTime' where userid = '$_SESSION[loginId]'";
                if(mysqli_query(openConnection(), $updateQuery)) {
                    echo "insert row successfully";
                } else {
                    echo "error";
                }
                header('Location: blogpost.php');
            } else {
                echo "Email and password is not in database";
            }
        }
           

        if(isset($_POST['register'])) {
            header('Location: register.php');
        }
        
        ?>
    </body>
</html>