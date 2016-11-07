<?php require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('import_excel'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>数据导入</title>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/js/mgr.func.js"></script>
</head>
<body>
<div class="mgr_header"> <span class="title">产品数据导入</span> <a href="javascript:location.reload();" class="reload">刷新</a></div>
<div class="import_excel">
	<form action="import_excel_upload.php" method="post" enctype="multipart/form-data">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="dataTable">
			<tbody>
				<tr>
					<td height="80" align="left">文件要求:</td> 
					<td>
						导入EXCEL文件一定要严格按照规定的格式，注意有选择的数据内容			
						<p>允许类型：XLSX(文件总大小不能超过20MB)</p>
					</td>
				</tr>
				<tr>
					<td height="80" align="left">选择导入文件:</td>
					<td>
						<p id="attachment1"><input name="excel" type="file"></p>
						<p style="color:red">导入文件请务必使用导入时专有数据模版&nbsp;
							<a href="excelmodel/jhw_product.xlsx">点击下载</a>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="formSubBtn">
			<input type="hidden" name="leadExcel" value="true">
			<input class="mgr_divb" name="submit" value="导入" type="submit">
			<input type="button" class="mgr_divb" value="返回" onclick="history.go(-1);" />
		</div>
	</form>
</div>
</body>
</html>