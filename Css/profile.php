<?php
    session_start();
?>
<html>
    <head>
    <link href="nav.css" rel="stylesheet">
        <style>
            body
            {
                margin : 0px;
                font-family:Arial, Helvetica, sans-serif;
                background-color: 
            }
           .data
           {
                padding-left:20px;
                padding-right: 20px;
                padding-top:20px;
                border-style:ridge;
                border-color:#447;
                border-width: 20px;
                margin-left:33%;
                width:250px;
                margin-top:10px;
                height:350px;
                background-color:#ddd;
            }
            #table
            {
                color:#333;   
            }
            h1
            {
                text-align:center;
                text-shadow:2px 2px 5px red;
            }
        </style>
    </head>
<body>
<div class="nav-bar">
<a class="img" href="about.php" ><img src="LOGO.jpg"></a>
        <div class="hov">
        <a href="home.php">Home</a>
        <a href="about.php">about</a>
        <a href="contact.html">Contact us</a>
        <a href="prof.php">Profile</a>        </diV>
</div>
    <div class="lo">
        <a href="logout.php"><button class="lo">Logout</button></a>
    </div>
    <h1>Details of professional</h1>
    <div class="data">
        <?php 
            include("conf.php");
            if(isset($_GET['id']))
            {
                    $email=$_SESSION['e-mail'];
                    $pno=$_GET['id'];
                    $sql="SELECT * FROM `profile` WHERE `No`=$pno";
                    $op=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($op);
                    $mql="SELECT * from `sub` where `e-mail`='$email'";
                    $mp=mysqli_query($conn,$mql);
                    if(mysqli_num_rows($mp)==0)
                    {
                        header("location:subscription.php");
                    }
                    else
                    {?>
                        <table>
                            <tr><td>Name</td><td><?php echo ":".$row['name'] ?></td></tr>
                            <tr><td>e-mail</td><td><?php echo ":".$row['e-mail']; ?></td></tr>
                            <tr><td>mobile</td><td><?php echo ":".$row['Mobile No.']; ?></td></tr>
                        </table>
                    <?php }          
            }            
        ?>  
    </div>
</body>
</html>