<div class="container" style="margin-top:80px">
<h4>Add child</h4>
<a class="addActivityLink" href="<?php echo base_url();?>site/home_page"><span class='glyphicon glyphicon-arrow-left'></span>    Go back to summary screen</a>
<br />
Please contact Help Me Grow to enroll client and to receive HMG identification.

<hr />
	<div class="row">
	<div class="col-md-8">	
  
	<form action="submit_child" method="POST">
       <div class="form-group">	
       	<label class="control-label col-sm-2" for="first_name">First Name:</label>
       	<input type='text' class="form-control" name="first_name" placeholder="First Name"></input>
       </div>

        <div class="form-group">
       	<label class="control-label col-sm-2" for="last_name">Last Name:</label>
       	<input type='text' class="form-control" name="last_name" placeholder="Last Name"></input>
       	</div>
 		<div class="form-group">
 		<label class="control-label col-sm-2" for="caregiver_name">Caregiver Name:</label>
       	<input type='text' class="form-control" name="caregiver_name" placeholder="Caregiver name"></input>
       	</div>
       	<div class="form-group">
       	<label class="control-label col-sm-2" for="hmg_id">Help Me Grow ID#:</label>
       	<input type='text' class="form-control" name="hmg_id" placeholder="HMG ID"></input>
       	</div>
       	<!--<div class='form-group'>
	       	<label  class="control-label" for="assignment">Assign to:</label>
	       	<select id="assignment" name="assignment" class="form-control">
	       			<option>Agency 1</option>
	       			<option>Agency 2</option>
	       			<option>Agency 3</option>
	       			<option>Agency 4</option>
	       	</select>
       	</div>-->
        <hr />
       		<div class="form-group">	
      	<input type="submit" value="Add Child" class="btn btn-success btn-lg"></input>
      	</div>
    </form>
    </div>	
    <?php if (isset($message)) { ?>
<CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
<?php } ?>
</div>