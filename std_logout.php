<?php
	session_start();
	session_destroy();
	header('location: student_login.php');
	include('connection.php');
?>