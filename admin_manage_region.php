<?php
include("admin_header.php");
include("connect.php");


//auto no code start...
$res1=mysql_query("select max(region_id) from region_master");
$rid=0;
while($r1=mysql_fetch_array($res1))
{
	$rid=$r1[0];
}
$rid++;
//auto no. code end...
?>
<script type="text/javascript">
	function validate()
	{
		var v=/^[A-Za-z ]+$/;
		if(form1.txtregion.value=="")
		{
			alert("Please Enter Region");
			form1.txtregion.focus();
			return false;
		}else{
			if(!v.test(form1.txtregion.value))
			{
				alert("Please Enter Only Alphabets in Region");
				form1.txtregion.focus();
				return false;
			}
		}
	}
</script>
<?php

if(isset($_POST['btnsave']))
{
	$rid=$_POST['txtrid'];
	$region=$_POST['txtregion'];
	$query="insert into region_master values('$rid','$region')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Region Saved Successfully');";
		echo "window.location.href='admin_manage_region.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['urid']))
{
	$rid=$_REQUEST['urid'];
	$res2=mysql_query("select * from region_master where region_id='$rid'");
	$r2=mysql_fetch_array($res2);
	$region1=$r2[1];
}

if(isset($_POST['btnupdate']))
{
	$rid=$_POST['txtrid'];
	$region=$_POST['txtregion'];
	$query="update region_master set region_name='$region' where region_id='$rid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Region Updated Successfully');";
		echo "window.location.href='admin_manage_region.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['drid']))
{
	$rid1=$_REQUEST['drid'];
	$query="delete from region_master where region_id='$rid1'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Region Deleted Successfully');";
		echo "window.location.href='admin_manage_region.php';";
		echo "</script>";
	}
}

?>

	<!-- Start About -->
	<div class="about-section-box">
	<br/><br/><br/>
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>MANAGE REGION</h2>
						
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
				<?php
					$qur=mysql_query("select * from region_master");
					if(mysql_num_rows($qur)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>REGION ID</th>
									<th>REGION NAME</th>
									<th>UPDATE</th>
									<th>DELETE</th>
								</tr>";
							while($q1=mysql_fetch_array($qur))
							{
								echo "<tr>";
								echo "<td>$q1[0]</td>";
								echo "<td>$q1[1]</td>";
								echo "<td><a href='admin_manage_region.php?urid=$q1[0]'>UPDATE</a></td>";
								echo "<td><a href='admin_manage_region.php?drid=$q1[0]'>DELETE</a></td>";
								echo "</tr>";
							}
							
						echo "</table>";
					}
					else
					{
						echo "<h2>No Record Found</h2>";
					}
				?>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
					<div class="col-md-12">
						<form id="contactForm" method="post" name="form1">
						<div class="row">
							
							
							
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" name="txtrid" value="<?php echo $rid; ?>" readonly>
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Enter Region" class="form-control" name="txtregion" value="<?php echo $region1; ?>">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							
							<div class="col-md-12">
								
								<div class="submit-button text-center">
								<?php
									if(isset($_REQUEST['urid']))
									{
										?>
											<button class="btn btn-common" name="btnupdate" type="submit" onclick="return validate();">UPDATE</button>
										<?php
									}else{
										?>
											<button class="btn btn-common" name="btnsave" type="submit" onclick="return validate();">SAVE</button>
										<?php
									}
								?>
									<div id="msgSubmit" class="h3 text-center hidden"></div> 
									<div class="clearfix"></div> 
								</div>
							</div>
							
						</div>            
					</form>
						
						
					</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	


<?php
include("footer.php");
?>