<?php
session_start();
?>
<html>
    <head>
        <link href="nav.css" rel="stylesheet">
        <link href="app.css" rel="stylesheet">
        <style>
            body
            {
                margin:0px;
                background-color:#000;
                font-family: Arial, Helvetica, sans-serif;
                color:#fff;    
            }
            .main .pro
            {
                margin-top:30px;
                float:left;
                width: 82%;
                height: 100%;
            }
            p{
                color:#fff;
            }
            
            img
            {
                border-style:ridge;
                border-color:#fff;
                border-width:5px;
                border-radius:50%;
               
            }
            #table
            {
                margin-top:20px;
                margin-left:20px;
            }
            </style>
    </head> 
    <body class="prof">
        <div class="main">
            <div class="navv">
               
                <a href="home.php" style="text-decoration:none; "><div class="box">Home</div></a>   
                <a href="about.php" style="text-decoration:none; "><div class="box">About</div></a>
                <a href="contact.html" style="text-decoration:none; "><div class="box">Contact</div></a>
                <a href="prof.php" class="active"  style="text-decoration:none; "><div class="box">Profile</div></a>
            </div>
            <div class="pro">
                <div class="data">   
                    <img src="avatar.jpg" alt="profile" style="border-color:#fff;">
                        <table id="table">
                            <?php
                            include("conf.php");
                            $email=$_SESSION['e-mail'];
                                $sql="SELECT * from `user` where `e-mail`='$email';";
                                $op=mysqli_query($conn,$sql);
                                $r=mysqli_fetch_assoc($op);
                                $_SESSION['id']=$r['u_id'];
                            ?>
                            <tr><td>Name</td><td>:</td><td><?php echo $r["name"]; ?></td></tr>
                            <tr><td>E-mail</td><td>:</td><td><?php echo $r["e-mail"]; ?></td></tr>
                        </table>
                        <br>
                        <?php

                        if($r['Role']==2)
                        {  
                            $mql="SELECT * from `profile` WHERE `e-mail`='$email'";
                            $mp=mysqli_query($conn,$mql);
                            $m=mysqli_fetch_assoc($mp);
                            $_SESSION['No']=$m['No'];
                        }
                        ?>
                        <a href="Edit.php"><button>Edit Profile</button></a>
                </div>
            </div>
            <div class="lo">
                <a href="logout.php"><button class="lo">Logout</button></a>
            </div>
        </div>
    </body>
</html>