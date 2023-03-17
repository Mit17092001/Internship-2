<html>
    <head>
        <style>
            h1
            {
                text-align: center;
                color: MediumSeaGreen;
                margin-top:10px;
            }            
            .ok{
              margin-top:30px;
              margin-left:480px;
              border-style:ridge;
              border-color:#fff;
              border-width:10px;
              margin-right:480px;
              padding-left:20px;
              padding-right:20px;
              background-color: rgba(20,20,20,0.8);
              color:rgb(255,6,140);
            }
            .field
            {
                
                width:100%;
                height:50px;
                margin-bottom:15px;
               
            }
            .field input, .field button
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
            .sub
            {
                width:100%;
                height:50px;
                margin-bottom:15px;
               
            }
            .sub input
            {
                height: 100%;
                width: 100%;
                outline: none;
                padding-left: 15px;
                border-radius: 5px;
                border: 1px solid MediumSeaGreen;
                border-bottom-width: 2px;
                font-size: 15px;
                background-color: MediumSeaGreen;
            }
            body{
              font-family: Arial,Helvetica,sans-serif;
              background-image: url("circle.jpg");
            }
           
            .php{
              padding-top : 5px;
              color: #fff;
              text-shadow:1px 1px red;
              font-size: 15px;
            }
            .field select, .field option
            {
                height: 100%;
                width: 100%;
                outline: none;
                padding-left: 15px;
                border-radius: 5px;
                border: 1px solid lightgray;
                border-bottom-width: 2px;
                font-size: 15px;
                
            }
        </style>
    </head>
    <body>
        <div class="ok">
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
            <h3>**If already registered</h3>
            <div class="field">
                <a href="index.php"><button>Go to login page</button></a>
            </div>
        </div>
    </body>
</html>