 
<div class="container" style="margin-top:50px">
	
<div class="row">
<h3>Record View : <?php echo $child->child_firstname . ' ' . $child->child_lastname; ?> </h3>
<a class="addActivityLink" href="<?php echo base_url();?>site/home_page"><span class='glyphicon glyphicon-arrow-left'></span>    Go back to summary screen</a>

</div>
<hr />

<div class="row" >
	<div class='col-md-5'>
	<h4>Basic Information - <a href="#updateForm" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" ><span class='glyphicon glyphicon-pencil'></span> Press here to edit</a></h4>
	</div>
	<div class="col-md-1">
	<h4> | </h4>
	</div>
	<div class="col-md-6">
	<h4>Program Checklist - <a href ='#programChecklist' data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><span class='glyphicon glyphicon-check'></span>    Manage program checklist</a></h4>
	
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

			        
			       	  			
					<hr />
			       	<input type="hidden" id="child_id" name="child_id" value='<?php echo $child->child_id; ?>'>
			    	
			       	<input type="submit"  value="Update Record"></input>
		    	
		    	</form>


</div>
	
<div class="row collapse" id="programChecklist">
		
		  
		  <h4>Program Milestones</h4>
These are the steps in this program. Please notify Help Me Grow if you need to change one of these items.
<h5><a id="sent_incentive" data-toggle="modal" href="#sentIncentive"><i class="glyphicon glyphicon-ok"></i>  Click here if you have given the incentive to the client. This informs us to look for the client's packet and to not send the incentive.</a></h5>
<hr />
		  	
				<?php foreach($status_items as $status_item): ?>
					
					<div class="row" style="margin-bottom: 10px">
						
						<form class="form-inline status" id="<?php echo $status_item->status_item; ?>">
							<div class="form-group col-md-1">
							<?php
									
									$test_mode_mail = $status_item->status === '1'? true: false;
							 		$data = array(
							 			'name' => 'status',
							 			'style'=> 'font-size:16px',
							 			'disabled'=> 'disabled'
							 			);
							 		echo form_checkbox($data,'True',$test_mode_mail);
							 		
							 ?>
							 </div>
							 <div class="form-group col-md-6">
							<span style="font-size:16px"><?php echo $status_item->description; ?></span>
							 </div>
							 <div class="form-group col-sm-3">
							<div class="input-group date">
	     						<?php 
								
								$theValue = ($status_item->status === '1')? date_format(date_create($status_item->status_date),'m/d/Y'): Null; 
								echo $theValue
								//echo '<input type="text" value="'.$theValue.'" style="border:solid thin lightgrey;font-size:16px" name="status_date" class="form-control" readonly>'
								?> 
 
	     						 
	      						
							 </div>


						</div>
						 <div class="form-group col-md-1">
						 <input type="hidden" name="status_item" value="<?php echo $status_item->status_item; ?>">	
						 <input type="hidden" name="child_id" value="<?php echo $child->child_id; ?>"></input>	
						
						 </div>
						 </form>
					</div>
					
			<?php endforeach; ?>
			
