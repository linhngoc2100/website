<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--
	Nguyen, Linh    Account:  trst019
        CS545, Fall 2011
        Project #2 
-->

<head>
	<title>Session Example</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="expires" content="0" />        
	<meta http-equiv="Content-Style-Type" content="text/css" />
    
    <link rel="stylesheet" type="text/css" media="screen"
        href="student.css" />
      
</head>

<body>
<!-- authenticate before printing the secret report! -->
<h1>Search</h1>
<?php
    session_start();
    
    if($_SESSION['valid']) {    
        $page = file_get_contents("search.html");
        echo $page;
		exit;
        }
    else {
            $page = file_get_contents("err_login.html");
            echo $page;
            exit;
            }    
    ?>
<a href="logout.php">Logout Now</a>
</body>
</html>

