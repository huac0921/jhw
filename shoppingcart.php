<?php	require_once(dirname(__FILE__).'/include/config.inc.php');




//初始化参数
$a = isset($a) ? $a : '';


//添加购物车
if($a == 'addshopingcart')
{

    //构成选中属性
    if(isset($typeid))
    {
        //参数过滤
        $typeid = intval($typeid);

        //获取商品属性
        $dosql->Execute("SELECT * FROM `#@__goodsattr` WHERE `goodsid`=$typeid");
        if($dosql->GetTotalRow() > 0)
        {
            //构成属性字符串
            $goodsattr = array();
            while($row = $dosql->GetArray())
            {
                //选中的属性构成字符串
                if(isset($_POST['attrid_'.$row['id']]))
                {
                    $goodsattr[$row['id']] = $_POST['attrid_'.$row['id']];
                }
            }
        }
        else
        {
            $goodsattr[$row['id']] = '';
        }
    }


    //初始化购物车字符串
    if(!empty($_COOKIE['shoppingcart']))
        $shoppingcart = unserialize(AuthCode($_COOKIE['shoppingcart']));
    else
        $shoppingcart = array();

    //判断是否更新购物车数量
    if(isset($types))
    {	//判断是否直接输入
        if(isset($gid))
        {
            $shoppingcart[$types][1] = $buynum;
        }
        else{
            //购物车数量(+1/-1)
            $shoppingcart[$types][1]= $shoppingcart[$types][1]+$buynum;
        }

        //购物车数量不能为负数
        if($shoppingcart[$types][1]<1)
        {
            $shoppingcart[$types][1]=1;
        }
    }
    //校检库存数量 housenum
    //
    $zhu = $dosql->GetOne("SELECT housenum FROM `#@__goods` WHERE `id`=$goodsid");
    if( $zhu['housenum'] < $shoppingcart[$types][1])
    {
        echo "1";
        exit();
    }


    //选中信息存入数组
    if(isset($goodsid) &&
        isset($buynum) &&
        isset($goodsattr))
    {
        //加载更新购物车商品属性

        //过滤参数
        $goodsid = intval($goodsid);
        $buynum  = intval($buynum);
        foreach($shoppingcart as $k=>$goods)
        {		//加载判断购物车商品属性与商品id
            if ($goodsid==$goods[0] and $goodsattr==$goods[2])
            {
                unset($shoppingcart[$k]);
                $buynum = $buynum+$goods[1];
                break;
            }
            else
            {
                $buynum=$buynum;
            }
        }

        $shoppingcart[] = array($goodsid, $buynum, $goodsattr);

    }
    //存入COOKIE
    setcookie('shoppingcart', AuthCode(serialize($shoppingcart),'ENCODE'));
    //echo TRUE;
    exit();
}


//移除一条购物记录
else if($a == 'delrow')
{
    if(!empty($_COOKIE['shoppingcart']))
    {
        //获取COOKIE值
        $shoppingcart = unserialize(AuthCode($_COOKIE['shoppingcart']));

        //去除数组中特定元素
        unset($shoppingcart[$key]);

        //更新后的COOKIE
        if(empty($shoppingcart))
            setcookie('shoppingcart', '', time()-3600);
        else
            setcookie('shoppingcart', AuthCode(serialize($shoppingcart),'ENCODE'));

        header('location:shoppingcart.php');
        exit();
    }
}

//移除一条购物记录
else if($a == 'updatecart')
{
    if(!empty($_COOKIE['shoppingcart']))
    {
        //获取COOKIE值
        $shoppingcart = unserialize(AuthCode($_COOKIE['shoppingcart']));

        //去除数组中特定元素
        unset($shoppingcart[$key]);

        //更新后的COOKIE
        if(empty($shoppingcart))
            setcookie('shoppingcart', '', time()-3600);
        else
            setcookie('shoppingcart', AuthCode(serialize($shoppingcart),'ENCODE'));

        header('location:shoppingcart.php');
        exit();
    }
}

