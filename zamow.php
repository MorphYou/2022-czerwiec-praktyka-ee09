<?php
 $id = $_GET['id'];
 $ilosc = $_GET['i'];

 $mysqli = new mysqli("localhost","root","","dzis");

 if ($mysqli -> connect_errno) {
 echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
 exit();
 }

 $sql = "UPDATE materialy SET ilosc = $ilosc WHERE id = $id";
 $result = $mysqli -> query($sql);
 $mysqli -> close();

 header("location:index.php");
 ?>