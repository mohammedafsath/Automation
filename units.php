<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
if(isset($_POST['submit']))
{
   $query=mysql_query("select * from cri_uo_units");
   $flag=0;
   while($row=mysql_fetch_assoc($query))
   {
     if($row['unit']==$_POST['unit'])
	 {
	  $flag=1;
	  break;
	 }
   }
   if($flag==0)
   {
     $sql=mysql_query("insert into cri_uo_units(unit,rank,shortcode,location,status) VALUES ('".$_POST['unit']."','".$_POST['rank']."','".$_POST['shortcode']."','".$_POST['location']."','1')");
	 // echo "insert into cri_uo_units(unit,rank,shortcode,location) VALUES ('".$_POST['unit']."','".$_POST['rank']."','".$_POST['shortcode']."','".$_POST['location']."','1')"; 
	 $unit=mysql_query("insert into cri_uo_branch(branch,status) VALUES ('".$_POST['location']."','1')");
	 }
	 else
	 {
	   echo "<script type='text/javascript'> alert('existing')</script>";
	   
	 }
}
if(isset($_GET['did']))
{
$delete=mysql_query("update cri_uo_units set status='0' where id='".$_GET['did']."'");
}


function getNumUnits()
{
$sql="select count(unit) from cri_uo_units where status=1";
$result=mysql_query($sql);

$total=mysql_fetch_array($result);
return $total[0];
}

if(isset($_POST['update']))
{
	$num_uoms=getNumUnits();
	for($i=1;$i<=$num_uoms;$i++)
	{
		$unit=$_POST['unit'][$i];
		$rank=$_POST['rank'][$i];
		$shortcode=$_POST['shortcode'][$i];
		$location=$_POST['location'][$i];
		$id=$_POST['edi'][$i];
		
		$sql="UPDATE cri_uo_units SET unit='".$unit."',rank='$rank',shortcode='".$shortcode."',location='".$location."' WHERE id='".$id."' ";
		mysql_query($sql);		
	}
}
?>


  <?php include"navigation.php"; ?>
<!DOCTYPE html>
<html>
  <head><title>units</title></head>
	<body>
	<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          <!-- search form -->
        
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
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
				<li class="active"><a href="units.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Units</a></li>
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
           
             </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header" align="center">
          <h1
<font color="#006600" family="ariel">UNITS</font>
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
              <div class="box">
                <div class="box-header">
                  <font color=red>Unit refers to the problem type of the request. Sorting is based on rank first,and then is alphabetic.
</font>
                </div><!-- /.box-header -->	
				
				
                <div class="box-body">
				<form name=form2 action="" method=post>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr align=center class="info">
                        
						<td><b>Unit</b></td>
						<td><b>Rank</b></td>
						<td><b>Short Code</b></td>
                        <td><b>Location</b></td>
						<th></th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
											$i=0;
											$query=mysql_query("select * from cri_uo_units where status='1' order by rank,shortcode");
											while($row=mysql_fetch_assoc($query))
											{
												$i++;
					?>
	<tr>
	<input type="hidden" name="edi[<?php echo $i; ?>]" value="<?php echo $row['id']; ?>">
	<td align=center><input type=text size=55 name="unit[<?php echo $i; ?>]" value="<?php echo $row['unit']; ?>" ></td>
	<td align=center><input type=text size=3 name="rank[<?php echo $i; ?>]" value="<?php echo $row['rank'];  ?>"></td>
	<td align=center><input type=text size=10 name="shortcode[<?php echo $i; ?>]" value="<?php echo $row['shortcode']; ?>" ></td>
	<td align=center><input type=text size=25 name="location[<?php echo $i; ?>]" value="<?php echo $row['location']; ?>" ></td>
    <td class=back align=center>
	<a href="units.php?did=<?php echo $row['id']; ?>">Delete</a>
</td>
</tr>

<?php } ?>
                                    
                    <tr>
						<td align=center colspan=7><input type=submit name='update' value="Update"></input></td> 
					</tr>  
                    </tbody>
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
														<TD class=info colspan=2 align=center><B>Add Unit</B></td>
													</TR>
													<tr>
														<td align=right width=40%><b>Unit Name</b></td>
														<td width=60%>&nbsp;
															<input type=text name=unit size=50 required></input>
														</td>
													</tr>
													<tr>
														<td align=right width=40%><b>Rank</b></td>
														<td width=60%>&nbsp;
															<input type=text name=rank size=2 required></input>
														</td>
													</tr>
													<tr>
														<td align=right width=40%><b>Short Code</b></td>
														<td width=60%>&nbsp;
															<input type=text name=shortcode size=5 required></input>
														</td>
													</tr>
													<tr>
														<td size=30 align=right width=40%><b>Location</b></td>
														<td width=60%>&nbsp;
															<input type=text name=location size=15 required></input>
														</td>
													</tr>
													<tr>
														<td class=back2 align=center width=40% colspan=2>
															<input type=submit name=submit value="Add Unit"></input>
														</td>
														<td class=back2 width=60%>&nbsp;</td>
													</tr>
									
                      
                    </tbody>
                  </table>
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
	  
	  
		
	<?php include"footer.php"; ?> 
  </body>
</html>
