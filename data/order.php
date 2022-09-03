<?php 
    require_once('../class/Stock.php');
    require_once('../class/Cart.php');
    $stocks = $stock->all_stockList();
    $cartDatas = $cart->all_cartDatas($_SESSION['logged_id']);
    // echo '<pre>';
    //     print_r($cartDatas);
    // echo '</pre>';
 ?>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                Items</h3>
            </div>
            <div class="panel-body">
                <!-- start item -->
               <div class="table-responsive">
                        <table id="myTable-item-order" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th><center>Item Code</center></th>
                                    <th><center>Generic Name</center></th>
                                    <th><center>Brand</center></th>
                                    <th><center>Price</center></th>
                                    <th><center>Qty</center></th>
                                    <th><center></center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($stocks as $s): ?>
                                <tr align="center">
                                    <td><?= ucwords($s['item_code']); ?></td>
                                    <td><?= ucwords($s['item_name']); ?></td>
                                    <td><?= ucwords($s['item_brand']); ?></td>
                                    <td><?= "Php ".number_format($s['item_price'], 2); ?></td>
                                    <td><?= $s['stock_qty']; ?></td>
                                    <td>
                                        <button onclick="toCart('<?= $s['stock_id']; ?>','<?= $s['stock_qty']; ?>','<?= $s['item_id']; ?>');" type="button" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#myTable-item-order').DataTable();
                    });
                </script>

                <!-- end item -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                Cart
                </h3>
            </div>
            <div class="panel-body">
                <!-- cart -->
                <div class="table-responsive">
                        <table id="myTable-cart" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th><center>Generic Name</center></th>
                                    <th><center>Price</center></th>
                                    <th><center>Qty</center></th>
                                    <th><center>Sub</center></th>
                                    <th><center></center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $total = 0;
                             foreach($cartDatas as $c): 
                                $price = $c['item_price'];
                                $qty = $c['cart_qty'];
                                $subTotal = $price * $qty;
                                $total += $subTotal;
                            ?>
                                <tr align="center">
                                    <td><?= ucwords($c['item_name']); ?></td>
                                    <td><?= "Php ".number_format($c['item_price'], 2); ?></td>
                                    <td><?= $c['cart_qty']; ?></td>
                                    <td><?= number_format($subTotal,2); ?></td>
                                    <td>
                                    <button onclick="delCart('<?= $c['cart_stock_id']; ?>','<?= $qty; ?>','<?= $c['cart_id']; ?>');" type="button" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td align="right"><strong>Total:</strong></td>
                                    <td align="center">
                                        <strong><?= number_format($total, 2); ?></strong>
                                    </td>
                                    <td>
                                        <?php if($total > 0): ?>
                                        <button onclick="confirm_cart()" type="button" class="btn btn-success btn-xs">
                                        Confirm
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                        </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        </table>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#myTable-cart').DataTable();
                    });
                </script>

                <!-- cart -->
            </div>
        </div>
    </div>
</div>

<br /><br /><br /><br /><br /><br /><br /><br />