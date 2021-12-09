<?php

$orcamento = $_POST['orcamento'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$fkusuario = $_POST['fkusuario'];
$fkImagem = $_POST['fkImagem'];
date_default_timezone_set('America/Sao_Paulo');
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

// Compo E-mail
$arquivo = "
  <style type='text/css'>
  body {
  margin:0px;
  font-family:Verdane;
  font-size:12px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  .padLeft{
    padding-left: 7px;
  }
  </style>
    <html>
        <table width='510' border='1' cellpadding='5' cellspacing='0' bgcolor='#dce7f1'>
  <tr>
                 <td width='500' class='padLeft'>Orçamento: $orcamento</td>
                </tr>
                <tr>
                  <td width='320' class='padLeft'>Data Disponivel: <b>$data</b></td>
     </tr>
     <tr>
                  <td width='320' class='padLeft'>Horario Disponivel: $hora</td>
                </tr>
                <tr>
                <td width='320' class='padLeft'>Horario Disponivel: $fkusuario</td>
              </tr>
              <tr>
                <td width='320' class='padLeft'>Horario Disponivel: $fkImagem</td>
              </tr>
            </td>
          </tr>
          <tr>
            <td class='padLeft'>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
          </tr>
        </table>
    </html>
  ";

//enviar
// emails para quem será enviado o formulário
$destino = "$orcamento<$fkImagem>";
$assunto = "Teste de envio de e-mail pelo site.";

// É necessário indicar que o formato do e-mail é html
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Fabio Carvalho Estudio';
//$headers .= "Bcc: $EmailPadrao\r\n";

$enviaremail = mail($destino, $assunto, $arquivo, $headers);
if ($enviaremail) {
    echo "<script>alert('E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o "
            . "e-mail fornecido no formulário')</script>";
} else {
    echo "<script>alert('ERRO AO ENVIAR E-MAIL!')</script>";
}
echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
       URL='orcamento.php'\">";
?>