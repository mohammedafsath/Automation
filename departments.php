<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
if(isset($_POST['submit']))
{
   $query=mysql_query("select * from cri_uo_departments");
   $flag=0;
   while($row=mysql_fetch_assoc($query))
   {
     if(($row['dept_name']==$_POST['dept_name'])&&($row['unit_code']==$_POST['unit']))
	 {
	  $flag=1;
	  break;
	 }
   }
   if($flag==0)
   {
     $sql=mysql_query("insert into cri_uo_departments(unit_code,dept_name,rank,short_code,status) VALUES ('".$_POST['unit_code']."','".$_POST['dept_name']."','".$_POST['rank']."','".$_POST['short_code']."','1')");
	 // echo "insert into cri_uo_departments(unit,rank,shortcode) VALUES ('".$_POST['unit']."','".$_POST['rank']."','".$_POST['shortcode']."','".$_POST['location']."','1')"; 
	 }
	 else
	 {
	   echo "<script type='text/javascript'> alert('existing')</script>";
	   
	 }
}
if(isset($_GET['did']))
{
$delete=mysql_query("update cri_uo_departments set status='0' where id='".$_GET['did']."'");
}


function getNumdepartment()
{
$sql="select count(dept_name) from cri_uo_departments where status=1";
$result=mysql_query($sql);

$total=mysql_fetch_array($result);
return $total[0];
}

if(isset($_POST['update']))
{
	$num_uoms=getNumdepartment();
	for($i=1;$i<=$num_uoms;$i++)
	{
		$unit_code=$_POST['unit_code'][$i];
		$dept_name=$_POST['dept_name'][$i];
		$rank=$_POST['rank'][$i];
		$short_code=$_POST['short_code'][$i];
		$id=$_POST['edi'][$i];
		
		$sql="UPDATE cri_uo_departments SET unit_code='".$unit_code."',rank='$rank',short_code='".$short_code."',dept_name='".$dept_name."' WHERE id='".$id."' ";
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
										<li><a href="machine_equipments.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Machines/Equipments</a></li>
										<li><a href="tax_value.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Tax Values</a></li>
										<li><a href="tax_types.html.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Tax Types</a></li>
										<li><a href="req_status.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Request Status</a></li>
									</ul>
								</li>
								<li class="active treeview"><a href="#">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i><span>User Options</span> <i class="fa fa-angle-left pull-right text-white"></i></a>
									<ul class="treeview-menu">
										<li><a href="add_user.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Add New User</a></li>
										<li><a href="search_user.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>User Search</a></li>
										<li><a href="units.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Units</a></li>
										<li><a href="units_measurement.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Units of Measurement</a></li>
										<li class="active"><a href="departments.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Departments</a></li>
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
					<h1><font color="#006600" family="ariel">DEPARTMENTS</font></h1>
				</section>

				
				<section class="content">
					<section class="content">
						<div class="row">
							<div class="col-xs-12">
								<div class="box">
									<div class="box-header">
										<font color=red> These are the departments. Departments can be created to keep track of stats.</font>
									</div>

					
									<!-- /.box-header -->
									<div class="box-body">
										<form name=form2 action="" method=post>
											<table id="example2" class="table table-bordered table-hover">
												<tbody>
													<tr class="info">
														<td class=back2 align=center ><b>Unit</b></td>
														<td class=back2 align=center ><b>Department</b></td>
														<td class=back2 align=center ><b>Rank</b></td>
														<td class=back2 align=center ><b>Short Code</b></td>
														<td class=back2 align=center ><b></b></td>
														<td class=back2 align=center ></td>
													</tr>
													
																	<?php
																	$i=0;
																	$query=mysql_query("select * from cri_uo_departments");
																	while($row1=mysql_fetch_assoc($query))
																	{
																	$i++;
																	?>
																	<tr>
																		<input type=hidden name="edi[<?php echo $i; ?>]" value="<?php echo $row1['id']; ?>"></input>
									
																		<td size=15 align=center>
																		<select name="unit_code[<?php echo $i; ?>]">
																			<?php
																			$qry = mysql_query("select * from cri_uo_units where status=1");
																			while($rows = mysql_fetch_array($qry)) { ?>
																			<option size=15 value="<?php echo $rows['id']; ?>"
																				<?php if($rows['id'] == $row1['unit_code']){ ?> selected="selected" <?php } ?> >
																				<?php echo $rows['unit']; ?> 
																			</option>
																			<?php } ?>				
																		</select>
																		</td>
																		<td align=center><input type=text size=15 name="dept_name[<?php echo $i; ?>]" value="<?php echo $row1['dept_name']; ?>" ></td>
																		<td align=center><input type=text size=5 name="rank[<?php echo $i; ?>]" value="<?php echo $row1['rank']; ?>" ></td>
																		<td align=center><input type=text size=5 name="short_code[<?php echo $i; ?>]" value="<?php echo $row1['short_code']; ?>" ></td>
																		<td class=back align=center>
																			<a href="departments.php?did=<?php echo $row['id1']; ?>">Add Users</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																			<a href="departments.php?did=<?php echo $row['id']; ?>">Delete</a>
																		</td>
																	</tr>
																<?php } ?>
													
													<tr align="center">
														<td class=back colspan=5><input type=submit name=update value="Update"></input></td>
													</tr>  
												</tbody>
											</table>
										</form>
									</div><!-- /.box-body -->
								</div><!-- /.box -->


								<div class="box">
									<div class="box-header">
										<div class="box-body">
											<table class="table table-bordered table-striped">
													<TR>
														<TD class=info colspan=2 align=center><B>Add New Department	</B></td>
													</TR>
													<tr>
														<td align=right width=40%><b>Unit</b></td>
														<td>
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
														<td class=back2 align=right width=40%><b>Department Name</b></td>
														<td class=back width=60%><input type=text name=dept_name required></input></td>
													</tr>
													<tr>
														<td class=back2 align=right width=40%><b>Rank</b></td>
														<td class=back width=60%><input type=text name=rank size=2 required></input></td>
													</tr>
													<tr>
														<td class=back2 align=right width=40%><b>Short Code</b></td>
														<td class=back width=60%><input type=text name=short_code size=5 required></input></td>
													</tr>
													<tr>
														<td colspan=2 class=back2 align=center width=40%><input type=submit name=submit value='Add'></input></td>
														<td class=back2 width=60%>&nbsp;</td>
													</tr>	
											</table>
										</div>
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
