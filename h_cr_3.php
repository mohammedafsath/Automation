<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("cri_project",$con);
	
	if(isset($_POST['next']))
	{
		$sql=mysql_query("INSERT INTO `cri_tickets_machine_economicdetails`( `ticket_id`, `investment`, `production_perday`, `cost_product`,`costproduct_without_investment`, `vendor_cost`, `saving_product`,`saving_year`, `pay_back`, `return_on_investment`, `analysis_result`, `status`) VALUES('".$_POST['ticket_id']."','".$_POST['investment']."','".$_POST['production_perday']."','".$_POST['cost_product']."','".$_POST['costproduct_without_investment']."','".$_POST['vendor_cost']."','".$_POST['saving_product']."','".$_POST['saving_year']."','".$_POST['pay_back']."', '".$_POST['return_on_investment']."','".$_POST['analysis_result']."','1') ");
		//echo "INSERT INTO `cri_tickets_machine_economicdetails`( `ticket_id`, `investment`, `production_perday`, `cost_product`,`costproduct_without_investment`, `vendor_cost`, `saving_product`,`saving_year`, `pay_back`, `return_on_investment`, `analysis_result`, `status`) VALUES('".$_POST['ticket_id']."','".$_POST['investment']."','".$_POST['production_perday']."','".$_POST['cost_product']."','".$_POST['costproduct_without_investment']."','".$_POST['vendor_cost']."','".$_POST['saving_product']."','".$_POST['saving_year']."','".$_POST['pay_back']."', '".$_POST['return_on_investment']."','".$_POST['analysis_result']."','1'";
		echo "<script type='text/javascript'>window.location.href='h_cr_4.php';</script>";
	}
?>

<!DOCTYPE html>
<html>
  <head>
	<?php include"navigation.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
		
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header" align="center">
          <h1
<font color="#006600" family="ariel">ECONOMIC JUSTIFICATION FOR THE MACHINE</font>
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
			<form name=form1 action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="box">
                <div class="box-header">
                  <font color=red>
				  <TR>
												<TD class=info colspan=4 align=left><B>Economic Justification @ 80% Efficiency				</B></td>
																		</TR>	
				  </font>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      
                    </thead>
                    <tbody>
                     <td class=back2 align=right width=100>Investment (Rs.) :</td>
				  <td class=back align=left colspan=3>
					<input type=text name=investment id=investment required>
				  </td>
              </tr>
			 <tr>
				<td width=27% valign=top class=back2 align=right>Production/day :</td>
				<td class=back valign=top width=40% colspan=3>
				<textarea name=production_perday id=production_perday rows=2 cols=60 required></textarea></td>
				</tr>
				 <tr>
					<td class=back2 valign=top align=right width=100>Cost / product considering the investment (Rs.) :</td>
             			 <td valign=top class=back align=left>
						 	<textarea name=cost_product id=cost_product rows=2 cols=60 required></textarea>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right width=100>Cost of Product without<br>considering investment(Rs.)  :</td>
             			 <td valign=top class=back align=left>
						 	<textarea name=costproduct_without_investment id=costproduct_without_investment rows=2 cols=60 required></textarea>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right width=100>Total Vendor Cost (Rs.) :</td>
             			 <td valign=top class=back align=left>
						 	<textarea name=vendor_cost id=vendor_cost rows=2 cols=60 required></textarea>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right width=100>Cost Saving / Product (Rs.) :</td>
             			 <td valign=top class=back align=left>
						 	<textarea name=saving_product id=saving_product rows=2 cols=60 required></textarea>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right width=100>Cost Saving / Year (Rs.) :</td>
             			 <td valign=top class=back align=left>
						 	<textarea name=saving_year id=saving_year rows=2 cols=60 required></textarea>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right width=100>Pay Back (Years) :</td>
             			 <td valign=top class=back align=left>
						 	<textarea name=pay_back id=pay_back rows=2 cols=60 required></textarea>
					</td>
				</tr>
				<tr>
					<td class=back2 valign=top align=right width=100>Return on Investment (%) :</td>
             			 <td valign=top class=back align=left>
						 	<textarea name=return_on_investment id=return_on_investment rows=2 cols=60 required></textarea>
					</td>
				</tr>
		</td>
		</tr>
		</table>
					  
					  
                    </tbody>
                 </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

               <div class="box">
                <div class="box-header">
                  
                </div><!-- /.box-header -->
                
				
				<div class="box-body">
                  <table class="table table-bordered table-striped">
                    <tbody>
                      			<tr>
									<td class=info colspan=7 align=center><b> Analysis & Results</b></td>
								</tr>
								<TR>																		
																		<td class=back2 align=right valign=top width=420>Details :</td>
				  <td class=back align=left colspan=3>
					<textarea name=analysis_result id=analysis_result rows=6 cols=60 required></textarea>
				  </td>
              </tr>	</table>
		</td>
		</tr>
		</table><br><center>
		<input type=hidden name=ticket_id value="20">
		<input name="next" value="Next" style="font-weight:bold;" type="submit">&nbsp;&nbsp;&nbsp;
		<input type=reset name=reset style='font-weight:bold;' value=Reset></form></form></center>    
		</TR>
      </TBODY>
    </TABLE>
    <BR>
  </TD>
</TR>     
									</table>
                      
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  </form>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

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