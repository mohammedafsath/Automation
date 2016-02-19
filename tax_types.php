<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
if(isset($_POST['submit']))
{
   $query=mysql_query("select * from cri_ro_taxtypes");
   $flag=0;
   while($row=mysql_fetch_assoc($query))
   {
     if($row['taxtype']==$_POST['taxtype'])
	 {
	  $flag=1;
	  break;
	 }
   }
   if($flag==0)
   {
     $sql=mysql_query("insert into cri_ro_taxtypes(taxtype,status) VALUES ('".$_POST['taxtype']."','1')");
	 //echo "insert into cri_ro_taxtypes(taxtype,status) VALUES ('".$_POST['taxtype']."','1')";
	 }
	 else
	 {
	   echo "<script type='text/javascript'> alert('existing')</script>";
	 }
}

if(isset($_GET['did']))
{
$delete=mysql_query("update cri_ro_taxtypes set status='0' where id='".$_GET['did']."'");
}

function getNumTaxtype()
{
$sql="select count(taxtype) from cri_ro_taxtypes where status=1";
$result=mysql_query($sql);

$total=mysql_fetch_array($result);
return $total[0];
}

if(isset($_POST['update']))
{
	$num_uoms=getNumTaxtype();
	for($i=1;$i<=$num_uoms;$i++)
	{
		$taxtype=$_POST['taxtype'][$i];
		$id=$_POST['edi'][$i];

		$sql="UPDATE cri_ro_taxtypes SET taxtype='".$taxtype."' WHERE id='".$id."'";
		mysql_query($sql);		
	}
}
?>
 

 
   <?php include"navigation.php"; ?> 
 <html>
	<head><title>taxtype</title></head>
	<body>
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
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
			  <li class="active treeview"><a href="#">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i><span>Request Options</span> <i class="fa fa-angle-left pull-right text-white"></i></a>
				<ul class="treeview-menu">
                <li><a href="req_categories.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Request Categories</a></li>
                <li><a href="machine_equipments.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Machines/Equipments</a></li>
				<li><a href="tax_value.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Tax Values</a></li>
                <li  class="active"><a href="tax_types.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Tax Types</a></li>
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
			
		<li><a href="index.php"><i class="fa fa-circle-o"></i>LOGOUT</a></li>
           
             </section>
        
      </aside>

    <div class="content-wrapper">
		<section class="content-header" align="center">
			<h1><font align="center" color="#000000" family="ariel">TAX TYPES</font></h1>
		</section>
	   
        <section class="content">
         
            <!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box"><!--box-->
							<div class="box-header">
								<font color=red>Tax types refers to the machine calculation. Sorting is based on taxtype first, and then is alphabetic.</font>
							</div>
								<!-- /.box-header -->
							<div class="box-body"><!--box body-->
								<form name=form2 action="" method=post>
									<table id="example2" class="table table-bordered table-hover">
										<tr class="info">
											<td class=back2 align=center ><b>Sl.No</b></td>
											<td class=back2 align=center size=30 ><b>Tax Type</b></td>
											<td class=back2 align=center ><b></b></td>
										</tr>
	   
											<?php
											$i=0;
											$query=mysql_query("select * from cri_ro_taxtypes where status='1' order by taxtype");
											while($row=mysql_fetch_assoc($query))
											{
											$i++;
											?>
										<tr>
											<input type="hidden" name="edi[<?php echo $i; ?>]" value="<?php echo $row['id']; ?>"></input>
											<td class=back align=center><?php echo $i; ?></td>
											<td class="back" align="center"><input type="text" size=30 name="taxtype[<?php echo $i; ?>]" value="<?php echo $row['taxtype'];  ?>" ></td>
											<td class=back align=center ><a href="tax_types.php?did=<?php echo $row['id']; ?>">Delete</a></td>
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
											<TD class=info colspan=2 align=center><B>Add Taxtype</B></td>
										</TR>
										<tr>
											<td class=back2 align=right width=40%><b>Tax Type</b></td>
											<td class=back width=60%>&nbsp;<input type=text name=taxtype required></input></td>
										</tr>
										<tr align="center">
											<td colspan=2><input type="submit" name=submit value="Add taxtype" align="center"></td>
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
