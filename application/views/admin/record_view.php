
<style>
.r_date{
	z-index: 9999 !important;
}

.modal{
	z-index:5000 !important;
}

</style>
<div class="container" style="margin-top:50px">
<div class="row">
<h3>Record View for <strong><?php echo $child->child_firstname . ' ' . $child->child_lastname; ?> </strong></h3>
<a class="addActivityLink" href="<?php echo base_url();?>index.php/admin/home_page"><span class='glyphicon glyphicon-arrow-left'></span>    Go back to summary screen</a>
</div>
<hr />
<div class="row">
	<div class='col-md-4'>
	<h4>Basic Information - <a href="#updateForm" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" ><span class='glyphicon glyphicon-pencil'></span> Press here to edit</a></h4>
	</div>
	<div class="col-md-1">
	<h4> | </h4>
	</div>
	<div class="col-md-4">
	<h4>Activities - <a href ='#collapseActivities' data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><span class='glyphicon glyphicon-collapse-down'></span>   See completed activities</a></h4>
	
	</div>
</div>
<hr />
<div class="row collapse" id="updateForm">
<form  class='form' id="updateChild" style="margin-top:10px;margin-bottom: 20px">
				
			       	<div class="form-group">	
			       		<label class="control-label col-sm-4" for="activity_type">First Name:</label>
			       		<input type='text' id="fName" class="form-control" name="first_name" value="<?php echo $child->child_firstname; ?>"></input>
			        </div>

			        <div class="form-group">	
			       		<label class="control-label col-sm-4" for="last_name">Last Name:</label>
			       		<input type='text' id="lName" class="form-control" name="last_name" value="<?php echo $child->child_lastname; ?>"></input>
			       	</div>
			       	
			       	<div class="form-group">	
			       		<label class="control-label col-sm-4" for="hmg_id">Caregiver Name:</label>
			       		<input type='text' id="cName" class="form-control" name="caregiver_name" value="<?php echo $child->caregiver_name; ?>"></input>
			       	</div>

			       	<div class="form-group">	
			       		<label class="control-label col-sm-4" for="hmg_id">Help Me Grow ID#:</label>
			       		<input type='text' id="hmgID" class="form-control" name="hmg_id" value="<?php echo $child->hmg_referral_id; ?>"></input>
			       	</div>

			        
			       	<div class="form-group">	
			       	<label  class="control-label col-md-4" for="AssignedTo">Assign to:</label>
		       			

			       		<?php 
			       				$attributes = array(
			       					'class'=>'form-control',
			       					'name'=>'AssignedTo');
			       				$drop_items=array();
			       				foreach($agencies as $agency){
			       					$drop_items[$agency->name] = $agency->name;
			       				};				       						
			       				echo form_dropdown('AssignedTo',$drop_items,$child->AssignedTo,$attributes);
			       		?>

					</div>		       			
					<hr />
			       	<input type="hidden" id="child_id" name="child_id" value='<?php echo $child->child_id; ?>'>
			    	
			       	<input type="submit"  value="Update Record"></input>
		    	
		    	</form>


</div>
	
<div class="row collapse" id="collapseActivities" style="padding-left:50px;margin-bottom:20px">

		
			<table class="table table-striped">
			<thead>
			<th>Activity Date</th>
			<th>Activity Type</th>
			</thead>
				<?php if($activities): ?>
					<?php foreach($activities as $activity):?>
					<tr>
						<td><?php echo $activity->activity_date; ?></td>
						<td><?php echo $activity->activity_type; ?></td>
					</tr>
					<?php endforeach;?>
				<?php endif;?>
			</table>
		</div>




<div class="row">
		<div class="col-md-12" style="padding:20px">
		 <h4><span class='glyphicon glyphicon-check'></span>     Program Checklist</h4>
Check each item completed; add date complete; and press 'submit'
<hr /> 
	
			
			
		  	
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
	</div>

