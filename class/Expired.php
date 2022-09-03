<?php
require_once('../database/Database.php');
require_once('../interface/iExpired.php');
class Expired extends Database implements iExpired {

	public function add_expired($name, $price, $qty, $expiredDate)
	{
		$sql = "INSERT INTO expired(exp_itemName, exp_itemPrice, exp_itemQty, exp_expiredDate)
				VALUES(?,?,?,?);";
		return $this->insertRow($sql, [$name, $price, $qty, $expiredDate]);
	}//end add_expired

	public function all_expired()
	{
		$sql = "SELECT *
				FROM expired";
		return $this->getRows($sql);
	}//end all_expired
}//end class

$expired = new Expired();

/* End of file Expired.php */
/* Location: .//D/xampp/htdocs/regis/class/Expired.php */