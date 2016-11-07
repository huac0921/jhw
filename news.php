<?php
require(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 4 : intval($cid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(1,$cid); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript" src="templates/default/js/zhuoDiv.js"></script>
</head>
<body>
<!-- header-->
<?php require('headero.php'); ?>
<!-- /header-->

<!-- notice-->

<div class="header_search">
<div class="block" style=" position:relative">

    
    

    
    

</div>
<!-- /notice-->
<!-- mainbody-->

<div class="blank"></div> 
<div class="block clearfix">
<div class="ur_here2" style="border:none; padding:0; height:18px; line-height:18px;"><span class="fr">您当前所在位置：<?php echo GetPosStr($cid); ?></span></div>
<div class="blank"></div>  

<?php require('lefter.php'); ?>



	<div class="AreaR2">    
	<div class="box">
   <div class="box_1">
    <h3 class="h3_3" style=""><span><?php echo GetCatName($cid); ?></span></h3>
    <div class="boxCenterList" style="  ">
          
      <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#dddddd">
 
   
            <tbody>
			<?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",20);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
					else $gourl2 = 'news-'.$row['classid'].'-1.html';
				?>
			<tr>
        <td bgcolor="#ffffff"><a href="<?php echo $gourl ?>" title="<?php echo $row['title']?>"><?php echo $row['title']?></a></td>
          <td bgcolor="#ffffff"> </td>
          <td bgcolor="#ffffff" align="center"><?php echo GetDateTime($row['posttime']) ?></td>
        </tr>
		<?php
				}
				?>
           
          </tbody>
		  
		  </table>
    </div>
   </div>
  </div>
  <div class="blank5"></div>
  
<form name="selectPageForm" action="#" method="get">
 <div id="pager" class="pagebar">
 
       <?php echo $dopage->GetList(); ?>
 
    
  
    </div>
</form>
<script type="Text/Javascript" language="JavaScript">
<!--
function selectPage(sel)
{
  sel.form.submit();
}
//-->
</script>
  </div>  
  
</div>
<div class="blank"></div>
	
	
	
	

	
	<div class="cl"></div>

<!-- /mainbody-->
<!-- footer-->
<?php require('footer.php'); ?>
<!-- /footer-->
</body>
</html>