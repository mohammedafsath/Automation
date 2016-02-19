<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("cri_project",$con);
	if(isset($_GET['id']))
	{	
	    $sql=mysql_query("select * from cri_uo_departments where status=1 and unit_code='".$_GET["id"]."' order by dept_name");
		while($row=mysql_fetch_assoc($sql))
		{
		?>
		<option value="<?php echo $row['id']; ?>"><?php echo $row['dept_name']; ?></option>
		<?php 
		}
	}
?>

			