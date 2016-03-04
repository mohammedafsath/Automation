<?php include"navigation.php"; ?>

<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("cri_project",$con);
	if(isset($_POST['next']))
	{
		$sql=mysql_query("INSERT INTO `cri_tickets_machine_costdetails`( `ticket_id`, `machine_cost`, `special_accessories`,`total_cost`, `ed`, `edu_cess`, `sales_tax`, `transport_cost`, `other_cost`, `machine_landed_cost`, `capital_cost_hourrate`,`depreciation`,  `interest`,  `labour`, `power`, `lease_rentalrate_month`, `area_usedby_machine`, `lease_rentalrate_hour`,`maintenance`, `cycle_time`, `components_hour`, `operating_hours`, `operating_efficiency`, `components_day_efficiency`,`total_pdn_year`, `depreciation_cost`, `interest_cost`, `labour_cost`, `power_cost`, `rent`, `tool_cost`, `maintenance_cost`,`consumable_cost`, `total_cost_year`, `proposed_process_cost`, `present_process_cost`, `cost_saving_year`, `tax`, `profit_after_tax`,`depreciation_payback`, `total_cash`, `payback`, `return_of_investment`) VALUES ('".$_POST['ticket_id']."','".$_POST['machine_cost']."','".$_POST['special_accessories']."','".$_POST['total_cost']."','".$_POST['ed']."','".$_POST['edu_cess']."','".$_POST['sales_tax']."','".$_POST['transport_cost']."','".$_POST['other_cost']."', '".$_POST['machine_landed_cost']."','".$_POST['capital_cost_hourrate']."','".$_POST['depreciation']."','".$_POST['interest']."','".$_POST['labour']."','".$_POST['power']."','".$_POST['lease_rentalrate_month']."','".$_POST['area_usedby_machine']."','".$_POST['lease_rentalrate_hour']."','".$_POST['maintenance']."','".$_POST['cycle_time']."','".$_POST['components_hour']."','".$_POST['operating_hours']."','".$_POST['operating_efficiency']."','".$_POST['components_day_efficiency']."','".$_POST['total_pdn_year']."','".$_POST['depreciation_cost']."','".$_POST['interest_cost']."','".$_POST['labour_cost']."','".$_POST['power_cost']."','".$_POST['rent']."','".$_POST['tool_cost']."','".$_POST['maintenance_cost']."','".$_POST['consumable_cost']."','".$_POST['total_cost_year']."','".$_POST['proposed_process_cost']."','".$_POST['present_process_cost']."','".$_POST['cost_saving_year']."','".$_POST['tax']."','".$_POST['profit_after_tax']."','".$_POST['depreciation_payback']."','".$_POST['total_cash']."','".$_POST['payback']."','".$_POST['return_of_investment']."')");
		//echo "INSERT INTO `cri_tickets_machine_costdetails`( `ticket_id`, `machine_cost`, `special_accessories`,`total_cost`, `ed`, `edu_cess`, `sales_tax`, `transport_cost`, `other_cost`, `machine_landed_cost`, `capital_cost_hourrate`,`depreciation`,  `interest`,  `labour`, `power`, `lease_rentalrate_month`, `area_usedby_machine`, `lease_rentalrate_hour`,`maintenance`, `cycle_time`, `components_hour`, `operating_hours`, `operating_efficiency`, `components_day_efficiency`,`total_pdn_year`, `depreciation_cost`, `interest_cost`, `labour_cost`, `power_cost`, `rent`, `tool_cost`, `maintenance_cost`,`consumable_cost`, `total_cost_year`, `proposed_process_cost`, `present_process_cost`, `cost_saving_year`, `tax`, `profit_after_tax`,`depreciation_payback`, `total_cash`, `payback`, `return_of_investment`) VALUES ('".$_POST['ticket_id']."','".$_POST['machine_cost']."','".$_POST['special_accessories']."','".$_POST['total_cost']."','".$_POST['ed']."','".$_POST['edu_cess']."','".$_POST['sales_tax']."','".$_POST['transport_cost']."','".$_POST['other_cost']."', '".$_POST['machine_landed_cost']."','".$_POST['capital_cost_hourrate']."','".$_POST['depreciation']."','".$_POST['interest']."','".$_POST['labour']."','".$_POST['power']."','".$_POST['lease_rentalrate_month']."','".$_POST['area_usedby_machine']."','".$_POST['lease_rentalrate_hour']."','".$_POST['maintenance']."','".$_POST['cycle_time']."','".$_POST['components_hour']."','".$_POST['operating_hours']."','".$_POST['operating_efficiency']."','".$_POST['components_day_efficiency']."','".$_POST['total_pdn_year']."','".$_POST['depreciation_cost']."','".$_POST['interest_cost']."','".$_POST['labour_cost']."','".$_POST['power_cost']."','".$_POST['rent']."','".$_POST['tool_cost']."','".$_POST['maintenance_cost']."','".$_POST['consumable_cost']."','".$_POST['total_cost_year']."','".$_POST['proposed_process_cost']."','".$_POST['present_process_cost']."','".$_POST['cost_saving_year']."','".$_POST['tax']."','".$_POST['profit_after_tax']."','".$_POST['depreciation_payback']."','".$_POST['total_cash']."','".$_POST['payback']."','".$_POST['return_of_investment']."')";
		echo "<script type='text/javascript'>window.location.href='h_cr_5.php';</script>";
	}
