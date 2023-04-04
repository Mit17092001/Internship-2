
<html>
    <head>
        <link href="nav.css" rel="stylesheet">
        <style>
            body{
                font-family:Arial, Helvetica, sans-serif ;
                color: orangered;
                background-color: #fff;
                margin: 0px;
               
            }
          
            .mat
            {
                width:200px;
                margin: auto;
                margin-top: 40px;
            }
            .detail{
                margin:auto;
                width: 400px;
                border:solid black;
                text-align:center;
                padding-top:15px;
                padding-right:20px;
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
                <a href="prof.php">Profile</a>     
            </div>
        </div>
        <div class="lo">
            <a href="logout.php"><button class="lo">Logout</button></a>
        </div>
        <div class="body">
            <div class=mat>
                <form method="post">
                    <select name="city" style="margin:auto">
                        <option value="Ahmedabad">Ahmedabad</option>
                        <option value="Surat">Surat</option>
                        <option value="vadodara">vadodara</option>
                        <option value="Gandhinagar">Gandhinagar</option>
                    </select>
                    <input type="submit" name="submit">
                </form>
            </div>
            <div class="detail">
                <?php
                    include ("conf.php");
                    if(isset($_POST["submit"]))
                    {
                        $city=$_POST["city"];
                        $sql="SELECT * from `profile` where `city`='$city' and `profile`='plumber'";
                        $op=mysqli_query($conn,$sql);   
                        while($row=mysqli_fetch_assoc($op))
                        {
                            echo "Name: ".$row['name']." <br>City: " .$row['city']."<br>Mobile No.: xxxxxxxxxx";
                            echo "<br>";
                            ?><a href="profile.php?id=<?php echo $row['No'];?>"><button>View Details</button></a><?php
                            echo "<br>";
                            echo"<br><br>";
                        } 
            
                    }
                ?>
            </div>
        </div>
</body>
</html>