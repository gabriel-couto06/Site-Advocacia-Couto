<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome     = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $periodo  = $_POST['periodo'] ?? '';
    $objetivo = $_POST['objetivo'] ?? '';

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP (HostGator)
        $mail->isSMTP();
        $mail->Host = 'mail.advocaciacouto.com.br';
        $mail->SMTPAuth = true;
        $mail->Username = 'contato@advocaciacouto.com.br';
        $mail->Password = '883224Dra@';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->CharSet = 'UTF-8';

        // Remetente e destinatário
        $mail->setFrom('contato@advocaciacouto.com.br', 'Site Advocacia Couto');
        $mail->addAddress('contato@advocaciacouto.com.br');

        // Conteúdo
        $mail->isHTML(true);
        $mail->Subject = 'Novo contato do site';
        $mail->Body = "
            <h2>Novo contato recebido</h2>
            <p><strong>Nome:</strong> {$nome}</p>
            <p><strong>Telefone:</strong> {$telefone}</p>
            <p><strong>Melhor horário:</strong> {$periodo}</p>
            <p><strong>Área de interesse:</strong> {$objetivo}</p>
        ";

        $mail->send();
        echo "
    <div style='
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background-color: #eafbea;
        border: 1px solid #2ecc71;
        border-radius: 8px;
        font-family: Arial, sans-serif;
        font-size: 18px;
        color: #2d7a2d;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    '>
        ✅ Mensagem enviada com sucesso!
    </div>
";
    } catch (Exception $e) {
        echo "
        <div style='
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fdeaea;
            border: 1px solid #e74c3c;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            font-size: 18px;
            color: #a83232;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        '>
            ❌ Erro ao enviar: {$mail->ErrorInfo}
        </div>
    ";
    }
}
?>