<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
	<form method="post" action="<?php echo url('files')?>" enctype="multipart/form-data">
		<table>
			<tr>
				<td>图片：</td>
				<td><input type="file" name="photo"></td>
			</tr>
			<input type="hidden" name="user_id" value="<?php echo $v['user_id']?>">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<tr>
				<td><input type="submit" value="更换头像"></td>
				<td><input type="reset" value="重置"></td>
			</tr>
		</table>
	</form>
</body>
</html>