<?php require_once "db_connect.php"; ?>
<div class="nav">
    <div class="header">
        <a class="brand" href="index.php"> Blog</a>
    <div class="navigation">
        <ul>
        <?php if(!$_SESSION['user_id']) {

         ?>
            <li><a class="log in" href="login.php">Log In</a></li>
            <li><a class="sign up" href="registration.php">Sign Up</a></li>
        <?php
            } else {
         ?>
            <li><a href="logout.php">Logout</a></li>
         <?php } ?>
        </ul>
    </div>
    </div>
</div>

