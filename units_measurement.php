<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
if(isset($_POST['submit']))
{
   $query=mysql_query("select * from cri_uo_unit_of_measurements");
   $flag=0;
   while($row=mysql_fetch_assoc($query))
   {
     if($row['measurement_name']==$_POST['measurement_name'])
	 {
	  $flag=1;
	  break;
	 }
   }
   if($flag==0)
   {
     $sql=mysql_query("insert into cri_uo_unit_of_measurements(measurement_name) VALUES ('".$_POST['measurement_name']."')");
	 }
	 else
	 {
	   echo "<script type='text/javascript'> alert('existing')</script>";
	   
	 }
}
if(isset($_GET['did']))
{
$delete=mysql_query("delete from cri_uo_unit_of_measurements where id='".$_GET['did']."'");
}

function getNum()
{
$sql="select count(measurement_name) from cri_uo_unit_of_measurements";
$result=mysql_query($sql);
$total=mysql_fetch_array($result);
return $total[0];
}

if(isset($_POST['update']))
{
	$num_uoms=getNum();
	for($i=1;$i<=$num_uoms;$i++)
	{
		$measurement_name=$_POST['measurement_name'][$i];
		$id=$_POST['edi'][$i];
		$sql="UPDATE cri_uo_unit_of_measurements SET measurement_name='".$measurement_name."' WHERE id='".$id."'";
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
								<li class="treeview"><a href="#">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i><span>Request Options</span> <i class="fa fa-angle-left pull-right text-white"></i></a>
									<ul class="treeview-menu">
										<li><a href="req_categories.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Request Categories</a></li>
										<li class="active"><a href="machine_equipments.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Machines/Equipments</a></li>
										<li><a href="tax_value.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Tax Values</a></li>
										<li><a href="tax_types.html.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Tax Types</a></li>
										<li><a href="req_status.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Request Status</a></li>
									</ul>
								</li>
								<li class=" active treeview"><a href="#">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i><span>User Options</span> <i class="fa fa-angle-left pull-right text-white"></i></a>
									<ul class="treeview-menu">
										<li><a href="add_user.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Add New User</a></li>
										<li><a href="search_user.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>User Search</a></li>
										<li><a href="units.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Units</a></li>
										<li class="active"><a href="units_measurement.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Units of Measurement</a></li>
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
						<font color="#006600" family="ariel">UNITS OF MEASUREMENTS</font>
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
												<thead>
												  <tr align=center class="info">
													<td><b>S.No</b></td>
													<td><b>Measurement Name</b></td>
													<td></td>
												  </tr>
												</thead>
												<tbody>
													<?php
														$i=0;
														$query=mysql_query("select * from cri_uo_unit_of_measurements");
														while($row=mysql_fetch_assoc($query))
														{
														$i++;
														?>
														<tr>
																<input type="hidden" name="edi[<?php echo $i; ?>]" value="<?php echo $row['id']; ?>">
																<input type=hidden name=id1 value='1'></input>
																<td class=back align=center><?php echo $i; ?></td>
															<td align=center><input type=text size=15 name="measurement_name[<?php echo $i; ?>]" value="<?php echo $row['measurement_name']; ?>" ></td>
															<td class=back align=center>
															<a href="units_measurement.php?did=<?php echo $row['id']; ?>">Delete</a>
															</td>
														</tr>
													<?php } ?>
																								
													<tr>
														<td align=center colspan=7><input type=submit name=update value="Update"></td> 
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
													<TR>
														<TD class=info colspan=2 align=center><B>Add Unit of Measurements</B></td>
													</TR>
													<tr>
														<td class=back2 align=right width=40%><b>Measurement Name</b></td>
														<td class=back width=60%>&nbsp;<input type=text name=measurement_name required></input></td>
													</tr>
													<tr>
														<td class=back2 align=center colspan=2 width=40%>
														<input type=submit name=submit value="Add New Measurement"></input>
													</tr>
												</tbody>
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
