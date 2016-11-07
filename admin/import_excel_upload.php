<?php
require_once(dirname(__FILE__).'/inc/config.inc.php');


//初始化参数
$tbname = '#@__goods';

if($_POST['leadExcel'] == "true")
{
    //引入上传类
    require_once(PHPMYWIND_DATA.'/httpfile/upload.class.php');

    $upload_info = UploadFile('excel');

    //下面的路径按照你PHPExcel的路径来修改
    require_once 'plugin/PHPExcel/PHPExcel.class.php';
    require_once 'plugin/PHPExcel/PHPExcel/IOFactory.php';
    require_once 'plugin/PHPExcel/PHPExcel/Reader/Excel5.php';

    /* 返回上传状态，是数组则表示上传成功*/
    // var_dump($upload_info);
    // exit();
    if(is_array($upload_info))
    {

        $uploadfile= $upload_info[3];

        $PHPExcel = new PHPExcel();
        $PHPReader = new PHPExcel_Reader_Excel2007();
        if(!$PHPReader->canRead($uploadfile)){
            $PHPReader = new PHPExcel_Reader_Excel5();
        }
        $PHPExcel = $PHPReader->load($uploadfile);
        $currentSheet = $PHPExcel->getSheet(0);
        $allRow = $currentSheet->getHighestRow();

        /* 方法*/
        $objWorksheet = $PHPExcel->getActiveSheet();

        $highestColumn = $objWorksheet->getHighestColumn();

        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//总列数

        for ($row = 6;$row <= $allRow;$row++)
        {
            $strs=array();
            //注意highestColumnIndex的列数索引从0开始
            for ($col = 0;$col < $highestColumnIndex;$col++)
            {
                $strs[$col] =$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            } 

            // var_dump($strs);

            if (empty($strs)) {
                $msg("表中没有内容!请填写相应内容");
                exit();
            }

            $hits = mt_rand(50, 200);

            $orderid = GetOrderID('#@__infoimg');

            $posttime = time();

            $checkinfo='true';

            $r= $dosql->GetOne("SELECT `parentid` FROM `#@__infoclass` WHERE `id`={$strs[1]}");
            $parentid = $r['parentid'];

            if($parentid == '0')
            {
                $parentstr = '0,';
            }
            else
            {
                $r1 = $dosql->GetOne("SELECT `parentstr` FROM `#@__infoclass` WHERE `id`=$parentid");
                $parentstr = $r1['parentstr'].$parentid.',';
            }

            $sql = "INSERT INTO `$tbname` ( classid,parentid, parentstr,typeid, title,flag,goodsid,payfreight,weight,marketprice,salesprice,saleminnum,integral,keywords,description,content,
            hits,orderid,posttime,checkinfo )
                                VALUES ( '$strs[1]', '$parentid', '$parentstr','$strs[2]', '$strs[3]', '$strs[4]','$strs[5]','$strs[6]','$strs[7]','$strs[8]','$strs[9]','$strs[10]','$strs[11]','$strs[12]','$strs[13]','$strs[14]',
                                hits,orderid,posttime,checkinfo)";
            if(!$dosql->ExecNoneQuery($sql))
            {
                echo 'sql语句有误';
            }
            $msg = "导入成功！";
        }
        unlink($uploadfile); //删除上传的excel文件
    }
    else
    {
       $msg = $upload_info;
    }
    showMsg($msg,'-1');
    exit();
}

?>