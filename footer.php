
<div class="blank"></div>
<div class="footer_box">
<div class="block">
<div class="box">
<div class="helpTitBg  ">
<dl class="dl1">
  <dt><span></span><a target="_blank" href="news.php?cid=61" title="购物指南">购物指南</a></dt>
  <div style=" clear:both"></div>
				<?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=61 OR parentstr LIKE '%,61,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",3);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
					else $gourl2 = 'news-'.$row['classid'].'-1.html';
				?>
					<dd><a target="_blank" href="<?php echo $gourl ?>" title="<?php echo $row['title']?>"><?php echo $row['title']?></a></dd>

				<?php
				}
				?>
  </dl>
<dl class="dl2">
  <dt><span></span><a target="_blank" href="news.php?cid=62" title="支付方式">支付方式</a></dt>
  <div style=" clear:both"></div>
  <dd>
   <?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=62 OR parentstr LIKE '%,62,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",3);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
					else $gourl2 = 'news-'.$row['classid'].'-1.html';
				?>
					<dd><a target="_blank" href="<?php echo $gourl ?>" title="<?php echo $row['title']?>"><?php echo $row['title']?></a></dd>

				<?php
				}
				?>
    </dd>

  </dl>
<dl class="dl3">
  <dt><span></span><a target="_blank" href="news.php?cid=63" title="仓储物流">仓储物流</a></dt>
  <div style=" clear:both"></div>
    <dd><?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=63 OR parentstr LIKE '%,63,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",3);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
					else $gourl2 = 'news-'.$row['classid'].'-1.html';
				?>
					<dd><a target="_blank" href="<?php echo $gourl ?>" title="<?php echo $row['title']?>"><?php echo $row['title']?></a></dd>

				<?php
				}
				?>
    </dd>


  </dl>

<dl class="dl4">
 <dt><span></span><a target="_blank" href="news.php?cid=64" title="售后服务">售后服务</a></dt>

  <div style=" clear:both"></div>
    <dd><?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=64 OR parentstr LIKE '%,64,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",3);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
					else $gourl2 = 'news-'.$row['classid'].'-1.html';
				?>
					<dd><a target="_blank" href="<?php echo $gourl ?>" title="<?php echo $row['title']?>"><?php echo $row['title']?></a></dd>

				<?php
				}
				?>
    </dd>

  </dl>
<a rel="nofollow" href=""  title=""><img alt="<?php echo $cfg_webname ?>" src="templates/default/images/imgdata/footer_img.gif"></a>

</div>
</div>
</div>


<!-- weblink-->
<div class="block">
<div class="links">
   <div class="f_l links_border">
<div class="weblink">
<strong style="font-size:16px;color:#a0a0a0" ><a>友情链接：</a></strong>
	<?php
	$dosql->Execute("SELECT * FROM `#@__weblink` WHERE classid=1 AND checkinfo=true ORDER BY orderid,id DESC");
	while($row = $dosql->GetArray())
	{
	?>
	<a href="<?php echo $row['linkurl']; ?>" target="_blank"><?php echo $row['webname']; ?></a>
	<?php
	}
	?>
</div>
</div>
</div>
<div id="bottomNav" class="box"> 
              <a target="_blank" href="contact.php">联系我们</a>
        
              <a target="_blank" href="about.php">公司简介</a>
        
              <a target="_blank" href="news.php?cid=31">支付方式</a>
        
              <a target="_blank" href="about.php?cid=26">法律条款</a>
        
         
</div>
</div>


<!-- /weblink-->
<!-- footer-->
<div class="footer"><?php echo $cfg_copyright ?><br /><?php echo $cfg_webname ?>保留所有权力<br /></div>
<!-- /footer-->
<?php

echo GetQQ();


?>