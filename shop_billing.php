<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!-- <title></title> -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


    
     <!-- datatabels -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- datatabels -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;0,600;0,700;1,600&display=swap" rel="stylesheet">

</head>
<style>
    .container{
        border:1px solid black;
        padding:40px;
        margin:20px;
        /* margin-top:20px; */
    }
    @media print {
     
      @page {
        margin: 0;
      }
      
      body {
        margin: 0;
      }
    }
    .hedd{
        display:flex;
        justify-content:space-between;
    }
</style>
<body>

<?php 
    $bill=$_GET['bill'];
    include('connect.php');
    $query="SELECT * FROM `sale_tot` WHERE `bill_no`='$bill'";
    $conf=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($conf))
    {
        $partyName=$row['partyName'];
        $partyGST=$row['partyGST'];
        $saleDate=$row['saleDate'];
        $gross_amt=$row['gross_amt'];
        $gstamt=$row['gstamt'];
        $net_tot=$row['net_tot'];
    }
?>
    <div class="container">
        <div class="row">
            <div class="hedd">
            <b style="font-family: 'Source Serif Pro', serif;">GSTIN:29VHIY767HGYU</b>
            <b>CELL:9899876656, 8788765545</b>
            </div>
        </div>

        <div class="row">
            <CENTER>
                <h4>TAX-INVOICE</h4>
                <h1 style="font-family: 'Source Serif Pro', serif;"><b>SHETTYS ENTERPRISES</b></h1>
                <P>1st gate near arjun empire, 3rd floor, belgavi- 590006</P>
            </CENTER>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="heading"style="display:flex;justify-content:space-between;" >
                    <h6>NO: <b style="text-decoration:underline; width:100%;"><?php echo $bill; ?></b></h6>
                    <h6 >Date:<b style="text-decoration:underline; width:100%;"><?php echo $saleDate; ?></b> </h6>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h6>To: <b style="text-decoration:underline; width:100%;"><?php echo $partyName; ?></b></h6>
                <?php 
                    if($partyGST!="")
                    {
                        ?>
                             <h6>Party GSTIN No: <b style="text-decoration:underline; width:100%;"><?php echo $partyGST; ?></b></h6>
                        <?php
                    }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Product</th>
                        <th>HSN</th>
                        <th>Qty</th>
                        <th>Rate</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <?php
                    $q1="SELECT * FROM `sale_data` WHERE `bill_no`='$bill' ORDER BY `slno` ASC";
                    $exc=mysqli_query($conn,$q1);
                    $i=0;
                    while($row=mysqli_fetch_assoc($exc))
                    {
                        ?>
                            <tr>
                                <tbody>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo $row['itemName']; ?></td>
                                    <td><?php echo $row['itemHSN']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td><?php echo number_format($row['rate'],2); ?></td>
                                    <td><?php echo number_format($row['value'],2); ?></td>
                                </tbody>
                            </tr>
                        <?php
                        $i++;
                    }
                    ?>
                        <tr>
                            <td colspan="3"rowspan="3"></td>
                            <td  colspan="2">Total</td>
                            <td><?php echo number_format($gross_amt,2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">CGST 2.5%</td>
                            <td><?php echo number_format($gstamt/2,2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">SGST 2.5%</td>
                            <td><?php echo number_format($gstamt/2,2) ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Note:</b> Goods Once Sold Will Not Be Taken Back Or Exchange</td>
                            <td colspan="2">Grand Total</td>
                            <td><?php echo number_format($net_tot,2) ?></td>

                        </tr>
                    <?php
                ?>
                    <!-- <tr>
                        <td colspan="2">IGST</td>
                        <td>33.87</td>

                    </tr> -->
                    
                </table>
                <div class="fott">
                    <h4 style="float:right;"><b>For Shetty Enterprises</b></h4>
                </div>
            </div>
        </div>
<br>
<br>
        <div class="row">
            <div class="col-md-12">
                <div class="heading"style="display:flex;justify-content:space-between;" >
                    <h5><b>Receiver's Signature</b></h5>
                    <h5 ><b>Authorised Signature</b></h5>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
    $id=$_GET['id'];
?>
<script>
    window.print();
    let id=<?php echo $id; ?>;
    $(window).on("afterprint", function() 
    {
        if(id==0)
        {
            window.location="product_sale.php";
        }else
        {
            window.location="sales-bill.php";
        }
    });
</script>
