<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
if(isset($_POST['submit']))
{
   $query=mysql_query("select * from cri_ro_machines");
   $flag=0;
   while($row=mysql_fetch_assoc($query))
   {
     if($row['machine']==$_POST['machine'])
	 {
	  $flag=1;
	  break;
	 }
   }
   if($flag==0)
   {
     $sql=mysql_query("insert into cri_ro_machines(projectno,machine,purpose,quantity,unit,status) VALUES ('".$_POST['projectno']."','".$_POST['machine']."','".$_POST['purpose']."','".$_POST['quantity']."','".$_POST['unit']."','1')");
   }
	 else
	 {
	   echo "<script type='text/javascript'> alert('existing')</script>";
	   
	 }
}
if(isset($_GET['did']))
{
$delete=mysql_query("update cri_ro_machines set status='0' where id='".$_GET['did']."'");
}

function getNumMachine()
{
$sql="select count(machine) from cri_ro_machines";
$result=mysql_query($sql);
$total=mysql_fetch_array($result);
return $total[0];
}

if(isset($_POST['update']))
{
	$num_uoms=getNumMachine();
	for($i=1;$i<=$num_uoms;$i++)
	{
		$projectno=$_POST['projectno'][$i];
		$machine=$_POST['machine'][$i];
		$purpose=$_POST['purpose'][$i];
		$quantity=$_POST['quantity'][$i];
		$unit=$_POST['unit'][$i];
		$id=$_POST['edi'][$i];
		
		$sql="UPDATE cri_ro_machines SET projectno='".$projectno."',machine='".$machine."',purpose='".$purpose."',quantity='".$quantity."',unit='".$unit."' WHERE id='".$id."'";
		mysql_query($sql);		
	}
}
?>


