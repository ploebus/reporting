<div class="container" style="margin-top:80px">
	<div class="row">
		<h4>EDIT ACTIVITY</h4>
		<a class="addActivityLink" href="<?php echo base_url();?>site/view_child/<?php echo $this->session->userdata('child_id'); ?>"><span class='glyphicon glyphicon-arrow-left'></span>    Go back to summary screen</a>
	</div>
<div class="row">	
<hr />
<div class='col-md-10'>
 <form id="editActivity" method="POST">
  <div class="form-group">
    <label class="control-label col-sm-4" for="activity_type">Activity Type:</label>
			       	
    <?php 
    	$options = array(
    		'Home Visit'=>'Home Visit - Developmental',
    		'Office Visit'=>'Office Visit',
    		'Missed Home Visit'=>'Missed Home Visit',
    		'Play Group'=>'Play Group',
    		'Support with Evaluation'=>'Support with Evaluation',
            'Other Visit'=>'Other Visit');
    	$attr ='class="form-control"';
    	echo form_dropdown('activity_type',$options,$activity->activity_type,$attr);
    	?>
			       
  </div>
  
  
    <div class="form-group">
    	<label for="activity_date">Activity Date</label>
	     <div class="input-group date">
	      <input type="text" id="activity_date" name="activity_date" value="<?php echo $activity->activity_date; ?>" class="form-control datepicker">
	      <div class="input-group-addon">
	          <span class="glyphicon glyphicon-th"></span>
	      </div>
	   	 </div>
	</div>
 
  <div class="form-group">
    <label class="control-label col-sm-4" for="service_provider">Service Provider Role:</label>
			<?php
				$options = array(
					'Playgroup Leader(s)'=>'Playgroup Leader(s)',
					'Developmental Provider'=>'Developmental Provider',
                    'Mental Health Provider'=>'Mental Health Provider',
                    'Family Partner');
				$attr ='class="form-control"';	
				echo form_dropdown('service_provider',$options, $activity->service_provider,$attr); 
			?>      	
	       
  </div>
  

 <div class="form-group">
    <label class="control-label col-sm-4" for="visit_length">Length of Visit:</label>
			       	
    	<?php

    		$options = array(
    			'0'=>'Zero or Missed Visit',
    			'30'=>'Less than 30 minutes',
    			'60'=>'30 minutes to 59 minutes',
    			'90'=>'60 muinutes to 89 minutes',
    			'120'=>'90 minutes to 119',
    			'200'=>'More than 120 minutes');

    		$attr ='class="form-control"';

    		echo form_dropdown('visit_length',$options,$activity->visit_length,$attr);

    		?>

  </div>
   <div class="form-group">
    <label for="comment">Note:</label>
                    <textarea class="form-control" name="comment"><?php echo $activity->comment; ?></textarea>
  </div>
   <!-- <div class="form-group">
    <label for="note">Is this the first service provided after re-enrollement</label>
			       	
    		<?php

    		$options = array(
    			'Yes'=>'Yes, this is the first service of a new enrollment',
    			'No'=>'No'
    			);

    		$attr ='class="form-control"';

    		echo form_dropdown('note',$options,$activity->note,$attr);

    		?>
       
  </div>


<div class="form-group">
    <label class="control-label col-sm-4" for="cohort">Cohort:</label>
			       	
    				<select id="cohort" class="form-control" name="cohort">
    				<?php foreach($cohorts as $cohort):?>
			       	if($cohort->cohort_name == $activity->cohort_name){	
			       		<option value='<?php echo $cohort->cohort_name; ?>' selected='selected'><?php echo $cohort->cohort_name; ?></option>
			       	}
			       	else{
			       		<option value='<?php echo $cohort->cohort_name; ?>'><?php echo $cohort->cohort_name; ?></option>
			       	}
			       	<?php endforeach; ?>	
			       	</select>
  </div> -->










 
 <button type="submit" class="btn btn-default">Edit Activity</button>
<h4 id="message"></h4>
</form>



<script type="text/javascript">
	$('.datepicker').datepicker(
		{format:"yyyy-mm-dd",
    
	}).on('changeDate',function(e){
    $(this).datepicker('hide')
  });



$("#editActivity").submit(function(event){
	event.preventDefault();
	$data = $("#editActivity").serialize();

	$.post("../submit_edit_activity/<?php echo $activity->activity_ID; ?>",$data,function(data){
		
		$('#message').text('Activity Updated').fadeOut(800);
		location.reload();
	})
})
</script>        	
</div>