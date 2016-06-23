<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
	<div>
		<form action="myOrderping" method="post">
			<CENTER>
				<h1>用户评论</h1>
				<table>
				<tr>
					<td>酒店名称:</td>
					<td><input type="hidden" name="hotel_id" value="<?php echo $v['hotel_id'] ?>" /><?php echo $v['hotel_name'] ?></td>
				</tr>
				<tr>
					<td>用户评论:</td>
					<td><textarea name="comment_text"cols="15" rows="5"></textarea></td>
				</tr>
				<tr>
					<td>用户评分:</td>
					<td>
						<input type="radio" name="hotel_score" value="5" />5分
						<input type="radio" name="hotel_score" value="4" />4分
						<input type="radio" name="hotel_score" value="3" />3分
						<input type="radio" name="hotel_score" value="2" />2分
						<input type="radio" name="hotel_score" value="1" />1分
					</td>
				</tr>
				<tr>
					<td><input type="hidden" name="user_id" value="<?php echo $v['user_id'] ?>" /></td>
					<td><input type="hidden" name="comment_time" value="<?php echo date('Y-m-d H:i:s'); ?>" /></td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<input type="hidden" name="card_status" value="<?php echo $v['card_status'] ?>">
					</td>
					<td><input type="submit" value="提交" /></td>
				</tr>
			</table>
			</CENTER>
		</form>
	</div>
</body>
</html>