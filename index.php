<!DOCTYPE html>
<html>
<head>
	<title>POST</title>
</head>
<body>

<form method="post" action="barang.php">
	<input type="text" name="id_barang" placeholder="ID barang" />
	<input type="number" name="terjual" placeholder="Yang terjual"/>
	<input type="text" name="admin_id" placeholder="admin id"/>
	<input type="submit" name="go" value="submit"/>
</form>
<br/>
<br/>
<br/>

<form method="post" action="login.php">
	<input type="text" name="username" placeholder="Username"/>
	<input type="text" name="password" placeholder="Password"/>
	<input type="text" name="role" placeholder="Roles"/>
	<input type="submit" name="logs" value="Login"/>
</form>
</body>
</html>