<?php 
session_start();
include('register.php');
?>


<!DOCTYPE html>
<html>

<head>
    <title>SIGN UP PAGE</title>
    <link rel="stylesheet" type="text/css" href="../css/design.css"> 
</head>

<body>
    <section class="container">
        <section class="frm">
    <form action="register.php" method="POST">
        <label class="txt">FIRST NAME</label>
        <input type="text" name="fname" class="inpt">
        <div class="error">
            <?php
            if(!empty($_SESSION['error']))
            {   
                if(isset($_SESSION['error']['fname']))
                {
                echo $_SESSION['error']['fname'];
                }
            }
          ?>
        </div>
        <label class="txt">LAST NAME</label>
        <input type="text" name="lname" class="inpt">
        <div class="error">
            <?php
             if(!empty($_SESSION['error']))
             {   if(isset($_SESSION['error']['lname']))
                {
                 echo $_SESSION['error']['lname']; 
                }
             }
            ?>
        </div>
        <label class="txt">EMAIL</label>
        <input type="email" name="email" class="inpt">
        <div class="error">
            <?php
             if(!empty($_SESSION['error']))
             {
                if(isset($_SESSION['error']['email']))
                {
                echo $_SESSION['error']['email'];
                }
             }
            ?>
        </div>
        <label class="txt">PASSWORD</label>
        <input type="password" name="password" class="inpt">
        <div class="error">
            <?php
            if(!empty($_SESSION['error']))
            {
                if(isset($_SESSION['error']['password']))
                {
                echo $_SESSION['error']['password'];
                }
            }
            unset($_SESSION['error']);
            ?>
        </div>
        <input type="submit" name="submit" class="btn">
        <a href="../Login/Login.php" class="link">LOGIN</a>
    </form>
        </section>
    </section>
</body>

</html> 