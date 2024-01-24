<table class="fixed_header5 table table-bordered" id="table">
    <thead>
        <tr>
            <th style="display:none;">Sl No</th>
            <th>Sl No</th>
            <!-- <thone;">Item Id</th> -->
            <th>Item Name</th>
            <th>Item HSN</th>
            <th>Quantity</th>
            <th>Item Rate</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
        <?php include("connect.php");
            $total=0;
            $net=0;
            $q='SELECT * FROM `sale_tem` ORDER BY `slno` ASC';
            $conf=mysqli_query($conn,$q)or die(mysqli_error());
            if(mysqli_num_rows($conf)>0)
            {
                $i=0;
                while($row=mysqli_fetch_array($conf))
                {
                    $total +=$row['value'];
                   
                    ?>
                    <tr>
                        <td style="display:none;"><?php echo $row['slno']; ?></td>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $row['itemName']; ?></td>
                        <td><?php echo $row['itemHSN']; ?></td>
                        <td><?php echo $row['qty']; ?></td>
                        <td><?php echo $row['rate']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                    </tr>
                    <?php
                }
                $net=($total*5)/100;
                $i++;
            }
       ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-10">
        <table class="table-bordered tab" style="width:100%;">
            <tr>
                <th></th>
                <th>Gross Total</th>
                <th>CGST</th>
                <th>Amount</th>
                <th>SGST</th>
                <th>Amount</th>
                <th>Total</th>
            </tr>
            <tr>
                <th>5 % GST</th>
                <td><?php echo number_format($total,2); ?></td>
                <td>2.5%</td>
                <td><?php echo number_format($net/2,2); ?></td>
                <td>2.5%</td>
                <td><?php echo number_format($net/2,2); ?></td>
                <th><?php echo number_format($net+$total); ?></th>
            </tr>
            <!-- <tr>
                <th>Total</th>
                <td><?php echo number_format($total,2); ?></td>
                <td></td>
                <td><?php echo number_format($net/2,2); ?></td>
                <td></td>
                <td><?php echo number_format($net/2,2); ?></td>
                <th><?php echo number_format($net+$total); ?></th>
            </tr> -->
        </table>
    </div>
    <div class="col-md-2">

        <input type="button" name="Save" value="Print" class="col-md-12 input-sm btn-success" id="print" style="margin-top:15px;">
        <input type="button" name="Cancel" value="Cancel" class="col-md-12 input-sm btn-danger" id="cancel" style="margin-top:15px;" onclick="cancel()">
    </div>
</div>


<?php 
    $currentDate = date('Y-m-d');
    // echo $currentDate;
?>
<input type="text" name="" value="<?php echo $total; ?>" id="gtotal" style="display: none;">
<input type="text" name="" value="<?php echo $net+$total; ?>" id="ntotal" style="display: none;">
<!-- <input type="text" name="" value="<?php echo 5; ?>" id="gst" style="display: none;"> -->
<input type="text" name="" value="<?php echo $net; ?>" id="gstamt" style="display: none;">
<input type="date" name="" value="<?php echo $currentDate; ?>" id="date" style="display: none;">

<script type="text/javascript">
    $('#print').click(function() 
    {
        var gtotal = $('#gtotal').val();
        var ntotal = $('#ntotal').val();
        var gstamt = $('#gstamt').val();
        var client_name = $('#client_name').val();
        var party_gst = $('#party_gst').val();
        // var date = $('#date').val();
        var yourDateValue = new Date();
        var date = yourDateValue.toISOString().substr(0, 10);
        if(gtotal !='' && gtotal !=0 && client_name !='')
        {
            $.ajax({
                type: "post",
                url: "sale_product_ajax.php",
                data: {
                    gtotal: gtotal,
                    ntotal: ntotal,
                    gstamt:gstamt,
                    client_name:client_name,
                    party_gst:party_gst,
                    date: date,
                },
                success: function(status) 
                {
                    alert("Invoice Created");
                    // alert(status);
                    window.location="shop_billing.php?bill="+status+"&id="+0;
                }
            });
        }else
        {
            alert('Feilds Are Required');
        }
    });

    // $(document).ready(function(){
    //     $("#table tbody").on('dblclick', 'tr', function() {
    //     var currow = $(this).closest('tr');
    //     var id = currow.find('td:eq(0)').html();
    //     var name = currow.find('td:eq(2)').html();
    //     var hsn = currow.find('td:eq(3)').html();
    //     var qty = currow.find('td:eq(4)').html();
    //     var rate = currow.find('td:eq(5)').html();
    //     var value = currow.find('td:eq(6)').html();
    //         $('#item_id').val(id);
    //         $('#item_name').val(name);
    //         $('#item_hsn').val(hsn);
    //         $('#item_quant').val(qty);
    //         $('#item_rate').val(saleRate);
    //         $('#sale_rate').val(Rate);
    //         $('#item_value').val(total);
    //         $('#edit').val(0);
    //         $('#updatedcol').show();
    //         $('#deleteitem').show();
    //         $('#iaddd').hide();
    //     });
    // });
</script>