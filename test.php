<?php
require(dirname(__FILE__).'/include/conn.php');
?>

    <table width="92%" border="1">
      <tr align="center" bgcolor="#DEEFF7">
    <td>编号</td><td>图书名称</td><td>发行日期</td><td>单价</td><td width="100">内容介绍</td>
    <td>作者</td><td>出版社</td></tr>
    <?php
    $sql=mssql_query("select * from product"); 
    $info=mssql_fetch_array($sql); 
    if($info==False){
            echo "对不起，您检索的图书信息不存在!";
    }
    else{        
    do{ 
    ?>
            <tr>
            <td> <?php echo $info[code];?> </td>
            <td width="180">  <?php echo $info[name];?> </td>
            <td> <?php echo $info[issueDate];?> </td>
            <td> <?php echo $info[price];?></td>
            <td width="260"> <?php echo $info[Synopsis];?></td>
            <td> <?php echo $info[Maker];?></td>
            <td> <?php echo $info[Pulisher];?></td>
            </tr>
     <?php
      } 
    while($info=mssql_fetch_array($sql));
    mssql_close();  //关闭数据库连接 
    }

    ?>
</table>
