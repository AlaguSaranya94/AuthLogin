<?php session_start(); /* Starts the session */
	
	/* Check Login form submitted */	
	if(isset($_POST['Submit'])){
		/* Define username and associated password array */
		$logins = array('Alex' => '123456','username1' => 'password1','username2' => 'password2');
		
		/* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		$account_linking_token = isset($_POST['account_linking_token']) ? $_POST['account_linking_token'] : '';
		
		/* Check Username and Password existence in defined array */		
		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['UserData']['Username']=$logins[$Username];
			header("location:https://www.facebook.com/messenger_platform/account_linking?account_linking_token=" . $account_linking_token . "&authorization_code=20");
			exit;
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid Login Details</span>";
		}
	}
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
<title>PHP Login Script Without Using Database</title>
<link href="./css/style.css" rel="stylesheet">
	<link href="./css/log.css" rel="stylesheet">
</head>
<body>
<!--<div id="Frame0">
  <h1>PHP Login Script Without Using Database Demo.</h1>
  <p>More tutorials <a href="http://www.w3schools.in/">www.w3schools.in</a></p>
</div>-->
<br>
	
	<center>
	<form action="" method="post" name="Login_Form">
	<!-- ngIf: IsAuth && isLogIn --> <!-- ngIf: IsAuth && isLogIn -->
	<div class="lw-positionRelative lw-Container">
		<div>
			<!-- ngIf: !IsAuth -->
			<div>
				<img src="images/usb-logo.png" class="usb-logo-img" style="width: 170px"/>
			</div>
			<div class="lw-Body_Lock_Icon ng-scope">
				 
			</div>
			<!-- end ngIf: !IsAuth --> <!-- ngIf: !IsAuth -->
			<div class="lw-LoginIcon lw-paddingBottom28" style="float: left">
				<p>
					<b>
						 Log In
					</b>
				</p>
			</div>

			<!-- end ngIf: !IsAuth -->
			<div>
				<!-- ngIf: !IsPapLogin && !IsAuth -->
				<!-- end ngIf: !IsPapLogin && !IsAuth -->
				<?php if(isset($msg)){?>
    <div class="lw-PadLeft20 lw-vs15">
					<?php echo $msg;?>
					
				</div>
    <?php } ?>
				<div class="lw-PadLeft20 lw-vs15">
					<input class="lw-TextRoundCorner lw-marginTop0" autocomplete="off" name="Username" required="required" type="text" placeholder="Username" />
				</div>
				<div class="lw-PadLeft20 lw-vs15">
					<input class="lw-TextRoundCorner lw-marginTop0" autocomplete="off" name="Password" type="password" required="required" placeholder="Password" />
				</div>
				<div class="lw-PadLeft20 lw-Padtop33">
					<input name="Submit" class="lw-buttonSubmit" type="submit" value="Log In" />
				</div>
			</div>
		</div>
	</div>
		<input style="display: none" type="text" name="account_linking_token" value="<?php echo $_GET['account_linking_token']; ?>"/>
	<!-- ngIf: IsAuth --><!-- ngIf: IsAuth -->
</form>
	</center>
	

</body>
</html>
