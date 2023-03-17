<?php
    
    session_start();
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <title>
            Login
        </title>
        <style>
            body{
                background-image: url("circle.jpg");
                font-family: Arial,Helvetica,sans-serif;
            }
            h1{
                text-align: center;
                color: MediumSeaGreen;
                margin-top:10px;
            }

            .text{
                border-color:#000;
                border-style: groove;
                margin-top:5px;
            }
            .body{
                margin-top:30px;
                margin-left:35%;
                border-style:ridge;
                border-color:#fff;
                padding-left:20px;
                width:300px;
                padding-right:20px;
                padding-bottom: 10px;
                background-color: rgba(20,20,20,0.8);
                border-width: 10px;
               
                color: rgb(255,6,140);    
            }
            .php{
                color:rgb(255,255,255);
            }
            .field
            {    
                width:100%;
                height:50px;
                margin-bottom:15px;
               
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
            .field .buttonup
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
            .field .button
            {
                background-color: MediumSeaGreen;
                height: 100%;
                width: 100%;
                outline: none;
                padding-left: 15px;
                border-radius: 5px;
                border: 1px solid MediumSeaGreen;
                border-bottom-width: 2px;
                font-size: 15px;
                margin-top:15px;
              

            }
            
        </style>
    </head>
    <body>
        
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
                $sql="SELECT * from `user` where `e-mail`='$email'";
                $op=mysqli_query($conn,$sql);
                $r=mysqli_fetch_assoc($op);
                if(mysqli_num_rows($op)==1)
                {
                    if($r['Role']==3 || $r['Role']==1)
                    {            
                        if($password == $r['password'])
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
                            if($password == $r['password'])
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
                        
                            if($password == $r['password'])
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
                echo "**invalid e-mail";
            } 
            }
                /*
                else
                {
                    if($password != $r['password'])
                    {
                        $pErr="*invalid password";
                        echo $pErr;      
                        echo "<br>";
                
                        if($pErr!="")
                            {
                                ?>
                                <script>
                                    $(document).ready(function(){
                                        $('#log').mouseenter(function(){
                                            alert("Please enter valid details");
                                        })
                                    })
                                </script>
                                <?php
                            }
                        else
                            {
                                echo "Details are ok";
                                echo "<br>";
                            }
                    }
                    else
                    {
                        if($nErr!="" || $pErr!="")
                        {
                            echo "*Please enter valid details";
                            echo "<br>";
                        }
                        else
                        {
                            echo "Details are ok";
                            echo "<br>";
                        }
                    }
                }*/
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