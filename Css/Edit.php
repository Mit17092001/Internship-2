<?php
    session_start();
?>
<html>
    <head>
        <style>
            body
            {
                background-image: url("circle.jpg");
            }
            .body
            {
                margin-top:30px;
                margin-left:480px;
                border-style:ridge;
                border-color:#fff;
                padding-left:20px;
                margin-right:480px;
                padding-right:20px;
                padding-bottom: 10px;
                background-color: rgba(20,20,20,0.8);
                border-width: 10px;
                
                color: rgb(255,6,140);   
            }
            h1{
                text-align: center;
                color: MediumSeaGreen;
                margin-top:10px;
            }
            .field, .sub
            {
                width:100%;
                height:50px;
                margin-bottom:15px;
               
            }
            .sub input
            {
                background-color: mediumseagreen;
                border: 1px solid mediumseagreen;
                height: 100%;
                width: 100%;
                outline: none;
                padding-left: 15px;
                border-radius: 5px;
                border-bottom-width: 2px;
                font-size: 15px;
            }
            .field input 
            {
                height: 100%;
                width: 100%;
                outline: none;
                padding-left: 15px;
                border-radius: 5px;
                border: 1px solid lightgrey;
                border-bottom-width: 2px;
                font-size: 15px;
              
            }
        </style>
    </head>
    <body>
        <div class="body">
            <h1>Update Details</h1>
        <form method="post" action="">
            <div class="field">
                <input type="text" name="name" placeholder="Username">
            </div>
            <div class="field">
                <input type="text" name="email" placeholder="e-mail">
            </div>
            <div class="field">
                <input type="password" name="password" value="">                
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
                    $password=$_POST['password'];
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
      
    </body>
</html>