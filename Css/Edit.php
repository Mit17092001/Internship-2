<?php
    session_start();
?>
<html>
    <head>
    <link href="app.css" rel="stylesheet">
    <link href="back.css" rel="stylesheet">
    </head>
    <body class="edit">
        <div class="body">
            <h1>Update Details</h1>
            <form method="post" action="">
                <div class="field">
                    <input type="text" name="name" placeholder="Username" required]>
                </div>
                <div class="field">
                    <input type="text" name="email" placeholder="e-mail" required>
                </div>
                <div class="field">
                    <input type="password" name="password" value="" required>   
                </div>
                <div class="field">
                    <select name="role" placeholder="role"><option value="3">customer</option><option value="2">professional</option></select>
                </div>
                <div class="sub">
                    <input type="submit" name="submit" >
                </div>
            </form>
            <?php
                include("conf.php");
                if(isset($_POST['submit']))
                {
                    
                    $id=$_SESSION['id'];
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
                    $role=$_POST['role'];
                    $hql="SELECT * from `user` where `u_id`='$id'";
                    $hp=mysqli_query($conn,$hql);
                    $h=mysqli_fetch_assoc($hp);
                    echo $h['Role'];
                    if($h['Role']==$role)
                    {
                        $sql="UPDATE `user` SET `name`='$name',`e-mail`='$email',`password`='$password',`Role`='$role' WHERE `u_id`=$id";   
                        $sp=mysqli_query($conn,$sql);
                        //$s=mysqli_fetch_assoc($sp);
                        if($role==2)
                        {
                            $_SESSION['e-mail']=$email;
                            header("location:http://localhost/php/Css/home3.php");
                        }
                        else
                        {
                            $_SESSION['e-mail']=$email;
                            header("location:http://localhost/php/Css/index.php");
                        }
                    }
                    else
                    {
                        if($role==3)
                        {
                            $no=$_SESSION['No'];
                            $nql="DELETE from `profile` where `No`=$no";
                            $np=mysqli_query($conn,$nql);
                            $sql="UPDATE `user` SET `name`='$name',`e-mail`='$email',`password`='$password',`Role`='$role' WHERE `u_id`=$id";   
                            $sp=mysqli_query($conn,$sql);
                            $_SESSION['e-mail']=$email;
                            unset($_SESSION['No']);
                            header("location:http://localhost/php/Css/index.php");
                        }
                        else
                        {
                            $sql="UPDATE `user` SET `name`='$name',`e-mail`='$email',`password`='$password',`Role`='$role' WHERE `u_id`=$id";   
                            $sp=mysqli_query($conn,$sql);
                            $_SESSION['e-mail']=$email;
                            header("location:http://localhost/php/Css/home3.php");
                        }
                    }
                }
            ?>
        </div>
    </body>
</html>