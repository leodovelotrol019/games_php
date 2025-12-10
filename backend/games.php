<?php
// echo "<pre>";
// var_dump($_POST);
$nome = $_POST['nome'];
$publicadora = $_POST['publicadora'];
$ano = $_POST['ano'];
$genero = $_POST['genero'];
$plataforma = $_POST['plataforma'];


// configuração da conexão do banco de dados;
// criação de constante;
define("SERVIDOR","localhost");
define("USUARIO", "root");
define("SENHA","");
define("DATABASE","db_games");

$conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".
DATABASE.";charset=utf8",USUARIO,SENHA);
$sql = "INSERT INTO tb_games(nome,publicadora,ano,genero,plataforma) VALUES('$nome','$publicadora','$ano','$genero','$plataforma')";
$comando = $conexao->prepare($sql);

$comando->execute();
echo "Cadastro realizado com sucesso!";
?>