<?php
	$maquina = 'localhost';
	$utilizador = 'root';
	$senha = '123';      // Se necessário alterar a senha
	$bdname = 'CETCAW-00';
	$mydb = @new mysqli($maquina, $utilizador, $senha, $bdname);
	$mydb->set_charset("utf8");
?>