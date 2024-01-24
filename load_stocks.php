<table class="fixed_header1 table table-bordered" id="table">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Item Name</th>
            <th>Item HSN</th>
            <th>QTY</th>
            <th>Pur-Rate</th>
            <th>Sale-Rate</th>
        </tr>
    </thead>
    <tbody>
       <?php 
        include("connect.php");
        $q='SELECT * FROM `stocks` ORDER BY `slno` ASC';
        $conf=mysqli_query($conn,$q)or die(mysqli_error());
		if(mysqli_num_rows($conf)>0)
		{
            while($row=mysqli_fetch_array($conf))
            {
                ?>
                <tr>
                    <td><?php echo $row['slno']; ?></td>
                    <td><?php echo $row['itemName']; ?></td>
                    <td><?php echo $row['itemHSN']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['purRate']; ?></td>
                    <td><?php echo $row['saleRate']; ?></td>
                </tr>
                <?php
            }
        }
       ?>
    </tbody>
</table>

<script>
    $('#table').DataTable( {
            autoFill: true,
            searching:false
        } );
</script>