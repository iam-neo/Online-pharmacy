<?php 
interface iStock {
	public function all_stockList();
	public function get_stockList($stock_id);//get only 1 stocklist
	public function del_stockList($stock_id);
	public function add_stock($item_id, $qty, $xDate, $manu, $purc);
	public function all_stockGroup();
	public function update_stockQty($stock_id, $stock_qty);
	public function get_stockQty($stock_id);//get the current qty	
	public function add_fuck($item_id, $qty, $xDate, $manu, $purc);
}//end iStock