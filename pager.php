<?php 
header("content-type:text/html;charset=utf-8");
//连接数据库
$link = mysqli_connect('localhost','root','123','itcast');
// 设置字符集
mysqli_query($link, "set names utf8");
// 构建sql语句
$sql = "select * from student";
// 执行sql语句
$result = mysqli_query($link,$sql);
// 结果集中行的数目
$nums = mysqli_num_rows($result);
// 每页显示条数
$pagesize = 6;
// 总页数
$pages = ceil( $nums / $pagesize );
// 当前页
$page = isset($_GET['page']) ? $_GET['page'] : 1;
//开始行号
$startrow = ($page-1)*$pagesize;

// 构建sql语句
$sql .= " limit $startrow,$pagesize";
// 执行sql语句
$result = mysqli_query($link,$sql);

$arr = Array();
//循环从结果集中取数据
while($row=mysqli_fetch_assoc($result))
{
	$arr[] = $row;
}
//将总页数放入数组
$arr[]=$pages;
//将数组转为json字符串
$str = json_encode($arr);
// 将数据返回
echo $str;

 ?>