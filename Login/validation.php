
<?php
global $error;
$error=[];
function pageblock()
{
    if(isset($_SESSION['logindetail']))
    {
        if($_SESSION['logindetail']==true)
        {
        return true;
        }
        else
        {
        return false;
        }
    }
}
    function validateName($name,$key)
        {
            global $error;
            if(is_numeric($name) || preg_match('/[^a-z_+-0-9]/i',$name))
            {       
                $error[$key]="Please Enter Correct Name";
            }
            for($i=0;$i<strlen($name);$i++)
            {
                if($name[$i]==" ")
                {
                    $error[$key]="Please Don't Enter space in Name";
                    break;
                }
            }
            if(empty($name))
            {
                $error[$key]="Name is Required";
            }
            return $error;

        }
        function validateEmail($email,$password)
        {
            global $error;
            if(empty($email))
            {
                $error['email'] = "Email is required";
            }
            // if(filter_var($email, FILTER_VALIDATE_EMAIL))
            // {
            //         $error['email']="please enter valid email";
            // }
            if(empty($password))
            {
                $error['password']="Password is required";
            }
            return $error;
        }

        function validateEmailExists($email)
        {
            global $error;
            foreach($_SESSION['User'] as $key=>$values)
            {
                if($email==$values['email'])
                {
                    $error['email']="Email Already Exists";
                    break;
                }                
            }
            return $error;
        }
?>

