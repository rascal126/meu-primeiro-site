<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars($_POST["mensagem"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido!";
        exit;
    }

    $destinatario = "rochanicolas593@gmail.com";
    $assunto = "Novo contato de $nome";
    $corpo = "Nome: $nome\nE-mail: $email\nMensagem:\n$mensagem";
    $headers = "From: $email";

    if (mail($destinatario, $assunto, $corpo, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Falha no envio, tente novamente.";
    }
} else {
    echo "Acesso negado.";
}
?>