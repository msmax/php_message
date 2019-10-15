<?php
//if(isset($_SESSION['username'])){
//	$_SESSION("username","",time()-1);
//}
session_start();
session_destroy();
header("location:../index.php");
?>