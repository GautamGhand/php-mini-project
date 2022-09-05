<?php 
include('../Login/validation.php');
if(pageblock()==true)
{
    header('location:../User/users_data.php');
}
if(!empty($_POST['submit']))
{
    session_start();
$ex=[];
    $ex['error'] = validateName($_POST['fname'],'fname');
    $ex['error'] = validateName($_POST['lname'],'lname');
    $ex['error']=validateEmail($_POST['email'],$_POST['password']);
    $ex['error']=validateEmailExists($_POST['email']);

    if(!empty($ex['error']))
    {
        $_SESSION['error']=$ex['error'];
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

