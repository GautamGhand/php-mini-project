<?php 
session_start();
include('validation.php');
if(isset($_SESSION['logindetail']))
{
    if($_SESSION['logindetail']==true)
    {
        header('location:../User/users_data.php');
    }
}

if(isset($_POST['submit']))
{
    $_SESSION['error']=[];
    $error =[];
    global $flag;
    $flag=0;
    $error['error']=validateEmail($_POST['email'],$_POST['password']);

    if(!empty($error['error']))
    {
        $_SESSION['error']=$error['error'];
        header('location:Login.php');
        
    }
    else
    {
        global $flag;
        $username=$_POST['email'];
        $password=$_POST['password'];
        foreach($_SESSION['User'] as $key=>$values)
        {
            if($username==$values['email'] && $password==$values['password'])
            {
                $flag=1;
                $_SESSION['uname']=$values['fname'];
                break;
            }
        }
        if($flag==1)
        {
            $_SESSION['logindetail']=true;
            $_SESSION['logintime']=time();
            header('location:../User/users_data.php');
        }
        else
        {
            echo "<h1 style=\"text-align:center;\">Login Failed</h1>";
        }    
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" type="text/css" href="../css/design.css"> 
    </head>

<body>
    <section class="container">
<section class="frm">
    <form action="Login.php" method="POST">
        <label class="txt">USERNAME</label>
        <input type="email" name="email" class="inpt"><br>
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
        <input type="password" name="password" class="inpt"><br>
        <div class="error">
            <?php
                 if(!empty($_SESSION['error']))
                 {
                     if(isset($_SESSION['error']['password']))
                     {
                     echo $_SESSION['error']['password'];
                     }
                 }
                //  unset($_SESSION['error']);
            ?>
        </div>
        <input type="submit" name="submit" class="btn">
    </form>
</section>
    </section>
</body>

</html>