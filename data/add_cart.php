<?php 
require_once('../class/Cart.php');
require_once('../class/Stock.php');
if(isset($_POST['stock_id'])){
	$stock_id = $_POST['stock_id'];
	$item_id = $_POST['item_id'];
	$cqty = $_POST['cqty'];//cart qty ni siya
	$user_id = $_SESSION['logged_id'];
	$nqty = $_POST['nqty'];//cart qty ni siya
	$uniqid = $_SESSION['uniqid'];
	//add to cart
	$saveToCart = $cart->add_toCart($item_id, $cqty, $stock_id, $user_id, $uniqid);

	//update stock og minus si sa cart qty
	$updateStockQty = $stock->update_stockQty($stock_id, $nqty);

}//end isset
$cart->Disconnect();