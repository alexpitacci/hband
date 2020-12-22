<?php

class SendcontactController extends AppController
{

    public function create()
    {
        if (Input::hasPost("sendContact")) {
            $nome = Input::post('nome');
            $email = Input::post('email');
            $telefone = Input::post('phone');
            $mensagem = Input::post('message');

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "br436.hostgator.com.br";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "contato@hofband.com.br";
            $mail->Password = "1002Fernand@";
            $mail->SetFrom($email);
            $mail->Subject = "Mensagem de contato do site hofband";
            $mail->Body = "<br />Nome: $nome<br /> <br />Email: $email<br /> <br />Telefone: $telefone<br /> <br />Mensagem: $mensagem<br />";
            $mail->AddAddress("contato@hofband.com.br");
            if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
        }
    }
}
