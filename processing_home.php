<?php
	session_start();
?>

<html>
	<head>
		<title>Global Service Mangalore |Consultancy in Mangalore | Recruitment Agency in Mangalore | Top Recruitment consultancy Mangalore, Karnataka India</title>
        <link rel="stylesheet" href="./mod_scroll.css">
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
        
        <script type = "text/javascript" >
            function preventBack()
            {
                window.history.forward();
            }
			setTimeout("preventBack()", 0);
			window.onunload=function(){null};
        </script>
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
                elseif($ses_type=="recruiter")
				{
					header("Location: ./recruitment_home.php");
					exit();
				}
				elseif($ses_type=="processor")
				{
                    if(isset($_SESSION['suid']))
                    {
                        echo '
        <div class="ui fixed menu">
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
        echo'                  
        <br/><br/><br/><br/><br/>
        <div class="ui container">
            <div class="ui raised segment">
                <div id="tabcontent">
                    <div class="ui secondary pointing menu">
                        <a class="item active" data-tab="Requirement">Project Requirement</a>
                        <a class="item" data-tab="Expenses">Expenses</a>
                        <a class="item" data-tab="Shortlisted">Shortlisted Candidates</a>
                        <a class="item" data-tab="Consolidated">Scheduled for Interview</a>
                        <a class="item" data-tab="Selection">Consolidated List</a>
                        <a class="item" data-tab="MedApp">Medical Approval</a>
                        <a class="item" data-tab="Departured">Departured Candidates</a>
                    </div>
                    <div class="ui active tab segment" data-tab="Requirement" style="margin-bottom : 20px; margin-top : 20px;">
                        <div class="ui compact menu">
                            <div class="ui simple pointing  dropdown link item">
                                <span class="text"><b>Select Project</b></span>
                                <div class="menu">
                                    <div class="item">
                                        <span class="text">Project 1</span>
                                        <div class="right menu">
                                            <div class="item">Project 1 Code 1</div>
                                            <div class="item">Project 1 Code 2</div>
                                            <div class="item">Project 1 Code 3</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <span class="text">Project 2</span>
                                        <div class="right menu">
                                            <div class="item">Project 2 Code 1</div>
                                            <div class="item">Project 2 Code 2</div>
                                            <div class="item">Project 2 Code 3</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <span class="text">Project 3</span>
                                        <div class="right menu">
                                            <div class="item">Project 3 Code 1</div>
                                            <div class="item">Project 3 Code 2</div>
                                            <div class="item">Project 3 Code 3</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <span class="text">Project 4</span>
                                        <div class="right menu">
                                            <div class="item">Project 4 Code 1</div>
                                            <div class="item">Project 4 Code 2</div>
                                            <div class="item">Project 4 Code 3</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="float:right;"><button class="ui blue button" id="showModal1">New Project</button></div>
                        <div class="ui large modal">                                    
                            <div class="ui header">Create New Project
                                <div class="ui grey right floated button" id="hideModal1">Cancel</div>								
                                <button class="ui teal right floated button" onclick="addNew1()">Add Row</button>
                            </div>
                            <div class="modscroll">
                                <form action="" method="post">									
                                    <div class="ui small image">
                                        <img id="prev" src="./logo/logo.jpg" style="padding-left:30px;"><br/>
                                    </div>                                                
                                    <button type="submit" class="ui blue right floated submit button" style="margin-right:30px;margin-top:10px;">Create Project</button>                                                
                                    <div style="padding-left:30px;">
                                        <div>
                                            <label for="file" class="ui positive button">Upload Logo</label>
                                            <input type="file" id="file" onchange="readURL(this);" style="display:none; padding-right:60px; ">
                                        </div>
                                    </div>
                                    <div class="ui form" id="textbox1" style="margin-left: 30px;">
                                        <div class="fields">
                                            <div class="field" style="margin-top:10px;">
                                                <label style="color:#000000;">Project Name:</label>
                                                <input type="text" name="project_name">
                                            </div>
                                            <div class="field" style="margin-top:10px;">
                                                <label style="color:#000000;">Project Code:</label>
                                                <input type="text" name="project_code">
                                            </div>
                                        </div>
                                        <div class="fields">
                                            <div class="field">
                                                <label style="color:#000000;">Sl. No.</label>
                                            </div>
                                            <div class="field">
                                                <label style="color:#000000;padding-left:15px;">Position</label>
                                            </div>
                                            <div class="field">
                                                <label style="color:#000000;padding-left:145px;">Quantity</label>
                                            </div>
                                            <div class="field">
                                                <label style="color:#000000;padding-left:70px;">Salary(SR)</label>
                                            </div>
                                            <div class="field">
                                                <label style="color:#000000;padding-left:130px;">Concept</label>
                                            </div>
                                            <div class="field">
                                                <label style="color:#000000;padding-left:150px;">Others</label>
                                            </div>
                                        </div>
                                        <div class="fields">
                                            <div class="one wide field">
                                                <input type="text" name="slno1" value="1" readonly>
                                            </div>
                                            <div class="field">
                                                <input type="text" name="position1">
                                            </div>
                                            <div class="two wide field">
                                                <input type="text" name="Quantity1">
                                            </div>
                                            <div class="field">
                                                <input type="text" name="salary1">
                                            </div>
                                            <div class="field">
                                                <input type="text" name="concept1">
                                            </div>
                                            <div class="field">
                                                <input type="text" name="others1">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>	
                            <div class="ui actions"></div>
                        </div>
                    </div>
                    <div class="ui tab segment" data-tab="Expenses" style="margin-bottom : 20px; margin-top : 20px;">
                    <button class="ui blue button" id="showModal2">Add Expenses</button>
                    <div class="ui longer modal">                                    
                        <div class="ui header" style="margin-bottom: 10px;">Expenses
                            <div class="ui grey right floated button" id="hideModal2">Cancel</div>								
                            <button class="ui teal right floated button" onclick="addNew2()">Add Row</button>
                        </div>
                        <form action="includes/exp.inc.php" method="POST">
                            <div class="modscroll">
                                <button type="submit" name="submit" class="ui blue button" style="margin-left:20px;margin-top: 17px;">Submit</button>
                                <div class="ui form" id="textbox2" style="margin-right: 20px;float: right">
                                    <div class="fields">
                                        <div class="field">
                                            <label style="color:#000000;width: 50px;">Sl. No.</label>
                                            <input type="text" name="slno1" value="1" readonly style="width: 50px;">
                                        </div>
                                        <div class="field">
                                            <label style="color:#000000;width: 100px;">Advertisement</label>
                                            <input type="text" name="ad1" style="width: 100px;">
                                        </div>
                                        <div class="field">
                                            <label style="color:#000000;width: 100px;">Interview Venue</label>
                                            <input type="text" name="IntVen1" style="width: 100px;">
                                        </div>
                                        <div class="field">
                                            <label style="color:#000000;width: 100px;">Transportation</label>
                                            <input type="text" name="Transport1" style="width: 100px;">
                                        </div>
                                        <div class="field">
                                            <label style="color:#000000;width: 100px;">Travel</label>
                                            <input type="text" name="Travel1" style="width: 100px;">
                                        </div>
                                        <div class="field">
                                            <label style="color:#000000;width: 100px;">Other Expenses</label>
                                            <input type="text" name="Others1" style="width: 100px;">
                                        </div>
                                        <div class="field">
                                            <label style="color:#000000;width: 100px;">Total</label>
                                             <input type="text" name="total1" style="width: 100px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="ui actions"></div>
                    </div>
                    </div>
                    <div class="ui tab segment" data-tab="Shortlisted" style="margin-bottom : 20px; margin-top : 20px;">
                        <p>Consolidated List is the list of candidates who have been scheduled for interview. This list contains the appointer\'s details.</p>
                    </div>
                    <div class="ui tab segment" data-tab="Consolidated" style="margin-bottom : 20px; margin-top : 20px;">
                        <p>The expenses required for the interview.</p>
                    </div>
                    <div class="ui tab segment" data-tab="Selection" style="margin-bottom : 20px; margin-top : 20px;">
                        <div id="final_list">
                            <div class="ui top attached tabular menu">
                                <a class="item active" data-tab="Selected">Selected</a>
                                <a class="item" data-tab="Attended">Attended</a>
                                <a class="item" data-tab="Not_Attended">Not Attended</a>
                            </div>                            
                            <div class="ui active tab" data-tab="Selected" style="margin-top : 30px;">
                                <p>list of candidates who have cleared the interview</p>
                            </div>
                            <div class="ui tab" data-tab="Attended" style="margin-top : 30px;">
                                <p>list of candidates who have attended the interview and not selected</p>
                            </div>
                            <div class="ui tab" data-tab="Not_Attended" style="margin-top : 30px;">
                                <p>list of candidates who have not attended the interview</p>
                            </div>
                        </div>
                    </div>
                    <div class="ui tab segment" data-tab="MedApp"v style="margin-bottom : 20px; margin-top : 20px;">
                        <p>Medical Approval list contains the details of candidates who have cleared medical test.</p>
                    </div>
                    <div class="ui tab segment" data-tab="Departured"  style="margin-bottom : 20px; margin-top : 20px;">
                        <p>This list contains the details of the candidates who have successfully completed all the proceedures.</p>
                    </div>
                </div>
            </div>
            <div class="ui raised segment" style="margin-bottom : 20px; margin-bottom:20px;">
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
                            echo '
                        <tr>
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
                echo '
                    </tbody>
                </table>
            </div>
        </div>
';
				}
			}
			else
			{
				header("Location: ./index.php");
				exit();
			}
		?>
	</body>
	<script>
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

	$('#tabcontent .menu .item').tab
	({
		context: 'parent'
    });
    
    $('#final_list .menu .item').tab
    ({
        context: 'parent'
    })

    $('.ui.large.modal').modal({bluring: true}).modal('attach events', '#showModal1', 'show');
    $('.ui.large.modal').modal({bluring: true}).modal('attach events', '#hideModal1', 'hide');

    $('.ui.longer.modal').modal({bluring: true}).modal('attach events', '#showModal2', 'show');
    $('.ui.longer.modal').modal({bluring: true}).modal('attach events', '#hideModal2', 'hide');

    var intTextBoxA = 1;
    function addNew1()
    {
        intTextBoxA++;
        var objNewDiv = document.createElement('div');
        objNewDiv.setAttribute('class', 'fields');
        objNewDiv.innerHTML = '<div class="one wide field"><input type="text" name="slno' + intTextBoxA + '" value="'+ intTextBoxA +'" readonly></div><div class="field"><input type="text" name="position' + intTextBoxA + '"></div><div class="two wide field"><input type="text" name="quantity' + intTextBoxA + '"></div><div class="field"><input type="text" name="salary' + intTextBoxA + '"></div><div class="field"><input type="text" name="concept' + intTextBoxA + '"></div><div class="field"><input type="text" name="others' + intTextBoxA + '"></div>';
        document.getElementById('textbox1').appendChild(objNewDiv);
    }

    var intTextBoxB = 1;
    function addNew2()
    {
        intTextBoxB++;
        var objNewDiv = document.createElement('div');
        objNewDiv.setAttribute('class', 'fields');
        objNewDiv.innerHTML = '<div class="field"><input type="text" name="slno' + intTextBoxB + '" value="'+ intTextBoxB +'" readonly style="width: 50px;"></div><div class="field"><input type="text" name="Ad1' + intTextBoxB + '" style="width: 100px;"></div><div class="field"><input type="text" name="IntVen' + intTextBoxB + '" style="width: 100px;"></div><div class="field"><input type="text" name="Transport' + intTextBoxB + '" style="width: 100px;"></div><div class="field"><input type="text" name="Travel' + intTextBoxB + '" style="width: 100px;"></div><div class="field"><input type="text" name="Others' + intTextBoxB + '" style="width: 100px;"></div><div class="field"><input type="text" name="Total' + intTextBoxB + '" style="width: 100px;"></div>';
        document.getElementById('textbox2').appendChild(objNewDiv);
    }

    function readURL(input)
    {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();	
            reader.onload = function (e)
            {
                $('#prev').attr('src', e.target.result);
            };	
            reader.readAsDataURL(input.files[0]);
        }
    }
	</script>
</html>
