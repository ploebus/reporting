

<div class="container" style="margin-top:80px">
	<div class="row">
		<div class="col-md-3">
			<h4><?php echo $this->session->userdata('OrgName');?></h4>
			<h5><?php echo $Name;?></h5>
		</div>
		<div class="col-md-8">
			<h5>Please use this website to enter information pertaining about the services you are providing to children</h5>
		
	
		</div>
	</div>
	<hr />
		
		
		<div class="row">
			<h4>Children   (<?php echo count($children); ?> active clients)	</h4>
			<h5><a href="archived_children"><i class="glyphicon glyphicon-th-list"></i> Click here to see inactive or closed clients</a></h5>
			<table class="table table-striped">
			<thead>
			<th>Child Name</th>
			<th>HMG ID #</th>
			<th>First Activity Date</th>
			<th>Group</th>
			<th>Actions</th>
			</thead>
				<?php if(isset($children)): ?>
					<?php foreach($children as $child):?>
					<tr>
						<td><?php echo $child->child_firstname." ". $child->child_lastname; ?></td>
						<td><?php echo $child->hmg_referral_id; ?></td>
						<td><?php echo date_format(date_create($child->activity_date),"m/d/Y"); ?></td>
						<td><?php echo $child->cohort;?></td>
						<td style="font-size:.9em"><a class="viewChild1" data-kid="<?php echo $child->child_id; ?>" href='view_child/<?php echo $child->child_id; ?>'>View Record</a> | <a data-toggle="modal" class="addActivityLink" data-kid="<?php echo $child->child_id; ?>" href="#myModal">Add Activity</a>| <a data-toggle="modal" class="addToGroup" data-kid="<?php echo $child->child_id; ?>" href="#groupModal">Add to a Group</a></td>
					</tr>
					<?php endforeach;?>
				<?php endif;?>
			</table>
		</div>

		<div class="row">
			<h4>Groups </h4>
			<a href="add_cohort"><span class='glyphicon glyphicon-plus '></span> Create a Group</a>
			<p>Create a group if you want to organize your clients. This is optional and only for your convenience.</p>
			 
			<table class="table table-striped">
			<thead>
			<th>Group Name</th>
			<th>Start Date</th>
			<th>Action</th>
			</thead>
				<?php if(isset($cohorts)): ?>
					<?php foreach($cohorts as $cohort):?>
					<tr>
						<td><?php echo $cohort->cohort_name; ?></td>
						<td><?php echo $cohort->cohort_startdate; ?></td>
						<td style="font-size.9em"><a class="remove_cohort_start" href="#" data-cohort="<?php echo $cohort->cohort_id; ?>">Remove</a> | <a href="edit_cohort/<?php echo $cohort->cohort_id; ?>">Edit</a>
					</tr>
					<?php endforeach;?>
				<?php endif;?>
			</table>
		</div>
		<div class="row">

		</div>		

		
<!-- Modal -->
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
			       		<option value='90'>60 muinutes to 89 minutes</option>
			       		<option value='120'>90 minutes to 119</option>
			       		<option value='200'>More than 120 minutes</option>
			       	</select>
  </div>
   <div class="form-group">
    <label for="comment">Note:</label>
			       	<textarea class="form-control" name="comment"></textarea>
  </div>
  <!--  <div class="form-group">
    <label for="note">Is this the first service provided after re-enrollement</label>
   
			       	<select class="form-control" id="note" name="note">
			       		<option value='Yes'>Yes, this is the first service of a new enrollment</option>
			       		<option value='No'>No</option>
		       	 	</select>
  </div>


<div class="form-group">

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

<!--GROUP MODAL -->
<div id="groupModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add to a Group</h4>
      </div>
      <div class="modal-body">
      
			<form id="addGroup" class="form">
   <div class="form-group">
    <label for="activity_type">SELECT A GROUP</label>
			       
<select id="addGroup" name="addCohort">
	<option value=''>No Group</option>
	<?php foreach ($cohorts as $cohort): ?> 
	<option value='<?php echo $cohort->cohort_name; ?>'><?php echo $cohort->cohort_name; ?></option>
	<?php endforeach; ?>
	</select>
  </div>
  
  
 <input type="hidden" id="child_id2" name="child_id">


  <button type="submit" class="btn btn-default">Add To Group</button>
