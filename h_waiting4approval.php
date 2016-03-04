<?php include"navigation.php"; ?> 
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("cri_project",$con);
?>

<html>
	<head><title>waiting for your approval</title></head>
	<body>
    <div class="content-wrapper">
		<section class="content-header" align="center">
			<h1><font align="center" color="#000000" family="ariel">WAITING FOR YOUR APPROVAL</font></h1>
		</section>
			<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
						</div>
						<div class="box-body">
							<form action='control.php?t=topts&act=tcat' method='post'>
								<table id="example2" class="table table-bordered table-hover">
									<tr class="info">
										<td><a  href="http://localhost/cri-project/supporter/index.php?t=hodapprove&s=id"><b>ID</b></a></td>   
										<td  align=center><a  href="http://localhost/cri-project/supporter/index.php?t=hodapprove&s=req"><b>Requested By</b></a></td> 
										<td  align=center><a  href=""><b>Category</b></a></td>
										<td  align=center><a  href=""><b>Requirement Description</b></a></td>
										<td  align=center><a  href="http://localhost/cri-project/supporter/index.php?t=hodapprove&s=cr"><b>Created Date</b></a></td>
										<td  align=center><a  href="http://localhost/cri-project/supporter/index.php?t=hodapprove&s=rd"><b>Required Date</b></a></td>
										<td  align=center><a  href=""><b>Status</b></a></td>
									</tr>					
										<?php									
											$query=mysql_query("SELECT * FROM `cri_users` WHERE user_name='".$_SESSION['user_name']."'");
											while($row = mysql_fetch_assoc($query))
											$id1 = $row['id'];
											$i=0;
											$query=mysql_query("select * from cri_tickets where `supporter_id`='$id1' ");
											while($row=mysql_fetch_assoc($query))
											{
											$i++;
											?>
									<tr>
										<td class=back align=center><?php echo $i; ?></td>
										<td class=back align="center"><label  href="http://localhost/cri-project/supporter/index.php?t=hodapprove&s=id" size=5 name="user_id[<?php echo $i; ?>]"> <?php echo $row['user_id'];  ?></label></td>
										<td class="back" align="center"><label size=30 name="category[<?php echo $i; ?>]"> <?php echo $row['category']; ?> </label></td>
										<td class="back" align="center"><a href="test_machine.php"?id=<?php echo $row['id']?>" size=5 name="requirement_desc[<?php echo $i; ?>]" >	<?php echo $row['requirement_desc'];  ?> </a></td>
										<td class="back" align="center"><label size=30 name="create_date[<?php echo $i; ?>]"><?php echo $row['create_date']; ?></label></td>
										<td class="back" align="center"><label size=5 name="required_date[<?php echo $i; ?>]"> <?php echo $row['required_date'];  ?> </label></td>
										<td class="back" align="center"><a href="http://localhost/cri-project/supporter/index.php?t=hodapprove&s=id"size=30 name="status[<?php echo $i; ?>]"> <?php echo $row['status']; ?> </a></td>		
									</tr>
									<?php } ?>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>
<?php include"footer.php"; ?> 