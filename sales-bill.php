<?php include('header.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <style>
       #rep-css{
        border: 2px solid white;
      } 

      .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: white !important;
            border: none;
            background-color: #585858;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, #585858 0%, #111 100%);
            /* Chrome10+,Safari5.1+ */
            background: -moz-linear-gradient(top, #585858 0%, #111 100%);
            /* FF3.6+ */
            background: -ms-linear-gradient(top, #585858 0%, #111 100%);
            /* IE10+ */
            background: -o-linear-gradient(top, #585858 0%, #111 100%);
            /* Opera 11.10+ */
            background: linear-gradient(to bottom, #585858 0%, #111 100%);
            /* W3C */
        }
        div.dataTables_length select 
        {
            color: black !important;
            background-color: white !important; 
        }
    </style>

<div class="col-md-12 bg-success">
  <h3 class="text-center" style="color:black; margin-top:3px; margin-bottom:10px;">Sales Entry</h3>
</div>

<div class="col-md-12 theam" id="fetch_table" style="margin-top: -10px;">
    <table class="fixed_header1 table table-bordered" id="table">
        <thead>
            <tr>
                <th>Bill No</th>
                <th>Party Name</th>
                <th>Total Amount</th>
                <th>Date</th>
                <!-- <th>View</th> -->
            </tr>
        </thead>
        <tbody>
        <?php 
            include("connect.php");
            $q='SELECT * FROM `sale_tot` ORDER BY `bill_no` ASC';
            $conf=mysqli_query($conn,$q)or die(mysqli_error());
            if(mysqli_num_rows($conf)>0)
            {
                while($row=mysqli_fetch_array($conf))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['bill_no']; ?></td>
                        <td><?php echo $row['partyName']; ?></td>
                        <td><?php echo round($row['net_tot']); ?></td>
                        <td><?php echo $row['saleDate']; ?></td>
                        <!-- <td><a href=""></a></td> -->
                    </tr>
                    <?php
                }
            }
        ?>
        </tbody>
    </table>
</div>

<script>
    


    $(document).ready(function()
    {

        $('#table').DataTable( {
            autoFill: true,
            searching:false
        } );


        $("#table tbody").on('dblclick', 'tr', function() {
        var currow = $(this).closest('tr');
        var bill_no = currow.find('td:eq(0)').html();
            // alert(item_id)
        window.location="sale_single_bill.php?bill="+bill_no;
        });
    });
</script>

</body>
</html>