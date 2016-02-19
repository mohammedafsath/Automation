 <?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
if(isset($_POST['submit']))
{
   $query=mysql_query("select * from cri_ro_categories");
   $flag=0;
   while($row=mysql_fetch_assoc($query))
   {
     if($row['category']==$_POST['category'])
	 {
	  $flag=1;
	  break;
	 }
   }
   if($flag==0)
   {
     $sql=mysql_query("insert into cri_ro_categories(rank,category,status) VALUES ('".$_POST['rank']."','".$_POST['category']."','1')");
	 //echo "insert into cri_ro_categories(rank,category,status) VALUES ('".$_POST['rank']."','".$_POST['category']."','1')";
	 }
	 else
	 {
	   echo "<script type='text/javascript'> alert('existing')</script>";
	   
	 }
}
if(isset($_GET['did']))
{
$delete=mysql_query("update cri_ro_categories set status='0' where id='".$_GET['did']."'");
}

function getNumCategories()
{
$sql="select count(category) from cri_ro_categories where status=1";
$result=mysql_query($sql);

$total=mysql_fetch_array($result);
return $total[0];
}

if(isset($_POST['update']))
{
	$num_uoms=getNumCategories();
	for($i=1;$i<=$num_uoms;$i++)
	{
		$category=$_POST['category'][$i];
		$rank=$_POST['rank'][$i];
		$id=$_POST['edi'][$i];

		$sql="UPDATE cri_ro_categories SET category='".$category."',rank='$rank' WHERE id='".$id."'";
		mysql_query($sql);		
	}
}
?>
 

 
   <?php include"navigation.php"; ?> 
 <html>
	<head><title>req categories</title></head>
	<body>
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
			<h1><font align="center" color="#000000" family="ariel">REQUEST CATEGORIES</font></h1>
		</section>
	   
        <section class="content">
         
            <!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box"><!--box-->
							<div class="box-header">
								<font color=red>Request Categories refer to the problem type of the Request.  Sorting is based on rank first, and then is alphabetic.</font>
							</div>
								<!-- /.box-header -->
							<div class="box-body"><!--box body-->
								<form name=form2 action="" method=post>
									<table id="example2" class="table table-bordered table-hover">
										<tr class=info>
											<td class=back2 align=center width=20%><b>Sl No</b></td>
											<td class=back2 align=center ><b>Rank</b></td>
											<td class=back2 align=center width=30%><b>Category Name</b></td>
											<td class=back2 align=center width=70%></td>
										</tr>
	   
											<?php
											$i=0;
											$query=mysql_query("select * from cri_ro_categories where status='1' order by rank,category");
											while($row=mysql_fetch_assoc($query))
											{
											$i++;
											?>
											<tr>
												<input type="hidden" name="edi[<?php echo $i; ?>]" value="<?php echo $row['id']; ?>">
												<input type=hidden name=id1 value='1'></input>
												<td class=back align=center><?php echo $i; ?></td>
												<td class="back" align="center"><input type="text" size=5 name="rank[<?php echo $i; ?>]" value="<?php echo $row['rank'];  ?>" ></td>
												<td class="back" align="center"><input type="text" size=30 name="category[<?php echo $i; ?>]" value="<?php echo $row['category']; ?>" ></td>
												<td class=back align=center>
													<a href="reqcat_add_approval.php?app=<?php echo $row['id']; ?>">Add Approval Level</a>&nbsp;&nbsp;&nbsp;&nbsp;
													<a href="reqcat_add_sequence.php?seq=<?php echo $row['id']; ?>">Add Sequence</a>&nbsp;&nbsp;&nbsp;&nbsp;
													<a href="req_categories.php?did=<?php echo $row['id']; ?>">Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;
												</td>  
											</tr>
											<?php } ?>
											
										<tr>
											<td colspan=4 class=back2 align=center width=40%><input type=submit name='update' value="Update"></input></td>	
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
									<table id="example1" class="table table-bordered table-striped"> 
										<TR>
											<TD class=info colspan=2 align=center><B>Add Category</B></td>
										</TR>
										<tr>
											<td class=back2 align=right width=40%><b>Category Name</b></td>
											<td class=back width=60%>&nbsp;<input type=text name=category required></input></td>
										</tr>
										<tr>
											<td class=back2 align=right width=40%><b>Rank</b></td>
											<td class=back width=60%>&nbsp;<input type=text name=rank size=4  required></input></td>
										</tr>
										<tr>
											<td class=back2 colspan=2 align=center width=40%><input type=submit name=submit value="Add Category"></input></td>
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
