<?php
include("header.php");
include("connect.php");
?>
<script type="text/javascript">
	function validation()
	{
		var v=/^[A-Za-z ]+$/;
		if(form1.txtname.value=="")
		{
			alert("Please Enter Your Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Alphabets in Your Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Your Address");
			form1.txtadd.focus();
			return false;
		}
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter Your City Name");
			form1.txtcity.focus();
			return false;
		}else{
			if(!v.test(form1.txtcity.value))
			{
				alert("Please Enter Only Alphabets in Your City Name");
				form1.txtcity.focus();
				return false;
			}
		}
		
		var v=/^[0-9]+$/;
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Your Mobile No");
			form1.txtmno.focus();
			return false;
		}else if(form1.txtmno.value.length!=10)
		{
			alert("Please Enter Your Mobile No 10 Digit Long");
			form1.txtmno.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtmno.value))
			{
				alert("Please Enter Only Digits in Your Mobile No");
				form1.txtmno.focus();
				return false;
			}
		}
		
		var v=/^[A-Za-z0-9.-_]+@[A-Za-z0-9.-_]+\.([a-zA-Z]{2,4})+$/;
		if(form1.txtemail.value=="")
		{
			alert("Please Enter Your Email ID");
			form1.txtemail.focus();
			return false;
		}else{
			if(!v.test(form1.txtemail.value))
			{
				alert("Please Enter Valid Email ID");
				form1.txtemail.focus();
				return false;
			}
		}
		
		if(form1.txtpwd.value=="")
		{
			alert("Please Enter Your Password");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length<6)
		{
			alert("Please Enter Your Password More Than 6 Character");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length>10)
		{
			alert("Please Enter Your Password Less Than 10 Character");
			form1.txtpwd.focus();
			return false;
		}
		
		if(form1.selutype.value=="0")
		{
			alert("Please Select User Type");
			form1.selutype.focus();
			return false;
		}
		
		if(form1.gender[0].checked==false)
		{
			if(form1.gender[1].checked==false)
			{
				alert("Please Select Gender");
				return false;
			}
		}
	}
</script>

<?php
if(isset($_POST['btnregis']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$utype=$_POST['selutype'];
	$gender=$_POST['gender'];
	
	$res1=mysql_query("select * from user_regis where email_id='$email'");
	if(mysql_num_rows($res1)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Email Id Already Exists');";
		echo "window.location.href='regis.php';";
		echo "</script>";
	}else{
		//auto no code start...
		$res2=mysql_query("select max(user_id) from user_regis");
		$uid=0;
		while($r2=mysql_fetch_array($res2))
		{
			$uid=$r2[0];
		}
		$uid++;
		//auto no. code end...
		$query="insert into user_regis values('$uid','$name','$add','$city','$mno','$gender','$email','$pwd','$utype')";
		if(mysql_query($query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Registration Successfully');";
			echo "window.location.href='login.php';";
			echo "</script>";
		}
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
						<h2>REGISTRATION</h2>
						<p>Real cooking is more about following your heart than following recipes.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="images/regis2.gif" alt="" style="width:100%; height:100%;">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
					<div class="col-md-12">
						<form name="form1" method="post">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control"  name="txtname" placeholder="Your Name">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group"> 
									<textarea class="form-control" placeholder="Your Address" name="txtadd" rows="3" ></textarea>
									<div class="help-block with-errors"></div>
								</div>
								
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control"  name="txtcity" placeholder="Your City Name">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control"  name="txtmno" placeholder="Your Mobile No">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Your Email" class="form-control" name="txtemail" >
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="password" placeholder="Your Password" class="form-control" name="txtpwd" >
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<select class="custom-select d-block form-control" name="selutype">
									  <option value="0">Select User Type</option>
									  <option value="1">USER</option>
									  <option value="2">VLOGGER</option>
									  
									</select>
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group" style="text-align: left;">
									Select Gender
									
									<input type="radio" name="gender" value="MALE"> MALE
									<input type="radio" name="gender" value="FEMALE"> FEMALE
								</div> 
							</div>
							<div class="col-md-12">
								
								<div class="submit-button text-center">
									<button class="btn btn-common" name="btnregis" type="submit" onclick="return validation();">REGISTER</button>
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
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-left">
					<p class="lead ">
						"Cooking demands attention, patience, and above all, a respect for the gifts of the earth. It is a form of worship, a way of giving thanks"
					</p>
					<span class="lead">Judith B. Jones</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	


<?php
include("footer.php");
?>