?>


<script>
	function totalcost() 
	{
        var machine_cost = document.getElementsByName('machine_cost')[0].value;
        var special_accessories = document.getElementsByName('special_accessories')[0].value;
        var total_cost = (+machine_cost) + (+special_accessories);
        document.getElementsByName('total_cost')[0].value = total_cost;
    }
	
	function calculate_machine_landedcost()
	{
	var total_cost = $("#total_cost").val();
	var ed = $("#ed").val();	
	var ed_val = (total_cost * ed) / 100;	
	var edu_cess = $("#edu_cess").val();
	var educess_val = (total_cost * edu_cess) / 100;	
	var sales_tax = $("#sales_tax").val();
	var salestax_val = (total_cost * sales_tax) / 100;		
	var transport_cost = $("#transport_cost").val();
	var other_cost = $("#other_cost").val();			
	var machine_landed_cost = parseInt(total_cost) + parseInt(ed_val) + parseInt(educess_val) + parseInt(salestax_val) + parseInt(transport_cost) + parseInt(other_cost);
	$("#machine_landed_cost").val(parseInt(machine_landed_cost));		
	var capital_cost_hourrate = parseInt(machine_landed_cost) / 6600;
	$("#capital_cost_hourrate").val(parseFloat(capital_cost_hourrate).toFixed(2));	
	}

	function capital_cost_hourrate()
	{
		var machine_landed_cost = document.getElementsByName('machine_landed_cost')[0].value;
        var capital_cost_hourrate = (+machine_landed_cost) / (22*25*12);
        document.getElementsByName('capital_cost_hourrate')[0].value = capital_cost_hourrate;
	}
	function calculate_depreciation_value()
	{
	var depreciation = $("#depreciation").val();
	var machine_landed_cost = $('#machine_landed_cost').val();
	var depreciation_value = (machine_landed_cost * depreciation) / 100;
	//$("#depreciation_value").val(parseInt(depreciation_value));	
	//var depreciation_cost = parseInt(machine_landed_cost) * parseInt(depreciation_value);
	$("#depreciation_cost").val(parseInt(depreciation_value));	
	}
	function calculate_interest_value()
{
	var interest = $("#interest").val();
	var machine_landed_cost = $('#machine_landed_cost').val();
	var interest_value = (machine_landed_cost * interest) / 100;
	//$("#interest_value").val(parseInt(interest_value));	
	
	//var interest_cost = parseInt(machine_landed_cost) * parseInt(interest_value);
	$("#interest_cost").val(parseInt(interest_value));
}

function calculate_labourcost()
{
	var labour = $('#labour').val();
	var labour_cost = parseInt(labour);
	$("#labour_cost").val(parseInt(labour_cost));
}

function calculate_powercost()
{
	var power = $('#power').val();
	var power_cost = parseFloat(power) * 12 * 4.5 * 22 * 25;
	$("#power_cost").val(parseInt(power_cost));
}

function calculate_leaserentalratehour()
{
	var lease_rentalrate_hour = $('#lease_rentalrate_hour').val();	
	var rent = parseFloat(lease_rentalrate_hour) * 12 * 22 * 25;
	$("#rent").val(parseInt(rent));
}

function calculate_maintenancecost()
{
	var maintenance = $('#maintenance').val();
	var machine_landed_cost = $('#machine_landed_cost').val();
	
	var maintenance_cost = parseFloat(maintenance) * parseInt(machine_landed_cost);
	$("#maintenance_cost").val(parseInt(maintenance_cost));
}

