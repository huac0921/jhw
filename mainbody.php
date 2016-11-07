<div class="block clearfix" style="overflow:hidden">

<div class="tit3">
<span>
<a href="goods.php?cid=1" target="_blank">1F 白酒馆</a>
</span>


<a href="goods.php" class="more" target="_blank">更多产品</a>



</div>

<div class="blank"></div>

 <div class="cat_box">
           <?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=1 OR parentstr LIKE '%,0,%') AND `typeid`=10 AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=1 OR parentstr LIKE '%,0,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				$dopage->GetPage($sql,5);
				while($row = $dosql->GetArray())
				{
					if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
				<div class="goodsItem_kuang" > 
					<div class="goodsItem" onmouseover="this.className=&#39;goodsItem goodsItem_on&#39;" onmouseout="this.className=&#39;goodsItem&#39;">
		<div class="fj">
		<a href="<?php echo $gourl; ?>" target="_blank" class="fj_a1"><span class="biao pngfix"></span><span>详情介绍</span></a>
			
		</div>
		<a href="<?php echo $gourl; ?>" target="_blank"><img data-original="<?php echo $row['picurl']?>" src="<?php echo $row['picurl']?>" alt="<?php echo $row['title']?> " class="goodsimg" style="display: inline;"></a><br>
		<p><a href="<?php echo $gourl; ?>" target="_blank" title="<?php echo $row['title']?> "><?php echo $row['title']?><span></span></a></p>
		<p class="lujin"><strong><a class="lj1" href="goods.php?cid=1" target="_blank" title="酒水 ">酒水类</a></strong></p>
		<div class="clearfix">
			<font class="f1">  
						￥<strong style="font-size:16px;color:red;">
						<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?> 
						</strong>						
						</font>
			<a target="_blank" href="<?php echo $gourl; ?>" class="pinlun">浏览(<?php echo $row['hits']; ?>)</a>
		</div>
		</div>
		</div>
				<?php 
				} 
				?>
      </div>
	  
<div class="blank"></div>



<div class="tit3">
<span>
<a href="goods.php?cid=14" target="_blank">2F 饮料类</a> 
</span>
<a href="goods.php?cid=14" target="_blank" class="more">更多</a>
</div>
<div class="blank"></div>
 <div class="cat_box">
             <?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=6 OR parentstr LIKE '%,6,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=6 OR parentstr LIKE '%,6,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				$dopage->GetPage($sql,5);
				while($row = $dosql->GetArray())
				{
					if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
				<div class="goodsItem_kuang" > 
					<div class="goodsItem" onmouseover="this.className=&#39;goodsItem goodsItem_on&#39;" onmouseout="this.className=&#39;goodsItem&#39;">
		<div class="fj">
		<a href="<?php echo $gourl; ?>" target="_blank" class="fj_a1"><span class="biao pngfix"></span><span>详情介绍</span></a>
			
		</div>
		<a href="<?php echo $gourl; ?>" target="_blank"><img data-original="<?php echo $row['picurl']?>" src="<?php echo $row['picurl']?>" alt="<?php echo $row['title']?> " class="goodsimg" style="display: inline;"></a><br>
		<p><a href="<?php echo $gourl; ?>" target="_blank" title="<?php echo $row['title']?> "><?php echo $row['title']?><span></span></a></p>
		<p class="lujin"><strong><a class="lj1" href="goods.php?cid=14" target="_blank" title="饮料券">饮料类</a></strong></p>
		<div class="clearfix">
			<font class="f1">  
						￥<strong style="font-size:16px;color:red;">
						<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?> 
						</strong>					</font>
			<a target="_blank" href="<?php echo $gourl; ?>" class="pinlun">浏览(<?php echo $row['hits']; ?>)</a>
		</div>
		</div>
		</div>
				<?php 
				} 
				?>
      </div>
