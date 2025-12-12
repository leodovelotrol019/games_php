<?php
$host = "localhost";
$banco = "db_games";
$usuario = "root";
$senha = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   die("Erro na Conexão" . $e->getMessage());
}
$sql = "select * from tb_games";
$stmt =  $pdo->prepare($sql);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Games</title>
    <link rel="stylesheet" href="../games.css">
</head>

<body>

    <h1>Lista de games</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Publicadora</th>
            <th>Ano</th>
            <th>Gênero</th>
            <th>Plataforma</th>
        </tr>

        <?php if (count($resultados) > 0): ?>

            <?php foreach ($resultados as $linha): ?>
                <tr>
                    <td><?= $linha["id"] ?></td>
                    <td><?= $linha["nome"] ?></td>
                    <td><?= $linha["publicadora"] ?></td>
                    <td><?= $linha["ano"] ?></td>
                    <td><?= $linha["genero"] ?></td>
                    <td><?= $linha["plataforma"] ?></td>
                </tr>
            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="6">Nenhum jogo cadastrado</td>
            </tr>

        <?php endif; ?>

    </table>

</body>

</html>