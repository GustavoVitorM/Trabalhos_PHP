<!DOCTYPE html>
<html lang="en" background="img/background.png">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index_style.css">
    <title>Document</title>
</head>
<body>
    

<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Exibir lista de alunos
echo "<h2>Lista de Alunos</h2>";
echo "<ul class='student_list'>";

if (count($_SESSION["alunos"]) == 0) {
    $_SESSION["alunos"] = array(
        array("nome" => "João Paulo Almeida", "idade" => 15, "notas" => array("portugues" => 8, "matematica" => 7, "historia" => 6, "geografia" => 9)),
        array("nome" => "Maria do Carmo Sousa", "idade" => 16, "notas" => array("portugues" => 9, "matematica" => 8, "historia" => 7, "geografia" => 8)),
        array("nome" => "Pedro Barbacena Pascoal", "idade" => 14, "notas" => array("portugues" => 7, "matematica" => 6, "historia" => 8, "geografia" => 7))
    );
}

foreach ($_SESSION["alunos"] as $aluno) {
    echo "<li><a href='detalhes_aluno.php?nome=".$aluno['nome']."'>{$aluno['nome']}</a></li>";
}
echo "</ul>";

// Botão para adicionar novo aluno
echo "<a href='adicionar_aluno.php' class='button add-student'>Adicionar Novo Aluno</a>";

// Botão para logout
echo "<br><br><a href='logout.php' class='button logout'>Logout</a>";
?>

</body>
</html>