<hr />
	<div class="row">
	<h4>Client Enrollment Status - <span class='glyphicon glyphicon-collapse-down'></span></h4>
	<a href="../archive_child/<?php echo $child->child_id; ?>">Archive this client</a> | <a href="#renew_section" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">Renew this client</a>  |   <a href="../reopen_child/<?php echo $child->child_id; ?>">Re-Open this client  </a>

	</div>
	

</div>


    <div class="row collapse" id="renew_section">

       

                <h4>Renew Form</h4>

                    <form id="frm_renew_child" class="form">
	                    <div class="form-group">
	                    	
	                    	<h5>Renewal Date</h5>
	                    	<div class="input-group">
	                    	<input type="text" name="renewal_date" class="form-control r_date datepicker">
	                    	<div class="input-group-addon">
	         					 <span class="glyphicon glyphicon-th"></span>
	         				</div>
	                    </div>
	                    <div class="form-group">
	                    	<h5>Renewal Note</h5>
	                    	<textarea name="renewal_note"></textarea>
	                    </div>
	                    <input type='hidden' name="child_id" value="<?php echo $child->child_id; ?>"></input>
                    </form>


                    <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>

    <button type="button" id='submit_renewal' class="btn btn-primary">Save changes</button>
    </div>

               
    </div>
<div class="row">
	<h4><span class='glyphicon glyphicon-check'></span>     Renewal Checklist</h4>
Check each item completed; add date complete; and press 'submit'
<hr /> 

	<?php if(!empty($renewal_items)):?>
		<?php foreach($renewal_items as $renewal_item):?>
			<div class="row">
			<form class="form-inline renewal">
			<div class="form-group col-md-1">
							<?php
									$renewal = $renewal_item->status === '1'? true: false;
									$data = array(
							 		'name' => $renewal_item->status_item,
							 		'id' => 'renewal_checkbox'
							 		);
							 		echo form_checkbox($data,'True',$renewal);
							 		
							 ?>

			</div>
			 <div class="form-group col-md-6">
							<?php echo $renewal_item->description; ?>
			</div>
			 		<div class="form-group col-sm-3">
							<div class="input-group date">
	     						<?php
	     						$theDate = ($renewal_item->status_date === "0000-00-00" ||$renewal_item->status_date === "1970-01-01")? Null: date_format(date_create($renewal_item->status_date),'m/d/Y');
								$theValue = ($renewal_item->status === '1')? $theDate: Null; 
								echo '<input type="text" value="'.$theValue.'" name="status_date" class="form-control datepicker status_date">'
								?> 

	     						 
	      					<div class="input-group-addon">
	         					<span class="glyphicon glyphicon-th"></span>
	     					</div>
							</div>
					</div>
					<div class="form-group col-md-1">
						 <input type="hidden" name="status_item" value="<?php echo $renewal_item->status_item; ?>">	
						 <input type='hidden' name="child_id" value="<?php echo $child->child_id; ?>"></input>	
						<button type="submit" class="btn btn-xs">Submit</button>
					</div>
			</form>
			</div>
				<?php endforeach; ?>	
	<?php endif;?>

</div>						
						 
	

	

</div>

<script type="text/javascript">
	$('#updateChild').submit(function(event){
		event.preventDefault();
		var data =$('#updateChild').serialize();
		$.post('<?php echo base_url();?>index.php/admin/update_child',data,function(data){
			location.reload();
		})
	});

	$('.status').submit(function(event){
		event.preventDefault();
		console.log(event);
		var data = $(this).serialize();
		$.post('<?php echo base_url();?>index.php/admin/update_status', data,function(data){
			console.log(data);
		})
	});

	$('.renewal').submit(function(event){
		event.preventDefault();
		console.log(event);
		var data = $(this).serialize();
		$.post('<?php echo base_url();?>index.php/admin/update_status', data,function(data){
			console.log(data);
		})
	});

	$("#submit_renewal").click(function(event){
		var theData = $("#frm_renew_child").serialize();
		console.log(theData);
		$.post('<?php echo base_url();?>admin/renew_child', theData, function(data){
			console.log(data)
		});
		
	});

	$('.status_date').datepicker();
	$('.r_date').datepicker();

</script>