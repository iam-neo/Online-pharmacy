<?php 
require_once('../class/Stock.php');
require_once('../class/Cart.php');
if(isset($_POST['stock_id'])){
	$stock_id = $_POST['stock_id'];
	$cart_id = $_POST['cart_id'];
	$qty = $_POST['qty'];

	//update stock pero e select sa first
	$cqty = $stock->get_stockQty($stock_id);
	$currentQty = $cqty['stock_qty'];
	$qty += $currentQty;
	//e update ang stock
	$stock->update_stockQty($stock_id, $qty);
	//delete sa cart
	$deleteCart = $cart->delCart($cart_id);
}//end isset

$stock->Disconnect();