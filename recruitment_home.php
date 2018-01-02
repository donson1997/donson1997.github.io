<?php
	session_start();
?>

<html>
<head>
		<title>Global Service Mangalore |Consultancy in Mangalore | Recruitment Agency in Mangalore | Top Recruitment consultancy Mangalore, Karnataka India</title>
		<link rel="stylesheet" href="./FontAwesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="./semantic_ui/semantic.min.css">
		<link rel="stylesheet" href="./DataTables/css/dataTables.semanticui.min.css">
		<script type="text/javascript" src="./semantic_ui/jquery-3.2.1.min.js"></script>
		<script src="./DataTables/datatables.min.js"></script>
		<script src="./DataTables/js/dataTables.semanticui.min.js"></script>
		<script type="text/javascript" src="./semantic_ui/semantic.min.js"></script>		
		
		
		<style>
			#tabcontent .menu a:hover
			{
				background-color: #2185D0;
			}
			#tabcontent .menu .active
			{
				background-color: #2185D0;
				color: #ffffff;
				font-weight: bold;
			}
			#tabcontent .menu .active:hover
			{
				background-color: #2185D0;
			}			
			#tabcontent .menu a:active
			{
				background-color: #2185D0;
			}
		</style>
</head>
<body>	
	<?php
		if(isset($_SESSION['suid']))
		{
			$ses_type=$_SESSION['stype'];
			if($ses_type=="admin")
			{
				header("Location: ./admin_home.php");
				exit();
			}
			elseif($ses_type=="processor")
			{
				header("Location: ./processing_home.php");
				exit();
			}
			elseif($ses_type=="recruiter")
			{
				if(isset($_SESSION['suid']))
				{
					echo '<div class="ui fixed menu">
		&emsp;<a href="#"><img src="./logo/logo.jpg" alt=""/></a>
		<div class="right menu">
			<div class="vertically fitted borderless item">
				<form action="includes/logout.inc.php" method="POST">
					<button class="ui primary icon button" type="submit" name="submit">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                    </button>
				</form>
			</div>
		</div>
	</div>';
				}

				$Regyear = date("Y");
				$regMon = date("m");
				$regNum= "1";

				include 'includes/dbh.inc.php';
				$sql = "SELECT slno FROM tbcandidate c1 WHERE reg_id=(SELECT max(reg_id) FROM tbcandidate)";
				$result = mysqli_query($con, $sql);
				if ($result->num_rows > 0)
				{
					$row=$result->fetch_assoc();
					$xtrct_no = substr($row["slno"],8);
					$inc_no = $xtrct_no + 1;
					$regNum = $Regyear."/".$regMon."/".$inc_no;
				}
				else
				{
					$regNum = $Regyear."/".$regMon."/".$regNum;
				}
				echo '
	<br/><br/><br/><br/><br/>
	<div class="ui container ">
		<div class="ui raised segment">
			<form action="includes/save_cand_det.inc.php" method="post" enctype="multipart/form-data">
				<div class="ui form">
					<div class="fields">
						&emsp;<div class="two wide field">
							<label>Reg No</label>
							<input type="text" name="slno" value="'.$regNum.'" readonly>
						</div>
						<div class="field" >
							<label>Full Name</label>
							<input type="text" name="fullname" required>
						</div>
						<div class="field">
							<label>Passport Number</label>
							<input type="text" name="passportno">
						</div>
						<div class="field">
							<label>Qualification</label>
							<input type="text" name="qualification">
						</div>
						<div class="field">
							<label>Industry</label>
							<select class="ui search selection dropdown" name="industry">
								<option class="default text">Choose Industry</option>
								<option value="Hospitality">Hospitality</option>
								<option value="Technician">Technician</option>
								<option value="Team Member">Team Member</option>
								<option value="Information Technology">Information Technology</option>
								<option value="Healthcare">Healthcare</option>
								<option value="Construction/Maintainance">Construction/Maintainance</option>
								<option value="Oil/Gas">Oil/Gas</option>
							</select>
						</div>
						<div class="field">
							<label>Position</label>
							<input type="text" name="position" required>
						</div>
					</div>
				</div>
				<div class="ui form">
					<div class="fields">
						&emsp;<div class="field">
							<label>Company</label>
							<input type="text" name="company">
						</div>
						<div class="field">
							<label>Location</label>
							<input type="text" name="location">
						</div>	
						<div class="two wide field">
							<label>Experience</label>
							<input type="text" name="experience">
						</div>
						<div class="two	 wide field">
							<label>Age</label>
							<input type="text" name="age">
						</div>
						
						<div class="field">
							<label>Contact Number</label>
							<input type="text" name="contnumber">
						</div>
						<div class="field">
							<label>WhatsApp Number</label>
							<input type="text" name="wanumber">
						</div>
					</div>
				</div>
				<div class="ui form">
					<div class="fields">
						&emsp;<div class="four wide field" width="50%">
							<label>E-mail ID</label>
							<input type="text" name="emailid">
						</div>
						<div class="field">
							<label>CV / Resume</label>
							<div class="ui action input">
								<input type="text" id="cvres_label">
								<label for="cvres" class="ui button btn-file">Upload</label>
								<input type="file" id="cvres" name="cvres" style="display:none;">
							</div>
						</div>
					</div>
				</div>
				<div class="ui form">
					<div class="ui fields">
						&emsp;<div class="eight wide field">
							<label>Remarks</label>
							<textarea rows="5" name="remarks" placeholder="Enter remarks here if any.." style="resize:none;"></textarea>
						</div>
					</div>
					<div align="center">
						<button type="submit" name="submit" class="ui blue button">Register</button>
						<button type="reset" class="ui reset button" >Reset</button>
					</div>
				</div>
			</form>
		</div>
		
		<div class="ui raised segment" style="padding-bottom:25px;">
			<table id="datatable" class="ui blue compact celled table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Registration No.</th>	
						<th class="no-sort">Name</th>
						<th class="no-sort">Position</th>
						<th class="no-sort">Industry</th>
						<th class="no-sort">Contact Number</th>
						<th class="no-sort">E-mail ID</th>							
					</tr>
				</thead>
				<tbody>';
				include 'includes/dbh.inc.php';
				$sql = "SELECT * FROM tbcandidate WHERE appstat='Active' ORDER BY dor DESC";
				$result = mysqli_query($con, $sql);
				if ($result->num_rows > 0)
				{
					while($row=$result->fetch_assoc())
					{
						echo '<tr>
							<td>'.$row["slno"].'</td>	
							<form action="includes/cand_det_view.inc.php">
									<td>
										<a href="includes/cand_det_view.inc.php?&cand_id='.$row["slno"].'" target="_blank">'.$row["flname"].'</a>
									</td>
								</form>
								<td>'.$row["pos"].'</td>
								<td>'.$row["ind"].'</td>
								<td>'.$row["contno"].'</td>
								<td>'.$row["eid"].'</td>
							</tr>';	
					}
				}
				else
				{
					echo '<tr>
						<td colspan="6"><center>No Data to Display</center></td>
					</tr>';
				}
			echo '</tbody>
			</table>
		</div>
		<div class="ui raised segment">
			<div id="tabcontent">
			<div class="ui pointing secondary menu">						
				<a class="item active" data-tab="sms">SMS</a>
				<a class="item" data-tab="email">E-Mail</a>
			</div>					
			<div class="ui active tab segment" data-tab="sms">
				<p>
					<div class="ui comments">
						<div class="comment">
							<div class="content">
								<form class="ui reply form" action="#">
									<div class="field">												
										<label>Message</label>
										<textarea style="resize: none;"></textarea>										
									</div>
									<input type="button" class="ui blue button" value="Send"></input>
									<input type="button" class="ui reset button" value="Clear"></input>
									<input type="button" class="ui teal button" value="Add to Drafts" style="float:right;"></input>
								</form>
							</div>
						</div>
					</div>
				</p>
			</div>
			<div class="ui tab segment" data-tab="email">
				<p>
					<div class="ui comments">
						<div class="comment">
							<div class="content">
								<div class="ui icon buttons">
									<button class="ui button"><i class="fa fa-align-left" aria-hidden="true"></i></button>
									<button class="ui button"><i class="fa fa-align-center" aria-hidden="true"></i></button>
									<button class="ui button"><i class="fa fa-align-right" aria-hidden="true"></i></button>
									<button class="ui button"><i class="fa fa-align-justify" aria-hidden="true"></i></button>
								</div>
								<div class="ui icon buttons">
									<button class="ui button"><i class="fa fa-bold" aria-hidden="true"></i></button>
									<button class="ui button"><i class="fa fa-underline" aria-hidden="true"></i></button>
									<button class="ui button"><i class="fa fa-italic" aria-hidden="true"></i></button>
								</div>
								<form class="ui reply form" action="#">
									<div class="field">
										<label>Subject</label>
										<input type="text" class="seven wide field" placeholder="">
										<label>Message</label>
										<textarea style="resize: none;"></textarea>										
									</div>
									<input type="button" class="ui blue button" value="Send"></input>
									<input type="button" class="ui reset button" value="Clear"></input>
									<input type="button" class="ui teal button" value="Add to Drafts" style="float:right;"></input>
								</form>
							</div>
						</div>
					</div>
				</p>
			</div>
		</div>
		<div class="ui segment">
			<div class="ui floating blue message">
				<p>Draft Messages</p>
			</div>
			<div class="ui cards">
				<div class="card">
					
					<div class="content">
						<div class="ui right floated circular icon grey button">
							
						</div>
						<div class="header">Message 1</div>
							<div class="description">
								Your message comes here.
							</div>
					</div>
					<div class="ui bottom attached button">
						Use This Message
					</div>
				</div>
				<div class="card">
					<div class="content">
						<div class="header">Message 2</div>
							<div class="description">
								Your message comes here.
							</div>
					</div>
					<div class="ui bottom attached button">
						Use This Message
					</div>
				</div>
				<div class="card">
					<div class="content">
						<div class="header">Message 3</div>
							<div class="description">
								Your message comes here.
							</div>
					</div>
					<div class="ui bottom attached button">
						Use This Message
					</div>
				</div>
			</div>
		</div>
		</div></br>
	</div>';
			}
		}
		else
		{
			header("Location: ./index.php");
			exit();
		}
	?>
</body>
<script type="text/javascript">
	
	$(document).ready(function()
	{
		$('#datatable').DataTable({
		"ordering": true,
		columnDefs: [{
		orderable: false,
		targets: "no-sort"
		}]
		});
	});

	$('.ui.dropdown').dropdown();

	$('.ui.sticky').sticky();

	$('#tabcontent .menu .item').tab({context: 'parent'});

	//Disable browser back button
	function preventBack(){window.history.forward();}
	setTimeout("preventBack()", 0);
	window.onunload=function(){null};
</script>
</html>