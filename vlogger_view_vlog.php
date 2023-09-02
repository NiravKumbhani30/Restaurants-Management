<?php
session_start();
include("vlogger_header.php");
include("connect.php");

?>

	<!-- Start About -->
	<div class="about-section-box">
	<br/><br/><br/>
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>VLOG DETAIL</h2>
						
					</div>
				</div>
				
				<div class="col-md-12">
				<?php
					$userid=$_SESSION['vlid'];
					$qur=mysql_query("select * from vlog_master where user_id='$userid'");
					if(mysql_num_rows($qur)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>VLOG ID</th>
									<th>DISH NAME</th>
									<th>PLACE NAME</th>
									<th>ADDRESS</th>
									<th>CITY</th>
									<th>REGION NAME</th>
									<th>MOBILE NO</th>
									<th>VEG/NON-VEG</th>
									<th>DISH IMAGE</th>	
									<th>VIEW VIDEO</th>
									<th>STATUS</th>
									<th>COMMENTS</th>
								</tr>";
							while($q1=mysql_fetch_array($qur))
							{
								echo "<tr>";
								echo "<td>$q1[0]</td>";
								echo "<td>$q1[1]</td>";
								echo "<td>$q1[2]</td>";
								echo "<td>$q1[3]</td>";
								echo "<td>$q1[4]</td>";
								//echo "<td>$q1[5]</td>";
								$qur2=mysql_query("select * from region_master where region_id='$q1[5]'");
								$q2=mysql_fetch_array($qur2);
								echo "<td>$q2[1]</td>";
								echo "<td>$q1[6]</td>";
								
								if($q1[9]=="1")
								{
									echo "<td style='color:green;'>VEG</td>";	
								}else{
									echo "<td style='color:red;'>NON-VEG</td>";	
								}
								echo "<td><img src='$q1[8]' style='width:150px; height:150px;'></td>";
								echo "<td><a href='$q1[7]' target='_blank'>VIEW VIDEO</a></td>";
								if($q1[10]=="0")
								{
									echo "<td style='color:pink;'>NEW UPLOADED</td>";	
									echo "<td style='color:pink;'>--------</td>";	
								}else if($q1[10]=="1"){
									echo "<td style='color:green;'>VERIFIED</td>";	
									echo "<td style='color:green;'>--------</td>";	
								}else if($q1[10]=="2"){
									echo "<td style='color:red;'>NOT VERIFIED</td>";	
									echo "<td style='color:red;'>$q1[11]</td>";	
								}
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
			</div>
		</div>
	</div>
	<!-- End About -->
	
	


<?php
include("footer.php");
?>