<?php
session_start();
 if($_SESSION['username']==null){
	echo '<div class="alert alert-danger" role="alert">你还没有登录，暂时不能访问！<a href="/admin/login.php">马上登录</a>!</div>';
	exit;
	 }
?>