<?php include"navigation.php"; ?> 
 
<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("cri_project",$con);	
	
	$query=mysql_query("SELECT * FROM `cri_users` WHERE user_name='".$_SESSION['user_name']."'");
	while($row = mysql_fetch_assoc($query))
	{
	    //print_r($row); //you'll see all the keys and their values
	    //echo $row['first_name']; //the keys are the selected column names in your table	since we can echo we can assign
	    $_SESSION['first_name'] = $row['first_name'];	 
	    $_SESSION['last_name'] = $row['last_name'];
		$_SESSION['user_id']=$row['id'];
		$_SESSION['email']=$row['email'];
		$_SESSION['office']=$row['office'];
		$_SESSION['phone']=$row['phone'];
		$_SESSION['dept_id']=$row['department'];		
		$_SESSION['unit_id']=$row['unit'];
	}
	
	if($_POST['is_budgeted_item'] == "1")
	$status=1;
	else
	$status=0;
	
	if(isset($_POST['next']))
		{
			$i=1;
			while($i<=5)
			{
				$r="d".$i;
				$req=$_POST[$r];
				$q="q".$i;
				$qua=$_POST[$q];
				$c="cost".$i;
				$cost=$_POST[$c];
				if($req!="")
				{
					$val=mysql_query("insert into cri_ticket_machines(requirement,quantity,cost) VALUES('$req','$qua','$cost')");
				}
				$i++;
			}
			
			if(empty($_POST["chktable"])) 
			{
				$sql=mysql_query("INSERT INTO `cri_tickets`(`create_date`,`appln_no`,`status`, `category`, `requirement_desc`, `period_of_investment`, `required_date`, `is_budgeted_item`,`user_id`,`email`,`office`,`phone`,`dept_id`,`unit_id`)  VALUES ('".$_POST['create_date']."','".$_POST['appln_no']."','$status','".$_POST['categoryid']."','".$_POST['requirement_desc']."','".$_POST['period_of_investment']."','".$_POST['required_date']."','".$_POST['is_budgeted_item']."','".$_POST['user_id']."','".$_POST['email']."','".$_POST['office']."','".$_POST['phone']."','".$_POST['dept_id']."','".$_POST['unit']."')");
			} 
			else
			{
				$sql=mysql_query("INSERT INTO `cri_tickets`(`create_date`,`appln_no`,`status`, `category`, `requirement_desc`, `period_of_investment`,`year_of_purchase`, `present_oee`, `maintenance_constraints`, `required_date`, `is_budgeted_item`,`user_id`,`email`,`office`,`phone`,`dept_id`,`unit_id`)  VALUES ('".$_POST['create_date']."','".$_POST['appln_no']."','$status','".$_POST['categoryid']."','".$_POST['requirement_desc']."','".$_POST['period_of_investment']."','".$_POST['year_of_purchase']."','".$_POST['present_oee']."','".$_POST['maintenance_constraints']."','".$_POST['required_date']."','".$_POST['is_budgeted_item']."','".$_POST['user_id']."','".$_POST['email']."','".$_POST['office']."','".$_POST['phone']."','".$_POST['dept_id']."','".$_POST['unit']."')");
				//echo "INSERT INTO `cri_tickets`(`create_date`,`status`, `category`, `requirement_desc`, `period_of_investment`,`year_of_purchase`, `present_oee`, `maintenance_constraints`, `required_date`, `is_budgeted_item`,`user_id`,`email`,`office`,`phone`,`dept_id`,`unit_id`)  VALUES ('".$_POST['create_date']."','1','".$_POST['categoryid']."','".$_POST['requirement_desc']."','".$_POST['period_of_investment']."','".$_POST['year_of_purchase']."','".$_POST['present_oee']."','".$_POST['maintenance_constraints']."','".$_POST['required_date']."','".$_POST['is_budgeted_item']."','".$_POST['user_id']."','".$_POST['email']."','".$_POST['office']."','".$_POST['phone']."','".$_POST['dept_id']."','".$_POST['unit']."')";				
				echo "<script type='text/javascript'>window.location.href='h_cr_2.php';</script>";
			}
		}	
