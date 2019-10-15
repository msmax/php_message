<?php 
/**
 * 连接数据库
 * @return resource
 */

 
 
function connect(){
	$link=mysql_connect(localhost,rootname,rootpass) or die("数据库连接失败Error:".mysql_errno().":".mysql_error());
	mysql_select_db(mysqlname) or die("指定数据库打开失败");
	mysql_query("set names utf8");
	return $link;
}
 //字符串过滤函数
function inject_check($sql_str){
	$check=preg_match('/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|uotfile/',$sql_str);
	if($check){
		echo "非法参数!";
		exit();
	}else{
		return $sql_str;
	}

}
/**
 * 完成记录插入的操作
 * @param string $table
 * @param array $array
 * @return number
 */
function insert($table,$array){
	$keys=join(",",array_keys($array));
	$vals="'".join("','",array_values($array))."'";
	$sql="insert {$table}($keys) values({$vals})";
	mysql_query($sql);
	//echo $sql;
	return mysql_insert_id();
}
/**
 * 记录的更新操作
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */
function update($table,$array,$where=null){
	foreach($array as $key=>$val){		
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
		$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
		$result=mysql_query($sql);	
		//echo $sql;		
		//var_dump($result);
		//var_dump(mysql_affected_rows());exit;
		if($result){
			return mysql_affected_rows();
		}else{
			return false;
		}
}

/**
 *	删除记录
 * @param string $table
 * @param string $where
 * @return number
 */
function delete($table,$where=null){
	$where=$where==null?null:" where ".$where;
	$sql="delete from {$table} {$where}";
	mysql_query($sql);
	//echo $sql;
	return mysql_affected_rows();
}

/**
 *得到指定一条记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result,$result_type);
	return $row;
	
}


/**
 * 得到结果集中所有记录 ...
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchAll($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	while(@$row=mysql_fetch_array($result,$result_type)){
		$rows[]=$row;
	}
	return $rows;
}

/**
 * 得到结果集中的记录条数
 * @param unknown_type $sql
 * @return number
 */
function getResultNum($sql){
	$result=mysql_query($sql);
	return mysql_num_rows($result);
}

/**
 * 得到上一步插入记录的ID号
 * @return number
 */
function getInsertId(){
	return mysql_insert_id();
}

function alertMes($mes,$url){
	echo "<script>alert('{$mes}');</script>";
	echo "<script>window.location='{$url}';</script>";
}
