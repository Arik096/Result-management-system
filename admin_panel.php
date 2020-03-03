<?php
	ob_start();
	session_start();
	if($_SESSION['name']!="arik"){
		header('location: admin_login.php');
	}
	include('conection.php');
?>
<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="">
    </head>
    <body>
       <div>
			<h1>Welcome to Admin Panel</h1>
			
				<div>
					<a href="register_new_std.php"><input type="submit" name="submit1" value="Register A New Student"></a>
					<a href="result_add.php"><input type="submit" name="submit2" value="Result Calculation"></a>
					<a href="admin_chng_pass.php"><input type="submit" name="submit3" value="Change Password"></a>
					<a href="see_all.php"><input type="submit" name="submit4" value="All student"></a>
				</div>
				<div>
					
				</div>
				<a href="admin_logout.php">Logout</a>
			
	   </div>
    </body>
</html>
