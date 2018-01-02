<?php
session_start();
?>

<html>
    <title>Consolidated Data</title>
    <head>
        <link rel="stylesheet" href="./FontAwesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./semantic_ui/semantic.min.css">
        <script type="text/javascript" src="./semantic_ui/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="./semantic_ui/semantic.min.js"></script>
    </head>
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
    <body>
        <div class="ui fixed menu">
            &emsp;<a href="#"><img src="./logo/logo.jpg" alt=""/></a>
        </div>
        <br/><br/><br/>
        <div class="ui raises segment">
        <div id="tabcontent">
                <div class="ui secondary pointing menu">
                    <a class="item active" data-tab="all" style="margin-left: 27%;">All Candidates</a>
                    <a class="item" data-tab="active">Active Candidates</a>
                    <a class="item" data-tab="departured">Departured Candidates</a>
                    <a class="item" data-tab="suspended">Suspended Candidates</a>
                </div>
                <div class="ui active tab" data-tab="all">

                </div>
                <div class="ui tab" data-tab="active">
                
                </div>
                <div class="ui tab" data-tab="departured">
                    
                </div>
                <div class="ui tab" data-tab="suspended">
                   
                </div>
            </div>
        </div>
    </body>
    <script>
        $('#tabcontent .menu .item').tab
        ({
            context: 'parent'
        });
    </script>
</html>