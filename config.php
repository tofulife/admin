<?php 
header("content-type:text/html; charset=utf-8");
$dsn="mysql:host=localhost;dbname=sxushare";
try{
	$pdo=new PDO($dsn,"root","root");
	$pdo->exec("set character set utf8");
	$pdo->query("set names utf8");
	if($pdo){
		// echo "连接数据库成功";
	}
}catch(PDOException $e) {
		echo $e->getMessage()."<br>";
}

 ?>