<?php
header("Content-type:text/json;charset=utf8");
$id = $_GET["id"];
if(empty($id)){
    echo "[{\"result\":\"请输入要查询的内容...\"}]";
}
    else{
   //$con = new mysqli('qfaikfxncoag.mysql.sae.sina.com.cn', 'sdmszhz', 'sdmszhz1990', 'sdmszhz', '10484');
   $con = new mysqli('rmkenxos.2367.dnstoo.com', 'sdmszhz_f', 'zhz96088631', 'sdmszhz', '3306');
  if(! $con )
  {
    die('连接失败: ' . mysqli_error($con));
  }
  // 设置编码，防止中文乱码

  mysqli_query($con , "set names utf8");
  //$sql = 'SELECT * FROM tel WHERE name like "%张慧忠%"';
  $sql = "SELECT * FROM tel WHERE name like '%$id%'";
  mysqli_select_db( $con, 'sdmszhz' );
  $retval = mysqli_query( $con, $sql );
  if(! $retval )
  {
      die('无法读取数据: ' . mysqli_error($con));
  }
  //echo '<h2>菜鸟教程 mysqli_fetch_array 测试<h2>';
   
       
//echo '<table border="1"><tr><td> ID</td><td>姓名</td><td>手机</td><td>单位内线</td><td>单位外线</td><td>家庭电话</td><td>公司住址</td><td>大口部门岗位</td></tr>';
  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
        {
   $results[] = $row;

  }    
echo json_encode($results);   
 
  mysqli_close($con);
        }
?>
   