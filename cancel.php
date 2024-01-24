<?php 
include("connect.php");
$action=$_POST['action'];

if($action=="pur_cancel")
{
    mysqli_query($conn,"TRUNCATE TABLE `purchase_tem`;");
    echo "Bill Cancelled";
}else
{
    mysqli_query($conn,"TRUNCATE TABLE `sale_tem`;");
    echo "Bill Cancelled";
}