?>
		
<script type="text/javascript">

function ShowHideDiv()//checkbox
{
var dvtable=document.getElementById("dvtable");
dvtable.style.display=chktable.checked?"block":"none";
}
var i = 1;

function add_file(file) 
{
	var j = i - 1;
	var box = document.getElementById('file_list');
	var num = box.length;
	var file_exists = 0;
	for (x = 0; x < num; x++) 
	{
		if (box.options[x].text == file) 
		{
			alert('This file has already been added to the Upload List.');
			document.getElementById('file_' + j).value = "";
			file_exists = 1;
			break;
		}
	}

	if (file_exists == 0) 
	{				// For Internet Explorer
		try 
		{
			el = document.createElement('<input type="file" name="userfile[]" id="file_' + i + '" size="30" onChange="javascript:add_file(this.value);">');
		}	// For other browsers
		catch (e) 
		{
			el = document.createElement('input');
			el.setAttribute('type', 'file');
			el.setAttribute('name', 'userfile[]');
			el.setAttribute('id', 'file_' + i);
			el.setAttribute('size', '30');
			el.setAttribute('onChange', 'javascript:add_file(this.value);');
		}
		document.getElementById('file_' + j).style.display = 'none';
		if (document.getElementById('list_div').style.display == 'none') 
		{
			document.getElementById('list_div').style.display = 'block';
		}
		document.getElementById('files_div').appendChild(el);
		box.options[num] = new Option(file, 'file_' + j);
		i++;
	}
}

