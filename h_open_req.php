 <?php include"navigation.php"; ?> 
 <html>
	<head><title>My personal open requests</title></head>
	<body>
		<div class="content-wrapper">
			<section class="content-header" align="center">
				<h1><font align="center" color="#000000" family="ariel">My Personal Open Requests</font></h1>
			</section>
			<section class="content">
					<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
							</div>
								<!-- /.box-header -->
							<div class="box-body">
								<form name=form2 action=control.php?t=topts&act=tcat method=post>
									<table id="example2" class="table table-bordered table-hover">
										<tr class="info">
											<td  align=center><a  href="http://localhost/cri-project/supporter/index.php?t=hodapprove&s=id"><b>ID</b></a></td>
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
											$query=mysql_query("select * from cri_tickets where `user_id`='$id1' ");
											while($row=mysql_fetch_assoc($query))
											{
											$i++;
											$st=$row['status'];
											$cat=$row['category'];
											//echo "$cat";
											$row1=mysql_fetch_assoc(mysql_query("select * from cri_tstatus where `rank`='$st' "));
											$row2=mysql_fetch_assoc(mysql_query("select * from cri_ro_categories where `id`='$cat' "));
											?>
											<tr>
												<td class=back align=center><b><?php echo $row['id']; ?></b></td>
												<td class="back" align="center"><label size=30 name="category[<?php echo $i; ?>]"> <?php echo $row2['category']; ?> </label></td>
												<td class="back" align="center"><a href="MPOR_reqdesc.php?id=<?php echo $row['id']?>" size=5 name="requirement_desc[<?php echo $i; ?>]" >	<?php echo $row['requirement_desc'];  ?> </a></td>
												<td class="back" align="center"><label size=30 name="create_date[<?php echo $i; ?>]"><?php echo $row['create_date']; ?></label></td>
												<td class="back" align="center"><label size=5 name="required_date[<?php echo $i; ?>]"> <?php echo $row['required_date'];  ?> </label></td>
												<td class="back" align="center"><a href="http://localhost/cri-project/supporter/index.php?t=hodapprove&s=id"size=30 name="status[<?php echo $i; ?>]"> <?php echo $row1['status'];  ?>
											</td>		
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