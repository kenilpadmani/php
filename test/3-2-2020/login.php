<html>
    <head>
        <title>Login</title>
    </head>
    <body>
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
        
        if(isset($_POST['login'])) {
            header('Location: blogpost.php');
        }

        if(isset($_POST['register'])) {
            header('Location: register.php');
        }
        
        ?>
    </body>
</html>