</form>        	



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	<!---END MODAL-->

<script type="text/javascript">
	$('.datepicker').datepicker(
		{format:"yyyy-mm-dd",
    
	}).on('changeDate',function(e){
    $(this).datepicker('hide')
  });
</script>


<!-- Confirm Delete Modal -->
<div id="removeChildModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">CONFIRM DELETE</h4>
	      	</div>
	      	<div class="modal-body">
	      
		      	<h5>Please confirm you would like to remove this client</h5>
	      		<a href="" id="removeChild">Confirm Removal</a>
			</div>
		</div>
	</div>
</div>

	<!---END MODAL-->

<!-- Confirm Delete Modal -->
<div id="removeCohortModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">CONFIRM DELETE</h4>
	        	Please note that all activities of this cohort will remain, but not be identified with a cohort. Please go through
	        	all activities and classify to a new cohort.
	      	</div>
	      	<div class="modal-body">
	      
		      	<h5>Please confirm you would like to remove this cohort</h5>
	      		<a href="" id="removeCohort">Confirm Removal</a>
			</div>
		</div>
	</div>
</div>

	<!---END MODAL-->






<script type="text/javascript">
		
		var selectedChild;
		var selectedCohort;

		$(".viewChild").click(function(event){
			event.preventDefault();
			$.getJSON("get_child",{child_id:$(this).attr('data-kid')}, function(data)
			{
				
				$("#fName").val(data[0].child_firstname);
				$("#lName").val(data[0].child_lastname);
				$("#cName").val(data[0].caregiver_name);
				$("#hmgID").val(data[0].hmg_referral_id);
				$("#child_id").val(data[0].child_id);

				//$("#kidInfo").append( "child name: " + data[0].child_firstname + " " + data[0].child_lastname) 
			});
			//console.log($(this).attr('data-kid'))
		})


		$("#updateChild").submit(function(event){
			event.preventDefault();
			$.post('update_child',$("#updateChild").serialize(),function(data){
				location.reload();
				
			});
			
		});

		
	
		$('.remove_child_start').click(function(event){
			event.preventDefault();
			selectedChild = $(this).attr('data-kid');
			console.log(selectedChild);
			$('#removeChildModal').modal('toggle');
		});
		
		$('#removeChild').click(function(event){
			console.log('hello')
			event.preventDefault();
			console.log(selectedChild);
			var theData = {
				'child_id':selectedChild
			};
			
			$.post('remove_child',theData, function(data){
				
				location.reload();

			});


		});

		$('#removeCohort').click(function(event){
			console.log('hello')
			event.preventDefault();
			console.log(selectedCohort);
			var theData = {
				'cohort_id':selectedCohort
			};
			
			$.post('remove_cohort',theData, function(data){
				
				//location.reload();
				window.location.href="<?php echo base_url(); ?>site/home_page";

			});


		});

		$('.remove_cohort_start').click(function(event){
			event.preventDefault();
			selectedCohort = $(this).attr('data-cohort');
			console.log(selectedCohort);
			$('#removeCohortModal').modal('toggle');
		});

		$("#addActivity").submit(function(event){
			event.preventDefault();
			$data = $("#addActivity").serialize();

			$.post('add_activity',$("#addActivity").serialize(),function(data){
				
				$("#myModal").modal('toggle')
			});
			
		})

		$("#addGroup").submit(function(event){
			event.preventDefault();
			
			$data = $("#addGroup").serialize();

			$.post('add_group',$data,function(data){
				location.reload();
				//$("#groupModal").modal('toggle')
			});
			
		})


		$(".addActivityLink").click(function(event){
			selectedChild = $(this).attr('data-kid');
			console.log(selectedChild);
			$("#child_id1").val(selectedChild);

		});

		$(".addToGroup").click(function(event){
			selectedChild = $(this).attr('data-kid');
			console.log(selectedChild);
			$("#child_id2").val(selectedChild);

		});

		$("#dateAwarded").datepicker({format:'yyyy/mm/dd'})
		
		

		

		
</script>