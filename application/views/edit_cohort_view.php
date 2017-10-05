<div class="container-fluid" style="margin-top:80px">
	<div class="row">
		<h4>EDIT COHORT</h4>
		<a class="addActivityLink" href="<?php echo base_url();?>index.php/site/home_page"><span class='glyphicon glyphicon-arrow-left'></span>    Go back to summary screen</a>
	</div>
Please click within the fields below to edit information.
<hr />	

<div class="row">
<form id='editCohort' action='edit_cohort' method='POST'>
<div class="form-group">
<label for="cohort_name" class="control-label">Cohort Name</label>
<input type='text' style="border:solid thin lightgrey" class="form-control" name="cohort_name" placeholder="" value="<?php echo $cohort->cohort_name; ?>"></input>

</div>

<div class="form-group">
    <label for="cohort_startdate">Cohort Start Date</label>
    <div class="input-group date">
    <input type="date" class=" datepicker form-control" id="activity_date" name='cohort_startdate' value="<?php echo $cohort->cohort_startdate; ?>">
    <div class="input-group-addon">
          <span class="glyphicon glyphicon-th"></span>
      </div>
      </div>
 </div>
  <div class="form-group">
    <label for="cohort_enddate">Cohort End Date</label>
    <div class="input-group date">
    <input type="date" class=" datepicker form-control" id="activity_date" name='cohort_enddate' value="<?php echo $cohort->cohort_enddate; ?>">
    <div class="input-group-addon">
          <span class="glyphicon glyphicon-th"></span>
      </div>
    </div>
  </div>

<input type='hidden' name='agency_name' value="<?php echo $this->session->OrgName ?>"></input>
 <button type="submit" class="btn btn-default">Save Changes</button>

</form>

</div>
</div> 
</div>

<script type="text/javascript">
	$('.datepicker').datepicker(
		{format:"yyyy-mm-dd"
	});
</script>

</div>

</div>