<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
if(isset($_POST['addstatus']))
{
   $query=mysql_query("select * from cri_ro_reqstatus");
   $flag=0;
   while($row=mysql_fetch_assoc($query))
   {
     if($row['status']==$_POST['status'])
	 {
	  $flag=1;
	  break;
	 }
   }
   if($flag==0)
    {
     $sql=mysql_query("insert into cri_ro_reqstatus(status,rank) VALUES ('".$_POST['status']."','".$_POST['rank']."')");
	}
	 else
	 {
	   echo "<script type='text/javascript'> alert('existing')</script>";
	   
	 }
}
if(isset($_GET['did']))
{
$delete=mysql_query("delete from cri_ro_reqstatus where id='".$_GET['did']."'");
}

function getNumStatus()
{
$sql="select count(status) from cri_ro_reqstatus";
$result=mysql_query($sql);
$total=mysql_fetch_array($result);
return $total[0];
}

if(isset($_POST['update']))
{
	$num_uoms=getNumStatus();
	for($i=1;$i<=$num_uoms;$i++)
	{
		$status=$_POST['status'][$i];
		$rank=$_POST['rank'][$i];
		$id=$_POST['edi'][$i];
		
		$sql="UPDATE cri_ro_reqstatus SET status='".$status."',rank='$rank' WHERE id='".$id."'";
		mysql_query($sql);		
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include"navigation.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
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
			  <li class="active treeview"><a href="#">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i><span>Request Options</span> <i class="fa fa-angle-left pull-right text-white"></i></a>
				<ul class="treeview-menu">
                <li><a href="req_categories.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Request Categories</a></li>
                <li><a href="machine_equipments.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Machines/Equipments</a></li>
				<li><a href="tax_value.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Tax Values</a></li>
                <li><a href="tax_types.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i> Tax Types</a></li>
				<li  class="active"><a href="req_status.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Request Status</a></li>
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
           
             </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header" align="center">
          <h1
<font color="#006600" family="ariel">REQUEST STATUS</font>
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
                  <font color=red>Status Levels should change as the task is answered and completed. Sorting is based on rank first, and then is alphabetic.</font>
                </div><!-- /.box-header -->	
                <div class="box-body">
				<form name=form2 action="" method=post>
                  <table class="table table-bordered table-hover">
						<?php
						$i=0;
						$query=mysql_query("select * from cri_ro_reqstatus");
						while($row=mysql_fetch_assoc($query))
						{
						$i++;
						?>
						<tr>
							<input type=hidden name="edi[<?php echo $i; ?>]" value="<?php echo $row['id']; ?>"></input>
							<td align=left><input type=text size=70 name="status[<?php echo $i; ?>]" value="<?php echo $row['status']; ?>" >
							&nbsp;&nbsp;&nbsp;&nbsp;Rank:<input type=text size=5 name="rank[<?php echo $i; ?>]" value="<?php echo $row['rank']; ?>" >
							<a href="req_status.php?did=<?php echo $row['id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;Delete?</a>
							</td>
						</tr>
						<?php } ?>
			
						<tr>
							<td align=center colspan="3">
							<input type=submit name=update value="Update">
							</td>
						</tr>
					</tr>
				</table>
			</form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
			  <div class="box">
                <div class="box-header">
                 </div><!-- /.box-header -->
				
				<div class="box-body">
				<form action="" method=post>
                  <table class="table table-bordered table-striped">
                    <tbody>
                      	<TR>
							<TD class=info colspan=2 align=center><B>Add New Status</B></td>
						</TR>
						<tr>
							<td align=right width=40%><b>Status</b></td>
							<td width=60%>&nbsp;
								<input type=text name=status size=35 required></input>
							</td>
						</tr>
						<tr>
							<td  align=right width=40%><b>Rank</b></td>
							<td  width=60%>&nbsp;
								<input type=text name=rank required></input>
							</td>
						</tr>
						<tr>
							<td  align=center colspan=2 width=40%>
								<input type=submit name=addstatus value="Add Status"></input>
							</td>
							<td  width=60%>&nbsp;</td>
						</tr>
			        </tbody>
                </table>
			</form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
			
			
		</div><!-- /.row -->
          <!-- Main row -->
          
        </section>
		
		<!-- /.content -->
      </div><!-- /.content-wrapper -->
	 <?php include"footer.php"; ?> 
	 </html>
