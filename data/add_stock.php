<?php 
require_once('../class/Stock.php');
if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];
	$qty = $_POST['qty'];
	$xDate = $_POST['xDate'];
	$manu = $_POST['manu'];
	$purc = $_POST['purc'];
	
	$saveStock = $stock->add_fuck($item_id, $qty, $xDate, $manu, $purc);
	$return['valid'] = false;
	if($saveStock){
		$return['valid'] = true;
		$return['msg'] = "New Stock Added Successfully!";
	}
	echo json_encode($return);
	// echo 'fuck';
}//end isset

$stock->Disconnect();
