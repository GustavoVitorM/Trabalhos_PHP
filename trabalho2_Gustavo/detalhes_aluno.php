<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detalhes_style.css">
    <title><?php echo $_GET["nome"] ?> detalhes</title>
</head>
<body>

<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Verificar se o parâmetro nome está presente na URL
if (!isset($_GET['nome'])) {
    header("Location: index.php");
    exit;
}

// Encontrar o aluno pelo nome
$aluno = null;
foreach ($_SESSION["alunos"] as $a) {
    if ($a['nome'] == $_GET['nome']) {
        $aluno = $a;
        break;
    }
}

// Se o aluno não foi encontrado, redirecionar para a página principal
if ($aluno == null) {
    header("Location: index.php");
    exit;
}

// Calcular média
$notas = $aluno['notas'];
$media = array_sum($notas) / count($notas);

// Exibir detalhes do aluno
echo "<h2>Detalhes do Aluno</h2>";
echo "<h3>{$aluno['nome']}</h3>";
echo "<p>Idade: {$aluno['idade']}</p>";
echo "<p>Notas:</p>";
echo "<ul>";
foreach ($notas as $materia => $nota) {
    echo "<li>{$materia}: {$nota}</li>";
}
echo "</ul>";
echo "<p>Média: {$media}</p>";

// Botão para voltar
echo "<br><br><a href='index.php'>Voltar</a>";
?>

    
</body>
</html>