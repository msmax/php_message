<?php require_once 'include.php'; 
$sql="select * from web_config";
$web_config=fetchOne($sql);
print_r($web_config);
//foreach($web_configs as $web_config):
?>