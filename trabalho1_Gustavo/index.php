<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
        <div class="container_form">

            <h1>Formulário de Cadastro</h1>

            <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                
                <div class="form_grupo">
                    <label for="nome" class="form_label">Nome</label>
                    <input type="text" name="nome" class="form_input" id="nome" placeholder="Nome" required>
                </div>

                <div class="form_grupo">
                    <label for="cpf" class="form_label">CPF: </label>
                    <input type="text" name="cpf" class="form_input" id="cpf" placeholder="521.563.247-82" required>
                </div>
                
                <div class="form_grupo">
                    <label for="e-mail" class="form_label">Email: </label>
                    <input type="email" name="email" class="form_input" id="email" placeholder="seuemail@email.com" required>
                </div>
                
                <div class="form_grupo">
                    <label for="datanascimento" class="form_label">Data de Nascimento: </label>
                    <input type="date" name="datanascimento" class="form_input" id="datanascimento" placeholder="Data de Nascimento" required>
                </div>        

                <div class="form_grupo">
                    <label for="telefone" class="text">Telefone: </label>
                    <input type="tel" name="telefone" class="form_input" id="telefone" placeholder="(31) 9 9999-9999" required>
                </div>

                <div class="check-btn">
                    <input type="checkbox" id="estudante" name="estudante"> Você é estudante?
                </div>

                <div class="submit">
                    <input type="hidden" name="acao" value="enviar">
                    <button type="submit" name="Submit" class="submit_btn" >Enviar</button>
                </div>
            </form>
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nome = $_POST["nome"];
                $cpf = $_POST["cpf"];
                $email = $_POST["email"];
                $dataNascimento = $_POST["datanascimento"];
                $telefone = $_POST["telefone"];
                $status = isset($_POST["estudante"]) ? "sim" : "não";
                $date = new DateTime($dataNascimento);
                $interval = $date->diff( new DateTime(date("Y-m-d")));
                $idade = $interval->format("%Y");

                echo "Eu $nome, $status sou estudante. Meu número de cpf é $cpf, nasci em $dataNascimento e tenho $idade anos de idade. Meu telefone para contato é $telefone e meu email é $email";
            } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_POST)) {
                echo "ERRO! Formulário não enviado!";
            };

            ?>
        </div><!--container_form-->
        <div class="container_image">

        </div>
    </body>
</html>
