<?php
include"connection/connect.php";
$id = isset($_GET['id']) ? $_GET['id'] : null;
$sql= "DELETE FROM cau_thu WHERE id=$id";
$query=mysqli_query($conn,$sql);
if ($query) {
   header('location: index.php');
   exit;
}
?>