<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
if(isset($_POST['submit']))
{
	$query=mysql_query("select * from cri_category_approval_levels");
    $sql=mysql_query("insert into cri_category_approval_levels(category_id,unit_id,`order`,approval_level,user_id,status) VALUES ('".$_POST['category_id']."','".$_POST['unit_id']."','".$_POST['order']."','".$_POST['approval_level']."','".$_POST['user_id']."','1')");
	//echo "INSERT INTO `cri_project`.`cri_category_approval_levels` (`id`, `category_id`, `unit_id`, `order`, `approval_level`, `user_id`, `status`, `created_date`, `created_by`) VALUES (NULL, '', '', '', '', '', '1', '', '');";
}

if(isset($_GET['did']))
{
$delete=mysql_query("update cri_category_approval_levels set status='0' where id='".$_GET['did']."'");
}

function getNumApproval()
{
$sql="select count(category_id) from cri_category_approval_levels where status=1";
$result=mysql_query($sql);

$total=mysql_fetch_array($result);
return $total[0];
}

if(isset($_POST['update']))
{
	$num_uoms=getNumApproval();
	for($i=1;$i<=$num_uoms;$i++)
	{
		$category_id=$_POST['category_id'][$i];
		$user_id=$_POST['user_id'][$i];
		$approval_level=$_POST['approval_level'][$i];
		$order=$_POST['order'][$i];
		$id=$_POST['edi'][$i];

		$sql="UPDATE cri_category_approval_levels SET category_id='".$category_id."',user_id='".$user_id."',approval_level='".$approval_level."',order='".$order."' WHERE id='".$id."'";
		mysql_query($sql);		
	}
}
?>



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
	  
    <div class="content-wrapper">
		<section class="content-header" align="center">
			<h1><font align="center" color="#000000" family="ariel">ADD APPROVAL LEVELS</font></h1>
		</section>
	    <section class="content">
         
            <!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
					
						<div class="box"><!--box-->
							<div class="box-header">
								<font color=red>Approval Levels refer to the approval sequence of the Request.  Sorting is based on rank first, and then is alphabetic.</font>
							</div><!-- /.box-header -->	
							<div class="box-body"><!--box body-->
								<form name=form2 action="" method=post>
									<table id="example2" class="table table-bordered table-hover">
										<tr class=info>
											<div id="unit">
												<td><b>Unit : </b>
													<select name="unit"  required>
														<option value="">----Select----</option>
														<?php
														$select=mysql_query("select * from cri_uo_units where status=1 order by unit");
														while($rows=mysql_fetch_assoc($select))
														{
														?>
														<option value="<?php echo $rows['id']; ?>"><?php echo $rows['unit']; ?></option>
														<?php } ?>
													</select>
												</td>
											</div>
												<td>
													<input type="submit" name="find" value="find"/> 
												</td>
										</tr>
									</table>
									
												<!--hidden table-->
									<div class="box-body">													
										<table type="hidden" id="example2" class="table table-bordered table-hover">
											<tr class="info">
												<td colspan="6"><b>Details</b></td>
											</tr>
											<tr class=info>
												<td ><b>Sl.No</b></td>
												<td ><b>Category</b></td>
												<td ><b>Level</b></td>
												<td ><b>User</b></td>
												<td ><b>Order</b></td>
												<td ><b></b></td>
											</tr>
																<?php
																$i=0;
																  if($_SERVER['REQUEST_METHOD'] == "POST")
																  {
																	$des=$_POST["unit"];
																    $res=mysql_query("select * from cri_category_approval_levels where status='1' AND unit_id='$des' AND category_id='".$_GET['app']."'");
																	while($row=mysql_fetch_assoc($res))
																 {
																$i++;
																?>
																<tr>
																<input type="hidden" name="edi[<?php echo $i; ?>]" value="<?php echo $row['id']; ?>" >
																
																<td  align=center><?php echo $i; ?></td>
																<td >
																	<?php		
																	$select=mysql_query("select * from cri_ro_categories where status=1 and id='".$_GET['app']."'");
																	//echo "select * from cri_ro_categories where status=1 and id='".$_GET['id']."'";
																	while($rows=mysql_fetch_assoc($select))
																	{
																	?>
																		<input type=hidden name="categoryid" value="<?php echo $rows['id']?>"><?php echo $rows['category']; ?></input>
																	<?php } ?>
																</td>
																<td class="back" align="center"><input type="text" size=5 name="approval_level[<?php echo $i;  ?>]" value="<?php echo $row['approval_level']  ?>" ></input></td>
																<td class="back" align="center"><input type="text" size=5 name="user_id[<?php echo $i; ?>]" value="<?php echo $row['user_id'] ?>" ></input></td>
																<td class="back" align="center"><input type="text" size=5 name="order[<?php echo $i;  ?>]" value="<?php echo $row['order']  ?>" ></td>
																<td  align=center><a href="reqcat_add_approval.php?did=<?php echo $row['id']; ?>">Delete</a></td>  
																</tr>
																<?php } ?>
											<tr>
												<td colspan=6 2 align=center width=40%><input type=submit name='update' value="Update"></input></td>	
											</tr>
											<?php } ?>
										</table>
									</div>
								</form>
							</div><!-- /.box-body -->
`						</div>					
						<div class="box">
						<div class="box-body">
							<form action="" method="post">
								<table id="example1" class="table table-bordered table-striped"> 
									<TR>
										<TD class=info colspan=2 align=center><B>Add Approval Levels</B></td>
									</TR>

									<tr>
										<td align=right width=40%><b>Category</b></td>
										<td >
											<?php
		
											$select=mysql_query("select * from cri_ro_categories where status=1 and id='".$_GET['app']."'");
											//echo "select * from cri_ro_categories where status=1 and id='".$_GET['id']."'";
											while($rows=mysql_fetch_assoc($select))
											{
											?>
												<input type=hidden name="categoryid" value="<?php echo $rows['id']?>"><?php echo $rows['category']; ?></input>
											<?php } ?>
											
										</td>
									</tr>
									<tr>
										<td align=right width=40%><b>Unit</b></td>
										<td >
											<select name=unit_id required>
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
										<td 2 align=right width=40%><b>Approval Level</b></td>
										<td  width=60%>&nbsp;<input type=text name=approval_level required></input></td>
									</tr>
									<tr>
										<td 2 align=right width=40%><b>Username</b></td>
										<td  width=60%>&nbsp;<input type=text name=user_id id=username required></input></td>
									</tr>
									<tr>
										<td 2 align=right width=40%><b>Order</b></td>
										<td  width=60%>&nbsp;<input type=text name=order id=order required></input></td>
									</tr>
									<tr>
										<td colspan=2 2 align=center width=40%><input type=submit name=submit value="Add"></input></td>
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

