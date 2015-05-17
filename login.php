<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <title>Login</title>
</head>
<body>
<?php require("include/block-header.php");?>
<div class="block-content-login">
    <h2 class="title_login">Log In</h2>
    <form method="post" class="form_login" action="functions/auth.php">
        <p class="login_message">The username and password you entered did not match our records. Please try again.</p>
        <div class="block-form-login">
            <ul class="form-login">
                <li>
                    <input type="text" name="login" class="reg_login" placeholder="Login or e-mail" required/>
                </li>
                <li>
                    <input type="password" name="pass" class="reg_pass" placeholder="Password" required/>
                </li>
            </ul>
            <ul class="list-login">
                <li><input type="checkbox" name="rememberme" id="rememberme"/><label for="rememberme">Remember me</label></li>
                <li><a class="remindpass" href="#">Forgot password?</a></li>
            </ul>
        </div>
        <p><input type="submit" name="login_submit" class="login-submit" value="Log In"></p>
</div>
</body>
</html>