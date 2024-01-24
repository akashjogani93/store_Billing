<table class="fixed_header1 table table-bordered" id="table">
    <thead>
        <tr>
            <th style="width:10%">Sl No</th>
            <th style="width:70%">Item Name</th>
            <th style="width:20%">Item HSN</th>
        </tr>
    </thead>
    <tbody>
       <?php 
        include("connect.php");
        $q='SELECT * FROM `item` ORDER BY `id` ASC';
        $conf=mysqli_query($conn,$q)or die(mysqli_error());
		if(mysqli_num_rows($conf)>0)
		{
            while($row=mysqli_fetch_array($conf))
            {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['itemName']; ?></td>
                    <td><?php echo $row['itemHSN']; ?></td>
                </tr>
                <?php
            }
        }
       ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $("#table tbody").on('dblclick', 'tr', function() {
            var currow = $(this).closest('tr');
            var id = currow.find('td:eq(0)').html();
            var name = currow.find('td:eq(1)').html();
            var hsn = currow.find('td:eq(2)').html();
            $('#item_id').val(id);
            $('#edit').val(0);
            $('#edit_name').val(name);
            $('#item_name').val(name);
            $('#edit_hsn').val(hsn);
            $('#item_hsn').val(hsn);
            $('#update').show();
            $('#add').hide();
            

        });
    });
</script>