<?php
include("admin_header.php");
include("connect.php");


//auto no code start...
$res1=mysql_query("select max(recipe_id) from recipe_master");
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
		
		if(form1.selregion.value=="0")
		{
			alert("Please Select Region");
			form1.selregion.focus();
			return false;
		}
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Dish Description");
			form1.txtdesc.focus();
			return false;
		}
		
		if(form1.selstate.value=="0")
		{
			alert("Please Select State");
			form1.selstate.focus();
			return false;
		}
		
		
		if(form1.txtrdesc.value=="")
		{
			alert("Please Enter Recipe Description");
			form1.txtrdesc.focus();
			return false;
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
	
	function validate2()
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
		
		if(form1.selregion.value=="0")
		{
			alert("Please Select Region");
			form1.selregion.focus();
			return false;
		}
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Dish Description");
			form1.txtdesc.focus();
			return false;
		}
		
		if(form1.selstate.value=="0")
		{
			alert("Please Select State");
			form1.selstate.focus();
			return false;
		}
		
		
		if(form1.txtrdesc.value=="")
		{
			alert("Please Enter Recipe Description");
			form1.txtrdesc.focus();
			return false;
		}
		
		var fname = document.getElementById('txtimg').value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value!="")
		{
			if(!(ext=="png" || ext=="jpg" || ext=="jpeg" || ext=="webp"))
			{
				alert("Please Select Dish Image Format Like Jpg,Jpeg,png or webp");
				return false;
			}
		}
		
		var vfname = document.getElementById('txtvideo').value;
		var vext = vfname.substr(vfname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtvideo").value!="")
		{
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
if(isset($_POST['btnsave']))
{
	$rid=$_POST['txtrid'];
	$name=$_POST['txtname'];
	$regionid=$_POST['selregion'];
	$desc=$_POST['txtdesc'];
	$state=$_POST['selstate'];
	$rdesc=$_POST['txtrdesc'];
	$vnv=$_POST['vnv'];
	$tpath=$_FILES["txtimg"]["tmp_name"];
	$ipath="dimg/d".$rid."_".rand(1000,9999).".png";
	
	$tvpath=$_FILES["txtvideo"]["tmp_name"];
	$vpath="rvideo/r".$rid."_".rand(1000,9999).".mp4";
	
	$query="insert into recipe_master values('$rid','$regionid','$name','$desc','$state','$rdesc','$ipath','$vpath','$vnv')";
	if(mysql_query($query))
	{
		move_uploaded_file($tpath,$ipath);
		move_uploaded_file($tvpath,$vpath);
		echo "<script type='text/javascript'>";
		echo "alert('Recipe Saved Successfully');";
		echo "window.location.href='admin_manage_recipe.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['urid']))
{
	$rid=$_REQUEST['urid'];
	$res2=mysql_query("select * from recipe_master where recipe_id='$rid'");
	$r2=mysql_fetch_array($res2);
	$regionid1=$r2[1];
	$name1=$r2[2];
	$desc1=$r2[3];
	$state1=$r2[4];
	$rdetail1=$r2[5];
	$img1=$r2[6];
	$video1=$r2[7];
	$vnv1=$r2[8];
}

if(isset($_POST['btnupdate']))
{
		$rid=$_POST['txtrid'];
	$name=$_POST['txtname'];
	$regionid=$_POST['selregion'];
	$desc=$_POST['txtdesc'];
	$state=$_POST['selstate'];
	$rdesc=$_POST['txtrdesc'];
	$vnv=$_POST['vnv'];
	
	if($_FILES["txtimg"]["size"]>0)
	{
		$tpath=$_FILES["txtimg"]["tmp_name"];
		$ipath="dimg/d".$rid."_".rand(1000,9999).".png";
		if($_FILES["txtvideo"]["size"]>0)
		{
			$tvpath=$_FILES["txtvideo"]["tmp_name"];
			$vpath="rvideo/r".$rid."_".rand(1000,9999).".mp4";
			$query="update recipe_master set region_id='$regionid',dish_name='$name',description='$desc',state='$state',recipe_detail='$rdesc',dish_img='$ipath',recipe_video='$vpath',veg_nonveg='$vnv' where recipe_id='$rid'";
			move_uploaded_file($tpath,$ipath);
			move_uploaded_file($tvpath,$vpath);
		}else{
			$query="update recipe_master set region_id='$regionid',dish_name='$name',description='$desc',state='$state',recipe_detail='$rdesc',dish_img='$ipath',veg_nonveg='$vnv' where recipe_id='$rid'";
			move_uploaded_file($tpath,$ipath);
		}
	}else if($_FILES["txtvideo"]["size"]>0){
		$tvpath=$_FILES["txtvideo"]["tmp_name"];
		$vpath="rvideo/r".$rid."_".rand(1000,9999).".mp4";
		$query="update recipe_master set region_id='$regionid',dish_name='$name',description='$desc',state='$state',recipe_detail='$rdesc',recipe_video='$vpath',veg_nonveg='$vnv' where recipe_id='$rid'";
		move_uploaded_file($tvpath,$vpath);
	}else{
		$query="update recipe_master set region_id='$regionid',dish_name='$name',description='$desc',state='$state',recipe_detail='$rdesc',veg_nonveg='$vnv' where recipe_id='$rid'";
	}

	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Recipe Updated Successfully');";
		echo "window.location.href='admin_manage_recipe.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['drid']))
{
	$rid1=$_REQUEST['drid'];
	$query="delete from recipe_master where recipe_id='$rid1'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Recipe Deleted Successfully');";
		echo "window.location.href='admin_manage_recipe.php';";
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
						<h2>MANAGE RECIPE</h2>
						
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="inner-column">
					<div class="col-md-12">
						<form id="contactForm" name="form1" method="post" enctype="multipart/form-data">
						<div class="row">
							
							
							
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" name="txtrid" value="<?php echo $rid; ?>" readonly>
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Enter Dish Name" class="form-control" name="txtname" value="<?php echo $name1; ?>">
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
							
							<div class="col-md-12">
								<div class="form-group"> 
									<textarea class="form-control" placeholder="Enter Dish Description" rows="3" name="txtdesc" ><?php echo $desc1; ?></textarea>
									<div class="help-block with-errors"></div>
								</div>
								
							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<select class="form-control" name="selstate" >
										<option value="0">Select State</option>
										<option value="Andhra Pradesh" <?php if($state1=="Andhra Pradesh"){ echo "selected='selected'"; } ?>>Andhra Pradesh</option>
										<option value="Andaman and Nicobar Islands" <?php if($state1=="Andaman and Nicobar Islands"){ echo "selected='selected'"; } ?>>Andaman and Nicobar Islands</option>
										<option value="Arunachal Pradesh" <?php if($state1=="Arunachal Pradesh"){ echo "selected='selected'"; } ?>>Arunachal Pradesh</option>
										<option value="Assam" <?php if($state1=="Assam"){ echo "selected='selected'"; } ?>>Assam</option>
										<option value="Bihar" <?php if($state1=="Bihar"){ echo "selected='selected'"; } ?>>Bihar</option>
										<option value="Chandigarh" <?php if($state1=="Chandigarh"){ echo "selected='selected'"; } ?>>Chandigarh</option>
										<option value="Chhattisgarh" <?php if($state1=="Chhattisgarh"){ echo "selected='selected'"; } ?>>Chhattisgarh</option>
										<option value="Dadar and Nagar Haveli" <?php if($state1=="Dadar and Nagar Haveli"){ echo "selected='selected'"; } ?>>Dadar and Nagar Haveli</option>
										<option value="Daman and Diu" <?php if($state1=="Daman and Diu"){ echo "selected='selected'"; } ?>>Daman and Diu</option>
										<option value="Delhi" <?php if($state1=="Delhi"){ echo "selected='selected'"; } ?>>Delhi</option>
										<option value="Lakshadweep" <?php if($state1=="Lakshadweep"){ echo "selected='selected'"; } ?>>Lakshadweep</option>
										<option value="Puducherry" <?php if($state1=="Puducherry"){ echo "selected='selected'"; } ?>>Puducherry</option>
										<option value="Goa" <?php if($state1=="Goa"){ echo "selected='selected'"; } ?>>Goa</option>
										<option value="Gujarat" <?php if($state1=="Gujarat"){ echo "selected='selected'"; } ?>>Gujarat</option>
										<option value="Haryana" <?php if($state1=="Haryana"){ echo "selected='selected'"; } ?>>Haryana</option>
										<option value="Himachal Pradesh" <?php if($state1=="Himachal Pradesh"){ echo "selected='selected'"; } ?>>Himachal Pradesh</option>
										<option value="Jammu and Kashmir" <?php if($state1=="Jammu and Kashmir"){ echo "selected='selected'"; } ?>>Jammu and Kashmir</option>
										<option value="Jharkhand" <?php if($state1=="Jharkhand"){ echo "selected='selected'"; } ?>>Jharkhand</option>
										<option value="Karnataka" <?php if($state1=="Karnataka"){ echo "selected='selected'"; } ?>>Karnataka</option>
										<option value="Kerala" <?php if($state1=="Kerala"){ echo "selected='selected'"; } ?>>Kerala</option>
										<option value="Madhya Pradesh" <?php if($state1=="Madhya Pradesh"){ echo "selected='selected'"; } ?>>Madhya Pradesh</option>
										<option value="Maharashtra" <?php if($state1=="Maharashtra"){ echo "selected='selected'"; } ?>>Maharashtra</option>
										<option value="Manipur" <?php if($state1=="Manipur"){ echo "selected='selected'"; } ?>>Manipur</option>
										<option value="Meghalaya" <?php if($state1=="Meghalaya"){ echo "selected='selected'"; } ?>>Meghalaya</option>
										<option value="Mizoram" <?php if($state1=="Mizoram"){ echo "selected='selected'"; } ?>>Mizoram</option>
										<option value="Nagaland" <?php if($state1=="Nagaland"){ echo "selected='selected'"; } ?>>Nagaland</option>
										<option value="Odisha" <?php if($state1=="Odisha"){ echo "selected='selected'"; } ?>>Odisha</option>
										<option value="Punjab"<?php if($state1=="Punjab"){ echo "selected='selected'"; } ?> >Punjab</option>
										<option value="Rajasthan" <?php if($state1=="Rajasthan"){ echo "selected='selected'"; } ?>>Rajasthan</option>
										<option value="Sikkim" <?php if($state1=="Sikkim"){ echo "selected='selected'"; } ?> >Sikkim</option>
										<option value="Tamil Nadu" <?php if($state1=="Tamil Nadu"){ echo "selected='selected'"; } ?>>Tamil Nadu</option>
										<option value="Telangana" <?php if($state1=="Telangana"){ echo "selected='selected'"; } ?>>Telangana</option>
										<option value="Tripura" <?php if($state1=="Tripura"){ echo "selected='selected'"; } ?>>Tripura</option>
										<option value="Uttar Pradesh" <?php if($state1=="Uttar Pradesh"){ echo "selected='selected'"; } ?>>Uttar Pradesh</option>
										<option value="Uttarakhand" <?php if($state1=="Uttarakhand"){ echo "selected='selected'"; } ?>>Uttarakhand</option>
										<option value="West Bengal" <?php if($state1=="West Bengal"){ echo "selected='selected'"; } ?>>West Bengal</option>
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
									<textarea class="form-control" placeholder="Enter Recipe Description" rows="3" name="txtrdesc" ><?php echo $rdetail1; ?></textarea>
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
								<?php
									if(isset($_REQUEST['urid']))
									{
										?>
										<div class="row">
											<div class="col-md-6">
												<img src="<?php echo $img1; ?>" style="width:150px; height:150px;">
											</div>
											<div class="col-md-6">
												<video width="250px" height="150px" controls>
													<source src="<?php echo $video1; ?>">
												</video>
											</div>
										</div>
											<button class="btn btn-common" name="btnupdate" type="submit" onclick="return validate2();">UPDATE</button>
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