<?php
session_start();

// Verificar se o usuário já está logado
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: index.php");
    exit;
}

// Verificar se o formulário de login foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simulação de autenticação (poderia ser um banco de dados)
    $username = "admin";
    $password = "senha123";
    
    $_SESSION["alunos"] = [];

    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Nome de usuário ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login_style.css">
    <title>Login</title>
</head>
<body>
    <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Login</h2>
        <label for="username">Nome de Usuário:</label><br>
        <input type="text" id="username" name="username" placeholder="admin" required><br>
        <label for="password">Senha:</label><br>
        <input type="password" id="password" name="password" placeholder="senha123" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
