<?php 
session_start();
$id=$_GET['id'];
$val=[];
foreach($_SESSION['User'] as $key=>$values)
{
    if($id==$_SESSION['User'][$key]['id'])
    {
        unset($_SESSION['User'][$key]);
        header('location:users_data.php');
    }
}

?>