<div class="blank"></div>
<div class="tit3">
<span>
<a href="goods.php?cid=15" target="_blank">3F  调味品类</a> 
</span>
<a href="goods.php?cid=15" target="_blank" class="more">更多</a>
</div>
<div class="blank"></div>
 <div class="cat_box">
            <?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=16 OR parentstr LIKE '%,16,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=16 OR parentstr LIKE '%,16,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				$dopage->GetPage($sql,5);
				while($row = $dosql->GetArray())
				{
					if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
				<div class="goodsItem_kuang" > 
					<div class="goodsItem" onmouseover="this.className=&#39;goodsItem goodsItem_on&#39;" onmouseout="this.className=&#39;goodsItem&#39;">
		<div class="fj">
		<a href="<?php echo $gourl; ?>" target="_blank" class="fj_a1"><span class="biao pngfix"></span><span>详情介绍</span></a>
			
		</div>
		<a href="<?php echo $gourl; ?>" target="_blank"><img data-original="<?php echo $row['picurl']?>" src="<?php echo $row['picurl']?>" alt="<?php echo $row['title']?> " class="goodsimg" style="display: inline;"></a><br>
		<p><a href="<?php echo $gourl; ?>" target="_blank" title="<?php echo $row['title']?> "><?php echo $row['title']?><span></span></a></p>
		<p class="lujin"><strong><a class="lj1" href="goods.php?cid=16" target="_blank" title="第三方商品 ">第三方商品</a></strong><!--  - <a href="goods.php?cid=14&tid=8" target="_blank" title="净水机 ">净水机</a>--></p>
		<div class="clearfix">
			<font class="f1">  
						￥<strong style="font-size:14px;color:red;">
						<!--<?php echo $row['marketprice']; ?>-->
						<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?> 
						</strong>					</font>
			<a target="_blank" href="<?php echo $gourl; ?>" class="pinlun">浏览(<?php echo $row['hits']; ?>)</a>
		</div>
		</div>
		</div>
				<?php 
				} 
				?>
      </div>
<div class="blank"></div>

<div class="tit3">
<span>
<a href="goods.php?cid=17" target="_blank">4F 米面粮油类</a> 
</span>
<a href="goods.php?cid=17" target="_blank" class="more">更多</a>
</div>
<div class="blank"></div>
 <div class="cat_box">
            <?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=23 OR parentstr LIKE '%,23,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=23 OR parentstr LIKE '%,23,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				$dopage->GetPage($sql,5);
				while($row = $dosql->GetArray())
				{
					if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
				<div class="goodsItem_kuang" > 
					<div class="goodsItem" onmouseover="this.className=&#39;goodsItem goodsItem_on&#39;" onmouseout="this.className=&#39;goodsItem&#39;">
		<div class="fj">
		<a href="<?php echo $gourl; ?>" target="_blank" class="fj_a1"><span class="biao pngfix"></span><span>详情介绍</span></a>
			
		</div>
		<a href="<?php echo $gourl; ?>" target="_blank"><img data-original="<?php echo $row['picurl']?>" src="<?php echo $row['picurl']?>" alt="<?php echo $row['title']?> " class="goodsimg" style="display: inline;"></a><br>
		<p><a href="<?php echo $gourl; ?>" target="_blank" title="<?php echo $row['title']?> "><?php echo $row['title']?><span></span></a></p>
		<p class="lujin"><strong><a class="lj1" href="goods.php?cid=17" target="_blank" title="空气净化系列 ">空气净化系列</a></strong><!--  - <a href="goods.php?cid=14&tid=8" target="_blank" title="净水机 ">净水机</a>--></p>
		<div class="clearfix">
			<font class="f1">  
						￥<strong style="font-size:16px;color:red;">
						
					<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?> 
						</strong>					</font>
			<a target="_blank" href="<?php echo $gourl; ?>" class="pinlun">浏览(<?php echo $row['hits']; ?>)</a>
		</div>
		</div>
		</div>
				<?php 
				} 
				?>
      </div>
<div class="blank"></div>

 
 

