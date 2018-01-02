<?php
    session_start();
?>

<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Global Service Mangalore |Consultancy in Mangalore | Recruitment Agency in Mangalore | Top Recruitment consultancy Mangalore, Karnataka India</title>
		
	</head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./global_login_bg.css">
	<script type="text/javascript" src="./semantic_ui/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<script src="./bootstrap.min.js"></script>

	<script type = "text/javascript" >
		function preventBack(){window.history.forward();}
		setTimeout("preventBack()", 0);
		window.onunload=function(){null};
	</script>

	<body>
		<?php
			if(isset($_SESSION['suid']))
			{
				$ses_type = $_SESSION['stype'];
				if($ses_type=="admin")
					{
						header("Location: ./admin_home.php");
						exit();
					}
				elseif($ses_type=="recruiter")
					{
						header("Location: ./recruitment_home.php");
						exit();
					}
				elseif($ses_type=="processor")
					{
						header("Location: ./processing_home.php");
						exit();
					}
				else
					{
						header("Location: ./index.php");
						exit();
					}
			}			
			else
				{
				echo '<div class="container-fluid bg">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12"></div>
							<div class="col-md-4 col-sm-4 col-xs-12">					
								<form  class="form-container" method="post" action="includes/login.inc.php">
									<h3>Login to Continue</h3>
									<div class="form-group">
										<label for="exampleInputEmail1">Employee ID</label>
										<input type="text" class="form-control" name="uid" id="un" placeholder="Employee ID" required>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Password</label>
										<input type="password" class="form-control" name="pwd" id="pw" placeholder="Password" required>
									</div>						
									<div class="checkbox">
										<label>
											<input type="checkbox"> <b>Remember me</b>
										</label>
									</div>
									<center><button type="submit" name="submit" class="btnCust">Submit</button></center>
								</form>
							</div>
						</div>
					</div>';
			}
		?>
		
	</body>
</html>