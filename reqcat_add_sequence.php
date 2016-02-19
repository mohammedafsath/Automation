  <?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
if(isset($_POST['submit']))
{
	$query=mysql_query("select * from cri_category_sequence");
	$sql=mysql_query("insert into cri_category_sequence(`categoryid`, `order`, `sequence`, `status`) VALUES ('".$_POST['categoryid']."','".$_POST['order']."','".$_POST['sequence']."','1')");
	 //echo "INSERT INTO `cri_category_sequence`(`id`, `categoryid`, `order`, `sequence`, `status`, `created_date`, `created_by`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7]);
 }
if(isset($_GET['did']))
{
$delete=mysql_query("update cri_category_sequence set status='0' where id='".$_GET['did']."'");
}


function getNumCategories()
{
$sql="select count(categoryid) from cri_category_sequence where status=1";
$result=mysql_query($sql);

$total=mysql_fetch_array($result);
return $total[0];
}

if(isset($_POST['update']))
{
	$num_uoms=getNumCategories();
	for($i=1;$i<=$num_uoms;$i++)
	{
		$order=$_POST['order'][$i];
		$sequence=$_POST['sequence'][$i];
		$id=$_POST['edi'][$i];
		$sql="UPDATE `cri_category_sequence` SET `order`='".$order."',`sequence`='".$sequence."' WHERE id='".$id."'";
		mysql_query($sql);		
	}
}
?>

<html>
	<head><title>add sequence</title></head>
	<body>
		<?php include"navigation.php"; ?> 
		  <aside class="main-sidebar">
			<section class="sidebar">
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<li class="treeview">
						<a href="#"><i class="fa fa-dashboard"></i> <span>HOME</span> <i class="fa fa-angle-left pull-right text-white"></i>
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
							<li class="active treeview"><a href="#">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i><span>Request Options</span> <i class="fa fa-angle-left pull-right text-white"></i></a>
								<ul class="treeview-menu">
									<li class="active"><a href="req_categories.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Request Categories</a></li>
									<li><a href="machine_equipments.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Machines/Equipments</a></li>
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


			<!-- Main content -->
		<div class="content-wrapper">
			<section class="content-header" align="center"><h1><font align="center" color="#000000" family="ariel">ADD SEQUENCE</font></h1>
			</section>
			<section class="content">
			 <!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-header"><font color=red>Categories Sequences refer to the process level of the Request.  Sorting is based on rank first, and then is alphabetic.</font>
								</div><!-- /.box-header -->	
								<div class="box-body">
									<form name=form2 action="" method=post>
										<table class="table table-bordered table-hover">
											<thead>
											</thead>
											<tbody>
												<tr class="info">
													<td class=back2 align=center ><b>Sl No</b></td>
													<td class=back2 align=center ><b>Category</b></td>
													<td class=back2 align=center ><b>Sequence</b></td>
													<td class=back2 align=center ><b>Order</b></td>
													<td class=back2 align=center ></td>
												</tr>
								
													<?php
													$i=0;
													$query=mysql_query("select * from cri_category_sequence where status='1' order by categoryid");
													while($row=mysql_fetch_assoc($query))
													{
													$i++;
													?>
													
												<tr>
													<input type="hidden" name="edi[<?php echo $i; ?>]" value="<?php echo $row['id']; ?>">
													<input type=hidden name=id1 value='1'></input>
													<td class=back align=center><?php echo $i; ?></td>
													<td >
															<?php
															$select=mysql_query("select * from cri_ro_categories where status=1 and id='".$_GET['seq']."'");
															//echo "select * from cri_ro_categories where status=1 and id='".$_GET['id']."'";
															while($rows=mysql_fetch_assoc($select))
															{
															?>
															<input type=hidden name="categoryid" value="<?php echo $rows['id']?>"><?php echo $rows['category']; ?></input>
															<?php } ?>
													</td>
													<td class="back" align="center"><input type="text" size=30 name="sequence[<?php echo $i; ?>]" value="<?php echo $row['sequence']; ?>" ></td>
													<td class="back" align="center"><input type="text" size=30 name="order[<?php echo $i; ?>]" value="<?php echo $row['order']; ?>" ></td>
													<td class=back align=center ><a href="reqcat_add_sequence.php?did=<?php echo $row['id']; ?>">Delete</a></td>
												</tr>
													<?php } ?>
												<tr>
													<td colspan=5 class=back2 align=center width=40%><input type=submit name='update' value="Update"></input></td>
												</tr>
										</table>
									</form>
								</div><!-- /.box-body -->
							</div><!-- /.box -->

							<div class="box">
								<div class="box-header">
								</div><!-- /.box-header -->
								<div class="box-body">
									<form action="" method="post">
										<table class="table table-bordered table-striped">
											<tbody>
													<TR>
														<TD class=info colspan=2 align=center><B>Add Sequence</B></td>
													</TR>
													<tr>
														<td class=back2 align=right width=40%><b>Category</b></td>
														<td >
															<?php
															$select=mysql_query("select * from cri_ro_categories where status=1 and id='".$_GET['seq']."'");
															//echo "select * from cri_ro_categories where status=1 and id='".$_GET['id']."'";
															while($rows=mysql_fetch_assoc($select))
															{
															?>
															<input type=hidden name="categoryid" value="<?php echo $rows['id']?>"><?php echo $rows['category']; ?></input>
															<?php } ?>
														</td>
													</tr>
													<tr>
														<td class=back2 align=right width=40%><b>Sequence</b></td>
														<td class=back width=60%>&nbsp;<input type=text name=sequence size=35 required></input></td>
													</tr>
													<tr>	
														<td class=back2 align=right width=40%><b>Order</b></td>
														<td class=back width=60%>&nbsp;<input type=text name=order id=order required size=5></input></td>
													</tr>
													<tr>
														<td class=back2 align=right width=40%><input type=submit name=submit value="Add sequence"></input></td>
														<td class=back2 width=60%>&nbsp;</td>
													</tr>
										   </tbody>
										</table>
									</form>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</section>
			</section> 
		</div><!-- /.content-wrapper -->

		<?php include"footer.php"; ?>
	</body>
</html>
