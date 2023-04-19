<?php 
    session_start();
    if(isset($_SESSION["name"]))
    ?>
        

<html>
    <head>

        <title>home page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="nav.css" rel="stylesheet">
        <link href="back.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
           .box:hover
            {
                width: 23%;
                height:150px;
                float:left;
                border-style: inset;
                border-width: 10px;
                border-color: rgb(120, 00, 120);
                background-color:  rgba(120, 00, 120, 0.5);
                text-align: center;
                color: #ddd;
                margin-left:6%;
            }
            .container
            {
                margin-top: 180px;
                margin-left: auto;
                margin-right: auto;
                color: #ddd;
            }
            .box
            {
                width: 23%;
                height:150px;
                float:left;
                border-style: outset;
                border-width: 10px;
                border-color: rgb(22, 120, 177);
                background-color:  rgba(22, 120, 177, 0.5);
                text-align: center;
                margin-left:6%;
                color: #026129;
                font-size:25px;
                margin-bottom:20px;
                line-height:150px;
            }
            
        </style>
        <!-- <script>
            function showHint(str) 
            {
                if (str.length == 0) 
                {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }   
                else    
                {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                    
                        if (this.readyState == 4 && this.status == 200) 
                        {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    }
                    xmlhttp.open("GET", "gethint.php?q="+str, true);
                    xmlhttp.send();
                }
            }
        </script> -->
    </head>
    <body class="home">
   
        <div class="nav-bar">
            <a class="img" href="about.php" ><img src="LOGO.jpg"></a>
            <a class="active" href="home.php">Home</a>
            <div class="hov">
            
            <a href="about.php">about</a>
            <a href="contact.html">Contact us</a>
            <a href="prof.php">Profile</a>   
            </div>
            <div class="search-bar">
                <form method="POST" action="action.php">
                    <input type="text" placeholder="search" name="search" >
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>              
            </div>
        </div>
        <div class="lo">
           <button onclick="myfunction()" class="lo">Logout</button>
        </div>
        <script>
            function myfunction()
            {
                if (confirm("Really want to logout !!")) 
                {
                    window.location.assign("index.php")
                } 
                else 
                {
                    window.location.assign("home.php")
                }
                
            }
        </script>
        <div class="container">
            
                <a href="Plumber.php"><div class="box">Plumber</div></a>
            <a href="Electrician.php"><div class="box">Electrician</div></a>
                <a href="mechanic.php"><div class="box">mechanic</div></a>
                <a href="mason.php"><div class="box">mason</div></a>
                <a href="security-Guard.php"><div class="box">Security-Guard</div></a>
                <a href="gardner.php"><div class="box">gardener</div></a>
            </div>
        </div> 
    </body>
</html>