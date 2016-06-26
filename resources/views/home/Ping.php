	<?php 
			 foreach ($card as $key => $v) {
			 	echo "<form action='myOrderping' method='post'>
			<CENTER>
				<h1>用户评论</h1>
				<table>
				<tr>
					<td>酒店名称:</td>
					<td><input type='hidden' name='hotel_id' value='".$v['hotel_id']."' />".$v['hotel_name']."</td>
				</tr>
				<tr>
					<td>用户评论:</td>
					<td><textarea name='comment_text'cols='15' rows='5'></textarea></td>
				</tr>
				<tr>
					<td>用户评分:</td>
					<td>
						<input type='radio' name='hotel_score' value='5' />5分
						<input type='radio' name='hotel_score' value='4' />4分
						<input type='radio' name='hotel_score' value='3' />3分
						<input type='radio' name='hotel_score' value='2' />2分
						<input type='radio' name='hotel_score' value='1' />1分
					</td>
				</tr>
				<tr>
					<td><input type='hidden' name='user_id' value='".$v['user_id']."' /></td>
					<td><input type='hidden' name='comment_time' value='".date('Y-m-d H:i:s')."' /></td>
				</tr>
				<tr>
					<td>
						<input type='hidden' name='_token' value='".csrf_token()."'>
						<input type='hidden' name='card_status' value='".$v['card_status']."'>
					</td>
					<td><input type='submit' value='提交' /></td>
				</tr>
			</table>
			</CENTER>
		</form>
";

			 }


		 ?>	