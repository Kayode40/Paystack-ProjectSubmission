<?php
if(isset($_POST['login'])){
	//Start session
	session_start();

	//database connectivity
    require('config.php');
	
    //Assing Login Values
	$login = ($_POST['username']);
	$pass = ($_POST['password']);
    $password = md5($pass);
	
	
	//Create query
	$qry="SELECT * FROM user WHERE username = '$login' and password = '$password'";
	$result=mysqli_query($conn, $qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_USER_ID'] = $member['username'];
			session_write_close();
			header("location: home.php");
			exit();
		}else {
			//Login failed
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
}
?>
<html>
<head>
<title>
IBRAHIM BAKERY
</title>
    <link rel="shortcut icon" href="main/images/pos.jpg">

  <link href="main/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="main/css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="main/css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="main/css/bootstrap-responsive.css" rel="stylesheet">

<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container-fluid">
      <div class="row-fluid">
		<div class="span4">
		</div>
	
</div>
<div id="login">
<form method="post">

			<font style=" font:bold 30px 'Aleo'; text-shadow:1px 1px 10px #000; color:#fff;"><center>IBRAHIM BAKERY</center></font>
		
	
	
<div class="input-prepend">
		<span style="height:30px; width:10px;" class="add-on"></span><input style="height:40px; width:300px" type="text" name="username" Placeholder="Username" required/><br>
</div>
<div class="input-prepend">
	<span style="height:30px; width:10px;" class="add-on"></span><input type="password" style="height:40px; width:300px" name="password" Placeholder="Password" required/><br>
		</div>
		<div class="qwe">
		 <button class="btn btn-large btn-primary " type="submit"  name="login" style="margin-top: 3px;">Login</button>
		 <center>
	<a href="index.php" class="btn btn-primary " style="margin-top: 6px;">Back</a>
	<br\>
	<br\>
	</center>
</div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>