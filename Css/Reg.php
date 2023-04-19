<html>
    <head>
    <link href="app.css" rel="stylesheet">
    <link href="back.css" rel="stylesheet">
    
        
    </head>
    <body class="reg">
        
        <div class="body">
            <h1>Sign-UP Form</h1>
            <form method="post" action="">
                <div class="field">
                    <input type="name" placeholder="Username" name="name" required>
                </div>
                <div class="field">
                    <input type="name" placeholder="E-mail" name="email" required >
                </div>
                <div class="field">
                    <input type="password" placeholder="password" name="password" required>
                </div>
                <div class="field">
                    <select name="role" placeholder="role"><option value="3">customer</option><option value="2">professional</option></select>
                </div>
                <div class="sub">
                    <input type="submit" name="submit" value="submit" >
                </div>
            </form>
            <div class="php">
        <?php
        include "conf.php";
       
function sendmail($email,$vcode)
    {        
        $receiver = $email;
        $subject = "Email verification";
        // $body = "Hi, Hwt we are happy to tell you that we have started our website kindly join with us for your comfort";
        $body = "Hi, there to verify your mail click here <a href='http://localhost/php/Css/verify.php?email=$email & vcode=$vcode'>VERIFY</a>";
        $sender = "From:homeservice.pme@gmail.com";
        $sender  .= 'MIME-Version: Homeservice' . "\r\n";
        $sender  .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        if(mail($receiver, $subject, $body, $sender))
        {
            echo "Email sent successfully to $receiver";
        }
        else
        {
            echo "Sorry, failed while sending mail!";
        }
    }
        
        if (isset($_POST['submit'])) 
        {
            $name=$_POST['name'];
            $vcode=bin2hex(random_bytes(16));
            $email = $_POST['email'];

            $password =password_hash( $_POST['password'],PASSWORD_BCRYPT);

            $role=$_POST['role'];
            $hql="SELECT * from `user` where `e-mail`='$email';";
            $op=mysqli_query($conn,$hql);

            if(mysqli_num_rows($op)==0)
            {
                $sql = "INSERT INTO `user`(`name`,  `e-mail`, `password`,`Role`,`vcode`) VALUES ('$name','$email','$password','$role','$vcode')";

                

                if (mysqli_query($conn,$sql) && sendmail($email,$vcode)) 
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
            <h3>**If already registered</h3>
            <div class="field">
                <a href="index.php"><button class="buttonup">Go to login page</button></a>
            </div>
        </div>
    </body>
</html>