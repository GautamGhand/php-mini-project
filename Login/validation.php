
<?php
    function validateName($name,$key)
        {
            if(is_numeric($name) || preg_match('/[^a-z_+-0-9]/i',$name))
            {       
                $_SESSION['error'][$key]="Please Enter Correct Name";
            }
            for($i=0;$i<strlen($name);$i++)
            {
                if($name[$i]==" ")
                {
                    $_SESSION['error'][$key]="Please Don't Enter space in Name";
                    break;
                }
            }
            if(empty($name))
            {
                $_SESSION['error'][$key]="Name is Required";
            }
            return $_SESSION['error'];

        }
        function validateEmail($email,$password)
        {
            if(empty($email))
            {
                $_SESSION['error']['email'] = "Email is required";
            }
            else
            {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $_SESSION['error']['email']="please enter valid email";
                }
            }
            if(empty($password))
            {
                $_SESSION['error']['password']="Password is required";
            }
            return $_SESSION['error'];
        }
?>