<?php include"navigation.php"; ?>
	<html>
		<head><title>Machine/Equipments</title></head>
		<body>
			<aside class="main-sidebar">
				<section class="sidebar">
					<ul class="sidebar-menu">
						<li class="header">MAIN NAVIGATION</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-dashboard"></i> <span>HOME</span> <i class="fa fa-angle-left pull-right text-white"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="h_create_req.php">&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i> Create Request</a></li>
								<li><a href="h_waiting4approval.php">&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i>Waiting for your Approval(<b>0</b>)</a></li>
								<li ><a href="h_rejected_lst.php">&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i>Rejected Lists(<b>0</b>) </a></li>
								<li><a href="h_open_req.php">&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i> My Personal Open Requests(<b>0</b>)</a></li>
								<li><a href="h_closed_req.php">&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i>  My Personal Closed Requests(<b>0</b>)</a></li>
								<li><a href="h_rej_req.php">&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i>  My Rejected Requests(<b>0</b>)</a></li>
								<li><a href="h_amreq.php">&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i>Approved Machine Requests(<b>0</b>)</a></li>
								 <li><a href="h_rmreq.php">&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i>Rejected Machine Requests(<b>0</b>)</a></li>
							</ul>
						</li>
							
						<li class="active treeview">
							<a href="#">
								<i class="fa fa-table"></i> <span>CONTROL PANEL</span>
								<i class="fa fa-angle-left pull-right text-white"></i>
							</a>
							<ul class="treeview-menu active">
								<li class=" active treeview"><a href="#">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i><span>Request Options</span> <i class="fa fa-angle-left pull-right text-white"></i></a>
									<ul class="treeview-menu">
										<li><a href="req_categories.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Request Categories</a></li>
										<li class="active"><a href="machine_equipments.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Machines/Equipments</a></li>
										<li><a href="tax_value.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Tax Values</a></li>
										<li><a href="tax_types.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Tax Types</a></li>
										<li><a href="req_status.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Request Status</a></li>
									</ul>
								</li>
								<li class="treeview"><a href="#">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i><span>User Options</span> <i class="fa fa-angle-left pull-right text-white"></i></a>
									<ul class="treeview-menu">
										<li><a href="add_user.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Add New User</a></li>
										<li><a href="search_user.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>User Search</a></li>
										<li><a href="units.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Units</a></li>
										<li><a href="units_measurement.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Units of Measurement</a></li>
										<li><a href="departments.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Departments</a></li>
										<li><a href="finance_team.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Finance Team</a></li>
										<li><a href="project_team.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Project Team</a></li>
									</ul>
								</li>
								<li><a href="template.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i>Templates</a></li>
							</ul>
						</li>   
				
						<li><a href="index.html"><i class="fa fa-circle-o"></i>LOGOUT</a></li>
					</ul>
				</section>
			</aside>

			<div class="content-wrapper">
				<section class="content-header" align="center">
					<h1
						<font color="#006600" family="ariel">MACHINES & EQUIPMENTS</font>
					</h1>
				</section>
				<section class="content">
    
						<!-- Main content -->
					<section class="content">
						<div class="row">
							<div class="col-xs-12">
								<div class="box">
									<div class="box-header">
										<font color=red>Machines / Equipments refer to the category of the Request. Sorting is based on rank first, and then is alphabetic.</font>
									</div><!-- /.box-header -->	
									<div class="box-body">
										<form name=form2 action="" method=post>
											<table class="table table-bordered table-hover">
												
													<tr align=center class="info">
													   <td  align=center ><b>Sl.No</b></td>
													   <td align=center ><b>Project No.</b></td>
													   <td  align=center ><b>Machine / Equipment Name</b></td>
													   <td  align=center ><b>Purpose</b></td>
													   <td  align=center ><b>Quantity</b></td>
													   <td  align=center ><b>Unit</b></td>
													   <td  align=center ><b>Delete</b></td>
													</tr>																					
	<?php
		$i=0;
		$query=mysql_query("select * from cri_ro_machines where status='1'");
		while($row1=mysql_fetch_assoc($query))
		{
		$i++;
	?>
	<tr>
		<input type=hidden name="edi[<?php echo $i; ?>]" value="<?php echo $row1['id']; ?>"></input>
		<td align=center><?php echo $row1['id']; ?></td>
		<td align=center><input type=text size=5 name="projectno[<?php echo $i; ?>]" value="<?php echo $row1['projectno']; ?>" ></td>
		<td align=center><input type=text size=15 name="machine[<?php echo $i; ?>]" value="<?php echo $row1['machine']; ?>" ></td>
		<td align=center><input type=text size=15 name="purpose[<?php echo $i; ?>]" value="<?php echo $row1['purpose']; ?>" ></td>
		<td align=center><input type=text size=15 name="quantity[<?php echo $i; ?>]" value="<?php echo $row1['quantity']; ?>" ></td>
		<td align=center>
			<select style="width:300px" name="unit[<?php echo $i; ?>]">
				<?php
				$qry = mysql_query("select * from cri_uo_units where status=1");
				while($rows = mysql_fetch_array($qry)) { ?>
				<option value="<?php echo $rows['id']; ?>"
					<?php if($rows['id'] == $row1['unit']){ ?> selected="selected" <?php } ?> >
					<?php echo $rows['unit']; ?> 
				</option>
				<?php } ?>				
			</select>
		</td>
		<td class=back align=center><a href="tax_value.php?did=<?php echo $row1['id']; ?>">Delete</a></td>
	</tr>
	<?php } ?>
													
													<tr>
														<td align=center colspan=7><input type=submit name='update' value="Update"></input></td> 
													</tr>  
												</tbody>
											</table>
										</form>
									</div>	
								</div>	

								<div class="box">
									<div class="box-header">
									 </div>
									<div class="box-body">
										<form action="" method="post">
											<table class="table table-bordered table-striped">
												<tbody>
													<tr>
														<td class=info colspan=7 align=center><b>Add Machine / Equipment</b></td>
													</tr>
													<tr>
														<td align=right width=40%><b>Project No.</b></td>
														<td width=60%>&nbsp;<input type=text name=projectno required></input></td>
													</tr>
													<tr>
														<td align=right width=40%><b>Machine / Equipment Name</b></td>
														<td width=60%>&nbsp;<input type=text name=machine required></input></td>
													</tr>
													<tr>
														<td style='vertical-align:top' align=right width=40%><b>Purpose</b></td>
														<td width=60%>&nbsp;<textarea name=purpose rows=2 cols=30 required></textarea></td>
													</tr>
													<tr>
														<td align=right width=40%><b>Quantity</b></td>
														<td width=60%>&nbsp;<input type=text name=quantity required></input></td>
													</tr>
													<tr>
														<td align=right width=40%><b>Unit</b></td>
														<td>&nbsp;
															<select name=unit required>
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
														<td colspan=2 align=center>
															<input type=submit id="button1" name=submit value="Add New"></input>
														</td>
													</tr>
												
											</table>
										</form>
									</div>
								</div>	
							</div>	
						</div>	
					</section>
				</section>
			</div>
	  
		
				<?php include"footer.php"; ?> 
		</body>
	</html>
