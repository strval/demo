<?php if (!defined('ROOT_PATH')) exit; ?>
<table border="1" cellspacing="0" style="width: 80%;margin: 0 auto;">
	<tr>
		<th>ID</th>
		<th>用户名</th>
		<th>电子邮箱</th>
		<th>状态</th>
		<th>时间</th>
	</tr>
	<tr>
		<td><?php echo htmlspecialchars($user['id']); ?></td>
		<td><?php echo htmlspecialchars($user['user']); ?></td>
		<td><?php echo htmlspecialchars($user['email']); ?></td>
		<td><?php echo htmlspecialchars($user['state']); ?></td>
		<td><?php echo htmlspecialchars($user['date']); ?></td>
	</tr>
</table>
