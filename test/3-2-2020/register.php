<html>
    <head>
        <title>Register</title>
    </head>
    <body>

    <?php
    require_once "validationpage.php";    
    ?>
        <form method="POST">
            <fieldset>
                <legend>REGISTER</legend>
                <div class="data-prefix">
                    <label>Prefix</label>
                    <?php $prefixData = ['Mr', 'Miss', 'Ms', 'Mrs', 'Dr'];?>
                    <select name="register[Prefix]">
                        <?php foreach($prefixData as $key => $value):?>
                            <option value="<?php echo $value?>"
                                <?php echo $selectd = in_array($value, [getValue('register', 'Prefix',[])]) 
                                    ? 'selected = "selected"'
                                    : "";?> ?>
                                <?php echo $value?>
                            </option>
                        <?php endforeach?> 
                    </select>
                </div>
                <div class="data-firstname">
                    <label>Firstname</label>
                    <input type="text" name="register[FirstName]" 
                    value="<?php echo getValue('register', 'FirstName');?>">
                </div>
                <div class="data-lastname">
                    <label>Lastname</label>
                    <input type="text" name="register[LastName]" 
                    value="<?php echo getValue('register', 'LastName');?>">
                </div>
                <div class="data-email">
                    <label>Email</label>
                    <input type="text" name="register[Email]"
                        value="<?php echo getValue('register', 'Email');?>">
                </div>
                <div class="data-phonenumber">
                    <label>Mobile Number</label>
                    <input type="text" name="register[Mobile]"
                        value="<?php echo getValue('register', 'Mobile');?>">
                </div>
                <div class="data-password">
                    <label>Password</label>
                    <input type="password" name="register[PasswordHash]"
                        value="<?php echo getValue('register', 'PasswordHash');?>">
                </div>
                <div class="data-confirmpassword">
                    <label>Confirm Password</label>
                    <input type="password" name="register[confirmpassword]"
                        value="">
                </div>
                <div class="data-information">
                    <label>information</label>
                    <textarea rows="5" cols="20" name="register[Information]"></textarea>
                </div>
                <div>
                    <input type="checkbox" name="condition">Hereby,I Accept Terms & Conditions
                </div>
                <input type="submit" name="submit">
            </fieldset>
        </form>
    </body>
</html>