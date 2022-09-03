<?php 
require_once('../class/Expired.php');
$expireds = $expired->all_expired();

 ?>
 <h2>Expired Item</h2>
<div class="table-responsive">
        <table id="myTable-expired" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th><center>Item Name</center></th>
                    <th><center>Price</center></th>
                    <th><center>Qty</center></th>
                    <th><center>Expired Date</center></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($expireds as $ex): ?>
                <tr align="center" class="text-danger">
                    <td><?= ucwords($ex['exp_itemName']); ?></td>
                    <td><?= "Php ".number_format($ex['exp_itemPrice'], 2); ?></td>
                    <td><?= $ex['exp_itemQty']; ?></td>
                    <td><?= $ex['exp_expiredDate']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-expired').DataTable();
    });
</script>

<?php 
$expired->Disconnect();
 ?>