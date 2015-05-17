<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <title>Sign Up</title>
</head>
<body>
<?php require("include/block-header.php");?>
<div class="block-content-reg">
    <h2 class="title_reg">Sign Up</h2>
    <form method="post" class="form_reg" action="functions/registration.php">
        <p class="reg_message"></p>
        <div class="block-form-registration">
            <ul class="form-registration">
               <li>
                   <label>Login</label>
                   <input type="text" name="reg_login" class="reg_login" required/>
               </li>
                <li>
                    <label>Password</label>
                    <input type="password" name="reg_pass" class="reg_pass" required/>
                </li>
                <li>
                    <label>First Name</label>
                    <input type="text" name="reg_firstname" class="reg_firstname" required/>
                </li>
                <li>
                    <label>Last Name</label>
                    <input type="text" name="reg_lastname" class="reg_lastname" required/>
                </li>
                <li>
                    <label>E-mail</label>
                    <input type="email" name="reg_email" class="reg_email" required/>
                </li>
            </ul>
        </div>

        <input type="hidden" name="action" value="register"/>
        <p><input type="submit" name="reg_submit" class="reg-submit" value="Sign Up"></p>
    </form>

</div>

</body>
</html>