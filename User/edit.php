<!DOCTYPE html>
<html>

<head>
    <title>UPDATE PAGE</title>
    <link rel="stylesheet" type="text/css" href="../css/design.css"> 
</head>

<body>
    <?php
    session_start();
    global $id;
    $id = $_GET['id'];
    foreach ($_SESSION['User'] as $key => $values) {
        global $id;
        $val = [];
        if ($id == $values['id']) {
            $val = $_SESSION['User'][$key];
        }
    }
    if (!empty($_POST['submit'])) {
        $id = (int) filter_var($_POST['submit'], FILTER_SANITIZE_NUMBER_INT);
        foreach ($_SESSION['User'] as $key => $values) 
        {
            if ($values['id']== $id) 
            {
                $_SESSION['User'][$key] = $_POST;
                $_SESSION['User'][$key]['id'] = $id;
                header('location:users_data.php');
            }
        }
    }
    ?>
    <section class="container">
        <section class="frm">
            <form action="" method="POST">
                <label class="txt">FIRST NAME</label>
                <input type="text" name="fname" class="inpt" value=<?php echo $val['fname']; ?>><br>
                <label class="txt">LAST NAME</label>
                <input type="text" name="lname" class="inpt" value=<?php echo $val['lname']; ?>><br>
                <label class="txt">EMAIL</label>
                <input type="email" name="email" class="inpt" value=<?php echo $val['email']; ?>><br>
                <label class="txt">PASSWORD</label>
                <input type="password" name="password" class="inpt" value=<?php echo $val['password']; ?> /><br>
                <input type="submit" name="submit" class="btn" value=<?php echo "EDITID=" . $_GET['id']; ?>>
            </form>
        </section>
    </section>
</body>

</html>