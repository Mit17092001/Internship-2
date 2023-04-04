<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
h1{
    text-align:center;
    color:#ccc;
}
            body 
            {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                max-width:100%;
                background-color:rgb(227,65,50);
                
            }
            p
            { 
                font-size:15px;
                color:#fff;
                line-height: 20px;
                padding-left:150px;
                padding-right:150px;
                padding-top:35px;
                
            }
            .port{
                
                width:auto;
                height:auto;
                
            }
            img
            {
                max-width:100%;
            }
            .nav-bar {
            overflow: hidden;
            background-color: #333;
           

        }
        .hov a:hover {
            color: #000;
            background-color: rgb(227,65,50);

        }
        .nav-bar a{
            color: #ddd;
            text-align: center;
            float: left;
            text-decoration: none;
            padding: 14px 16px;
            font-size: 17px;
        }
        .nav-bar a.active{
            background-color: rgb(22, 120, 177);
            color: white;
        }
        .nav-bar a.img
        {
            float: right;  
            max-height:10px;
           
            padding-top:5px;
            
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
            padding-bottom:15px;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
            border-style: none;
            font-size: 17px;
            
        }
        .lo .lo:hover
            {
                background-color:rgb(227,65,50);
                color: black;
            }
        </style>
    </head>
<body>
    <div class="nav-bar">
        <a class="img" href="about.php" ><img src="LOGO.jpg"></a>
        <div class="hov">
        <a href="home.php">Home</a>
        
        <a class="active" href="about.php">about</a>
        <a href="contact.html">Contact us</a>
        <a href="prof.php">Profile</a>
        </div>
    </div>
    <div class="lo">
        <a href="logout.php"><button class="lo">Logout</button></a>
</div>
    <div class="port">
        <img src="back2.jpg">
    </div>
</body>
</html>