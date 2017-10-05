

<div class="container-fluid" style="margin-top:80px">
<div class="row">
	<div class="col-md-10">
	<h4>Admin panel</h4>
	Please use this area to enter children into the system and to assign them to an agency. You will be able to monitor their progress in the 'View' window for each child.
	<hr />
	<a href="archived_children"><h5>Click here to see inactive or closed clients</h5></a>
	</div>
</div>
<div class="row">
	
		<div class="col-md-6">
			<h4>Needs to have initial packet sent</h4>
			<table class="table table-striped">
				<thead>
					<th>NAME</th>
					<th>AGENCY</th>
					<th>DATE ENROLLED</th>
					
					
				</thead>
					
						<?php foreach ($needs_packets as $np):?>
							<tr>
								<td><?php echo $np->fullname; ?></td>
								<td><?php echo $np->AssignedTo; ?></td>
								<td><?php echo date_format(date_create($np->date_created),'m/d/Y');; ?></td>
							</tr>
						<?php endforeach; ?>
			
					

			</table>
		</div>
		<div class="col-md-6">
			<h4>Needs to have initial packet returned</h4>
			<table class="table table-striped">
				<thead>
					<th>NAME</th>
					<th>AGENCY</th>
					<th>PACKET SENT</th>
					
				</thead>
					<?php foreach ($returns_packets as $rp):?>
							<tr>
								<td><?php echo $rp->fullname; ?></td>
								<td><?php echo $rp->AssignedTo; ?></td>
								<td><?php echo date_format(date_create($rp->status_date),'m/d/Y');; ?></td>
							</tr>
						<?php endforeach; ?>

			</table>
		</div>
</div>
<div class="row">
<div class="col-md-10">
<h4>Children</h4>
<a href="add_child"> <span class='glyphicon glyphicon-plus '></span> Add a Child</a>
<table class='table table-striped'>
	<thead>
	<th>NAME</th>
	<th>DATE ENROLLED</th>
	<th>LAST COMPLETED STATUS</th>
	<th>DATE OF STATUS COMPLETED</th>
	<th>ASSIGNED TO</th>
	<th>ACTIONS</th>
	</thead>
	<?php foreach ($children as $child):?>
	<tr>
		<td><?php echo $child->child_firstname. " " . $child->child_lastname ;?></td>
		<td><?php echo date_format(date_create($child->date_created),'m/d/Y'); ?></td>
		<td><?php echo $child->description ;?></td>
		<td>
		<?php 
		$s_date = (is_null($child->last_status_date))?'date not entered': date_format(date_create($child->last_status_date),'m/d/Y'); 
		echo $s_date;
		?>
			</td>
		<td><?php echo $child->AssignedTo ;?></td>
		<td style='font-size:.9em'><a href ="view_child/<?php echo $child->child_id ;?>" class="recordView">VIEW</a> | <a class="remove_child_start" data-kid="<?php echo $child->child_id; ?>" href="do_something">REMOVE RECORD</a> </td>
	</tr>
	<?php endforeach;?>
</table>

</div>
</div>

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
<script type="text/javascript">
		
		var selectedChild;

				
	
		$('.remove_child_start').click(function(event){
			event.preventDefault();
			selectedChild = $(this).attr('data-kid');
			console.log(selectedChild);
			$('#removeChildModal').modal('toggle');
		});
		
		$('#removeChild').click(function(event){
			//console.log('hello')
			event.preventDefault();
			//console.log(selectedChild);
			var theData = {
				'child_id':selectedChild
			};
			$.post('remove_child',theData, function(data){
				
				window.location.href="<?php echo base_url(); ?>admin/home_page";

			});


		})
	</script>
	<!---END MODAL-->
</div>




