<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
if(isset($_POST['submit']))
{
     $sql=mysql_query("insert into cri_ro_taxvalues(taxtype,taxvalue,status) VALUES ('".$_POST['taxtype']."','".$_POST['taxvalue']."','1')");
}
if(isset($_GET['did']))
{
$delete=mysql_query("update cri_ro_taxvalues set status='0' where id='".$_GET['did']."'");
}

function getNumTaxvalue()
{
$sql="select count(taxtype) from cri_ro_taxvalues where status=1";
$result=mysql_query($sql);
$total=mysql_fetch_array($result);
return $total[0];
}

if(isset($_POST['update']))
{
	$num_uoms=getNumTaxvalue();
	for($i=1;$i<=$num_uoms;$i++)
	{
		$taxtype=$_POST['taxtype'][$i];
		$taxvalue=$_POST['taxvalue'][$i];
		$id=$_POST['edi'][$i];
		$sql="UPDATE cri_ro_taxvalues SET taxtype='".$taxtype."',taxvalue='".$taxvalue."' WHERE id='".$id."'";
		//$sql="UPDATE cri_ro_taxvalues SET taxtype='".$taxtype."',taxvalue='".$taxvalue."' WHERE id='".$id."'";
		mysql_query($sql);		
	}
}
?>

<?php include"navigation.php"; ?> 
	<html>
		<head><title>taxvalue</title></head>
		<body>
			<aside class="main-sidebar">
					<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<ul class="sidebar-menu">
						<li class="header">MAIN NAVIGATION</li>
						<li class="treeview"><a href="#"><i class="fa fa-dashboard"></i> <span>HOME</span> <i class="fa fa-angle-left pull-right text-white"></i></a>
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
								<li class="active treeview"><a href="#">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i><span>Request Options</span> <i class="fa fa-angle-left pull-right text-white"></i></a>
									<ul class="treeview-menu">
										<li><a href="req_categories.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Request Categories</a></li>
										<li><a href="machine_equipments.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Machines/Equipments</a></li>
										<li  class="active"><a href="tax_value.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Tax Values</a></li>
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
					<h1><font color="#006600" family="ariel">TAX VALUES</font></h1>
				</section>

						<!-- Main content Place your content here-->
				<section class="content">
					<section class="content">
						<div class="row">
							<div class="col-xs-12">
								<div class="box">
									<div class="box-header">
										<font color=red>Request Categories refer to the problem type of the Request. Sorting is based on rank first, and then is alphabetic.</font>
										</font>
										<div class="box-body">
											<form name=form2 action="" method=post>
												<table id="example2" class="table table-bordered table-hover">
													<tr class="info">
														<td class=back2 align=center ><b>Sl No</b></td>
														<td class=back2 align=center ><b>Tax Type</b></td>
														<td class=back2 align=center ><b>Tax Value</b></td>
														<td class=back2 align=center ></td>
													</tr>
																	<?php
																	$i=0;
																	$query=mysql_query("select * from cri_ro_taxvalues where status='1'");
																	while($row1=mysql_fetch_assoc($query))
																	{
																	$i++;
																	?>
																	<tr>
																		<input type="hidden" name="edi[<?php echo $i; ?>]" value="<?php echo $row1['id']; ?>">
																		<td class=back align=center><?php echo $i; ?></td>
																		<td align=center>
																			<select name="taxtype[<?php echo $i; ?>]">
																				<?php
																				$qry = mysql_query("select * from cri_ro_taxtypes where status='1'");
																				while($rows = mysql_fetch_array($qry)) { ?>
																				<option  value="<?php echo $rows['id'];  ?>"
																				<?php if($rows['id'] == $row1['taxtype']){ ?> selected="selected" <?php } ?> >
																				<?php echo $rows['taxtype']; ?> 
																				</option>
																				<?php } ?>				
																										
																			</select>
																		</td>
																		<td align=center><input type=text size=15 name="taxvalue[<?php echo $i; ?>]" value="<?php echo $row1['taxvalue']; ?>" ></td>
																		<td class=back align=center><a href="tax_value.php?did=<?php echo $row1['id']; ?>">Delete</a></td>
																	</tr>
																	<?php } ?>
																																				
													<tr>
														<td colspan=4 align= center><input type=submit  name=update value="Update"></td>
													</tr>		
												</table>
											</form>	
										</div>
									</div>
									<div class="box">
										<div class="box-header">
										</div>
										<div class="box-body">
											<form action="" method="post">
												<table id="example1" class="table table-bordered table-striped"> 
													<TR>
														<TD class=info colspan=2 align=center><B>Add Tax Values</B></td>
													</TR>
													<tr>
														<td class=back2 align=right width=40%><b>Tax Type</b></td><td class=back width=60%>&nbsp;
															<select name=taxtype required>
															<option value=''>Select</option>
															<?php
															$select=mysql_query("select * from cri_ro_taxtypes where status=1");
															while($rows=mysql_fetch_assoc($select))
															{
															?>
																<option value="<?php echo $rows['id']; ?>"><?php echo $rows['taxtype']; ?></option>
																
																<?php } ?>
															
															</select>
														</td>
													</tr>
													<tr>
														<td class=back2 align=right width=40%><b>Value</b></td>
														<td class=back width=60%>&nbsp;<input type=text name=taxvalue size=15 required></input></td>
													</tr>
													<tr>
														<td colspan=2 class=back2 align=center width=40%>
														<input type=submit name='submit' value="Add New"></input></td>
														<td class=back2 width=60%>&nbsp;</td>
													</tr>
												</table>
											</form>
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