</div>


	<div class="row">
	
		<div class="col-md-12">
		<h4>Activities Completed</h4>
		<a data-toggle="modal" class="addActivityLink" href="#myModal"><span class='glyphicon glyphicon-plus '></span>Add Activity</a>
		<hr />	
			<table class="table">
			<thead>
			<th>Activity Date</th>
			<th>Activity Type</th>
			<th>Actions</th>
			</thead>
				<?php if($activities): ?>
					<?php foreach($activities as $activity):?>
					<tr>
						<td><?php echo $activity->activity_date; ?></td>
						<td><?php echo $activity->activity_type; ?></td>
						<td><a class='editActivity' href="../edit_activity/<?php echo $activity->activity_ID; ?>">EDIT</a> |  <a class='removeActivity' data-activity='<?php echo $activity->activity_ID; ?>' href="#">DELETE</a></td>
					</tr>
					<?php endforeach;?>
				<?php endif;?>
			</table>
		</div>
		</div>
		<hr />
		<div class="row">
		<div class="col-md-12">
			<h4>Final Status - <a href="#finalStatus" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" ><span class='glyphicon glyphicon-pencil'></span> Add final status</a></h4>
		<div id="finalStatus" class="collapse">
			<form id="frm_endnote" method="POST" class="form" action="create_endnote">
	      		<div class="form-group">
	      		 <label for="final_status">Final Status:</label>
	      		

	      		<?php 
	      			$options = array(
	      				''=>'',
	      				'Finished Course of Service'=>'Finished Course of Service',
	      				'Lost to Service'=>'Lost to Service',
	      				'Family Moved'=>'Family Moved',
	      				'Transferred to Services'=>'Transferred to Services',
	      				'Family Unable to Continue'=>'Family Unable to Continue',
	      			    'Other' => 'Other');
	      			$s_options = array($child->final_status);
	      			echo form_dropdown('final_status',$options,$s_options);
	      		?>
	      		
	      		</div>
	      		<div class="form-group">
	      			<label class="control-label col-md-4" for="final_date">Final Date</label>
	      			<input type="date" value="<?php echo ($child->openSW == '1') ?  date('Y-m-d') : $child->final_date; ?>" style="border:solid thin lightgrey;font-size:16px" name="final_date" class="form-control datepicker col-md-6">
	      		</div>
	      		
	      		<div class="form-group">
	      			<label class="control-label col-sm-4" for="endnote_comment">Comment:</label>
	      			<textarea name="final_comment" rows="4" cols="50"><?php echo $child->final_comment; ?>
					</textarea>
				</div>
				<hr /> 
				<input type="hidden" id="child_id" name="child_id" value='<?php echo $child->child_id; ?>'>
				<input type="submit" class="btn btn-success btn-lg" value="Post Endnote">
	      	</form>
		</div>
		</div>
	</div>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add an Activity</h4>
      </div>
      <div class="modal-body">
      
<form id="addActivity" class="form">
  <div class="form-group">
    <label for="activity_type">Activity Type:</label>
			       	<select class="form-control" id="activity_type" name="activity_type">
			       		<option>Home Visit</option>
			       		<option>Office Visit</option>
			       		<option>Play Group</option>
			       		<option>Other Visit</option>
			       		<option>Support with Evaluation</option>
			       	</select>
  </div>
  
  <div class="form-group">
    <label for="activity_date">Activity Date</label>
    <input type="date" class="datepicker form-control" id="activity_date" name='activity_date'>
  </div>

  <div class="form-group">
    <label for="service_provider">Service Provider Role:</label>
			       	<select class="form-control" id="service_provider" name="service_provider">
			       		<option>Playgroup Leader(s)</option>
			       		<option>Developmental Provider</option>
			       		<option>Mental Health Provider</option>
			       		<option>Family Partner</option>
			       	</select>
  </div>
  

 <div class="form-group">
    <label for="visit_length">Length of Visit:</label>
			       	<select class="form-control" id="visit_length" name="visit_length">
			       		<option value='0'>Zero or Missed Visit</option>
			       		<option value='30'>Less than 30 minutes</option>
			       		<option value='60'>30 minutes to 59 minutes</option>
			       		<option value='90'>60 minutes to 89 minutes</option>
			       		<option value='120'>90 minutes to 119</option>
			       		<option value='200'>More than 120 minutes</option>
			       	</select>
  </div>

  <div class="form-group">
    <label for="comment">Note:</label>
			       	<textarea class="form-control" name="comment"></textarea>
  </div>

   <!-- <div class="form-group">
    <label for="note">Is this the first service provided after re-enrollement</label>
   
			       	<select class="form-control" id="note" name="note">
			       		<option value='Yes'>Yes, this is the first service of a new enrollment</option>
			       		<option value='No'>No</option>
		       	 	</select>
  </div> -->


