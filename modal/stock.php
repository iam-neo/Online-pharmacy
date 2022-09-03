<?php 
	require_once('database/Database.php');
	$db = new Database();
	//get all items
	$sql = "SELECT *
			FROM item 
			ORDER BY item_name ASC";
	$items = $db->getRows($sql);
 ?>
<div class="modal fade" id="modal-stock">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<!-- FORM -->
				<form class="form-horizontal" role="form" id="form-stock">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Item:</label>
				    <div class="col-sm-9">
					    <select class="btn btn-default" id="item-id">
					    	<?php foreach($items as $i): ?>
					    		<option value="<?= $i['item_id']; ?>"><?= ucwords($i['item_name']); ?></option>
					    	<?php endforeach; ?>
					    </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Quantity:</label>
				    <div class="col-sm-9"> 
				      <input type="number" min="1" class="form-control" id="qty" placeholder="Enter Quantity" required="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Expiry Date:</label>
				    <div class="col-sm-9"> 
				      <input type="date" class="form-control" id="xDate" required="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Manufactured:</label>
				    <div class="col-sm-9"> 
				      <input type="date" class="form-control" id="manu" required="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Purchased:</label>
				    <div class="col-sm-9"> 
				      <input type="date" class="form-control" id="purc" required="">
				    </div>
				  </div>


				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <button type="submit" class="btn btn-default">Save
				      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				      </button>
				    </div>
				  </div>
				</form>
				<!-- END FORM -->
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>