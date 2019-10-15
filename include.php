<?php 
header("content-type:text/html;charset=utf-8");
error_reporting(E_ALL^E_NOTICE);
date_default_timezone_set("PRC");
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/function".PATH_SEPARATOR.ROOT."/config".PATH_SEPARATOR.get_include_path());
require_once 'class.fun.php';
require_once 'article.fun.php';
require_once 'config.php';
require_once 'web.fun.php';
require_once 'nav.fun.php';
require_once 'upload.fun.php';
require_once 'page.func.php';
require_once 'mysql.php';
connect();
