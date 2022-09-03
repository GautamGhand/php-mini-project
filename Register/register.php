<?php 
include('../Login/validation.php');
if(!empty($_POST['submit']))
{
    session_start();
    $error=[];
    $error['error'] = validateName($_POST['fname'],'fname');
    $error['error'] = validateName($_POST['lname'],'lname');
    $error['error']=validateEmail($_POST['email'],$_POST['password']);

    if(!empty($error['error']))
    {
        $_SESSION['error']=$error['error'];
        header('location:signup.php');
        
    }
    else
    {
        if(!empty($_SESSION['error']))
        {
            unset($_SESSION['error']);
        }
        $user_count=isset($_SESSION['User'])?count($_SESSION['User']):0;
        $_POST['id']=$user_count+1;
        $_SESSION['User'][]=$_POST;
        header('location:../Login/Login.php');     
    }
}

?>