<div class="tit3">
<span>
<a href="goods.php?cid=18" target="_blank">5F 厨具类</a> 
</span>
<a href="goods.php?cid=18" target="_blank" class="more">更多</a>
</div>
<div class="blank"></div>
 <div class="cat_box">
            <?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=18 OR parentstr LIKE '%,18,%') AND `typeid`=20 AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=18 OR parentstr LIKE '%,18,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				$dopage->GetPage($sql,5);
				while($row = $dosql->GetArray())
				{
					if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
				<div class="goodsItem_kuang" > 
					<div class="goodsItem" onmouseover="this.className=&#39;goodsItem goodsItem_on&#39;" onmouseout="this.className=&#39;goodsItem&#39;">
		<div class="fj">
		<a href="<?php echo $gourl; ?>" target="_blank" class="fj_a1"><span class="biao pngfix"></span><span>详情介绍</span></a>
			
		</div>
		<a href="<?php echo $gourl; ?>" target="_blank"><img data-original="<?php echo $row['picurl']?>" src="<?php echo $row['picurl']?>" alt="<?php echo $row['title']?> " class="goodsimg" style="display: inline;"></a><br>
		<p><a href="<?php echo $gourl; ?>" target="_blank" title="<?php echo $row['title']?> "><?php echo $row['title']?><span></span></a></p>
		<p class="lujin"><strong><a class="lj1" href="goods.php?cid=14" target="_blank" title="饮水机 ">饮水机</a></strong>  - <a href="goods.php?cid=14&tid=8" target="_blank" title="净水机 ">净水机</a></p>
		<div class="clearfix">
			<font class="f1">  
						￥<strong style="font-size:16px;color:red;"><?php echo $row['marketprice']; ?>
						<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?> 
						</strong>						</font>
			<a target="_blank" href="<?php echo $gourl; ?>" class="pinlun">浏览(<?php echo $row['hits']; ?>)</a>
		</div>
		</div>
		</div>
				<?php 
				} 
				?>
      </div>
<div class="blank"></div>


<div class="tit3">
<span>
<a href="goods.php?cid=19" target="_blank">6F 干货类</a> 
</span>
<a href="goods.php?cid=19" target="_blank" class="more">更多</a>
</div>
<div class="blank"></div>
 <div class="cat_box">
            <?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=28 OR parentstr LIKE '%,19,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE (classid=28 OR parentstr LIKE '%,19,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
				$dopage->GetPage($sql,5);
				while($row = $dosql->GetArray())
				{
					if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
				<div class="goodsItem_kuang" > 
					<div class="goodsItem" onmouseover="this.className=&#39;goodsItem goodsItem_on&#39;" onmouseout="this.className=&#39;goodsItem&#39;">
		<div class="fj">
		<a href="<?php echo $gourl; ?>" target="_blank" class="fj_a1"><span class="biao pngfix"></span><span>详情介绍</span></a>
			
		</div>
		<a href="<?php echo $gourl; ?>" target="_blank"><img data-original="<?php echo $row['picurl']?>" src="<?php echo $row['picurl']?>" alt="<?php echo $row['title']?> " class="goodsimg" style="display: inline;"></a><br>
		<p><a href="<?php echo $gourl; ?>" target="_blank" title="<?php echo $row['title']?> "><?php echo $row['title']?><span></span></a></p>
		<p class="lujin"><strong><a class="lj1" href="goods.php?cid=14" target="_blank" title="饮水机 ">饮水机</a></strong>  - <a href="goods.php?cid=14&tid=8" target="_blank" title="净水机 ">净水机</a></p>
		<div class="clearfix">
			<font class="f1">  
						￥<strong style="font-size:16px;color:red;"><?php echo $row['marketprice']; ?>
						<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?> 
						</strong>						</font>
			<a target="_blank" href="<?php echo $gourl; ?>" class="pinlun">浏览(<?php echo $row['hits']; ?>)</a>
		</div>
		</div>
		</div>
				<?php 
				} 
				?>
      </div>