function remove_file() 
{
	var box = document.getElementById('file_list');
	if (box.selectedIndex != -1) 
	{
		var value = box.options[box.selectedIndex].value;
		var child = document.getElementById(value);
		box.options[box.selectedIndex] = null;
		document.getElementById('files_div').removeChild(child);
		if (box.length == 0) 
		{
		document.getElementById('list_div').style.display = 'none';
		}
	}
	else 
	{
		alert('You must first select a file from the list.');
	}
}		
</script>	


	<html>
		<head>
		<title>req categories</title>
			</head>
		<body>
			
			<div class="content-wrapper">
				<section class="content-header" align="center"><h1><font align="center" color="#000000" family="ariel"> CREATE REQUEST</font></h1></section>
					<section class="content">
						<!-- Main content -->
						<section class="content">
						    <form name=form1 action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
							<div class="row">
								<div class="col-xs-12">
									<div class="box">
										<div class="box-header">
										</div>
										<!-- /.box-header -->
										<div class="box-body">
												<table id="example2" class="table table-bordered table-hover">
													<TR>
														<input  name=user_name value="<?php echo $_SESSION['user_name'] ?>">
														<TD class=info colspan=4 align=left><B>User Info</B>
														<input name='email' value="<?php echo $_SESSION['email'] ?>">
														<input name='office' value="<?php echo $_SESSION['office'] ?>">
														<input name='phone' value="<?php echo $_SESSION['phone'] ?>">
														<input name='user_id' value="<?php echo $_SESSION['user_id'] ?>">
														<input name='dept_id' value="<?php echo $_SESSION['dept_id'] ?>">
														</td>
													</TR>	
													<tr>
														<td width=27% class=back2 align=right>Requestor Name:</td>
														<td class=back align=left>
															<?php echo $_SESSION['first_name'] ?>&nbsp;&nbsp;<?php echo $_SESSION['last_name'] ?>
														</td>
														<td class=back2 align=right width=100>Date:</td>
														<td class=back align=left>
															<input name=create_date value="<?php echo "".date("d/m/Y").""; ?>" />
														</td>
													</tr>
													<tr>
														<td width=27% class=back2 align=right>Appln No.:</td>
														<td class=back width=20% colspan=3 name=appln_no">
														
															<?php
															$sql=mysql_fetch_assoc(mysql_query("select id from cri_tickets order by id desc;"));
															//echo "$sql[id]";
															$year = date('Y');
															$year1=$year;
															++$year1;
															$var='CRI';
															if(!$sql)
															{
															$sql=1;
															//echo "$sql";
															echo '<input type=text readonly name=appln_no value='.$var.'/'.$year.'-'.$year1.'/'.$sql.' style="border:none;"></input>'; 
															}
															else
															echo '<input type=text readonly name=appln_no value='.$var.'/'.$year.'-'.$year1.'/'.++$sql['id'].' style="border:none;"></input>'; ?> 
														</td>
													</tr>
													<tr>
														<td align=right width=40%>Unit:</td>
														<td colspan=3>
															<select name="unit" required>
																<option value=''>Select</option>
																<?php
																$select=mysql_query("select * from cri_uo_units where status=1 order by unit");
																while($rows=mysql_fetch_assoc($select))
																{
																?>
																<option value="<?php echo $rows['id']; ?>"><?php echo $rows['unit']; ?></option>
																<?php } ?>
															</select>
														</td>
													</tr>
													<tr>
														<td width=27% valign=top class=back2 align=right>Is Budgeted Item :</td>
														<td class=back valign=top colspan=3>
															<input required type=radio name=is_budgeted_item value=1>Yes
															<input type=radio name=is_budgeted_item value=0>No
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="view_budget_details.php">View budgeted items</a>
														</td>
													</tr>
													<tr>
														<td align=right width=40%>Category:</td>
														<td colspan=3>
															<select name=categoryid id="categoryid">
																<option value='' required>Select</option>
																<?php
																$select=mysql_query("select * from cri_ro_categories where status=1 order by category");
																while($rows=mysql_fetch_assoc($select))
																{
																?>
																<option value="<?php echo $rows['id']; ?>"><?php echo $rows['category']; ?></option>
																<?php } ?>
															</select>
														</td>
														<tr>
															<td align=right>Required Date :</td>
															<td>
																<div class="input-group date datepicker" id="datepicker" style="width:70%">
																<input type="text" class="form-control" name="required_date">
																<div class="input-group-addon">
																	<span class="glyphicon glyphicon-th"></span>
																</div>
																</div>
															</td>	
													</tr>
													<tr>
														<td width=27% valign=top class=back2 align=right>Purpose of the Request :</td>
														<td class=back valign=top colspan=3><textarea name=requirement_desc cols=50 rows=3 required></textarea>
														</td>
													</tr>
												</table>
										</div>
									</div>
								</div>
							</div>
								<div class="box"  id="div1">
									<div class="box-header">
										<div class="box-body">
											<table id="example2" class="table table-bordered table-hover">
												<TR>
													<TD class=info colspan=4 align=left><B>Request Info</B></td>
												</TR>	
												<tr>
													<td colspan=4> Period of Investment:
														<select name=period_of_investment required>
														<option name=period_of_investment>--Select--</option>
														<option name=period_of_investment>Immediate</option>
														<option name=period_of_investment>Within 2 months</option>
														<option name=period_of_investment>Beyond 2 months</option>
														<option name=period_of_investment>Within 6 months</option>
														<option name=period_of_investment>Beyond 6 months</option>
														</select>
													</td>
												</tr>
												<tr>
													<td colspan=2>
													<div class="box-body">
														<table id="example2" class="table table-bordered table-hover">
															<tr class="info">
																<td class=back2 align=left>Sl No</td>
																<td class=back2 align=left>Details of Requirement</td>
																<td class=back2 align=left>Qty.</td>
																<td class=back2 align=left>Cost(Rs.)</td>
															</tr>
															<tr>
																<td><input type="text" name=no1></td>
																<td><input type="text" name=d1></td>
																<td><input type="text" name=q1></td>
																<td><input type="text" name=cost1></td>
															</tr>
															<tr>
																<td><input type="text" name=no2></td>
																<td><input type="text" name=d2></td>
																<td><input type="text" name=q2></td>
																<td><input type="text" name=cost2></td>
															</tr>
															<tr>
																<td><input type="text" name=no3></td>
																<td><input type="text" name=d3></td>
																<td><input type="text" name=q3></td>
																<td><input type="text" name=cost3></td>
															</tr>
															<tr>
																<td><input type="text" name=no4></td>
																<td><input type="text" name=d4></td>
																<td><input type="text" name=q4></td>
																<td><input type="text" name=cost4></td>
															</tr>
															<tr>
																<td><input type="text" name=no5></td>
																<td><input type="text" name=d5></td>
																<td><input type="text" name=q5></td>
																<td><input type="text" name=cost5></td>
															</tr>	
														</table>
													</div>
													</td>
												</tr>
												<tr>
													<td colspan="2" class="back"><b>Same Machine / Equipment existing in requesting Plant / Dept. or Associated Plant / Dept. used for same or similar application.<br><font color="red">If yes</font>
													<label for="chktable">
													<input type="checkbox" name="chktable" id="chktable" onclick="ShowHideDiv(this)" />
													</label>
													</td>
												</tr>
											</table>
										</div>
									</div>
							
											<div id="dvtable" style="display:none">


														<table id="tab1" class="table table-bordered table-hover">
															<tr id="year_of_purchase" style="">
																<td class="back2" align="right" valign="top" width="40%">Date / Year of Purchase : </td>
																<td>
																	<div class="input-group date datepicker" id="datepicker1" style="width:30%">
																	<input type="text" class="form-control" name="year_of_purchase">
																	<div class="input-group-addon">
																		<span class="glyphicon glyphicon-th"></span>
																	</div>
																	</div>
																</td>
															</tr>
															
															<tr id="present_oee_id" style="">
																<td class="back2" align="right" valign="top" width="40%">Present OEE : </td>
																<td class="back"><textarea required="" name="present_oee" id="present_oee" rows="5" cols="60"></textarea></td>
															</tr>											
															<tr id="maintenance_constraints_id" style="">
																<td class="back2" align="right" valign="top" width="40%">Operating / Maintenance / Quality<br> related constraints : </td>
																<td class="back"><textarea required="" name="maintenance_constraints" id="maintenance_constraints" rows="5" cols="60"></textarea></td>
															</tr>							
															<tr id="operating_at_id" style="">
																<td class="back2" align="right" valign="top" width="40%">Operating at : <br>  (Attach minimum 3 months data) : </td>
																<td class="back">
																	<div name="files_div" id="files_div">
																		<input name="userfile[]" id="file_0" size="30" onchange="javascript:add_file(this.value);" type="file">
																	</div>
																	<div name="list_div" id="list_div" style="display: none;">
																		<select multiple="" name="file_list" id="file_list" size="6"></select>
																		<input id="remove_file_btn" value="Remove Selected" onclick="javascript:remove_file();" type="button" />
																	</div>			
																</td>
															</tr>
														</table>
											</div>
								<div align="center">
									<input type="submit" name="next" value="Next" style="font-weight:bold;"/>
									&nbsp;&nbsp;&nbsp;
									<input name="reset" style="font-weight:bold;" value="Reset" type="reset" onclick="reset()">  
								</div>		
<br><br>
								
							</div>
							
								</form>
						</section>
					</section>
				</section>
			</div>
			<script>
			function reset()
			{
			document.getElementById("form1").reset();
			}
			</script>
		</body>
	</html>

	<?php include"footer.php"; ?> 

<script>	$("#datepicker").datepicker();</script>
<script>	$("#datepicker1").datepicker();</script>