<?php
require(dirname(__FILE__) . '/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 1 : intval($cid);
$tid = empty($tid) ? 0 : intval($tid);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php echo GetHeader(1, $cid); ?>
    <link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
    <script type="text/javascript" src="templates/default/js/loadimage.js"></script>
    <script type="text/javascript" src="templates/default/js/top.js"></script>

</head>
<body>
<!-- header-->
<?php require('headero.php'); ?>
<!-- /header-->
<!-- mainbody -->

<div class="block clearfix">
    <div class="box">
        <div class="box_1">
            <div class="ur_here"><span>您当前所在位置：<?php echo GetPosStr($cid, 0); ?></span>


            </div>


        </div>
    </div>
    <div class="blank"></div>


    <div class="h3_2">
        <div class="f_l">
            <h1>本栏目商品</h1>(

            <?php
            $r = $dosql->GetOne("SELECT COUNT(*) as n FROM `#@__goods` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') and  delstate='' AND checkinfo=true  ");
            echo $r['n'];
            ?>    )
        </div>
     
    </div>
    <div class="blank"></div>

    <form name="compareForm" action="goods.php" method="post" onsubmit="return compareGoods(this);">
        <div class="cat_box">
            <?php
            if (empty($keyword)) {
                if (!empty($tid))
                    $sql = "SELECT * FROM `#@__goods` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND `typeid`=$tid AND delstate='' AND checkinfo=true ORDER BY hits DESC";
                else
                    $sql = "SELECT * FROM `#@__goods` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY hits DESC";
            } else {
                $sql = "SELECT * FROM `#@__goods` WHERE title LIKE '%$keyword%' or goodsid  LIKE '%$keyword%'  AND delstate='' AND checkinfo=true ORDER BY id DESC";
            }

            $dopage->GetPage($sql, 15);
            while ($row = $dosql->GetArray()) {
                if ($row['picurl'] != '') $picurl = $row['picurl'];
                else $picurl = 'templates/default/images/nofoundpic.gif';

                if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') $gourl = 'goodsshow.php?cid=' . $row['classid'] . '&tid=' . $row['typeid'] . '&id=' . $row['id'];
                else if ($cfg_isreurl == 'Y') $gourl = 'goodsshow-' . $row['classid'] . '-' . $row['typeid'] . '-' . $row['id'] . '-1.html';
                else $gourl = $row['linkurl'];
                $classid = $row['parentid'];
                ?>
                <div class="goodsItem_kuang" style="margin-right:20px;">
                    <div class="goodsItem" onmouseover="this.className=&#39;goodsItem goodsItem_on&#39;"
                         onmouseout="this.className=&#39;goodsItem&#39;">
                        <div class="fj">
                            <a href="<?php echo $gourl; ?>" target="_blank" class="fj_a1"><span
                                    class="biao pngfix"></span><span>详情介绍</span></a>

                        </div>
                        <a href="<?php echo $gourl; ?>" target="_blank"><img data-original="<?php echo $row['picurl']?>"
                                                                             src="<?php echo $row['picurl']?>"
                                                                             alt="<?php echo $row['title']?> "
                                                                             class="goodsimg" style="display: inline;"></a><br>

                        <p><a href="<?php echo $gourl; ?>" target="_blank"
                              title="<?php echo $row['title']?> "><?php echo $row['title']?><span></span></a></p>

                        <p class="lujin"><strong><a class="lj1" href="<?php echo $gourl; ?>" target="_blank"
                                                    title="叫货网">叫货网</a></strong></p>


                        <div class="clearfix">
                            <font class="f1">
                                ￥<strong style="font-size:16px;color:red;">
                                    <?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?>
                                </strong>
                            </font>
                            <a target="_blank" href="<?php echo $gourl; ?>"
                               class="pinlun">浏览(<?php echo $row['hits']; ?>)</a>

                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
        <div class="cl"></div>
    </form>
    <form name="selectPageForm" action="#" method="get">
        <div id="pager" class="pagebar">

            <?php echo $dopage->GetList(); ?>


        </div>
    </form>

    <div class="cl"></div>
</div>

<!-- /mainbody-->
<!-- footer-->
<?php require('footer.php'); ?>
<!-- /footer-->


</body>
</html>