<div class="blank"></div>



 
 <div class="bottom_txt clearfix">
<div class="in1">   
<h3><span>热门留言</span><a href="message.php">更多</a></h3>
<div class="comm_in  "> 
<div class="shell">
  <div id="div1"> 
  
  
  <?php
			$dopage->GetPage("SELECT * FROM `#@__message` WHERE checkinfo=true ORDER BY orderid",10);
			$i = $dosql->GetTotalRow();
			while($row = $dosql->GetArray())
			{
			?>  
  
 <a class="comm_list" style="text-decoration:none" href="message.php" title="留言模板" target="_blank"> 
<strong style="position:relative; left:20px; top:20px;text-align:center; font-size:25px;" ><?php echo $i; ?># </strong>
<ul>
 <p><?php echo $row['nickname']; ?><i style="float:right;margin-right:10px;"><?php echo GetDateTime($row['posttime']); ?></i></p> 
 <?php echo $row['content']; ?>
 <?php
				if($row['recont'] != '')
				{
				?>
				<div class="message_replay"><strong>回复：</strong><?php echo $row['recont']; ?></div>
				<?php
				}
				?></ul>
 </a>
 <?php
				$i--;
			}
			
			?>   
  </div>
</div>
<script language="javascript">
var box=document.getElementById("div1"),can=true;
box.innerHTML+=box.innerHTML;
box.onmouseover=function(){can=false};
box.onmouseout=function(){can=true};
new function (){
 var stop=box.scrollTop%6==0&&!can;
 if(!stop)box.scrollTop==parseInt(box.scrollHeight/2)?box.scrollTop=0:box.scrollTop++;
 setTimeout(arguments.callee,box.scrollTop%72?6:2500);
};
</script>
 


</div>
 
 
 
 
 
 
 
 
  </div>
  
  
  
  
<div class="in1">
 
 <div class="box_1 art">
  <h3>
  <span><a target="_blank" href="news.php">知识与教程</a></span>
  <a target="_blank" href="news.php">更多</a>
  </h3>
  <div class="boxCenterList RelaArticle">
				<?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=4 OR parentstr LIKE '%,4,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",6);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
					else $gourl2 = 'news-'.$row['classid'].'-1.html';
				?>
					<a target="_blank" href="<?php echo $gourl ?>" title="<?php echo $row['title']?>"><?php echo $row['title']?></a>  
				<?php
				}
				?>
    </div>
 </div>
 
<div class="blank5"></div>
</div>
<div class="in1">
 
 <div class="box_1 art">
  <h3>
  <span><a target="_blank" href="news.php">公司新闻</a></span>
  <a target="_blank" href="news.php">更多</a>
  </h3>
  <div class="boxCenterList RelaArticle">
				<?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=4 OR parentstr LIKE '%,4,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",6);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
					else $gourl2 = 'news-'.$row['classid'].'-1.html';
				?>
					<a target="_blank" href="<?php echo $gourl ?>" title="<?php echo $row['title']?>"><?php echo $row['title']?></a>  
					<?php
					}
					?>
    </div>
 </div>
 
<div class="blank5"></div>
</div>
<div class="in1">
 
 <div class="box_1 art">
  <h3>
  <span><a target="_blank" href="news.php">网店运营</a></span>
  <a target="_blank" href="news.php">更多</a>
  </h3>
  <div class="boxCenterList RelaArticle">
    <?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=4 OR parentstr LIKE '%,4,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",6);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
					else $gourl2 = 'news-'.$row['classid'].'-1.html';
				?>
					<a target="_blank" href="<?php echo $gourl ?>" title="<?php echo $row['title']?>"><?php echo $row['title']?></a>  
					<?php
					}
					?>
    </div>
 </div>
 
<div class="blank5"></div>
 
</div>
 
</div>
 
 
 
 
 
 
</div>
<div class="blank"></div>
</div>
