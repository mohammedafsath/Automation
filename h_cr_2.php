<?php include"navigation.php"; ?> 

<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("cri_project",$con);
	//$name=$_SESSION["user_name"];
	//echo "The user name is ".$name;
	
	if(isset($_POST['next']))
	{
		$sql=mysql_query("INSERT INTO `cri_tickets_machine_techdetails`( `ticket_id`,`capacity`, `power_requirement`, `cycle_time`, `shift`, `additional_accessories`, `handling_equipments`, `spares`, `design_change`,`improvements`, `special_requirement`, `sheet`, `status`, `commercial_details`) VALUES ('".$_POST['ticket_id']."','".$_POST['capacity']."','".$_POST['power_requirement']."','".$_POST['cycle_time']."','".$_POST['shift']."','".$_POST['additional_accessories']."','".$_POST['handling_equipments']."','".$_POST['spares']."','".$_POST['design_change']."','".$_POST['improvements']."','".$_POST['special_requirement']."','".$_POST['sheet']."','1','".$_POST['commercial_details']."')");
		//echo "INSERT INTO `cri_tickets_machine_techdetails`( `ticket_id`,`capacity`, `power_requirement`, `cycle_time`, `shift`, `additional_accessories`, `handling_equipments`, `spares`, `design_change`,`improvements`, `special_requirement`, `sheet`, `status`, `commercial_details`) VALUES ('".$_POST['ticket_id']."','".$_POST['capacity']."','".$_POST['power_requirement']."','".$_POST['cycle_time']."','".$_POST['shift']."','".$_POST['additional_accessories']."','".$_POST['handling_equipments']."','".$_POST['spares']."','".$_POST['design_change']."','".$_POST['improvements']."','".$_POST['special_requirement']."','".$_POST['sheet']."','1','".$_POST['commercial_details']."')";
		echo "<script type='text/javascript'>window.location.href='h_cr_3.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
  <head>
		<div class="content-wrapper">
			<section class="content">   
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<form name=form1 action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
								<div class="box">
									<div class="box-body">
										<table id="example2" class="table table-bordered table-hover">
											<tr class=info>
												<td class=back2 align=center colspan=4><b>TECHNICAL DETAILS</b></td>
											</tr>
											<tr>
												<td class=info colspan=4 align=left><B>Technical Details of the Machine</B></td>
											</tr>
											<tr>
												<td class=back2 align=right width=100>Capacity :</td>
												<td class=back align=left colspan=3>
													<input type=text name=capacity id=capacity required>
												</td>
											</tr>
											 <tr>
												<td width=27% valign=top class=back2 align=right>Power Requirement :</td>
												<td class=back valign=top width=40% colspan=3>
												<textarea name=power_requirement id='power_requirement' rows=2 cols=60 required></textarea></td>
											</tr>
											<tr>
												<td class=back2 valign=top align=right width=100>Cycle time (or) Strokes /minute :</td>
												<td valign=top class=back align=left>
													<textarea name=cycle_time id=cycle_time rows=2 cols=60 required></textarea>
												</td>
											</tr>
											<tr>
												<td class=back2 valign=top align=right width=100>Output / shift :</td>
												<td valign=top class=back align=left>
													<textarea name=shift id=shift rows=2 cols=60 required></textarea>
												</td>
											</tr>
											<tr>
												<td class=back2 valign=top align=right width=100>Additional Accessories Required :</td>
												<td valign=top class=back align=left>
													<textarea name=additional_accessories id=additional_accessories rows=2 cols=60 required></textarea>
												</td>
											</tr>
											<tr>
												<td class=back2 valign=top align=right width=100>Handling Equipments for the machine :</td>
												<td valign=top class=back align=left>
													<textarea name=handling_equipments id=handling_equipments rows=2 cols=60 required></textarea>
												</td>
											</tr>
											<tr>
												<td class=back2 valign=top align=right width=100>List of Standard spares to be ordered<br>With the machine :</td>
												<td valign=top class=back align=left>
													<textarea name=spares id=spares rows=2 cols=60 required></textarea>
												</td>
											</tr>
											<tr>
												<td class=back2 valign=top align=right width=100>Any major design Change required<br>in the machine. :</td>
												<td valign=top class=back align=left>
													<textarea name=design_change id=design_change rows=2 cols=60 required></textarea>
												</td>
											</tr>
											<tr>
												<td class=back2 valign=top align=right width=100>Any further improvements to be made to improve easy <br>maintainability of the machine. :</td>
												<td valign=top class=back align=left>
													<textarea name=improvements id=improvements rows=2 cols=60 required></textarea>
												</td>
											</tr> 	
											<tr>
												<td class=back2 valign=top align=right width=100>Others (If necessary attach separate sheet) :</td>
												<td valign=top class=back align=left>
													<input type=file name=sheet>
												</td>
											</tr>
											<tr>
												<td class=back2 valign=top align=right width=100>Special Requirement<b> (If Applicable)</b> :</td>
												<td valign=top class=back align=left>
													<textarea name=special_requirement id=special_requirement rows=2 cols=60 required></textarea>
												</td>
											</tr>
										</table>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <div class="box-body">
					<table id="example1" class="table table-bordered table-striped"> 
                		<tr>
							<TD class=info colspan=2 align=center><B>COMMERCIAL DETAILS</B></td>
						</tr>
						<tr>	
							<td class=back2 align=right valign=top width=420>Details :</td>
							<td class=back align=left colspan=3>
								<textarea name=commercial_details id=commercial_details rows=6 cols=60 required></textarea>
							</td>
						</tr>
				</table>
				<br>
				<center>
				<input type=hidden name=ticket_id value="20">
				<input name="next" value="Next" style="font-weight:bold;" type="submit">
									&nbsp;&nbsp;&nbsp;
									<input name="reset" style="font-weight:bold;" value="Reset" type="reset" onclick="reset()"> 
				</form>
				</center>      </TR>
      </TBODY>
					</table>
					</form>
			    </div>
          </div>
        </div>
      </div>
    </section>
	</div>
	</section>	   

      </div>
	  <script>
			function reset()
			{
			document.getElementById("form1").reset();
			}
			</script>
	  </body>
</html>
  <?php include"footer.php"; ?> 