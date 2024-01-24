<?php 
include("connect.php");
   if(isset($_POST['username']))
   {
        $user=$_POST['username'];
        $pass=$_POST['password'];
        
        $sql="SELECT * FROM `login` WHERE `username`='$user' AND`password`='$pass';";
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)<>0)
        {
            session_start();
            $_SESSION['type']="admin";
            echo "<script> window.location='purchase-product.php'; </script>";
        }
            else
            {
                echo "<span style='color:red; font-size:14px;'>Incorrect Username Or Password</span>";
            }
  }
?>