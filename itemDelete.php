<?php 
include("connect.php");

$idd=$_POST['idd'];
if($idd==0)
{
    $id=$_POST['id'];
    $q="DELETE FROM `sale_tem` WHERE `itemHSN`='$id';";
    mysqli_query($conn,$q);
    echo 'Product Deleted';
}else
{
    $id=$_POST['id'];
    $q="DELETE FROM `purchase_tem` WHERE `slno`='$id';";
    mysqli_query($conn,$q);
    echo 'Product Deleted';
    
}
?>