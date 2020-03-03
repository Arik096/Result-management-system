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
        <link rel="stylesheet" href="css/all_student.css">
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
            <div>
                 <form>
                    <table cellpadding="10">
                        <tr>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Level</th>
							<th>Term</th>
                            <th>Department</th>
                            <th>Phone</th>
							<th>CGPA</th>

                        </tr>
                        <?php
                            $query="select * from tbl_student_l3t1";
                            
                            $result=  mysqli_query($connection, $query);
                           
                           
                            
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <tr>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['level']?></td>
                                <td><?php echo $row['term']?></td>
                                <td><?php echo $row['dept']?></td>
								<td><?php echo $row['phone']?></td>
								<td><?php echo $row['cgpa']?></td>
                               </tr>
                        <?php
                            }
                        ?>

                    </table>
                </form>
            </div>
			<a href="admin_logout.php">Logout</a>
        </div>
    </body>
</html>

