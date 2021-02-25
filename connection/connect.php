<?php
    $server="localhost";
    $user="root";
    $password="";
    $dbname="productcategory";

    $con=mysqli_connect($server,$user,$password,$dbname);
    if(mysqli_connect_errno()){
        echo "Faied to connect MySQL:" . mysqli_connect_error();
        exit();
    }

?>