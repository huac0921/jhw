<script type="text/javascript" src="templates/default/js/head.js"></script>
<!--- 首页top   -->
<div id="topNav">
<div class="block clearfix">
<div class="topNav1">喜欢本站请 <a href="javascript:void(0);" onclick="AddFavorite('<?php echo $cfg_webname; ?>',location.href)" style="color:#b90404">收藏我们</a>  </div>
	
		<div class="f_r">
		<font id="FMOONS_COM"><div id="append_parent"></div>
 
 您好，欢迎光临<?php echo $cfg_webname; ?>！

<?php $c_uname = isset($_COOKIE['username']) ? AuthCode($_COOKIE['username']) : '';if($c_uname != ''){?><strong>（<?php echo substr($c_uname,0,10); ?>）</strong>欢迎您回来!&nbsp;&nbsp;<a href="member.php?c=default" title="进入会员中心">会员中心</a>&nbsp;&nbsp;<a href="shoppingcart.php">购物车</a>&nbsp;&nbsp;<a href="member.php?a=logout">注销</a><?php }else{ ?> <a href="member.php?c=login">登录</a> 或 <a href="member.php?c=reg">免费注册</a><?php } ?>
 
 </font>
						 <img src="templates/default/images/newgoods/biao2.gif"> <a href="news.php" target="_blank">帮助中心</a>
						 <img src="templates/default/images/newgoods/biao2.gif"> 
		<b><span>咨询热线：</span><?php echo $cfg_hotline; ?></b>
	</div>   
</div>
</div>
<!--- 首页top logo 搜索   -->
<div class="header_bg">
    <div class="block clearfix">
    <h1>
        <a href="#" title="<?php echo $cfg_webname ?>" ></a>
    </h1>
     <div style="float:left; padding:10px 0 0 20px;">
     <a class="logo_r2"  target="_blank"> </a>
     </div>
    
    <div style="float:right">
	<script type="text/javascript">
    
    <!--
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
            alert("请输入您搜索的关键字！");
            return false;
        }
    }
    -->
    
    </script>  
        <form id="searchForm" name="searchForm" method="get" action="goods.php" onsubmit="return checkSearchForm()">
            <div class="search_box"> 
            	<div class="box_cont">
                    <div class="search_list otr" id="text">酒类</div>
                    <ul id="se-ul" style="display: none;">
					<li>酒类</li>
                        <li>饮料类</li>
                        <li>调料类</li>
                        <li>米面粮油类</li>
                     
						
                    </ul>
                </div>
                		<input name="keyword" type="text" id="keyword" class="B_input" value="请输入关键字.." onclick="javascript:this.value=&#39;&#39;;">
            </div>
            <input type="submit" value="" class="go" style="cursor:pointer;">
        </form>
         <div class="search_no">
            <a href="shoppingcart.php">
            购物车
            </a>
        </div>
        <script type="text/javascript" src="templates/default/js/zhuo.js"></script>
    </div>
    </div>
</div>



