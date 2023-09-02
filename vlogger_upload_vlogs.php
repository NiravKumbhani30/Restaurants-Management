<?php
session_start();
include("vlogger_header.php");
include("connect.php");




?>
<script type="text/javascript">
	function validate()
	{
		var v=/^[A-Za-z ]+$/;
		if(form1.txtname.value=="")
		{
			alert("Please Enter Dish Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Alphabets in Dish Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		if(form1.txtpname.value=="")
		{
			alert("Please Enter Place Name");
			form1.txtpname.focus();
			return false;
		}else{
			if(!v.test(form1.txtpname.value))
			{
				alert("Please Enter Only Alphabets in Place Name");
				form1.txtpname.focus();
				return false;
			}
		}
		
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Place Address");
			form1.txtadd.focus();
			return false;
		}
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter City Name");
			form1.txtcity.focus();
			return false;
		}else{
			if(!v.test(form1.txtcity.value))
			{
				alert("Please Enter Only Alphabets in City Name");
				form1.txtcity.focus();
				return false;
			}
		}
		
		if(form1.selregion.value=="0")
		{
			alert("Please Select Region");
			form1.selregion.focus();
			return false;
		}
		
		
		var v=/^[0-9]+$/;
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Mobile No");
			form1.txtmno.focus();
			return false;
		}else if(form1.txtmno.value.length!=10)
		{
			alert("Please Enter Mobile No 10 Digit Long");
			form1.txtmno.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtmno.value))
			{
				alert("Please Enter Only Digits in Mobile No");
				form1.txtmno.focus();
				return false;
			}
		}
		
		
		var fname = document.getElementById('txtimg').value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value=="")
		{
			alert("Please Select Dish Image");
			return false;
		}else{
			if(!(ext=="png" || ext=="jpg" || ext=="jpeg" || ext=="webp"))
			{
				alert("Please Select Dish Image Format Like Jpg,Jpeg,png or webp");
				return false;
			}
		}
		
		var vfname = document.getElementById('txtvideo').value;
		var vext = vfname.substr(vfname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtvideo").value=="")
		{
			alert("Please Select Recipe Video");
			return false;
		}else{
			if(!(vext=="mp4"))
			{
				alert("Please Select Only mp4 Format in Recipe Video");
				return false;
			}
		}
		
		if(form1.vnv[0].checked==false)
		{
			if(form1.vnv[1].checked==false)
			{
				alert("Please Select Veg  NonVeg");
				return false;
			}
		}
	}
	
	
	
