<?php 
session_start();
include('../Login/validation.php');
 if(pageblock()==false)
 {
    header('location:../Register/signup.php');
 }
   ?>
<!DOCTYPE html>
<html>

<head>
    <title>USERS DATA PAGE</title>
    <link rel="stylesheet" type="text/css" href="../css/design.css">  
</head>

<body>
    <table cellspacing= 0>
        <th>ID</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>EMAIL</th>
        <th>EDIT</th>
        <th>DELETE</th>
        <nav>
        <h2 class="heading">WELCOME <?php echo strtoupper($_SESSION['uname'])?></h2>
        <h2 class="heading">LAST LOGIN TIME<?php echo $_SESSION['logintime']?></h2>
        <a href="logout.php" class="link logout">LOGOUT</a>
        </nav>
        
        <?php 
        
            foreach($_SESSION['User'] as $key=>$values)
            {
                echo "<tr>";
                if(isset($_SESSION['User']))
                {
        ?>
                     <td><?php echo $values['id'] ?></td>
                    <td><?php echo $values['fname'] ?></td>
                    <td><?php echo $values['lname'] ?></td>
                    <td><?php echo $values['email'] ?></td>
                    <td><?php echo "<a href=\"edit.php?id=".$values['id']."\" class=\"link\">EDIT</a>"?></td>
                    <td><?php echo "<a href=\"delete.php?id=".$values['id']."\" class=\"link\">DELETE</a>"?></td>
 <?php              
                }
            }
        ?>
    </table>
    <?php
     if(empty($_SESSION['User']))
     {
         echo "<h1>NO RECORDS FOUND</h1>";
     }
     ?>
    
</body>

</html>