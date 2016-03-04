	<?php include"navigation.php"; ?>

<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("cri_project",$con);

	if(isset($_POST['submit']))
	{
		$sql=mysql_query("INSERT INTO `cri_tickets_machine_costanalysis`( `ticket_id`, `total_prod_peryear`, `manpower_req`,`emp_salary`, `labour_cost_permonth`, `totalcost_labour_peryear`, `totalpower_required`, `cost_power_kw`,`totalcost_power_peryear`, `tool_total_prod_peryear`, `approx_tool_life`, `tool_consumption_perday`,`individual_tool_cost`, `toolcost_perday`, `toolcost_percomponent`, `totalcost_tool_peryear`, `depreciation`, `interest`, `labour_cost`, `power`, `rent`, `tool`, `maintenance`, `consumable`, `cost_component`, `process_cost`) VALUES ('".$_POST['ticket_id']."','".$_POST['total_prod_peryear']."','".$_POST['manpower_req']."','".$_POST['emp_salary']."','".$_POST['labour_cost_permonth']."','".$_POST['totalcost_labour_peryear']."','".$_POST['totalpower_required']."','".$_POST['cost_power_kw']."','".$_POST['totalcost_power_peryear']."', '".$_POST['tool_total_prod_peryear']."','".$_POST['approx_tool_life']."','".$_POST['tool_consumption_perday']."','".$_POST['individual_tool_cost']."','".$_POST['toolcost_perday']."','".$_POST['toolcost_percomponent']."','".$_POST['totalcost_tool_peryear']."','".$_POST['depreciation']."','".$_POST['interest']."','".$_POST['labour_cost']."','".$_POST['power']."','".$_POST['rent']."','".$_POST['tool']."','".$_POST['maintenance']."','".$_POST['consumable']."','".$_POST['cost_component']."','".$_POST['process_cost']."')");
		//echo "INSERT INTO `cri_tickets_machine_costanalysis`( `ticket_id`, `total_prod_peryear`, `manpower_req`,`emp_salary`, `labour_cost_permonth`, `totalcost_labour_peryear`, `totalpower_required`, `cost_power_kw`,`totalcost_power_peryear`, `tool_total_prod_peryear`, `approx_tool_life`, `tool_consumption_perday`,`individual_tool_cost`, `toolcost_perday`, `toolcost_percomponent`, `totalcost_tool_peryear`, `depreciation`, `interest`, `labour_cost`, `power`, `rent`, `tool`, `maintenance`, `consumable`, `cost_component`, `process_cost`) VALUES ('".$_POST['ticket_id']."','".$_POST['total_prod_peryear']."','".$_POST['manpower_req']."','".$_POST['emp_salary']."','".$_POST['labour_cost_permonth']."','".$_POST['totalcost_labour_peryear']."','".$_POST['totalpower_required']."','".$_POST['cost_power_kw']."','".$_POST['totalcost_power_peryear']."', '".$_POST['tool_total_prod_peryear']."','".$_POST['approx_tool_life']."','".$_POST['tool_consumption_perday']."','".$_POST['individual_tool_cost']."','".$_POST['toolcost_perday']."','".$_POST['toolcost_percomponent']."','".$_POST['totalcost_tool_peryear']."','".$_POST['depreciation']."','".$_POST['interest']."','".$_POST['labour_cost']."','".$_POST['power']."','".$_POST['rent']."','".$_POST['tool']."','".$_POST['maintenance']."','".$_POST['consumable']."','".$_POST['cost_component']."','".$_POST['process_cost']."')";
		echo "<script type='text/javascript'>window.location.href='starter.php';</script>";
	}
?>

<script>
function labourcost()
{
	var total_prod_peryear = $("#total_prod_peryear").val();
	var manpower_req = $("#manpower_req").val();
	var emp_salary = $("#emp_salary").val();
	var labour_cost = parseInt(emp_salary) * parseInt(manpower_req);
	$("#labour_cost_permonth").val(parseInt(labour_cost));	

	var labourcost_permonth = $("#labour_cost_permonth").val();	
	var totalcost_labour_peryear = parseInt(labourcost_permonth) * 12;
	$("#totalcost_labour_peryear").val(parseInt(totalcost_labour_peryear));	
}

function powercost()
{
	var totalpower_required = $("#totalpower_required").val();
	var cost_power_kw = $("#cost_power_kw").val();
	var totalcost_power_peryear = parseFloat(totalpower_required) * parseFloat(cost_power_kw) * 22 * 25 * 12;
	$("#totalcost_power_peryear").val(parseInt(totalcost_power_peryear));	
}

