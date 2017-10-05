<div class="container-fluid" style="margin-top:80px">

<div class="row">
<div class='col-md-10'>
<h1> Create a cohort</h1>
<a class="addActivityLink" href="<?php echo base_url();?>site/home_page"><span class='glyphicon glyphicon-arrow-left'></span>    Go back to summary screen</a>
<hr />
<form id='newCohort' method='POST'>

<div class='form-group'>


<label for="cohort_name">Cohort Name:</label>
<input type="text" class="form-control" style="border:solid thin lightgrey" name="cohort_name" placeholder="Enter cohort name"></input>
</div>
<div class="form-group">
    <label for="cohort_startdate">Cohort Start Date</label>
     <div class="input-group date">
      <input type="text" id="activity_date" name="cohort_startdate" class="datepicker form-control">
      <div class="input-group-addon">
          <span class="glyphicon glyphicon-th"></span>
      </div>
    </div>
</div>



<div class="form-group">
    <label for="cohort_startdate">Cohort End Date</label>
     <div class="input-group date">
      <input type="text" id="activity_date" name="cohort_enddate" class="datepicker form-control">
      <div class="input-group-addon">
          <span class="glyphicon glyphicon-th"></span>
      </div>
    </div>
</div>






 

<input type='hidden' name='agency_name' value="<?php echo $this->session->userdata('OrgName'); ?>"></input>
 <button type="submit" class="btn btn-default">Create Cohort</button>

</form>

</div>
</div> 
</div>

<script type="text/javascript">
	$('.datepicker').datepicker(
		{format:"yyyy-mm-dd",
    
	}).on('changeDate',function(e){
    $(this).datepicker('hide')
  });


  $("#newCohort").submit(function(event){
    event.preventDefault();
    $data = $("#newCohort").serialize();
    $.post('create_cohort',$data,function(data){
      window.location.href = 'home_page';
    })
  })
</script>