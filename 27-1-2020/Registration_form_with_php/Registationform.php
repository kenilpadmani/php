<!DOCTYPE html>

<html lang="en">
<head>
    <title>Registration Form</title>
</head>
<body>
<?php
require_once 'validation_store.php';
?>
<form method="POST">
    <div calss="Account Information">
        <fieldset>
            <legend>ACCOUNT INFORMATION</legend>
                <div class="data-prefix">
                    <label>Prefix</label>
                    <?php $prefixData = ['Mr', 'Miss', 'Ms', 'Mrs', 'Dr'];?>
                    <select name="account[prefix]">
                        <?php foreach($prefixData as $key => $value):?>
                            <option value="<?php echo $value?>"
                                    <?php echo checkValueOfDropdown($value, 'account', 'prefix'); ?>>
                                        <?php echo $value?>
                            </option>
                        <?php endforeach?> 
                    </select>
                </div>
                <div class="data-firstname">
                    <label>Firstname</label>
                    <input type="text" name="account[firstname]" value="<?php echo getValue('account', 'firstname')?>">
                </div>
                <div class="data-lastname">
                    <label>Lastname</label>
                    <input type="text" name="account[lastname]" 
                    value="<?php echo getValue('account', 'lastname');?>">
                </div>
                <div class="data-dateofbirth">
                    <label>Date Of Birth</label>
                    <input type="date" name="account[birthdate]" 
                        value="<?php echo getValue('account', 'birthdate');?>">
                </div>
                <div class="data-phonenumber">
                    <label>Phone Number</label>
                    <input type="text" name="account[phonenumber]"
                        value="<?php echo getValue('account', 'phonenumber');?>">
                </div>
                <div class="data-email">
                    <label>Email</label>
                    <input type="text" name="account[email]"
                        value="<?php echo getValue('account', 'email');?>">
                </div>
                <div class="data-password">
                    <label>Password</label>
                    <input type="text" name="account[password]"
                        value="<?php echo getValue('account', 'password');?>">
                </div>
                <div class="data-confirmpassword">
                    <label>Confirm Password</label>
                    <input type="text" name="account[confirmpassword]"
                        value="<?php echo getValue('account', 'confirmpassword');?>">
                </div>
        </fieldset>
    </div>

    <div>
    <fieldset>
        <legend>Address Information</legend>
        <div class="data-addressLine1">
            <label>Address Line 1</label>
            <input type="text" name="address[addressLine1]"
                value="<?php echo getValue('address', 'addressLine1');?>">
        </div>
        <div class="data-addressLine2">
            <label>Address Line 2</label>
            <input type="text" name="address[addressLine2]"
                value="<?php echo getValue('address', 'addressLine2');?>">
        </div>
        <div class="data-companyName">
            <label>Company</label>
            <input type="text" name="address[company]"
                value="<?php echo getValue('address', 'company');?>">
        </div>
        <div class="data-city">
            <label>City</label>
            <input type="text" name="address[city]"
                value="<?php echo getValue('address', 'city');?>">
        </div>
        <div class="data-state">
            <label>State</label>
            <input type="text" name="address[state]"
                value="<?php echo getValue('address', 'state');?>">
        </div>
        <div class="data-country">
            <label>Country</label>
            <?php $countryData = ['INDIA', 'USA', 'CANDA', 'JAPAN']?>
            <select name="address[country]">
                <?php foreach($countryData as $key => $value):?>
                    <option value="<?php echo $value;?>"
                        <?php echo checkValueOfDropdown($value, 'address', 'country');?>>
                        <?php echo $value;?>
                    </option>
                <?php endforeach?>
            </select>
        </div>
        <div class="data-postalCode">
            <label>Postal Code</label>
            <input type="text" name="address[postalcode]"
                value="<?php echo getValue('address', 'postalcode');?>">
        </div>
    </fieldset>
    </div>


    <div>
        <input type="checkbox" name="checkbox"  id="checkbox" onclick="showHideForm(this)">check Othermation
    </div>
    
    
    <div id="otherInformationForm" style="display: none;">
        <fieldset>
            <legend>otherInformationForm</legend>
                <div class="data-describeyourself">
                    <label>Describe Yourself</label>
                    <input type="text" name="otherinformation[describeyourself]" 
                        value="<?php echo getValue('otherinformation', 'describeyourself');?>">
                </div>
                <div class="data-profileImage">
                    <label>Profile Image</label>
                    <input type="file" name="otherinformation[imageUpload]">
                </div>
                <div class="data-certificate">
                    <label>Certificate Upload</label>
                    <input type="file" name="otherinformation[certificateUpload]" >
                </div>
                <div class="data-businessYear">
                    <label>Year Of Business</label>
                    <?php $YearOfBusinessData = 
                    ['UNDER 1 YEAR', '1-2 YEARS', '2-5 YEARS', '5-10 YEARS', 'OVER 10 YEARS'];?>
                    <?php foreach($YearOfBusinessData as $key => $value):?>
                        <input type="radio" name="otherinformation[YearOfBusiness]" value="<?php echo $value;?>"
                            <?php echo checkValueForCheckboxAndRadio($value, 'otherinformation', 'YearOfBusiness');?>>
                            <?php echo $value;?>
                    <?php endforeach ?>
                </div>
                <div class="data-numberofunique">
                <label>Number of unique clients </label>
                <?php $uniqueClientsData = ['1-5', '6-10', '11-15', '15+']?>
                <select name="otherinformation[uniqueClient]">
                    <?php foreach($uniqueClientsData as $key => $value):?>
                        <option value="<?php echo $value;?>"
                            <?php echo checkValueOfDropdown($value, 'otherinformation', 'uniqueClient');?>>
                            <?php echo $value;?>
                        </option>
                    <?php endforeach?>
                </select>
                </div>
                <div class="data-liketotouch">
                    <label>Likke to Get Touch</label>
                    <?php $likeGetTouchData = 
                    ['Post', 'Email', 'SMS', 'Phone'];?>
                    <?php foreach($likeGetTouchData as $key => $value):?>
                        <input type="checkbox" name="otherinformation[likegettouch]" value="<?php echo $value;?>"
                            <?php echo checkValueForCheckboxAndRadio($value, 'otherinformation', 'likegettouch'); ?>>
                            <?php echo $value;?>
                    <?php endforeach ?>
                </div>
                <div class="data-hobbies">
                    <label>Hobbies</label>
                    <?php $hobbiesData = ['Listening to Music', 'Travelling', 'Blogging ', 'Sports', 'Art'];?>
                    <select name="otherinformation[hobbies]" multiple>
                        <?php foreach($hobbiesData as $key => $value):?>
                            <option value="<?php echo $value;?>"
                                <?php echo checkValueOfDropdown($value, 'otherinformation', 'hobbies');?>>
                            <?php echo $value;?>
                            </option>
                        <?php endforeach?>
                    </select>
                </div>
        </fieldset>
    </div>
    <input type="submit" name="submit">

</form>

<script src="Registation.js"></script>

</body>

</html>