<?php 

session_start();
if(isset($_SESSION['logindetail']))
{
    
    if($_SESSION['logindetail']==true)
    {
        unset($_SESSION['logindetail']);
        
        header('location:../Register/signup.php');
    }
}
?>