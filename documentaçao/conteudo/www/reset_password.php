<?php
	require_once("db.php");

	function resetPasswordTodosUtilizadores_ComSalt($novaPassword)
	{
		global $mydb;
		$query= "SELECT UserID FROM User";
		$stmt = $mydb->prepare($query);
		$stmt->execute();
		$stmt->bind_result($userid);
		$allUsersID = []; 
		while ($stmt->fetch())
			$allUsersID[]=$userid;
		$stmt->close();
		$query= "update User set Password=? where UserID=?";
		$stmtUpdate = $mydb->prepare($query);
		foreach ($allUsersID as $id) {
			$hashSenha = password_hash($novaPassword, PASSWORD_DEFAULT);	
			$stmtUpdate->bind_param("si", $hashSenha, $id);	
			$stmtUpdate->execute();		
		}
		$stmtUpdate->close();
		return count($allUsersID);
	}
	set_time_limit(300);  // Permite que o script demore até 5 minutos!!
	$totalUsersAlterados = resetPasswordTodosUtilizadores_ComSalt('123');
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Reset de Passwords</title>
  </head>
  <body>
		<h2>Reset de passwords</h2>
		<p>
			Foram alteradas as senhas de <?php echo $totalUsersAlterados?> utilizadores. Nova senha = 123.
		</p>
	</body>
</html>