function toolcost()
{
	var tool_total_prod_peryear = $("#tool_total_prod_peryear").val();
	var approx_tool_life = $("#approx_tool_life").val();
	var tool_consumption_perday = $("#tool_consumption_perday").val();
	var individual_tool_cost = $("#individual_tool_cost").val();
	var toolcost_perday = parseInt(tool_consumption_perday) * parseInt(individual_tool_cost);
	$("#toolcost_perday").val(parseInt(toolcost_perday));
	
	var toolcost_percomponent = parseInt(toolcost_perday) / parseInt(approx_tool_life);
	$("#toolcost_percomponent").val(parseInt(toolcost_percomponent));
	
	var totalcost_tool_peryear = parseInt(tool_total_prod_peryear) * parseInt(toolcost_percomponent);
	$("#totalcost_tool_peryear").val(parseInt(totalcost_tool_peryear));
}

function calculate_costcomponent()
{
	var investment = $("#investment").val();
	var rent_cost = $("#rent_cost").val();
	var maintenance_cost = $("#maintenance_cost").val();
	var consumable_cost = $("#consumable_cost").val();
	var tool_total_prod_peryear = $('#tool_total_prod_peryear').val();
	var totalcost_labour_peryear = $('#totalcost_labour_peryear').val();
	var totalcost_power_peryear = $('#totalcost_power_peryear').val();
	var totalcost_tool_peryear = $('#totalcost_tool_peryear').val();
	
	var depre = (investment * 10.34) / 100;
	var depreciation = depre / tool_total_prod_peryear;
	$("#depreciation").val(parseFloat(depreciation));
	
	var intrt = (investment * 10) / 100;
	var interest = intrt / tool_total_prod_peryear;
	$("#interest").val(parseFloat(interest));
	
	var labour_cost = totalcost_labour_peryear / tool_total_prod_peryear;
	$("#labour_cost").val(parseFloat(labour_cost));
	
	var power = totalcost_power_peryear / tool_total_prod_peryear;
	$("#power").val(parseFloat(power));
	
	var rent = rent_cost / tool_total_prod_peryear;
	$("#rent").val(parseFloat(rent));
	
	var tool = totalcost_tool_peryear / tool_total_prod_peryear;
	$("#tool").val(parseFloat(tool));
	
	var maintenance = maintenance_cost / tool_total_prod_peryear;
	$("#maintenance").val(parseFloat(maintenance));
	
	var consumable = consumable_cost / tool_total_prod_peryear;
	$("#consumable").val(parseFloat(consumable));
	
	var cost_component = parseFloat(depreciation) + parseFloat(interest) + parseFloat(labour_cost) + parseFloat(power) + parseFloat(rent) + parseFloat(tool) + parseFloat(maintenance) + parseFloat(consumable);
	$("#cost_component").val(parseFloat(cost_component));
	
	var process_cost = parseFloat(labour_cost) + parseFloat(power) + parseFloat(rent) + parseFloat(tool) + parseFloat(maintenance) + parseFloat(consumable);
	$("#process_cost").val(parseFloat(process_cost));
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
          <h1>
			<font color="#006600" family="ariel">COST ANALYSIS DETAILS</font>
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
                  
                </div><!-- /.box-header -->	
                <div class="box-body">
				<form action="" name=create_macstep5 method=post enctype="multipart/form-data">
                  <table class="table table-bordered table-hover">
                    <tbody>
					<tr class="info">
						<td colspan=4 class=back2 align=left><b>1. Labour Cost # </b></td>
					</tr>
					<tr>
						<td class=back2 valign=top align=right>Total Production / year - A :</td>
						<td valign=top class=back align=left>
							<input type=text name=total_prod_peryear id=total_prod_peryear required value="">
						</td>
						<td class=back2 valign=top align=right>Total Manpower required / day - B :</td>
						<td valign=top class=back align=left>
							<input type=text name=manpower_req id=manpower_req required>
						</td>
					</tr>
					<tr>
						<td class=back2 valign=top align=right>Salary/month/Employee in (Rs.) - C :</td>
						<td valign=top class=back align=left>
							<input type=text name=emp_salary id=emp_salary onBlur="return labourcost()" required>
						</td>
						<td class=back2 valign=top align=right>Labour cost/month (Rs.) A1=B x C :</td>
						 <td valign=top class=back align=left>
							<input type=text name=labour_cost_permonth id=labour_cost_permonth required>
						</td>
					</tr>
					<tr>
					<td class=back2 valign=top align=right>Total cost incurred in Labour / year <br>(Rs.) A2=A1 x 12 :</td>
             			 <td valign=top class=back align=left colspan=3>
						 	<input type=text name=totalcost_labour_peryear id=totalcost_labour_peryear required>
					</td>
				</tr>
				<tr class="info">
					<td colspan=4 class=back2 align=left><b>2. Power Cost ## </b></td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Total Power required (kw) A:</td>
             		<td valign=top class=back align=left>
						 <input type=text name=totalpower_required id=totalpower_required required>
					</td>
					<td class=back2 valign=top align=right>Cost of power / kw (Rs.) B :</td>
					<td valign=top class=back align=left>
						<input type=text name=cost_power_kw id=cost_power_kw required onBlur="return powercost()">
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Total cost incurred in Power/year<br> A1=A x B x 22 x 25 x 12 :</td>
					<td valign=top class=back align=left colspan=3>
					 	<input type=text name=totalcost_power_peryear id=totalcost_power_peryear required>
					</td>
				</tr>
				<tr class="info">
					<td colspan=4 class=back2 align=left><b>3. Tool Cost ### </b></td>
				</tr>		
				<tr>
					<td class=back2 valign=top align=right>Total Production / year - (A) :</td>
             		<td valign=top class=back align=left>
					 	<input type=text name=tool_total_prod_peryear id=tool_total_prod_peryear onBlur="return calculate_costcomponent()" required>
					</td>
					<td class=back2 valign=top align=right>Approx Tool Life (Components) - (B) :</td>
             		<td valign=top class=back align=left>
					<input type=text name=approx_tool_life id=approx_tool_life required>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Tool Consumption/day - ( C) :</td>
             		<td valign=top class=back align=left>
					 	<input type=text name=tool_consumption_perday id=tool_consumption_perday required>
					</td>
					<td class=back2 valign=top align=right>Individual Tool Cost (Rs.) (D) :</td>
             		<td valign=top class=back align=left>
						<input type=text name=individual_tool_cost id=individual_tool_cost onBlur="return toolcost()" required>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Tool cost / day (Rs.) A1=C x D :</td>
             		<td valign=top class=back align=left>
						<input type=text name=toolcost_perday id=toolcost_perday required>
					</td>
					<td class=back2 valign=top align=right>Tool Cost / component (Rs.) A2=A1/B :</td>
             		<td valign=top class=back align=left>
						<input type=text name=toolcost_percomponent id=toolcost_percomponent required>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Total cost incurred in Tools/year<br>(Rs.) A3=A x A2 :</td>
					<td valign=top class=back align=left colspan=3>
						<input type=text name=totalcost_tool_peryear id=totalcost_tool_peryear required>
					</td>
				</tr>
				<tr class="info">
					<td colspan=4 class=back2 align=left><b>Cost / Component </b></td>
				</tr>									
				<tr>
					<td class=back2 valign=top align=right>Depreciation = ((Investment X 10.34%)/ <br>Production per year) (1) :</td>
             		<td valign=top class=back align=left>
					 	<input type=text name=depreciation id=depreciation required readonly>
					</td>
					<td class=back2 valign=top align=right>Interest = ((Investment X 10%)/ <br>Production per year) (2) :</td>
					<td valign=top class=back align=left>
					 	<input type=text name=interest id=interest required readonly>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Labour = Labour cost per year / <br>production per year (3) :</td>
             		<td valign=top class=back align=left>
					 	<input type=text name=labour_cost id=labour_cost required readonly>
					</td>
					<td class=back2 valign=top align=right>Power = Power cost per year / <br>production per year (4) :</td>
             		<td valign=top class=back align=left>
					 	<input type=text name=power id=power required readonly>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Rent = Rent cost per year / <br>production per year (5) :</td>
             		<td valign=top class=back align=left>
					 	<input type=text name=rent id=rent required readonly>
					</td>
					<td class=back2 valign=top align=right>Tools = Tool cost per year / <br>production per year (6) :</td>
             		<td valign=top class=back align=left>
					 	<input type=text name=tool id=tool required readonly>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Maintenance = Maintenance cost per year /<br>production per year (7) :</td>
             		<td valign=top class=back align=left>
					 	<input type=text name=maintenance id=maintenance required readonly>
					</td>
					<td class=back2 valign=top align=right>Consumables = consumable cost per year /<br>production per year (8) :</td>
             		<td valign=top class=back align=left>
					 	<input type=text name=consumable id=consumable required readonly>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right>Cost/Component considering investment.(Rs.)<br> =sum of (1+2+3+4+5+6+7+8) :</td>
             		<td valign=top class=back align=left>
					 	<input type=text name=cost_component id=cost_component required readonly>
					</td>
					<td class=back2 valign=top align=right>Cost/component without considering investment (Rs.)<br> (Process cost) = Sum of (3+4+5+6+7+8) :</td>
             		<td valign=top class=back align=left>
					 	<input type=text name=process_cost id=process_cost required readonly>
					</td>
				</tr>
                    </tbody>
                </table>
				<center>
				<br><br>
					<input type=hidden name=ticket_id value="20">
					<input name="submit" value="Submit" style="font-weight:bold;" type="submit">&nbsp;&nbsp;&nbsp;
					<input type=reset name=reset style='font-weight:bold;' value=Reset>
				</center>
			</form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

				
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
			
		</div><!-- /.row -->
          <!-- Main row -->
          
        </section>
		
		<!-- /.content -->
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