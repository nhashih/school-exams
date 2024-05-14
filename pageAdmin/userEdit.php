<!DOCTYPE html>
<html>
<head>
	<title>Edit User Data | SMarket</title>
</head>
<body>

	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA </h3>

	<?php
	include "../init/initConnection.php";
	$id = $_GET['id'];
	$result = mysqli_query($db,"SELECT * FROM users where id='$id'");
	while($users = mysqli_fetch_array($result)){
		?>
		<form method="POST" action="../init/process/processEdit.php">
			<table>
				<tr>
					<td>Username</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $users['id']; ?>">
						<input type="text" name="username" value="<?php echo $users['username']; ?>">
					</td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="<?php echo $users['name']; ?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="hidden" name="password" value="<?php echo $users['password']; ?>"></td>
					<td><input type="hidden" name="money" value="<?php echo $users['money']; ?>"></td>
					<td><input type="hidden" name="role" value="<?php echo $users['role']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Edited"></td>
				</tr>
			</table>
		</form>
		<?php
	}
	?>

</body>
</html>