<?php 
require_once('../class/Item.php');
if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];
	$iName = $_POST['iName'];
	$iPrice = $_POST['iPrice'];
	$iType = $_POST['iType'];
	$code = $_POST['code'];
	$brand = $_POST['brand'];
	$grams = $_POST['grams'];
	$saveEdit = $item->edit_item($item_id, $iName, $iPrice, $iType, $code, $brand, $grams);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Edit Successfully!";
	}
	echo json_encode($return);
}//end isset
$item->Disconnect();