//清空购物车
else if($a == 'empty')
{
    setcookie('shoppingcart', '', time()-3600);
    header('location:shoppingcart.php');
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php echo GetHeader(0,0,'购物车'); ?>
    <link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
    <link href="templates/default/style/shoppingcart.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
    <script type="text/javascript" src="templates/default/js/top.js"></script>
</head>
<body>
<!-- header-->
<?php require_once('headero.php'); ?>
<!-- /header-->
<div class="blank"></div>


<div class="block950">

    <div class="step step1">
        <ul class="ul1">
            我的购物车
        </ul>
        <ul class="ul2">
            填写购物信息
        </ul>
        <ul class="ul2">
            成功提交订单
        </ul>
    </div>

    <div class="subTitle" style="margin:0;"><span class="catname shopcart">商品购物车</span> <a
            href="shoppingcart.php?a=empty"><strong>清空购物车</strong></a>

        <div class="cl"></div>
    </div>
    <div class="cl"></div>
    <?php

    if(!empty($_COOKIE['shoppingcart']))
    {
        ?>
        <form id="formCart" name="formCart" method="post" >

            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="shoppingcart">
                <tr class="thead">

                    <td width="45%" height="30">&nbsp;&nbsp;&nbsp;商品名称</td>
                    <td width="15%">商品规格</td>
                    <td width="15%">购买数量</td>
                    <td width="15%">价格</td>
                    <td width="10%">操作</td>
                </tr>
                <tr>
                    <td height="10" colspan="4"></td>
                </tr>
                <?php

                //初始化参数
                $totalprice = '';
                $shoppingcart = unserialize(AuthCode($_COOKIE['shoppingcart']));

                //显示订单列表
                foreach($shoppingcart as $k=>$goods)
                {
                    ?>
                    <tr>
                        <td height="30">
                            <?php
                            $type=$goods[2];

                            //获取数据库中商品信息
                            $r = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE `id`=".intval($goods[0]));

                            //计算订单总价
                            $totalprice += $r['salesprice'] * $goods[1];

                            //输出商品名称
                            echo '<a href="goodsshow.php?cid='.$r['classid'].'&tid='.$r['typeid'].'&id='.$r['id'].'" class="title" target="_blank">'.$r['title'].'</a>';

                            //输出选中属性
                            foreach($goods[2] as $v)
                            {
                                echo '<span class="attr">'.$v.'</span>';
                            }
                            ?>
                        </td>
                        <td><?php echo $r['unit'] ;?></td>
                        <td>
                            <div class="number">
                                <a href="javascript:;" onclick="changenum(<?php echo $goods[0]; ?>,-1,'<?php echo $k ?>',<?php echo $r['salesprice'];?>);return false;"  class="Left sub" title="减少数量"></a>
                                <input type="text" name="goods_number[<?php echo $k; ?>]" id="goods_number_<?php echo $k; ?>" value="<?php echo $goods[1]; ?>" size="4" class="Left num" style="text-align:center " onBlur="change_number(<?php echo $goods[0]; ?>,this.value,<?php echo $k; ?>,<?php echo $r['salesprice'];?>)"/>
                                <a class="Left add" href="javascript:;" onclick="changenum(<?php echo $goods[0]; ?>,1,'<?php echo $k; ?>',<?php echo $r['salesprice'];?>);return false;"  title="增加数量"></a><span class="Left unit"></span>
                            </div></td>
                        <td id="salesprice_<?php echo $k ?>"><?php echo $r['salesprice']*$goods[1]; ?></td>
                        <td><a href="javascript:if (confirm('您确实要把该商品移出购物车吗？')) location.href='shoppingcart.php?a=delrow&key=<?php echo $k; ?>'; ">删除</a></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td height="60" colspan="4" align="right" valign="bottom"><strong class="total" >总计：</strong><span class="totalprice" id="totalprice"><?php echo $totalprice; ?></span></td>
                </tr>
            </table>
            <table style=" margin-top:10px;" width="100%" align="center" border="0" cellpadding="0" cellspacing="0"
                   bgcolor="#dddddd">
                <tbody>
                <tr>
                    <td bgcolor="#ffffff"><a href="goods.php"><img
                                src="templates/default/images/newgoods/continue.gif" alt="continue"></a></td>
                    <td bgcolor="#ffffff" style="text-align:right"><a href="order.php"><img
                                src="templates/default/images/newgoods/checkout.gif" alt="checkout"></a></td>
                </tr>
                </tbody>
            </table>
            <script language="javascript">

                var i = 0;
                function changenum(goodsid, diff ,type,salesprice)
                {	i++;
                    var t = $("#goods_number_" +type);
                    var totalprice = <?php echo $totalprice; ?>;
                    t.val((parseInt(t.val())+Number(diff)) < 1 ? 1: (parseInt(t.val())+ Number(diff)));//数量不能小于1
                    document.getElementById('salesprice_'+type).innerHTML = salesprice * t.val();
                    document.getElementById('totalprice').innerHTML = totalprice + salesprice * (t.val()-1);

                    change_goods_number(goodsid,diff,type,salesprice);
                }
                function change_goods_number(goodsid, goods_number ,type ,salesprice)
                {
                    $.ajax({
                        url  : 'shoppingcart.php?a=addshopingcart',
                        type : 'post',
                        data : {'goodsid':goodsid,'buynum':goods_number,'types':type},
                        dataType:'html',
                        success:function(msg){
                            if(msg==1)
                            {
                                alert('超出库存！');
                                window.location.reload();
                            }
                        }
                    });
                }
                function change_number(goodsid, goods_number ,type ,salesprice)
                {     var totalprice = <?php echo $totalprice; ?>;
                    $.ajax({
                        url  : 'shoppingcart.php?a=addshopingcart',
                        type : 'post',
                        data : {'gid':goodsid,'goodsid':goodsid,'buynum':goods_number,'types':type},
                        dataType:'html',
                        success:function(msg){
                            if(msg==1)
                            {
                                alert('超出库存!');
                                window.location.reload();
                            }
                        }
                    });
                    goods_number(goods_number < 1 ? 1: (goods_number));//数量不能小于1
                    document.getElementById('salesprice_'+type).innerHTML = salesprice * goods_number;
                    document.getElementById('totalprice').innerHTML = totalprice + salesprice * (goods_number-1);
                }

            </script>
        </form>
    <?php
    }
    else
    {
        echo '<div class="shoppingcartempty">您的购物车目前没有商品！</div>';
    }
    ?>
</div>
<!-- /mainbody-->
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->


</body>
</html>