<!-- <div class="form-group">

    <label for="cohort">Cohort: *only applicable if you are using cohorts</label>
			       	
    				<select class="form-control" id="cohort" name="cohort">
    				<?php foreach($cohorts as $cohort):?>
			       		<option value='<?php echo $cohort->cohort_name; ?>'><?php echo $cohort->cohort_name; ?></option>
			       	<?php endforeach; ?>	
			       	</select>
  </div> -->










 <input type="hidden" id="child_id1" name="child_id" value='<?php echo  $this->uri->segment(3,0); ?>'>


  <button type="submit" class="btn btn-default">Add Activity</button>
</form>        	

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>

</div>
<!-- Confirm Delete Modal -->
<div id="removeActivityModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">CONFIRM DELETE</h4>
	      	</div>
	      	<div class="modal-body">
	      
		      	<h5>Please confirm that you would like to remove this activity</h5>
	      		<a href="" id="removeThisActivity">Confirm Removal</a>
			</div>
		</div>
	</div>
</div>

	<!---END MODAL-->

<!-- Confirm Delete Modal -->
<div id="sentIncentive" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">CONFIRM GIVING INCENTIVE</h4>
	      	</div>
	      	<div class="modal-body">
	      
		      	<h5>Please confirm that you have sent Help Me Grow the client's packet of info and that you have given them the incentive. Thanks.</h5>
	      		<a href="sent_incentive" data-child='<?php echo $child->child_id; ?>' id="confirmIncentive">Continue</a>
			</div>
		</div>
	</div>
</div>

	<!---END MODAL-->


<script type="text/javascript">
	$('.datepicker').datepicker(
		{format:"yyyy-mm-dd"
	});
</script>

<script type="text/javascript">
	$('#confirmIncentive').click(function(event){
		event.preventDefault();
		var cid = $(this).attr('data-child')
		var data = {
			"cid": cid
		}
		console.log(cid)
		$.post('../sent_incentive',data, function(data){
			console.log('success')
		})
		location.reload();
	});
</script>



<script type="text/javascript">
	var selectedActivity;
	$("#addActivity").submit(function(event){
			event.preventDefault();
			$data = $("#addActivity").serialize();
			console.log($data)

			$.post('../add_activity',$("#addActivity").serialize(),function(data){
				console.log(data);
				location.reload();
			});
			
		})

	$(":checkbox").change(function(event)
	
	{
	 		var theItem = event.target;
	 		
	 		$data = {
	 			'child_id':$('#taskList').attr('data-kid'),
	 			'item':$(theItem).attr('name'),
	 			'status':$(theItem).is(":checked")
	 		};

	 		$.post('../update_status',$data,function(data){
	 			
	 			location.reload();
	 		})	
	 		
	})
	
	$('.removeActivity').click(function(event){
		event.preventDefault();
		$("#removeActivityModal").modal('toggle');
		selectedActivity = $(this).attr('data-activity');
		console.log(selectedActivity);
	});

	$('#removeThisActivity').click(function(event){
		data = {
			'activity_ID':selectedActivity
		};

		$.post('../delete_activity',data,function(data){
			location.reload();
		})
	})
	$('#updateChild').submit(function(event){
		event.preventDefault();
		$data = $('#updateChild').serialize();
		$.post('../update_child',$data,function(data){
			location.reload();
		})
	})

	$("#frm_endnote").submit(function(event){
		event.preventDefault();
		$data = $("#frm_endnote").serialize();
		$.post('../create_endnote',$data,function(data){
			alert('success!')
			
		})
		location.reload();
	})
$('.status').submit(function(event){
		event.preventDefault();
		console.log(event);
		$data = $(this).serialize();
		$.post('<?php echo base_url();?>index.php/admin/update_status',$data,function(data){
		location.reload();
		})
	});
</script>