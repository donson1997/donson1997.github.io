<?php
    session_start();
?>
<html>
    <head>
        <div class="ui raised fixed menu">
            &emsp;<img src="./logo/logo.jpg" alt=""/>
        </div>    
        <link rel="stylesheet" type="text/css" href="./semantic_ui\semantic.min.css">
        <script type="text/javascript" src="./semantic_ui/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="./semantic_ui/semantic.min.js"></script>
        <title>Global Service Mangalore |Consultancy in Mangalore | Recruitment Agency in Mangalore | Top Recruitment consultancy Mangalore, Karnataka India</title>

        <script type = "text/javascript" >
			function preventBack(){window.history.forward();}
			setTimeout("preventBack()", 0);
			window.onunload=function(){null};
		</script>

    </head>
    <body>
        <?php
            if(isset($_SESSION['suid']))
            {
                $ses_type=$_SESSION['stype'];
                if($ses_type=="recruiter")
                {
                    header("Location: ./recruitment_home.php");
                    exit();
                }
                elseif($ses_type=="processor")
                {
                    header("Location: ./processing_home.php");
                    exit();
                }
                
                elseif($ses_type=="admin")
                {
                    if(isset($_SESSION['suid']))
                    {
                        echo '<div class="ui fixed menu">
            &emsp;<img src="./logo/logo.jpg" alt=""/>                   
            <div class="right menu">
                <div class="vertically fitted borderless item">
                    <form action="includes/logout.inc.php" method="POST">
                        <button class="ui primary button" type="submit" name="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>';
                    }
                    echo '
        <br/><br/><br/><br/><br/><br/>
        <h3>This page is under maintainance</h3>';
                }
            }
            else
            {
                header("Location: ./index.php");
                exit();
            }
        ?>
            </body>
</html>