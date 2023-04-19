<div style="text-align:center;"><?php
    include('conf.php');
    if(isset($_GET['email']))
    {
        $hql="SELECT * FROM `user` where `e-mail`='$_GET[email]' AND `vcode`='$_GET[vcode]'";
        $hp=mysqli_query($conn,$hql);
        if($hp)
        {
            if(mysqli_num_rows($hp)==1)
            {
                $result=mysqli_fetch_assoc($hp);
                if($result['is_verified']==0)
                {
                    $uql="UPDATE `user` set `is_verified`='1' where `e-mail`='$_GET[email]'";
                    $up=mysqli_query($conn,$uql);
                    echo 'Registered successfully. Click here to go to login..';
                    ?><a href="index.php" style="font-size:20px;color:red">Go to Login</a><?php
                }
                else
                {
                    echo 'Already registered. Click here to go to login..';
                    ?><a href="index.php" style="font-size:20px;color:red">Go to Login</a><?php   
                }
            }
            else
            {
                echo 'Connection Error';
            }

        }
        else
        {
            echo 'Connection Error';

        }
    }
    else
    {
        echo 'Connection Error';        
    }
?>
</div>