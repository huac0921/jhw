<div class="searbanner">
<div class="logo"></div>
<div class="search">
        <form name="search" method="GET" action="search.php">
        <input id="keyword" class="search-wrod" type="text" value="<?php echo $_GET["keywords"] ?>" name="keywords"></input>
        <button class="search-btn" type="submit">
        叫货网搜索
        </button>
        </form>
</div>
<div class="cc"></div>
</div>
<div class="connt">
        <ul class="news_list">
                <?php
                if(!empty($_GET["keywords"]))
                {
                        $keyword = htmlspecialchars($_GET["keywords"]);                        
                        $sql = "SELECT * FROM `#@__goods` WHERE title LIKE '%$keyword%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
                }
                else
                {
                        $sql = "SELECT * FROM `#@__goods` WHERE title LIKE '' AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
                }

                $dopage->GetPage($sql,15);
                while($row = $dosql->GetArray())
                {
                        if($row['picurl'] != '') $picurl = $row['picurl'];
                        else $picurl = 'templates/default/images/nofoundpic.gif';
                        if($row['linkurl']=='' and $cfg_isreurl!='Y') 
                                $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
                        else if($row['linkurl'] == '' and $cfg_isreurl=='Y') 
                                $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
                        else $gourl = $row['linkurl'];                        
                ?>
                        <li><div class="info"><span class="date"><?php echo MyDate('Y/m/d',$row['posttime']); ?></span>[<span style='font-weight:bold;color:#505050;'><?php echo GetCatName($cid=$row['classid']); ?></span>]<a href="<?php echo $gourl; ?>" target="_blank"><?php echo str_replace($keyword,"<font color='red' style='font-weight:bold;'>".$keyword."</font>",$row['title']); ?></a></div>
                        <div class="zy"><?php echo ReStrLen($row['description'],90); ?></div>
                        </li>
                <?php
                }
                ?>
                <?php echo $dopage->GetList(); ?>
        </ul>        
        <div class="cl"></div>        
</div>