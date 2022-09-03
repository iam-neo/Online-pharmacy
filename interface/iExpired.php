<?php 
interface iExpired{
	public function add_expired($name, $price, $qty, $expiredDate);
	public function all_expired();
}//end 