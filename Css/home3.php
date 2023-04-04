<?php
    session_start();
?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
             body 
            {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                background-image: url("backhome3.jpg");
                background-repeat: no-repeat;
            }
            .wel
            {
                text-align:center;
                font-family: arialArial, Helvetica, sans-serif;
                margin-top:40px;
                margin-bottom: 20px;
                font-size: 30px;
                color:rgb(8, 45, 63);
               
            }
            .field
            {
                width:100%;
                height:30px;
                margin-bottom: 5px;
               
            }
            .field input
            {
                border: 1px solid;
                border-right-color: #ddd;
                border-left-color: aqua;
                border-bottom-color: pink;
                border-top-color: lightyellow;
                height: 100%;
                width: 100%;
                outline: none;
                padding-left: 15px;
                border-radius: 5px;
                border-bottom-width: 2px;
                font-size: 15px;
            }
            .sub
            {
                width:100px;
                height:30px;
                margin-top:10px;
               
            }
            .sub button
            {
                border: 1px solid mediumseagreen;
                background-color: mediumseagreen;
                height: 100%;
                width: 100%;
                outline: none;
                padding-left: 15px;
                border-radius: 5px;
                border-bottom-width: 2px;
                font-size: 15px;
            }
            .body
            {
                border-style: ridge;
                border-right-color: #ddd;
                border-left-color: aqua;
                border-bottom-color: pink;
                border-top-color: lightyellow;
                border-width: 10px;    
                background-color: rgba(255,255,255,0.4);
                margin-left:400px;
                margin-right:400px;
                align-items: center;
                padding-top:3px;
                padding-bottom: 40px;
                padding-left: 150px;
                color:rgb(8, 45, 63);
            }
            .lo .lo{
                float:right;
                background-color:#333;
                color:#fff;
                border-color: #333;
                margin-right:20px;
                padding-left:35px;
                padding-right:35px;
                padding-top:10px;
                top: 0px;
                padding-bottom:15px;
                border-bottom-left-radius: 12px;
                border-bottom-right-radius: 12px;
                border-style: none;
                font-size: 17px;
            }
            .lo .lo:hover
            {
                font-size: 17px;
                background-color:rgb(25, 163, 236);
                border-left: 1px solid rgb(8, 45, 63);
                border-right: 1px solid rgb(8, 45, 63);
                border-bottom: 1px solid rgb(8, 45, 63);
                color:rgb(8, 45, 63);
            }
            td
            {
                font-size: 20px;
            }
            table
            {
                color:rgb(8, 45, 63);
            }
        </style>
    </head>
    <body>
        <div class="lo">
            <a href="logout.php"><button class="lo">Logout</button></a>
        </div>

        <br>
        <div class="wel"><b>
              <p>Welcome professional PM&E is here to make your skills useful.</p>
                
                </b>
            </div>
        <div class="body">    
            
                    
                <form method="post" action="">
                    <h2>Personal Details :</h2>
                    <table>
                        <tr><td>Name:</td><td> <div class='field'><input type="text" name="name" required></div></td></tr>
                        <tr><td>city:</td><td><div class="field"> <input type="text" name="add" required></div></td></tr>
                        <tr><td> profile:</td><td> <div class="field"><input type="text" name="profile" required></div></td></tr>
                    </table>
                   
                    <h2>Contact Details :</h2>
                    <table>
                        <tr><td>Mobile No.:</td><td><div class="field"><input type="text" name="number" required></div></td></tr>
                        <tr><td>e-mail:</td><td><div class="field"> <input type="text"   name="e-mail" value="<?php echo $_SESSION["e-mail"] ; ?>" required></div></td></tr>
                    </table>
                    <div class="sub">
                        <button type="submit" name="submit">submit</button>
                    </div>
                </form>
                <?php
                    include("conf.php");
                    if($_SERVER["REQUEST_METHOD"]=="POST")
                    {
                        
                        $name=$_POST['name'];
                        $address=$_POST['add'];
                        $profile=$_POST['profile'];
                        $mobile=$_POST['number'];
                        $email=$_POST['e-mail'];
                        $mo=$_POST['number'];
                        $sql="SELECT * FROM `profiles`where `profile`='$profile'";
                        $op=mysqli_query($conn,$sql);
                        $r=mysqli_fetch_assoc($op);
                        if(isset($_SESSION['No']))
                        {
                            if(mysqli_num_rows($op)==1)
                            {
                                $no=$_SESSION['No'];
                                $pid=$r['p_id'];
                                $uql="UPDATE `profile` SET `name`='$name',`profile`='$profile',`p_id`='$pid',`city`='$address',`e-mail`='$email',`Mobile No.`=$mo WHERE `No`= $no ";
                                $up=mysqli_query($conn,$uql);
                                //$u=mysqli_fetch_assoc($up);                                
                            }
                            else
                            {
                                $pql="INSERT into `profiles` (`profile`) VALUES ('$profile')";
                                $pp=mysqli_query($conn,$pql);
                                $sql="SELECT * FROM `profiles`where `profile`='$profile'";
                                $sp=mysqli_query($conn,$sql);
                                $t=mysqli_fetch_assoc($sp);
                                $pid=$t['p_id'];
                                $no=$_SESSION['No'];
                                $uql="UPDATE `profile` SET `name`='$name',`profile`='$profile',`p_id`='',`city`='$$address',`e-mail`='$email',`Mobile No.`=$mo WHERE `No`=$no";
                                $up=mysqli_query($conn,$uql);
                                $u=mysqli_fetch_assoc($up);
                            }
                            header("location:http://localhost/php/Css/index.php");
                            
                        }
                        /*if(mysqli_num_rows($op)==1)
                        {
                            $no=$_SESSION['No'];
                            $pid=$r['p_id'];
                            if(mysqli_num_rows($mp)==1)
                            {
                                $uql="UPDATE `profile` SET `name`='$name',`profile`='$profile',`p_id`='$pid',`city`='$address',`e-mail`='$email' WHERE `No`=$no";
                                $up=mysqli_query($conn,$uql);
                                //$u=mysqli_fetch_assoc($up);                                
                                header("location:http://localhost/php/Css/index.php");
                            }
                            else
                            {
                                $hql="INSERT INTO `profile`(`name`, `profile`, `p_id`, `city`,`e-mail`) VALUES ('$name','$profile','$pid','$address','$email')";
                                $hp=mysqli_query($conn,$hql);
                                header("location:http://localhost/php/Css/index.php");
                            }
                        }*/
                        else
                        {
                           
                            if(mysqli_num_rows($op)==1)
                            {
                                $pid=$r['p_id'];
                                $hql="INSERT INTO `profile`(`name`, `profile`, `p_id`, `city`,`e-mail`,`Mobile No.`) VALUES ('$name','$profile','$pid','$address','$email',$mo)";
                                $hp=mysqli_query($conn,$hql);
                            }
                            else
                            {
                                $pql="INSERT into `profiles` (`profile`) VALUES ('$profile')";
                                $pp=mysqli_query($conn,$pql);
                                $sql="SELECT * FROM `profiles`where `profile`='$profile'";
                                $sp=mysqli_query($conn,$sql);
                               // $t=mysqli_fetch_assoc($sp);
                                $pid=$t['p_id'];
                                $no=$_SESSION['No'];                                      
                                $hql="INSERT INTO `profile`(`name`, `profile`, `p_id`, `city`,`e-mail`,`Mobile No.`) VALUES ('$name','$profile','$pid','$address','$email',$mo)";
                                $hp=mysqli_query($conn,$hql);
                            }
                            header("location:http://localhost/php/Css/index.php");
                            
                        }
                      
                    }
                ?>
        </div>
    </body>
</html>