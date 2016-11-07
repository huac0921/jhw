<div class="AreaL2"> 
   <div class="box article_z">
 <div class="box_1 article_z">
 
 <?php
			if($cfg_isreurl=='Y')
				$gourl = 'goods-'.$cid.'-1.html';
			else
				$gourl = 'goods.php';
			?>
			
			
 
  <h3 class="h3_3"><span>文章分类</span></h3>
  <div class="left_art">
			
			<?php
			$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE `parentid`=98 AND `checkinfo`=true ORDER BY orderid ASC");
			while($row = $dosql->GetArray())
			{
					echo '<div class="zhuobox" ><a href="'.$row['linkurl'].'" ><h1>'.$row['classname'].'</h1></a>';
	
				$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE `parentid`=".$row['id']." AND `checkinfo`=true ORDER BY orderid ASC",$row['id']);
				while($row2 = $dosql->GetArray($row['id']))
				{
					if($cfg_isreurl=='Y')
						$gourl = 'news-'.$cid.'-'.$row2['id'].'-1.html';
					else
						$gourl = 'news.php?cid='.$cid.'&tid='.$row2['id'];

					echo '<div class="art_cont" style="display: none;" >';
					echo '<h2><a href="'.$gourl.'"';
					if($tid == $row2['id']) echo 'class="on"';
					echo '>'.$row2['classname'].'</a></h2></div>';
				}
				
				echo '</div>';
			}
			?>
                  
           
               
  </div>
 </div>
</div>
<div class="blank5"></div>
  </div>
  
  