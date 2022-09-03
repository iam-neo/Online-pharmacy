<?php
require_once('../database/Database.php');
require_once('../interface/iTransaction.php');
class Transaction extends Database implements iTransaction {
	

}//end transaction
$transaction = new Transaction();//istance

/* End of file Transaction.php */
/* Location: .//D/xampp/htdocs/regis/class/Transaction.php */