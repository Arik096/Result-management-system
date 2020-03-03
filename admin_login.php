<?php
	 include('conection.php');
	 if(isset($_POST['submit'])){
        try{
            if(empty($_POST['admin_username'])){
                throw new Exception("User name field cannot be empty");
            }
            if(empty($_POST['admin_password'])){
                throw new Exception("Password field cannot be empty");
            }
            
            $result=  mysqli_query($connection,"select * from tbl_admin where user_name='$_POST[admin_username]' and password='$_POST[admin_password]'" );
            $num= mysqli_num_rows($result);
            if($num>0)
            {
                session_start();
				$row=mysqli_fetch_assoc($result);
                $_SESSION['name']="arik";
                header('location: admin_panel.php');
				$_SESSION['id']=$row['id'];
				$_SESSION['password']=$row['password'];
				
            }
            else{
                throw new Exception("Incorrect username or password");
            }
        }
        catch(Exception $e){
            $error_messege=$e->getMessage();
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
            <div class="header">
                <div class="logo">
                    <img src="img/logo.gif">
                </div>
                <div class="name">
                    <h1>Bangladesh Army International University of Science & Technology</h1>
                    <p>Comilla Cantonment, Comilla.</p>
                    
                </div>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="student_login.php">Student Login</a></li>
                    <li><a href="admin_login.php">Admin Panel</a></li>
                </ul>
            </div>
            <div class="std">    
                <h1>Admin login</h1>
            </div>
            <hr>
            <div class="loginBox">
                <?php
                   if(isset($error_messege)){
                       echo $error_messege;
                   }
                ?>
                
                <br/>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Enter Username: </td>
                            <td><input type="text" name="admin_username"></td>
                        </tr>
                        <tr>
                            <td>Enter Password: </td>
                            <td><input type="password" name="admin_password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Login"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>