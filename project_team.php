<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
if(isset($_POST['submit']))
{
   $query=mysql_query("select * from cri_uo_projectteam");
   $head=$_POST['is_head'];
   $flag=0;
   while($row=mysql_fetch_assoc($query))
   {
     if($row['user_name']==$_POST['user_name'])
	 {
	  $flag=1;
	  break;
	 }
   }
   if($flag==0)
   {
		$temp=0;
		$query=mysql_query("select * from cri_uo_projectteam");
		$sql=mysql_query("select count(is_head)from cri_uo_projectteam where status=1");
		while($row=mysql_fetch_assoc($query))
	    {
		if($row['is_head'] == '1');
		$temp=1;
		}
		if($head=='1')
		{
			if($temp==1)
			{
				$delete=mysql_query("update cri_uo_projectteam set is_head='0'");
				$sql=mysql_query("insert into cri_uo_projectteam(user_name,is_head,status) VALUES ('".$_POST['user_name']."','".$_POST['is_head']."','1')");
			}
			else
				$sql=mysql_query("insert into cri_uo_projectteam(user_name,is_head,status) VALUES ('".$_POST['user_name']."','".$_POST['is_head']."','1')");
		}
		else
		{
			$sql=mysql_query("insert into cri_uo_projectteam(user_name,is_head,status) VALUES ('".$_POST['user_name']."','0','1')");
		}
	}
	else
	{
	   echo "<script type='text/javascript'> alert('Already existing')</script>";  
	}
}

if(isset($_GET['did']))
{
$delete=mysql_query("delete from cri_uo_projectteam where id='".$_GET['did']."'");
}

function getNum()
{
$sql="select count(user_name) from cri_uo_projectteam where status=1";
$result=mysql_query($sql);

$total=mysql_fetch_array($result);
return $total[0];
}

if(isset($_POST['update']))
{
	$num_uoms=getNum();
	$id = $_POST['edit_id'];
	foreach($id as $val)
	{
		$user_name=$_POST['user_name'][$val];
		$sql="UPDATE cri_uo_projectteam SET is_head='1',user_name='".$user_name."' WHERE id='".$val."'";
		mysql_query($sql);
		$sql1="UPDATE cri_uo_projectteam SET is_head='0' WHERE id='".$val."'";
		mysql_query($sql1);
	}
	$sql1="UPDATE cri_uo_projectteam SET is_head='1' WHERE id='".$_POST['is_head']."'";
		mysql_query($sql1);
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
                <li><a href="req_status.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Request Status</a></li>
                </ul>
            </li>
			<li class="active treeview"><a href="#">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-aqua"></i><span>User Options</span> <i class="fa fa-angle-left pull-right text-white"></i></a>
				<ul class="treeview-menu">
                <li><a href="add_user.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Add New User</a></li>
                <li><a href="search_user.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>User Search</a></li>
				<li><a href="units.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Units</a></li>
                <li><a href="units_measurement.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Units of Measurement</a></li>
				<li><a href="departments.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Departments</a></li>
				<li><a href="finance_team.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Finance Team</a></li>
				<li class="active"><a href="project_team.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o text-yellow"></i>Project Team</a></li>
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
			<font color="#006600" family="ariel">PROJECT TEAM</font>
          </h1>
       </section>

        <!-- Main content Place your content here-->
     <section class="content">   
		<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <font color=red>Finance team members are listed here.</font>
                </div><!-- /.box-header -->
                <div class="box-body">
				<form action="" method="post">
					<table id="example2" class="table table-bordered table-hover">
						<tr class=info>
							<td class=back2 align=center ><b>Is Head?</b></td>
							<td class=back2 align=center ><b>User</b></td>
							<td class=back2 align=center ></td>
						</tr>
					<tbody>
			<?php
			$i=0;
			$sql="select * from cri_uo_projectteam where status=1 order by id asc";
			$result=mysql_query($sql);
			$sql2 = "SELECT id from cri_uo_projectteam where is_head='1' and status=1";
			$result2 = mysql_query($sql2);
			$row2 = mysql_fetch_array($result2);
			while($row = mysql_fetch_array($result)) 
			{ 
			$i++;
			?>
				<tr>
					<input type=hidden name="edit_id[<?php echo $row['id']; ?>]" value="<?php echo $row['id']; ?>"></input>
					<td align=center><input type=radio name="is_head" value="<?php echo $row['id']; ?>" 
						<?php if($row2['id'] == $row['id']){ ?> checked="checked" <?php } ?> >
						 
						</input></td>
					<td align=center><input type=text size=15 name="user_name[<?php echo $row['id']; ?>]" value="<?php echo $row['user_name']; ?>" ></td>
					<td align=center><a href="project_team.php?did=<?php echo $row['id']; ?>">Delete</a></td>
				</tr>
			<?php } ?>			
									
                    <tr>
						<td align=center colspan=7><input type=submit name="update" value="Update"></td> 
					</tr>  
                    </tbody> 
                </table>  
			</form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="box">
            <div class="box-header">
                <div class="box-body">
					<form action="" method="post">
					<table id="example1" class="table table-bordered table-striped"> 
                		<TR>
							<TD class=info colspan=2 align=center><B>Add Member</B></td>
						</TR>
						<tr>
							<td class=back2 align=right width=40%><b>User Name</b></td>
							<td class=back width=60%>&nbsp;<input type=text name=user_name id=username required></input></td>
						</tr>
						<tr>
							<td class=back2 align=right width=40%><b>Is Head ?</b></td>
							
							<td class=back width=60%>&nbsp;<input type="checkbox" name="is_head" value="1"<?php if($row['is_head']=='on') { ?> checked="checked"<?php } ?>> </input></td>
						</tr>
						<tr>
							<td colspan=2 class=back2  align=center  width=40%>
								<input type=submit name=submit value='Add Member'></input>
							</td>
							<td class=back2 width=60%>&nbsp;</td>
						</tr>
					</table>
					</form>
			    </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	</div>
	</section>	
		<!-- /.content -->
      </div><!-- /.content-wrapper -->
	  
	   <?php include"footer.php"; ?> 
</html>