function calculate_totalcostyear()
{
	var depreciation_cost = $("#depreciation_cost").val();
	var interest_cost = $("#interest_cost").val();
	var labour_cost = $("#labour_cost").val();
	var power_cost = $("#power_cost").val();
	var rent = $("#rent").val();
	var tool_cost = $("#tool_cost").val();
	var maintenance_cost = $("#maintenance_cost").val();
	var consumable_cost = $("#consumable_cost").val();
	var total_pdn_year = $("#total_pdn_year").val();		
			
	var total_cost_year = parseInt(depreciation_cost) + parseInt(interest_cost) + parseInt(labour_cost) + parseInt(power_cost) + parseInt(rent) + parseInt(tool_cost) + parseInt(maintenance_cost) + parseInt(consumable_cost);
	$("#total_cost_year").val(parseInt(total_cost_year));

	var proposed_process_cost = total_cost_year / total_pdn_year;
	$("#proposed_process_cost").val(parseInt(proposed_process_cost));
}

function calculate_costsavingperyear()
{
	var proposed_process_cost = $("#proposed_process_cost").val();
	var present_process_cost = $("#present_process_cost").val();
	var total_pdn_year = $("#total_pdn_year").val();
	
	var total = parseInt(proposed_process_cost) - parseInt(present_process_cost);
	var cost_saving_year = total * total_pdn_year;
	$("#cost_saving_year").val(parseInt(cost_saving_year));
	
	var tax_value = $('#tax_value').val();
	var tax = (cost_saving_year * tax_value) / 100;
	$("#tax").val(parseInt(tax));
	
	var profit_after_tax = parseInt(cost_saving_year) - parseInt(tax);
	$("#profit_after_tax").val(parseInt(profit_after_tax));
	
	var depreciation_value = $("#depreciation_cost").val();
	var depreciation_payback = parseInt(depreciation_value) + parseInt(profit_after_tax);
	$("#depreciation_payback").val(parseInt(depreciation_payback));
	
	var total_cash = parseInt(depreciation_payback) + parseInt(profit_after_tax);
	$("#total_cash").val(parseInt(total_cash));
	
	var total_cash = parseInt(depreciation_payback) + parseInt(profit_after_tax);
	$("#total_cash").val(parseInt(total_cash));
	
	var machine_landed_cost = $('#machine_landed_cost').val();
	var payback = machine_landed_cost / total_cash;
	$("#payback").val(parseFloat(payback));
	
	var return_of_investment = parseInt(profit_after_tax) / parseInt(machine_landed_cost);
	$("#return_of_investment").val(parseFloat(return_of_investment));
}

</script>

<!DOCTYPE html>
<html>
  <head>
	
      <!-- Left side column. contains the logo and sidebar -->
		
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header" align="center">
          <h1
