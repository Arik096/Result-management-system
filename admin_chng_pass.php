<?php
	ob_start();
	session_start();
	if($_SESSION['name']!="arik"){
		header('location: admin_login.php');
	}
	include('conection.php');
	
	if(isset($_POST['submit'])){
		try{
			
			if(empty($_POST['old_pass'])){
				throw new Exception("OLD PASSWORD FIELD CANNOT BE EMPTY");
			}
			else if(empty($_POST['new_pass'])){
				
                throw new Exception("NEW PASSWORD FIELD CANNOT BE EMPTY");
            }
            else if(empty($_POST['c_new_pass'])){
                throw new Exception("NEW PASSWORD FIELD CANNOT BE EMPTY");
            }
			if($_POST['old_pass']!=$_SESSION['password']){
				throw new Exception("OLD PASSWORD DOES NOT MATCH");
			}
			else if($_POST['new_pass']!=$_POST['c_new_pass']){
				throw new Exception("NEW and Confirm password does not match");
			}
			$result=mysqli_query($connection,"update tbl_admin set password='$_POST[c_new_pass]' where id='$_SESSION[id]'");
			if($result){
				$msg="Password succesfully Updated";
				
			}
			else{
				die('Query problem'.mysqli_error($connection));
			}
			
		}
		catch(Exception $e){
			$error=$e->getMessage();
		}
	}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
		
		<div>
            <form action="" method="post">
			<h1>Password Change</h1>
			<?php
				if(isset($error)){
					echo $error;
				}
				if(isset($msg)){
					echo $msg;
				}
			?>
				<div>
					<table>
						
						<tr>
							<td>Enter Old Password</td>
							<td><input type="password" name="old_pass"></td>
						</tr>
						<tr>
							<td>New Password</td>
							<td><input type="password" name="new_pass"></td>
						</tr>
						<tr>
							<td>Confirm New Password</td>
							<td><input type="password" name="c_new_pass"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Update"></td>
						</tr>
					</table>
				</div>
				
			</form>
		</div>
			<div><a href="admin_panel.php">Back to previous page</a></div>
			<a href="admin_logout.php">Logout</a>
        </div>
    </body>
</html>
