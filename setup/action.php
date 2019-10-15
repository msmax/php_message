<?php
header("Content-type: text/html; charset=utf-8"); 
$lockfile = "../config/config.php"; 
if (file_exists($lockfile)) {
header("Content-type: text/html; charset=utf-8");
	echo "<div style='width:500px;margin:0 auto; padding:30px; color:red;'>你已经安装过了！要重装请删除config目录下的config.php文件</div>";
    exit();
}
else   
{
$conn=mysql_connect(trim($_POST['localhost']),trim($_POST['rootname']),trim($_POST['rootpass'])) or die("数据库连接失败Error:".mysql_errno().":".mysql_error());
	
	mysql_set_charset('utf8');
	mysql_select_db(trim($_POST['mysqlname'])) or die("指定数据库打开失败");
	
	//echo $conn;
		if (!$conn)
		{
		die('数据库链接失败,请返回');
		}				
			$file_name ="dawangblog.sql";					  
			$get_sql_data = file_get_contents($file_name);				
			$explode = explode(";",$get_sql_data);
			$cnt = count($explode);
			for($i=0;$i<$cnt ;$i++){						
			$sql = $explode[$i];					
			//mysql_query('SET NAMES UTF8');
			@$result =mysql_query($sql);				
			
			}
			$txt="<?php\n";
	//$txt=$txt.'$mysqli';
	$txt=$txt.'define("localhost",'.'"'.trim($_POST['localhost']).'"'.');'."\r\n";
	$txt=$txt.'define("rootname",'.'"'.trim($_POST['rootname']).'"'.');'."\r\n";
	$txt=$txt.'define("rootpass",'.'"'.trim($_POST['rootpass']).'"'.');'."\r\n";
	$txt=$txt.'define("mysqlname",'.'"'.trim($_POST['mysqlname']).'"'.');'."\r\n";
	//$mysqli = new mysqli("localhost","msmax","123456");
	$txt=$txt."?>";
	$confpath ='../config/config.php';
	$webconfig = @fopen($confpath,w);
	$fwrite=fwrite($webconfig,$txt );	
	if($fwrite > 0){
			echo "<div style='width:500px;margin:0 auto; padding:30px; color:red;'>文件写入成功！</div>";			
			}
	else{
			echo "配置文件生成失败，请检查根目录是否可写！";
	}
			mysql_close($conn);	
			echo "<div style='width:500px;margin:0 auto; padding:30px; color:red;'>安装成功！<br/>你可以<a href='../admin/'>进入后台</a></div>";
}
		
?>
