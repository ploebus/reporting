<div class="container" style="margin-top:80px">

	<div class="row">
<h4>Add child</h4>
<a class="addActivityLink" href="<?php echo base_url();?>index.php/admin/home_page"><span class='glyphicon glyphicon-arrow-left'></span>    Go back to summary screen</a>
</div>
<div class="row">
  <div class="row">
	<div class="col-md-8">	
  <hr />
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
       	<div class=="form-group">
	       	<label  class="control-label" for="assignment">Assign to:</label>
	       	
          
          <select id="assignment" name="AssignedTo" class="form-control">
	       			<?php foreach($agencies as $agency) :?>
                <option value='<?php echo $agency->name?>'><?php echo $agency->name?></option>
              <?php endforeach; ?>
          </select>
       	</div>
         <hr />
       		<div class="form-group">	
      	<input type="submit" class="btn btn-lg" value="add child"></input>
      	</div>
    </form>

    </div>	
    <?php if (isset($message)) { ?>
<CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
<?php } ?>

</div>