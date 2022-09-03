<?php 
require_once('../class/Sales.php');

$date = $_GET['date'];
$dailySales = $sales->daily_sales($date);


 ?>
 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css">
    <!-- Font Awesome -->
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
        print();
    </script>
  </head>
  <body>
    
 <center>
    <h1>Daily Sales Report</h1>
    <h2>of</h2>
    <h3><?= $date; ?></h3>
 </center>
<br />
<div class="table-responsive">
        <table id="myTable-sales" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Item Code</th>
                    <th>Generic Name</th>
                    <th>Brand</th>
                    <th><center>Grams</center></th>
                    <th><center>Type</center></th>
                    <th><center>Price</center></th>
                    <th><center>Qty</center></th>
                    <th><center>Sub Total</center></th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $total = 0;
                foreach($dailySales as $ds):
                $subTotal = number_format($ds['price'] * $ds['qty'], 2);   
                $total += $subTotal; 
            ?>
                <tr>
                    <td><?= $ds['item_code']; ?></td>
                    <td><?= $ds['generic_name']; ?></td>
                    <td><?= $ds['brand']; ?></td>
                    <td><?= $ds['gram']; ?></td>
                    <td><?= $ds['type']; ?></td>
                    <td align="center"><?= number_format($ds['price'],2); ?></td>
                    <td align="center"><?= $ds['qty']; ?></td>
                    <td align="center"><?= $subTotal; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right"><strong>TOTAL:</strong></td>
                <td align="center">
                    <strong><?= number_format($total,2); ?></strong>
                </td>
            </tr>
        </table>
</div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-sales').DataTable();
    });
</script>

<?php 
$sales->Disconnect();
 ?>