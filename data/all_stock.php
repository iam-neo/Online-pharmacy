<?php 
    require_once('../class/Stock.php');
    $stocks = $stock->all_stockGroup();

    // echo '<pre>';
    //     print_r($stocks);
    // echo '</pre>';
 ?>
<br />
<div class="table-responsive">
        <table id="myTable-stock" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th><center>Item Name</center></th>
                    <th><center>Price</center></th>
                    <th><center>Qty</center></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($stocks as $s): ?>
                <tr align="center">
                    <td><?= ucwords($s['item_name']); ?></td>
                    <td><?= "Php ".number_format($s['item_price'], 2); ?></td>
                    <td><?= $s['qty']; ?></td>
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
        $('#myTable-stock').DataTable();
    });
</script>

<?php 
$stock->Disconnect();
 ?>