<?php
require_once('../database/Database.php');
require_once('../interface/iItem.php');
class Item extends Database implements iItem {
	public function all_items()
	{
		$sql = "SELECT *
				FROM item i 
				INNER JOIN item_type it 
				ON i.item_type_id = it.item_type_id
				ORDER BY i.item_name ASC";
		return $this->getRows($sql);
	}//end all_items
	
	public function get_item($item_id)
	{
		$sql = "SELECT *
				FROM item
				WHERE item_id = ?";
		return $this->getRow($sql, [$item_id]);
	}//end edit_item

	public function add_item($iName, $iPrice, $type_id, $code, $brand, $grams)
	{
		$sql = "INSERT INTO item(item_name, item_price, item_type_id, item_code, item_brand, item_grams)
				VALUES(?, ?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$iName, $iPrice, $type_id, $code, $brand, $grams]);
	}//end add_item

	public function edit_item($item_id, $iName, $iPrice, $type_id, $code, $brand, $grams)
	{
		$sql = "UPDATE item 
				SET item_name = ?, item_price = ?, item_type_id = ?, item_code = ?, item_brand = ?, item_grams = ?
				WHERE item_id = ?";
		return $this->updateRow($sql, [$iName, $iPrice, $type_id, $code, $brand, $grams, $item_id]);
	}//end edit_item
}//end class Item

$item = new Item();

/* End of file Item.php */
/* Location: .//D/xampp/htdocs/regis/class/Item.php */