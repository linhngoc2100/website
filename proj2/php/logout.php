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
<div>
        <h1 class="heading">SDSU JOB CONNECTION</h1>
		
		<div id="top-navigation">
				<a href="proj2.html">Home</a>
		</div>	

<?php
    session_start();
    
    if(isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-1000,'/');
        session_destroy();        
        }
    ?>
    
    <h2>You have now successfully logged out.</h2>
        
<a href="login.html">Click HERE to log back in</a>
</div>
</body>
</html>

