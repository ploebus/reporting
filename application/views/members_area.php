

<div class="container" style="margin-top:80px">
<div id="members_area">

		<div class="row">
				<div class="col-md-3">
					<h4> <?php echo $OrgName ?></h4>
				</div>

			</div>

			
			<hr />
			Please use these categories to report how you used your quality counts rewards. These categories mirror those asked by the State to report how this money is being used. We are asking that you report twice annualy. The first period is SOME DATE to SOME DATA and the second period is SOME DATE to SOME DATE. 
			<hr />

			<!--first tab navigator-->
			<ul class="nav nav-tabs parentTabs" role="tablist">
				<li role="presentation" class="active"><a href="#r1" aria-controls="r1" role="tab" data-toggle="tab">First Reporting Period</a></li>
				<li role="presentation" class="kids"><a href="#r2" aria-controls="r2" role="tab" data-toggle="tab">Second Reporting Period</a></li>
			</ul>
			<div class="tab-content">

				<!--first REPORT-->

				<div role="tabpanel" class="tab-pane fade active in" id="r1">


					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#certified" aria-controls="classified" role="tab" data-toggle="tab">Certified Salaries</a></li>
						<li role="presentation" class="kids"><a href="#classified" aria-controls="certified" role="tab" data-toggle="tab">Classified Salaries</a></li>
						<li role="presentation" class="kids"><a href="#benefits" aria-controls="benefits" role="tab" data-toggle="tab">Benefits</a></li>
						<li role="presentation" class="kids"><a href="#supplies" aria-controls="supplies" role="tab" data-toggle="tab">Supplies</a></li>
						<li role="presentation" class="kids"><a href="#travel" aria-controls="travel" role="tab" data-toggle="tab">Travel/Equipment/Contractual</a></li>
						<li role="presentation" class="kids"><a href="#other" aria-controls="other" role="tab" data-toggle="tab">Other Spending Categories</a></li>
					</ul>

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="certified">
						<form id="certified_1" data-cat="1000">
							<table class='table table-striped' id='QITable2'>

								<th>Item</th>
								<th><i>Current Amount</i></th>
								<th>New Amount($)</th>


								<tr>

									<td>Increase in Salaries</td>
									<td><i>$<?php echo $QIClaims->increase_1000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="increase_1000" name="increase_1000" type="number" value="<?php echo $QIClaims->increase_1000;?>"/>

										</div>
									</td>



								</tr>
								<tr>

									<td>Release Time/Substitutes</td>
									<td><i>$<?php echo $QIClaims->release_1000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="release_1000" name="release_1000" type="number" value="<?php echo $QIClaims->release_1000;?>"/>

										</div>
									</td>



								</tr>
								<tr>

									<td>Paid Pre-Service Day</td>
									<td><i>$<?php echo $QIClaims->pre_1000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="pre_1000" name="pre_1000" type="number" value="<?php echo $QIClaims->pre_1000;?>"/>

										</div>
									</td>



								</tr>
								<tr>

									<td>Professional Development/coursework reimbursement</td>
									<td><i>$<?php echo $QIClaims->pro_1000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="pro_1000" type="number" name="pro_1000" value="<?php echo $QIClaims->pro_1000;?>"/>

										</div>
									</td>


								</tr>
								<tr>

									<td>Additional staff to reduce adult to child ratios</td>
									<td><i>$<?php echo $QIClaims->ratio_1000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="ratio_1000" type="number" name="ratio_1000" value="<?php echo $QIClaims->ratio_1000;?>"/>

										</div>
									</td>




								</tr>
								<tr>

									<td>Additional staff to cover time for PLC/completing ASQs or other assessments</td>
									<td><i>$<?php echo $QIClaims->assessment_1000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="assessment_1000" type="number" name="assessment_1000" value="<?php echo $QIClaims->assessment_1000;?>"/>

										</div>
									</td>



								</tr>
								<tr>

									<td>Other</td>
									<td><i>$<?php echo $QIClaims->other_1000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="other_1000" type="number" name="other_1000" value="<?php echo $QIClaims->other_1000;?>"/>

										</div>
									</td>



								</tr>
							</table>

							POST THIS SECTION: <input type="submit" id="post1000" value="POST"></input>
							</form>
							Last Posted on: <span id="date_1000"><?php echo $QIClaims->postdate_1000;?></span>		
						</div>

						<!---close first tab-->
						<div role="tabpanel" class="tab-pane" id="classified">
							<form id="classified_1" data-cat="2000">
							<table class='table table-striped QITable'>

								<th>Item</th>
								<th><i>Current Amount</i></th>
								<th>Amount($)</th>
								


								<tr>

									<td>Paid Pre-Service Day</td>
									<td><i>$<?php echo $QIClaims->Paid_2000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="meeting" name="Paid_2000" type="number" value="<?php echo $QIClaims->Paid_2000;?>"/>

										</div>
									</td>
									


								</tr>
								<tr>

									<td>Other</td>
									<td><i>$<?php echo $QIClaims->other_2000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="meeting" name="other_2000" type="number" value="<?php echo $QIClaims->other_2000;?>"/>

										</div>
									</td>
								


								</tr>
							</table>
							POST THIS SECTION: <input type="submit" id="post2000" value="POST"></input>
							</form>
							Last Posted on: <span> <?php echo $QIClaims->postdate_2000;?></span>	
						</div>

						<div role="tabpanel" class="tab-pane" id="benefits">
							<form id="benefits_1" data-cat="3000">
							<table class='table table-stripe QITable'>

								<th>Item</th>
								<th><i>Current Amount</i></th>
								<th>Amount($)</th>
								


								<tr>

									<td>Other</td>
									<td><i>$<?php echo $QIClaims->other_3000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="meeting" name="other_3000" type="number" value="<?php echo $QIClaims->other_3000;?>"/>

										</div>
									</td>
									


								</tr>
							</table>
							POST THIS SECTION: <input type="submit" id="post3000" value="POST"></input>
							</form>
							Last Posted on: <span><?php echo $QIClaims->postdate_3000;?></span>	
						</div>
						<div role="tabpanel" class="tab-pane" id="supplies">
							<form id="supplies_1" data-cat="4000">
							<table class='table table-striped QITable'>

								<th>Item</th>
								<th><i>Current Amount</i></th>
								<th>Amount($)</th>
								


								<tr>

									<td>Other</td>
									<td><i>$<?php echo $QIClaims->other_4000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="meeting" input="other_4000" type="number" value="<?php echo $QIClaims->other_4000;?>"/>

										</div>
									</td>
									


								</tr>
							</table>
							POST THIS SECTION: <input type="submit" id="post4000" value="POST"></input>
							</form>
							Last Posted on: <span><?php echo $QIClaims->postdate_4000;?></span>	

						</div>
						
						<div role="tabpanel" class="tab-pane" id="travel">
							<form id="travel_1" data-cat="5000">
							<table class='table table-striped QITable'>

								<th>Item</th>
								<th><i>Current Amount</i></th>
								<th>Amount($)</th>
								


								<tr>

									<td>Travel</td>
									<td><i>$<?php echo $QIClaims->travel_5000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="meeting" name="travel_5000" type="number" value="<?php echo $QIClaims->travel_5000;?>"/>

										</div>
									</td>
								</tr>
								
								<tr>

									<td>Equipment</td>
									<td><i>$<?php echo $QIClaims->equipment_5000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="meeting" name="equipment_5000" type="number" value="<?php echo $QIClaims->equipment_5000;?>"/>

										</div>
									</td>
									


								</tr>
								<tr>

									<td>Workshop conference/registration fee</td>
									<td><i>$<?php echo $QIClaims->workshop_5000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="meeting" name="workshop_5000" type="number" value="<?php echo $QIClaims->workshop_5000;?>"/>

										</div>
									</td>
									


								</tr>
								<tr>

									<td>Incentives/Travel Stipend</td>
									<td><i>$<?php echo $QIClaims->incentives_5000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="meeting" name="incentives_5000" type="number" value="<?php echo $QIClaims->incentives_5000;?>"/>

										</div>
									</td>
									


								</tr>
								<tr>

									<td>Contracted/Purchased Professional Development Services</td>
									<td><i>$<?php echo $QIClaims->contracted_5000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="meeting" name="contracted_5000" type="number" value="<?php echo $QIClaims->contracted_5000;?>"/>

										</div>
									</td>
									


								</tr>
								<tr>

									<td>Other</td>
									<td><i>$<?php echo $QIClaims->other_5000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="meeting" type="number" name="other_5000" value="<?php echo $QIClaims->other_5000;?>"/>

										</div>
									</td>
									


								</tr>
							</table>
							POST THIS SECTION: <input type="submit" id="post5000" value="POST"></input>
							</form>
							Last Posted on:<span> <?php echo $QIClaims->postdate_5000;?></span>	
						</div>
						<div role="tabpanel" class="tab-pane" id="other">
							<form id="other_1" data-cat="6000">
							<table class='table table-striped QITable'>

								<th>Item</th>
								<th><i>Current Amount</i></th>
								<th>Date of Entry</th>


								<tr>

									<td>Other</td>
									<td><i>$<?php echo $QIClaims->other_6000;?></i></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input id="meeting" name="other_6000" type="number" value="<?php echo $QIClaims->other_6000;?>"/>

										</div>
									</td>
									


								</tr>
							</table>
							POST THIS SECTION: <input type="submit" id="post6000" value="POST"></input>
							</form>
							Last Posted on: <span> <?php echo $QIClaims->postdate_6000;?></span>	
						</div>
					</div>

				</div>

				<!--THIS IS THE SECOND REPORTING TAB-->


				<div role="tabpanel" class="tab-pane" id="r2">
					<div class="tab-content">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#certified2" aria-controls="certified2" role="tab" data-toggle="tab">Certified Salaries</a></li>
							<li role="presentation" class="kids"><a href="#classified2" aria-controls="certified2" role="tab" data-toggle="tab">Classified Salaries</a></li>
							<li role="presentation" class="kids"><a href="#benefits2" aria-controls="benefits2" role="tab" data-toggle="tab">Benefits</a></li>
							<li role="presentation" class="kids"><a href="#supplies2" aria-controls="supplies2" role="tab" data-toggle="tab">Supplies</a></li>
							<li role="presentation" class="kids"><a href="#travel2" aria-controls="travel2" role="tab" data-toggle="tab">Travel/Equipment/Contractual</a></li>
							<li role="presentation" class="kids"><a href="#other2" aria-controls="other2" role="tab" data-toggle="tab">Other Spending Categories</a></li>
						</ul>

							<div role="tabpanel active" class="tab-pane" id="certified2">
							<form id="certified_2" action="#" method="POST" data-cat="1000">
								<table class='table table-striped QITable'>
								
									<th>Item</th>
									<th><i>Current Amount</i></th>
									<th>New Amount($)</th>


									<tr>

										<td>Increase in Salaries</td>
										<td><i>$<?php echo $QIClaims2->increase_1000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="increase2_1000" name="increase_1000" type="number" value="<?php echo $QIClaims2->increase_1000;?>"/>

											</div>
										</td>



									</tr>
									<tr>

										<td>Release Time/Substitutes</td>
										<td><i>$<?php echo $QIClaims2->release_1000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" name="release_1000" type="number" value="<?php echo $QIClaims2->release_1000;?>"/>

											</div>
										</td>



									</tr>
									<tr>

										<td>Paid Pre-Service Day</td>
										<td><i>$<?php echo $QIClaims2->pre_1000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" name="pre_1000" type="number" value="<?php echo $QIClaims2->pre_1000;?>"/>

											</div>
										</td>



									</tr>
									<tr>

										<td>Professional Development/coursework reimbursement</td>
										<td><i>$<?php echo $QIClaims2->pro_1000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" name="pro_1000" type="number" value="<?php echo $QIClaims2->pro_1000;?>"/>

											</div>
										</td>


									</tr>
									<tr>

										<td>Additional staff to reduce adult to child ratios</td>
										<td><i>$<?php echo $QIClaims2->ratio_1000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" name="ratio_1000" type="number" value="<?php echo $QIClaims2->ratio_1000;?>"/>

											</div>
										</td>




									</tr>
									<tr>

										<td>Additional staff to cover time for PLC/completing ASQs or other assessments</td>
										<td><i>$<?php echo $QIClaims2->assessment_1000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" name="assessment_1000" type="number" value="<?php echo $QIClaims2->assessment_1000;?>"/>

											</div>
										</td>



									</tr>
									<tr>

										<td>Other</td>
										<td><i>$<?php echo $QIClaims2->other_1000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" name="other_1000" type="number" value="<?php echo $QIClaims2->other_1000;?>"/>

											</div>
										</td>



									</tr>
								
								</table>
								POST THIS SECTION: <input type="submit" value="Submit" NAME="certified2"></input>
								</form>
								Last Posted on: <span><?php echo $QIClaims2->postdate_1000;?></span>
									
							</div>

							<!---close first tab-->
							<div role="tabpanel" class="tab-pane" id="classified2">
								<form id="classified_2" data-cat="2000">
									<table class='table table-striped QITable'>

										<th>Item</th>
										<th><i>Current Amount</i></th>
										<th>Amount($)</th>
										

										<tr>

											<td>Paid Pre-Service Day</td>
											<td><i>$<?php echo $QIClaims2->Paid_2000;?></i></td>
											<td>
												<div class="input-group">
													<div class="input-group-addon">$</div>
													<input id="inpPAID_2" type="number" name="Paid_2000" value="<?php echo $QIClaims2->Paid_2000;?>"/>

												</div>
											</td>
										</tr>
										<tr>

											<td>Other</td>
											<td><i>$<?php echo $QIClaims2->other_2000;?></i></td>
											<td>
												<div class="input-group">
													<div class="input-group-addon">$</div>
													<input id="inpOther_2" type="number" name="other_2000" value="<?php echo $QIClaims2->other_2000;?>"/>

												</div>
											</td>
											


										</tr>
									</table>
									POST THIS SECTION: <input type="submit" id="post2000" value="POST"></input>
								</form>
								Last Posted on: <span> <?php echo $QIClaims2->postdate_2000;?></span>	
							</div>

							<div role="tabpanel" class="tab-pane" id="benefits2">
								<form id="benefits_2" data-cat="3000">
								<table class='table table-striped QITable'>

									<th>Item</th>
									<th><i>Current Amount</i></th>
									<th>Amount($)</th>
									


									<tr>

										<td>Other</td>
										<td><i>$<?php echo $QIClaims2->other_3000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" type="number" name="other_3000" value="<?php echo $QIClaims->other_3000;?>"/>

											</div>
										</td>
										


									</tr>
								</table>
								POST THIS SECTION: <input type="submit" id="post3000" value="POST"></input>
								</form>
								Last Posted on: <span><?php echo $QIClaims2->postdate_3000;?></span>	
							</div>
							<div role="tabpanel" class="tab-pane" id="supplies2">
								<form id="supplies_2" data-cat="4000">
								<table class='table table-striped QITable'>

									<th>Item</th>
									<th><i>Current Amount</i></th>
									<th>Amount($)</th>


									<tr>

										<td>Other</td>
										<td><i>$<?php echo $QIClaims2->other_4000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" type="number" name="other_4000" value="<?php echo $QIClaims2->other_4000;?>"/>

											</div>
										</td>
										


									</tr>
								</table>
								POST THIS SECTION: <input type="submit" id="post4000" value="POST"></input>
								Last Posted on: <span><?php echo $QIClaims2->postdate_4000;?></span>	
								
								</form>
							</div>
							<div role="tabpanel" class="tab-pane" id="travel2">
								<form id="travel_2" data-cat="5000">
								<table class='table table-striped QITable'>

									<th>Item</th>
									<th><i>Current Amount</i></th>
									<th>Amount($)</th>
									


									<tr>

										<td>Travel</td>
										<td><i>$<?php echo $QIClaims2->travel_5000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" name="travel_5000" type="number" value="<?php echo $QIClaims2->travel_5000;?>"/>

											</div>
										</td>
									


									</tr>
									<tr>

										<td>Equipment</td>
										<td><i>$<?php echo $QIClaims2->equipment_5000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" type="number" name="equipment_5000" value="<?php echo $QIClaims2->equipment_5000;?>"/>

											</div>
										</td>
										


									</tr>
									<tr>

										<td>Workshop conference/registration fee</td>
										<td><i>$<?php echo $QIClaims2->workshop_5000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" type="number" name="workshop_5000" value="<?php echo $QIClaims2->workshop_5000;?>"/>

											</div>
										</td>
										


									</tr>
									<tr>

										<td>Incentives/Travel Stipend</td>
										<td><i>$<?php echo $QIClaims2->incentives_5000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" type="number" name="incentives_5000" value="<?php echo $QIClaims2->incentives_5000;?>"/>

											</div>
										</td>
										


									</tr>
									<tr>

										<td>Contracted/Purchased Professional Development Services</td>
										<td><i>$<?php echo $QIClaims2->contracted_5000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" name="contracted_5000" type="number" value="<?php echo $QIClaims2->contracted_5000;?>"/>

											</div>
										</td>
										

									</tr>
									<tr>

										<td>Other</td>
										<td><i>$<?php echo $QIClaims2->other_5000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" type="number" name="other_5000" value="<?php echo $QIClaims2->other_5000;?>"/>

											</div>
										</td>
										


									</tr>
								</table>
								POST THIS SECTION: <input type="submit" id="post5000" value="POST"></input>
								</form>
								Last Posted on: <span><?php echo $QIClaims2->postdate_5000;?></span>	
							</div>

							<div role="tabpanel" class="tab-pane" id="other2">
								<form id="other_2" data-cat="6000">
								<table class='table table-striped QITable'>
									<th>Item</th>
									<th><i>Current Amount</i></th>
									<th>Amount($)</th>
									


									<tr>

										<td>Other</td>
										<td><i>$<?php echo $QIClaims2->other_6000;?></i></td>
										<td>
											<div class="input-group">
												<div class="input-group-addon">$</div>
												<input id="meeting" type="number" name="other_6000" value="<?php echo $QIClaims2->other_6000;?>"/>

											</div>
										</td>
										


									</tr>
								</table>
								POST THIS SECTION: <input type="submit" id="post6000" value="POST"></input>
								</form>
								Last Posted on: <span><?php echo $QIClaims2->postdate_6000;?></span>	
							</div>
						</div>

					</div>
					<div class='col-md-2'></div>



				</div>

				<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:green">Success</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
				
				<script type="text/javascript">
					 //shorthand document.ready function
    				$(function(){
    					$("form").submit(function(event) { //use on if jQuery 1.7+
       						var now = new Date().toJSON().slice(0,10);
       						event.preventDefault();
       						var params = $(this).attr("id").split("_");
       						var period = {"name":"period","value":params[1]};
							console.log(period)      				
        					var data = $( this ).serializeArray(); //use the 
        					data.unshift(period)
        					console.log(data)
        					$.post("postClaim",data,function(data){
        						$(".modal-body").text('Value entered.')
        						$("#myModal").modal();
        					})
        					$(this).next("span").text(now);
        					var section = "postdate_" + $(this).attr("data-cat");
        					

        					var data2 = new Array({"name":section ,"value":now});
        					data2.unshift(period)
        					console.log(data2)
        					$.post("postClaim",data2,function(data){
        						console.log(data);
        					})
        					

    					});
    				});
    				console.log("<?php echo $this->session->userdata("OrgName");?>")

				</script>


