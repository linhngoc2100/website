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
	<title>SDSU Job Connection</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="expires" content="0" />        
	<meta http-equiv="Content-Style-Type" content="text/css" />   
    
    <link rel="stylesheet" type="text/css" media="screen"
        href="student.css" />
<script type="text/javascript">

  {
  window.history.go(3)
  }
</script>      
</head>

<body>
    <div>
		<h1 class="heading">SDSU JOB CONNECTION</h1>
		
			
        
        <?php
        $username = "cs545";
        $password = "sp2011";
        $salt = "45Gxkj9583lPMdxoekfg";
        $encryptedPass= crypt($password, $salt);
        
        $entered_user = trim($_POST['username']);
        $enteredPass = trim($_POST['password']);
        
        $enteredPass = crypt($enteredPass, $salt);
		
        
        if(($username == $entered_user) && ($encrypted_password == $entered_password)) {
            echo "<h2>Welcome ".$username.", You are now logged in.</h2>\n";
	   
            }
        else {
            $page = file_get_contents("err_login.html");
            echo $page;
            exit;
            }
            
        session_start();
        $_SESSION['valid'] = 1;
        $_SESSION['user'] = $username;
	
	 
		echo "<a href='/~trst019/proj3/proj3.html'>&lt;-- Home</a>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<a href='/~trst019/proj3/Report.php'> --&gt; Begin to search</a>"
        ?>            
        
              


    </div>    
</body>
</html>

