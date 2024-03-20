<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar os dados do formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $historia = $_POST['historia'];
    $geografia = $_POST['geografia'];
    $matematica = $_POST['matematica'];
    $portugues = $_POST['portugues'];

    

    array_push($_SESSION["alunos"], array("nome" => $nome, "idade" => $idade,
     "notas" => array("portugues" => $portugues, "matematica" => $matematica, "historia" => $historia, "geografia" => $geografia)));

    // Redirecionar de volta para a página principal
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adicionar_style.css">
    <title>Adicionar Aluno</title>
</head>
<body>
    <h2>Adicionar Aluno</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="idade">Idade:</label><br>
        <input type="number" id="idade" name="idade" required><br><br>
        <label for="idade">Nota Geografia:</label><br>
        <input type="number" id="geografia" name="geografia" required><br><br>
        <label for="idade">Nota História:</label><br>
        <input type="number" id="historia" name="historia" required><br><br>
        <label for="idade">Nota Matemática:</label><br>
        <input type="number" id="matematica" name="matematica" required><br><br>
        <label for="idade">Nota Português:</label><br>
        <input type="number" id="portugues" name="portugues" required><br><br>
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>
