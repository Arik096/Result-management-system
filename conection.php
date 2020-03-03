<?php
    $hostname='localhost';
    $username='root';
    $password='';
    $dbname='db';
    $connection=mysqli_connect($hostname, $username, $password);
    if($connection){
        //echo 'server connected';
        $dbselect=mysqli_select_db($connection,$dbname);
        if($dbselect){
           //echo "database connected";
        }
        else{
            die("database not connected".mysqli_error($dbselect));
        }
    }
    else{
        die("server not connected".mysqli_error($connection));
    }
?>