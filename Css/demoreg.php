<html>
    <head>
        <title>

        </title>
        <style>
            .body
            {
                border-style: ridge;
                border-color: aliceblue;
                border-width: 10px;
            }
        </style>
    </head>
    <body>
    <div class="body">
        <div class="reg">
            <form method="post" action="">
                <table id="table">
                    <tr>
                        <td>Name:</td><td> <input type="text" name="name" required></td>
                    </tr>
                    <tr>
                        <td>email:</td><td> <input type="text" name="email" required></td>
                    </tr>
                    <tr>
                        <td>Passsword:</td><td> <input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td>Role:</td><td><select name="role"><option value="3">customer</option><option value="2">professional</option></td>
                    </tr>
                </table>
                <br>
                <input type="submit" name="submit" value="submit">
            </form>
            <p>Already registered</p>
            <a href="index.php"><button>Go to login page</button></a>
            <div class="php">
                <?php
                include "conf.php";
                if (isset($_POST['submit'])) 
                {
                    $name=$_POST['name'];
                    $email = $_POST['email'];
                
                    $password = $_POST['password'];
                
                    $role=$_POST['role'];
                    $hql="SELECT * from `user` where `e-mail`='$email';";
                    $op=mysqli_query($conn,$hql);
                
                    if(mysqli_num_rows($op)==0)
                    {
                    $sql = "INSERT INTO `user`(`name`,  `e-mail`, `password`,`Role` ) VALUES ('$name','$email','$password','$role')";
                
                    $result = $conn->query($sql);
                //$r=mysqli_fetch_assoc($result);
                    
                
                    if ($result == TRUE) 
                    {
                        echo "New record created successfully.";
                    }
                
                    $conn->close(); 
                    }
                    else
                    {
                    echo "<br>";
                    echo "Email already exist. Go to login page.";
                    }
                }
                
                ?>
            </div>
        </div>  
        <div class="login">      
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">            
                <tr><td>email:</td><td> <input type="text" name="email" required class="text"></td></tr>
                <tr><td>password:</td><td> <input type="password" name="password" required class="text"></td></tr></table>
                <button id="log" name="Login" value="Login" class="button">Login</button><br>
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
                                    $_SESSION["name"]=$r['name'];
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
                                header("location:http://localhost/php/Css/home.php");
                            }
                            else
                            {
                                if($name == $r['name'])
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
                                    else{
                                    $pErr="**invalid password";
                                    echo $pErr;     
                                    echo "<br>"; 
                                    }
                                }
                                else
                                {
                                    $nErr="**invalid user-name";
                                    echo $nErr;
                                    echo "<br>";
                                
                                }
                            }
                        }
                    }
                    else
                    {
                        echo "**invalid e-mail";
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
                    }?>
                </div>    
            </form>
        </div>
    </div>
    </body>
</html>