<div class="headNav">
  <div class="navCon w1020">
    <div class="navCon-cate fl navCon_on">
	<?php
			if($cfg_isreurl=='Y')
				$gourl = 'goods-'.$cid.'-1.html';
			else
				$gourl = 'goods.php';
			?>
      <div class="navCon-cate-title"> 全部商品类型</div>
       <div class="cateMenu hide">
        <ul>
          <li style="border-top: none;">
           <div class="cate-tag"> <strong>酒类</strong>
              <div class="listModel" >
                <p> 
					<?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0  AND `checkinfo`=true and id between 1 and 5 LIMIT 0,4");
					
					
					while($row = $dosql->GetArray())
				{
					echo '<a target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</a>';
				?>				
				<?php
				} 
				?></p>
              </div>
            </div>
            <div class="list-item hide">
              <ul class="itemleft">
                <dl>
                  
					<?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and id between 1 and 5  AND `checkinfo`=true ORDER BY orderid ASC " );
					
					
					while($row = $dosql->GetArray())
				{
					echo '<dt target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</dt><div class="fn-clear">';
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=".$row['id']." AND `checkinfo`=true ORDER BY orderid ASC",$row['id']);
				while($row2 = $dosql->GetArray($row['id']))
				{
				
					echo '<dd><a target="_blank" href="'.$row2['linkurl'].'" >'.$row2['classname'].'</a></dd>';
				}
				
				echo '</div>';
				?>				
				<?php
				} 
				?>
                  
                </dl>
                <div class="fn-clear"></div>
              </ul>
              
            </div>
          </li>
          <li >
            <div class="cate-tag"> <strong>饮料类</strong>
              <div class="listModel">
               <ul> 
					<?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and id between 6 and 15 AND `checkinfo`=true ORDER BY orderid ASC LIMIT 0,3");
					
					
					while($row = $dosql->GetArray())
				{
					echo '<a target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</a>';
				?>				
				<?php
				} 
				?></ul>
            
              </div>
            </div>
            <div class="list-item hide">
              <ul class="itemleft">
                <dl>
                  <?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and id between 6 and 15 AND `checkinfo`=true ORDER BY orderid ASC " );
					
					
					while($row = $dosql->GetArray())
				{
					echo '<dt target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</dt><div class="fn-clear">';
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=".$row['id']." AND `checkinfo`=true ORDER BY orderid ASC",$row['id']);
				while($row2 = $dosql->GetArray($row['id']))
				{
					echo '<dd><a target="_blank" href="'.$row2['linkurl'].'" >'.$row2['classname'].'</a></dd>';
				}
				
				echo '</div>';
				?>				
				<?php
				} 
				?>
                  
                </dl>
                <div class="fn-clear"></div>
              </ul>
             
            </div>
          </li>
         <li >
            <div class="cate-tag"> <strong>调料类</strong>
              <div class="listModel">
               <ul> 
					<?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0  and  id between 16 and 20 AND `checkinfo`=true ORDER BY orderid ASC LIMIT 0,3");
					
					
					while($row = $dosql->GetArray())
				{
					echo '<a target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</a>';
				?>				
				<?php
				} 
				?></ul>
            
              </div>
            </div>
            <div class="list-item hide">
              <ul class="itemleft">
                <dl>
                  <?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0  and  id between 16 and 20  AND `checkinfo`=true ORDER BY orderid ASC " );
					
					
					while($row = $dosql->GetArray())
				{
					echo '<dt target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</dt><div class="fn-clear">';
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=".$row['id']." AND `checkinfo`=true ORDER BY orderid ASC",$row['id']);
				while($row2 = $dosql->GetArray($row['id']))
				{
					echo '<dd><a target="_blank" href="'.$row2['linkurl'].'" >'.$row2['classname'].'</a></dd>';
				}
				
				echo '</div>';
				?>				
				<?php
				} 
				?>
                  
                </dl>
                <div class="fn-clear"></div>
              </ul>
             
            </div>
          </li>
         <li >
            <div class="cate-tag"> <strong>米面粮油类</strong>
              <div class="listModel">
               <ul> 
					<?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 21 and 25 AND `checkinfo`=true ORDER BY orderid ASC LIMIT 0,3");
					
					
					while($row = $dosql->GetArray())
				{
					echo '<a target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</a>';
				?>				
				<?php
				} 
				?></ul>
            
              </div>
            </div>
            <div class="list-item hide">
              <ul class="itemleft">
                <dl>
                  <?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 21 and 25  AND `checkinfo`=true ORDER BY orderid ASC " );
					
					
					while($row = $dosql->GetArray())
				{
					echo '<dt target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</dt><div class="fn-clear">';
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=".$row['id']." AND `checkinfo`=true ORDER BY orderid ASC",$row['id']);
				while($row2 = $dosql->GetArray($row['id']))
				{
					echo '<dd><a target="_blank" href="'.$row2['linkurl'].'" >'.$row2['classname'].'</a></dd>';
				}
				
				echo '</div>';
				?>				
				<?php
				} 
				?>
                  
                </dl>
                <div class="fn-clear"></div>
              </ul>
             
            </div>
          </li>
           <li >
            <div class="cate-tag"> <strong>干货类</strong>
              <div class="listModel">
               <ul> 
					<?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 26 and 30 AND `checkinfo`=true ORDER BY orderid ASC LIMIT 0,3");
					
					
					while($row = $dosql->GetArray())
				{
					echo '<a target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</a>';
				?>				
				<?php
				} 
				?></ul>
            
              </div>
            </div>
            <div class="list-item hide">
              <ul class="itemleft">
                <dl>
                  <?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 26 and 30  AND `checkinfo`=true ORDER BY orderid ASC " );
					
					
					while($row = $dosql->GetArray())
				{
					echo '<dt target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</dt><div class="fn-clear">';
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=".$row['id']." AND `checkinfo`=true ORDER BY orderid ASC",$row['id']);
				while($row2 = $dosql->GetArray($row['id']))
				{
					echo '<dd><a target="_blank" href="'.$row2['linkurl'].'" >'.$row2['classname'].'</a></dd>';
				}
				
				echo '</div>';
				?>				
				<?php
				} 
				?>
                  
                </dl>
                <div class="fn-clear"></div>
              </ul>
             
            </div>
          </li>
		   <li >
            <div class="cate-tag"> <strong>冻品类</strong>
              <div class="listModel">
               <ul> 
					<?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 31 and 37 AND `checkinfo`=true ORDER BY orderid ASC LIMIT 0,4");
					
					
					while($row = $dosql->GetArray())
				{
					echo '<a target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</a>';
				?>				
				<?php
				} 
				?></ul>
            
              </div>
            </div>
            <div class="list-item hide">
              <ul class="itemleft">
                <dl>
                  <?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 31 and 37  AND `checkinfo`=true ORDER BY orderid ASC " );
					
					
					while($row = $dosql->GetArray())
				{
					echo '<dt target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</dt><div class="fn-clear">';
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=".$row['id']." AND `checkinfo`=true ORDER BY orderid ASC",$row['id']);
				while($row2 = $dosql->GetArray($row['id']))
				{
					echo '<dd><a target="_blank" href="'.$row2['linkurl'].'" >'.$row2['classname'].'</a></dd>';
				}
				
				echo '</div>';
				?>				
				<?php
				} 
				?>
                  
                </dl>
                <div class="fn-clear"></div>
              </ul>
             
            </div>
          </li>
		   <li >
            <div class="cate-tag"> <strong><a href="#">一次性消耗用品</a></strong>
              <div class="listModel">
               <ul> 
					<?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 38 and 42 AND `checkinfo`=true ORDER BY orderid ASC LIMIT 0,3");
					
					
					while($row = $dosql->GetArray())
				{
					echo '<a target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</a>';
				?>				
				<?php
				} 
				?></ul>
            
              </div>
            </div>
            <div class="list-item hide">
              <ul class="itemleft">
                <dl>
                  <?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 38 and 42  AND `checkinfo`=true ORDER BY orderid ASC " );
					
					
					while($row = $dosql->GetArray())
				{
					echo '<dt target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</dt><div class="fn-clear">';
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=".$row['id']." AND `checkinfo`=true ORDER BY orderid ASC",$row['id']);
				while($row2 = $dosql->GetArray($row['id']))
				{
					echo '<dd><a target="_blank" href="'.$row2['linkurl'].'" >'.$row2['classname'].'</a></dd>';
				}
				
				echo '</div>';
				?>				
				<?php
				} 
				?>
                  
                </dl>
                <div class="fn-clear"></div>
              </ul>
             
            </div>
          </li>
		     <li >
            <div class="cate-tag"> <strong>厨具类</strong>
              <div class="listModel">
               <ul> 
					<?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 43 and 49 AND `checkinfo`=true ORDER BY orderid ASC LIMIT 0,4");
					
					
					while($row = $dosql->GetArray())
				{
					echo '<a target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</a>';
				?>				
				<?php
				} 
				?></ul>
            
              </div>
            </div>
            <div class="list-item hide">
              <ul class="itemleft">
                <dl>
                  <?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 43 and 49 AND `checkinfo`=true ORDER BY orderid ASC " );
					
					
					while($row = $dosql->GetArray())
				{
					echo '<dt target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</dt><div class="fn-clear">';
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=".$row['id']." AND `checkinfo`=true ORDER BY orderid ASC",$row['id']);
				while($row2 = $dosql->GetArray($row['id']))
				{
					echo '<dd><a target="_blank" href="'.$row2['linkurl'].'" >'.$row2['classname'].'</a></dd>';
				}
				
				echo '</div>';
				?>				
				<?php
				} 
				?>
                  
                </dl>
                <div class="fn-clear"></div>
              </ul>
             
            </div>
          </li>
		   
		     <li >
            <div class="cate-tag"> <strong>餐具类</strong>
              <div class="listModel">
               <ul> 
					<?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 50 and 55 AND `checkinfo`=true ORDER BY orderid ASC LIMIT 0,3");
					
					
					while($row = $dosql->GetArray())
				{
					echo '<a target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</a>';
				?>				
				<?php
				} 
				?></ul>
            
              </div>
            </div>
            <div class="list-item hide">
              <ul class="itemleft">
                <dl>
                  <?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 50 and 55  AND `checkinfo`=true ORDER BY orderid ASC " );
					
					
					while($row = $dosql->GetArray())
				{
					echo '<dt target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</dt><div class="fn-clear">';
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=".$row['id']." AND `checkinfo`=true ORDER BY orderid ASC",$row['id']);
				while($row2 = $dosql->GetArray($row['id']))
				{
					echo '<dd><a target="_blank" href="'.$row2['linkurl'].'" >'.$row2['classname'].'</a></dd>';
				}
				
				echo '</div>';
				?>				
				<?php
				} 
				?>
                  
                </dl>
                <div class="fn-clear"></div>
              </ul>
             
            </div>
          </li>
		    <li >
            <div class="cate-tag"> <strong>保洁类</strong>
              <div class="listModel">
               <ul> 
					<?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 56 and 60 AND `checkinfo`=true ORDER BY orderid ASC LIMIT 0,3");
					
					
					while($row = $dosql->GetArray())
				{
					echo '<a target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</a>';
				?>				
				<?php
				} 
				?></ul>
            
              </div>
            </div>
            <div class="list-item hide">
              <ul class="itemleft">
                <dl>
                  <?php	
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=0 and  id between 56 and 60  AND `checkinfo`=true ORDER BY orderid ASC " );
					
					
					while($row = $dosql->GetArray())
				{
					echo '<dt target="_blank" href="'.$row['linkurl'].'" >'.$row['classname'].'</dt><div class="fn-clear">';
					
					$dosql->Execute("SELECT * FROM `#@__goodstype` WHERE `parentid`=".$row['id']." AND `checkinfo`=true ORDER BY orderid ASC",$row['id']);
				while($row2 = $dosql->GetArray($row['id']))
				{
					echo '<dd><a target="_blank" href="'.$row2['linkurl'].'" >'.$row2['classname'].'</a></dd>';
				}
				
				echo '</div>';
				?>				
				<?php
				} 
				?>
                  
                </dl>
                <div class="fn-clear"></div>
              </ul>
             
            </div>
          </li>
          <li>
            <div class="float-list-dnav"> </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="navCon-menu fl">
      <ul>
        <?php echo GetNav(); ?>      
      </ul>
    </div>
  </div>
</div>

<link href="templates/default/style/base.css" type="text/css" rel="stylesheet" />

