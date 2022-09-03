<?php 
require_once('../class/Stock.php');
if(isset($_POST['purc'])){
	$item_id = $_POST['item_id'];
	$qty = $_POST['qty'];
	$xDate = $_POST['xDate'];
	$manu = $_POST['manu'];
	$purc = $_POST['purc'];

	$saveStock = $stock->add_fuck($item_id, $qty, $xDate, $manu, $purc);
}//end isset
