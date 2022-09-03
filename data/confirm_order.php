<?php 
require_once('../class/Cart.php');
require_once('../class/Sales.php');
if(isset($_POST['click'])){
	if($_POST['click'] == 'yes'){
		//select cart details
		$cartDetails = $cart->allCart();

		foreach ($cartDetails as $cd) {
			$code = $cd['item_code'];
			$generic = $cd['item_name'];
			$brand = $cd['item_brand'];
			$gram = $cd['item_grams'];
			$type = $cd['item_type_desc'];
			$cartQty = $cd['cart_qty'];
			$price = $cd['item_price'];

			$insertSale = $sales->new_sales($code,$generic,$brand,$gram,$type,$cartQty,$price);
			//insert to sales
		}//end foreach

		//del all cart
		$delAllCart = $cart->dellAllCart();
		$return['valid'] = false;
		if($delAllCart){
			$return['valid'] = true;
			$return['msg'] = 'Transaction is added successfully!';
		}
		echo json_encode($return);
	}//end yes
}//end isset