<font color="#006600" family="ariel">COST CALCULATION FOR THE MACHINE	</font>
          </h1>
       </section>

        <!-- Main content Place your content here-->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <!--<div class="row">
            <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
			<form name=form1 action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="box">
                <div class="box-header">
                  <font color=red>
				  
				  <TR>
												<TD class=info colspan=4 align=left><B>Details				</B></td>
																		</TR>	
				  
				  </font>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      
                    </thead>
                    <tbody>
                     	
											<TR>
											<td class=back2 align=right>Basic Machine Cost :</td>
				  <td class=back align=left>
					<input type=text name=machine_cost id=machine_cost required>
				  </td>
              
				<td valign=top class=back2 align=right>Special Accessories :</td>
				<td class=back valign=top >
				<input type=text name=special_accessories id=special_accessories onBlur='totalcost()' required></td>
				</tr>
				 <tr>
					<td class=back2 valign=top align=right>Total Cost :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=total_cost id=total_cost required>
					</td>						
					<td class=back2 valign=top align=right>ED% :</td>
             			 <td>
							<select name=ed id=ed  required>
								<option value="">Select</option>
								<?php
								$select=mysql_query("select * from cri_ro_taxvalues where taxtype=1 ");
								while($rows=mysql_fetch_assoc($select))
								{
								?>
								<option value="<?php echo $rows['taxvalue']; ?>"> <?php echo $rows['taxvalue']; ?> </option>
								<?php } ?>
							</select>
						</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Edu Cess % :</td>
             			 <td>
							<select name=edu_cess id=edu_cess  required>
								<option value="">Select</option>
								<?php
								$select=mysql_query("select * from cri_ro_taxvalues where taxtype=2 ");
								while($rows=mysql_fetch_assoc($select))
								{
								?>
								<option value="<?php echo $rows['taxvalue']; ?>"><?php echo $rows['taxvalue']; ?></option>>
								<?php } ?>
							</select>
						</td>
				
					<td class=back2 valign=top align=right>Sales Tax % :</td>
             			<td>
							<select name=sales_tax id=sales_tax  required>
								<option value="">Select</option>
								<?php
								$select=mysql_query("select * from cri_ro_taxvalues where taxtype=3 ");
								while($rows=mysql_fetch_assoc($select))
								{
								?>
								<option value="<?php echo $rows['taxvalue']; ?>"> <?php echo $rows['taxvalue']; ?> </option>
								<?php } ?>
							</select>
						</td>
				</tr>
				
				<tr>
					<td class=back2 valign=top align=right>Transport Cost :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=transport_cost id=transport_cost required>
					</td>
				
					<td class=back2 valign=top align=right>Others<br>(Clearing/Forwarding/Packing) :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=other_cost id=other_cost required onBlur="calculate_machine_landedcost()">
					</td>
				</tr>
				
				<tr>
					<td class=back2 valign=top align=right>Machine Landed Cost (Rs.)-(A) :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name="machine_landed_cost" id="machine_landed_cost" onBlur="capital_cost_hourrate()" required>
					</td>
				
					<td class=back2 valign=top align=right>Machine Capital cost hour rate <br> -(A / 22 / 25 / 12) :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=capital_cost_hourrate id="capital_cost_hourrate"  required>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Depreciation (%)-(B):</td>
             			 <td>
							<select name=depreciation id="depreciation" onChange="return calculate_depreciation_value()" required>
								<option value="">Select</option>
								<?php
								$select=mysql_query("select * from cri_ro_taxvalues where taxtype=4 ");
								while($rows=mysql_fetch_assoc($select))
								{
								?>
								<option value="<?php echo $rows['taxvalue']; ?>"><?php echo $rows['taxvalue']; ?></option>
								<?php } ?>
							</select>
						</td>
					
					<td class=back2 valign=top align=right>Interest - (C) :</td>
             			  <td>
							<select name=interest id="interest" onChange="return calculate_interest_value()" required>
								<option value="">Select</option>
								<?php
								$select=mysql_query("select * from cri_ro_taxvalues where taxtype=5 ");
								while($rows=mysql_fetch_assoc($select))
								{
								?>
								<option value="<?php echo $rows['taxvalue']; ?>"><?php echo $rows['taxvalue']; ?></option>
								<?php } ?>
							</select>
						</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Labour - (D) :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=labour id=labour onBlur="return calculate_labourcost()" required>
					</td>
					
					<td class=back2 valign=top align=right>Power (units)(kw) - (E) :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=power id=power onBlur="return calculate_powercost()" required>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Lease Rental rate for month / sq.ft :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=lease_rentalrate_month required>
					</td>
					
					<td class=back2 valign=top align=right>Area used by machine in sq.ft :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=area_usedby_machine required>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Lease Rental cost / hr (F) :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=lease_rentalrate_hour id=lease_rentalrate_hour onBlur="return calculate_leaserentalratehour()" required>
					</td>
					
					<td class=back2 valign=top align=right>Maintenance (G) :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=maintenance id=maintenance onBlur="return calculate_maintenancecost()" required>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Cycle time / component (incl loading <br>& unloading) (Seconds) :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=cycle_time required>
					</td>
					
					<td class=back2 valign=top align=right>No of components / hour :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=components_hour required>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Operating hours :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=operating_hours required>
					</td>
					
					<td class=back2 valign=top align=right>Operating efficiency :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=operating_efficiency required>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>No of components / day<br> @ 80% efficiency :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=components_day_efficiency required>
					</td>
					
					<td class=back2 valign=top align=right>Total Pdn / year (H) :</td>
             			 <td valign=top class=back align=left>
						 	<input type=text name=total_pdn_year id=total_pdn_year required>
					</td>
				</tr>	
					 
					 
		</table>
					  
					  
                    </tbody>
                 </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

               <div class="box">
                <div class="box-header">
                  
                </div><!-- /.box-header -->
                
				
				<div class="box-body">
                  <table class="table table-bordered table-striped">
                    <tbody>
                      			<tr>
									<td class=info colspan=7 align=center><b> Cost / Year	</b></td>
								</tr>
								<TR>
								<td class=back2 align=right>Depreciation (A X B) :</td>
				  <td class=back align=left>
					<input type=text name=depreciation_cost id=depreciation_cost readonly required>
				  </td>
              
				<td valign=top class=back2 align=right>Interest (A X C) :</td>
				<td class=back valign=top >
				<input type=text name=interest_cost id=interest_cost required readonly><input type=hidden name=tax_value id=tax_value value=13.40></td>
			</tr>
			 <tr>
				<td class=back2 valign=top align=right>Labour (D X 12) # :</td>
					 <td valign=top class=back align=left>
						<input type=text name=labour_cost id=labour_cost required readonly>
				</td>
			
				<td class=back2 valign=top align=right>Power (E X 4.5 X 22 x 25 X 12) ## :</td>
					 <td valign=top class=back align=left>
						<input type=text name=power_cost id=power_cost required readonly>
				</td>
			</tr>
			<tr>
				<td class=back2 valign=top align=right>Rent (F X 22 X 25 X 12) # :</td>
					 <td valign=top class=back align=left>
						<input type=text name=rent id=rent required readonly>
				</td>
			
				<td class=back2 valign=top align=right>Tool Cost / year ### :</td>
					 <td valign=top class=back align=left>
						<input type=text name=tool_cost id=tool_cost required>
				</td>
			</tr>
			<tr>
				<td class=back2 valign=top align=right>Maintenance (A X G) :</td>
					 <td valign=top class=back align=left>
						<input type=text name=maintenance_cost id=maintenance_cost readonly required>
				</td>
			
				<td class=back2 valign=top align=right>Consumables cost / year (Stores) :</td>
					 <td valign=top class=back align=left>
						<input type=text name=consumable_cost id=consumable_cost onBlur="return calculate_totalcostyear()" required>
				</td>
			</tr>
			<tr>
				<td class=back2 valign=top align=right><b>Total cost / year (Rs.)(I) :</b></td>
					 <td valign=top class=back align=left colspan=3>
						<input type=text name=total_cost_year id=total_cost_year required readonly>
				</td>
			</tr>
			<tr class="info">
				<td class=back2 valign=top align=center colspan=4><b>Process Cost</b></td>
			</tr>		 
			<tr>
				<td class=back2 valign=top align=right>Proposed process Cost / <br>component - A1=(I/H) :</td>
					 <td valign=top class=back align=left>
						<input type=text name=proposed_process_cost id=proposed_process_cost required>
				</td>
				<td class=back2 valign=top align=right>Present Process Cost / <br>component - A2 :</td>
					 <td valign=top class=back align=left>
						<input type=text name=present_process_cost id=present_process_cost onBlur="return calculate_costsavingperyear()" required>
				</td>
			</tr>
			<tr class="info">
				<td class=back2 valign=top align=center colspan=4><b>Pay back Calculations</b></td>
			</tr>		 
			<tr>
				<td class=back2 valign=top align=right>Cost Saving/year - A3=((A1-A2)*H) :</td>
					 <td valign=top class=back align=left>
						<input type=text name=cost_saving_year id=cost_saving_year required>
				</td>
				<td class=back2 valign=top align=right>Tax(less IT 35.70%) - A4=(A3*35.70%) :</td>
					 <td valign=top class=back align=left>
						<input type=text name=tax id=tax required>
				</td>
			</tr>
			<tr>
				<td class=back2 valign=top align=right>Profit after Tax - A5=(A3-A4) :</td>
					 <td valign=top class=back align=left>
						<input type=text name=profit_after_tax id=profit_after_tax required>
				</td>
				<td class=back2 valign=top align=right>Add Depreciation (10.34% of Capital)<br> - A6=(A5+B) :</td>
					 <td valign=top class=back align=left>
						<input type=text name=depreciation_payback id=depreciation_payback required>
				</td>
			</tr>
			<tr>
				<td class=back2 valign=top align=right>Total Cash Generation - A7=(A5+A6) :</td>
					 <td valign=top class=back align=left>
						<input type=text name=total_cash id=total_cash required>
				</td>
				<td class=back2 valign=top align=right>Pay back (Years) - A8 =(A/A7) :</td>
					 <td valign=top class=back align=left>
						<input type=text name=payback id=payback required>
				</td>
			</tr>
			<tr>
				<td class=back2 valign=top align=right>Return of Investment (%) - A9 = (A5/A) :</td>
					 <td valign=top class=back align=left colspan=3>
						<input type=text name=return_of_investment id=return_of_investment required>
				</td>
			</tr>	</table>
		</td>
		</tr>
		</table><br><center><input type=hidden name=ticket_id value="20">
		<input name="next" value="Next" style="font-weight:bold;" type="submit">
		&nbsp;&nbsp;&nbsp;<input type=reset name=reset style='font-weight:bold;' value=Reset></form></form></center>      </TR>
      </TBODY>
    </TABLE>
    <BR>
  </TD>
</TR>     
		</table>
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

		</div><!-- /.row -->
          <!-- Main row -->
          
        </section>
      </div><!-- /.content-wrapper -->
	  
	<script>
			function reset()
			{
			document.getElementById("form1").reset();
			}
	</script>
 </body>
</html>
  <?php include"footer.php"; ?> 