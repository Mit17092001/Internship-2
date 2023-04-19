<?php
    
    session_start();
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="app.css" rel="stylesheet">
    <link href="back.css" rel="stylesheet">
        <title>
            Login
        </title>
        
    </head>
    <body class="index">
        
        <div class="body">
        <h1>Login Form</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="field">
                <input type="text" name="email" placeholder="E-mail" required class="text"><br>
            </div>
            <div class="field">
                <input type="password" name="password" placeholder="password" required class="text"><br>
            </div>
            <div class="field">
                <button id="log" name="Login" value="Login" class="button">Login</button><br>
            </div>
            
        
        </form>
        <div class="php">
            <?php
            include("conf.php");
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {   
                $nErr=$pErr="";
                $email=$_POST['email'];
                $password=$_POST['password'];
                $sql="SELECT * from `user` where `e-mail`='$email' && `is_verified`='1'";
                $op=mysqli_query($conn,$sql);
                $r=mysqli_fetch_assoc($op);
                if(mysqli_num_rows($op)==1)
                {
                    if($r['Role']==3 || $r['Role']==1)
                    {            
                        if(password_verify($password,$r['password']))
                        {
                        // $_SESSION["name"]=$r['name'];
                            $_SESSION["e-mail"]=$r['e-mail'];
                            if(isset($_SESSION['e-mail']))
                            {?>
                            
                            <?php    header("location:http://localhost/php/Css/home.php");
                            }
                        }        
                        else
                        {
                            $pErr="**invalid password";
                            echo $pErr;     
                            echo "<br>"; 
                        }
                    }
                    else
                    {
                        $sql="SELECT * FROM `profile` WHERE `e-mail`='$email'";
                        $lp=mysqli_query($conn,$sql);
                        $y=mysqli_fetch_assoc($lp);
                        if(mysqli_num_rows($lp)==1)
                        {
                            if(password_verify($password,$r['password']))
                            {
                                $_SESSION["e-mail"]=$r['e-mail'];
                                header("location:http://localhost/php/Css/home.php");
                            }
                            else
                            {
                                $pErr="**invalid password";
                                echo $pErr;     
                            
                            }
                        }
                        else
                        {
                        
                            if(password_verify($password,$r['password']))
                            {
                                $_SESSION["name"]=$r['name'];
                                $_SESSION["e-mail"]=$r['e-mail'];
                                if(isset($_SESSION['e-mail']))
                                {
                                    header("location:http://localhost/php/Css/home3.php");
                                }
                            }        
                            else
                                {
                                $pErr="**invalid password";
                                echo $pErr;     
                              
                            }
                        }
                    }
                }

                else
                {
                    $mpl="SELECT * FROM `user` where `e-mail`='$email'";
                    $mp=mysqli_query($conn,$mpl);
                    if(mysqli_num_rows($mp)==0)
                        {
                            echo "**invalid e-mail";
                        }
                        else
                        {
                            echo "**User is not verified";
                        }
                } 
            }
            ?>
</div>
        <br><br>
        <div class="logup">
           <h3>**New User Register First</h3>
            <div class="field">       
                <a href="reg.php"><button class="buttonup">SIGN UP</button></a>
            </div>
        </div>
</div>
    </body>
</html>