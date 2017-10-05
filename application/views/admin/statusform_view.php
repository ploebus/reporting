<?php foreach($status_items as $status_item): ?>
					
					<div class="row" style="margin-bottom: 10px">
						
						<form class="form-inline status" id="<?php echo $status_item->status_item; ?>">
							<div class="form-group col-md-1">
							<?php
									
									$test_mode_mail = $status_item->status === '1'? true: false;
							 		$data = array(
							 			'name' => 'status'
							 			);
							 		echo form_checkbox($data,'True',$test_mode_mail);
							 		
							 ?>
							 </div>
							 <div class="form-group col-md-6">
							<?php echo $status_item->description; ?>
							 </div>
							 <div class="form-group col-sm-3">
							<div class="input-group date">
	     						<?php
	     						$theDate = ($status_item->status_date === "0000-00-00" ||$status_item->status_date === "1970-01-01")? Null: date_format(date_create($status_item->status_date),'m/d/Y');
								$theValue = ($status_item->status === '1')? $theDate: Null; 
								echo '<input type="text" value="'.$theValue.'" name="status_date" class="form-control datepicker status_date">'
								?> 

	     						 
	      						<div class="input-group-addon">
	         					 <span class="glyphicon glyphicon-th"></span>
	     					 	</div>
							 </div>


						</div>
						 <div class="form-group col-md-1">
						 <input type="hidden" name="status_item" value="<?php echo $status_item->status_item; ?>">	
						 <input type='hidden' name="child_id" value="<?php echo $child->child_id; ?>"></input>	
						<button type="submit" class="btn btn-xs">Submit</button>
						 </div>
						 </form>
					</div>
					
			<?php endforeach; ?>