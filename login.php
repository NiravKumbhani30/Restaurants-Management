<?php
session_start();
include("header.php");
include("connect.php");

if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	
	$query="select * from admin_detail where email_id='$email' and pwd='$pwd'";
	$res=mysql_query($query);
	
	if(mysql_num_rows($res)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Admin Login Successfull');";
		echo "window.location.href='admin_manage_region.php';";
		echo "</script>";
	}else{
		$query1="select * from user_regis where email_id='$email' and pwd='$pwd'";
		$res2=mysql_query($query1);
	
		if(mysql_num_rows($res2)>0)
		{
			$r2=mysql_fetch_array($res2);
			
			if($r2[8]=="1")
			{
				
				echo "<script type='text/javascript'>";
				echo "alert('User Login Successfull');";
				echo "window.location.href='login.php';";
				echo "</script>";
			}else{
				$_SESSION['vlid']=$r2[0];
				echo "<script type='text/javascript'>";
				echo "alert('Vlogger Login Successfull');";
				echo "window.location.href='vlogger_upload_vlogs.php';";
				echo "</script>";
			}
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Check Your Email Id or Password');";
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
						<h2>LOGIN</h2>
						<p>Real cooking is more about following your heart than following recipes.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="images/log1.gif" alt="" style="width:100%; height:100%;">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
					<div class="col-md-12">
						<form id="contactForm" method="post" >
						<div class="row">
							
							
							
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
								
								<div class="submit-button text-center">
									<button class="btn btn-common" name="btnlogin" type="submit">LOGIN</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div> 
									<div class="clearfix"></div> 
								</div>
							</div>
							<div class="col-md-12">
								
								<div class="submit-button text-center">
									<h2><a href="regis.php">New User? Click Here</a></h2>
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
						"Food Is a Symbolic of love when words are inadequate."
					</p>
					<span class="lead">Alan D. Wolfelt</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	


<?php
include("footer.php");
?>