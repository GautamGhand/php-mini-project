<?php 
session_start();
include('validation.php');
if(pageblock())
{
    header('location:../User/users_data.php');
}
if(isset($_POST['submit']))
{
    
    
    $ex=[];
    global $flag;
    $flag=0;
    $ex['error']=validateEmail($_POST['email'],$_POST['password']);
    

    if(!empty($ex['error']))
    {
        $_SESSION['error']=$ex['error'];
       
        header('location:Login.php');
        
    }
    else
    {
        if(!empty($ex['error']))
        {
            unset($_SESSION['error']);
            
        }
        global $flag;
        $username=$_POST['email'];
        $password=$_POST['password'];
        foreach($_SESSION['User'] as $key=>$values)
        {
            if($username==$values['email'] && $password==$values['password'])
            {
                $_SESSION['logindetail']=true;
                $_SESSION['logintime']=time();
                header('location:../User/users_data.php');
                $_SESSION['uname']=$values['fname'];
                break;
            }
            else
            {
                $flag=0;
            }
        }
        if($flag==0)
        {
                echo "Login failed";
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
    <form action="Login.php" method="post">
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
            ?>
        </div>
        <input type="submit" name="submit" class="btn">
    </form>
</section>
    </section>
</body>

</html>