</script>
<?php
if(isset($_POST['btnupload']))
{
	
	$name=$_POST['txtname'];
	$pname=$_POST['txtpname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];	
	$regionid=$_POST['selregion'];
	$mno=$_POST['txtmno'];
	$vnv=$_POST['vnv'];
	$userid=$_SESSION['vlid'];
	//auto no code start...
	$res1=mysql_query("select max(video_id) from vlog_master");
	$vid=0;
	while($r1=mysql_fetch_array($res1))
	{
		$vid=$r1[0];
	}
	$vid++;
	//auto no. code end...
	
	
	$tpath=$_FILES["txtimg"]["tmp_name"];
	$ipath="vimg/vi".$vid."_".rand(1000,9999).".png";
	
	$tvpath=$_FILES["txtvideo"]["tmp_name"];
	$vpath="vvideo/v".$vid."_".rand(1000,9999).".mp4";
	
	$query="insert into vlog_master values('$vid','$name','$pname','$add','$city','$regionid','$mno','$vpath','$ipath','$vnv','0','','$userid')";
	if(mysql_query($query))
	{
		move_uploaded_file($tpath,$ipath);
		move_uploaded_file($tvpath,$vpath);
		echo "<script type='text/javascript'>";
		echo "alert('Vlog Uploaded Successfully');";
		echo "window.location.href='vlogger_view_vlog.php';";
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
						<h2>UPLOAD VLOG</h2>
						
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="inner-column">
					<div class="col-md-12">
						<form id="contactForm" name="form1" method="post" enctype="multipart/form-data">
						<div class="row">
							
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Enter Dish Name" class="form-control" name="txtname" value="<?php echo $name1; ?>">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Enter Place Name" class="form-control" name="txtpname" value="<?php echo $pname1; ?>">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group"> 
									<textarea class="form-control" placeholder="Enter Address" rows="3" name="txtadd" ><?php echo $add1; ?></textarea>
									<div class="help-block with-errors"></div>
								</div>
								
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Enter City" class="form-control" name="txtcity" value="<?php echo $city1; ?>">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<select class="form-control" name="selregion" >
										<option value="0">Select Region</option>
							<?php
								$res5=mysql_query("select * from region_master");
								while($r5=mysql_fetch_array($res5))
								{
									?>
									<option value="<?php echo $r5[0]; ?>" <?php if($r5[0]==$regionid1){ echo "selected='selected'"; }?> ><?php echo $r5[1]; ?></option>
									<?php
								}
							?>
									</select>
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							
							
							
							
						</div>            
					
						
					</div>	
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
					<div class="col-md-12">
						
						<div class="row">
							
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Enter Mobile No" class="form-control" name="txtmno" value="<?php echo $mno1; ?>">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							
							<div class="col-md-12">
								<div class="form-group" style="text-align: left;">
									Select Dish Image
									<input type="file" class="form-control" name="txtimg" id="txtimg">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group" style="text-align: left;">
									Select Recipe Video In Mp4 Format
									<input type="file" class="form-control" name="txtvideo" id="txtvideo">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group" style="text-align: left;">
									Select Veg/Non-Veg: &nbsp;&nbsp;&nbsp;
									
									<input type="radio" name="vnv" value="1" <?php if($vnv1=="1"){ echo "checked"; } ?>> Veg &nbsp;&nbsp;&nbsp;
									<input type="radio" name="vnv" value="2" <?php if($vnv1=="2"){ echo "checked"; } ?>> Non-Veg
								</div> 
							</div>
							
							<div class="col-md-12">
								
								<div class="submit-button text-center">
								
									<button class="btn btn-common" name="btnupload" type="submit" onclick="return validate();">UPLOAD VLOGS</button>
										
									<div id="msgSubmit" class="h3 text-center hidden"></div> 
									<div class="clearfix"></div> 
								</div>
							</div>
							
						</div>            
					</form>
						
						
					</div>	
					</div>
				</div>
				<div class="col-md-12">
				<?php
					$qur=mysql_query("select * from recipe_master");
					if(mysql_num_rows($qur)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>RECIPE ID</th>
									<th>REGION NAME</th>
									<th>DISH NAME</th>
									<th>DISH DESCRIPTION</th>
									<th>STATE</th>
									<th>RECIPE DETAIL</th>
									<th>VEG/NON-VEG</th>
									<th>DISH IMAGE</th>	
									<th>VIEW VIDEO</th>
									<th>UPDATE</th>
									<th>DELETE</th>
								</tr>";
							while($q1=mysql_fetch_array($qur))
							{
								echo "<tr>";
								echo "<td>$q1[0]</td>";
								//echo "<td>$q1[1]</td>";
								$qur2=mysql_query("select * from region_master where region_id='$q1[1]'");
								$q2=mysql_fetch_array($qur2);
								echo "<td>$q2[1]</td>";
								echo "<td>$q1[2]</td>";
								echo "<td>$q1[3]</td>";
								echo "<td>$q1[4]</td>";
								echo "<td>$q1[5]</td>";
								if($q1[8]=="1")
								{
									echo "<td style='color:green;'>VEG</td>";	
								}else{
									echo "<td style='color:red;'>NON-VEG</td>";	
								}
								echo "<td><img src='$q1[6]' style='width:150px; height:150px;'></td>";
								echo "<td><a href='$q1[7]' target='_blank'>VIEW VIDEO</a></td>";
								echo "<td><a href='admin_manage_recipe.php?urid=$q1[0]'>UPDATE</a></td>";
								echo "<td><a href='admin_manage_recipe.php?drid=$q1[0]'>DELETE</a></td>";
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