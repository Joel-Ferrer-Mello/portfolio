<!-- PHP  -->
<?php
if (isset($_POST['BTEnviar']))
{
//Variaveis de POST, Alterar somente se necessário 
//====================================================
  $arquivos = $_FILES['arquivos'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone']; 
  $mensagem_form = $_POST['mensagem'];
  $autorizo = $_POST['autorizo']; 
//====================================================
//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
//==================================================== 
  $email_remetente = "femsoft@femsoftweb.com"; // deve ser uma conta de email do seu dominio 
//====================================================
//Configurações do email, ajustar conforme necessidade
//==================================================== 
  $email_destinatario = "femsoft.fdm@gmail.com"; // pode ser qualquer email que receberá as mensagens
  $email_reply = "$email"; 
  $email_assunto = "FEMSoft Solicitação de Orçamento"; // Este será o assunto da mensagem
//====================================================
/* Cabeçalho da mensagem INSERI DEPOIS  */
  $boundary = "XYZ-" . date("dmYis") . "-ZYX";
  $email_headers = "MIME-Version: 1.0\n";
  $email_headers.= "From: $email_remetente\n";
  $email_headers.= "Reply-To: $email\n";
  $email_headers.= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";  
  $email_headers.= "$boundary\n"; 
//Monta o Corpo da Mensagem
//====================================================
  $email_conteudo = "
  <br>Solicitação de Orçamento via WebSite da FEMSoft 
  <br>_______________________________________________<br>
  <br><strong>Nome = </strong> $nome
  <br><strong>Email = </strong> $email
  <br><strong>Telefone = </strong> $telefone
  <br><strong>Mensagem = </strong> $mensagem_form
  <br>";
  if ($autorizo == 'on') {
    $email_conteudo .= "AUTORIZO que usem os meus dados para entrar em contacto comigo. \n";
  } else {
    $email_conteudo .= "NÃO AUTORIZO que usem os meus dados para entrar em contacto comigo. \n";
  }
/* Função que codifica o anexo para poder ser enviado na mensagem  */
if(file_exists($arquivos["tmp_name"]) and !empty($arquivos))
{
  $fp = fopen($_FILES["arquivos"]["tmp_name"],"rb"); // Abri o arquivo enviado.
  $anexo = fread($fp,filesize($_FILES["arquivos"]["tmp_name"])); // Le o arquivo aberto na linha anterior
  $anexo = base64_encode($anexo); // Codifica os dados com MIME para o e-mail 
  fclose($fp); // Fecha o arquivo aberto anteriormente
    $anexo = chunk_split($anexo); // Divide a variável do arquivo em pequenos pedaços para poder enviar
    $mensagem = "--$boundary\n"; // Nas linhas abaixo possuem os parâmetros de formatação e codificação, juntamente com a inclusão do arquivo anexado no corpo da mensagem
    $mensagem.= "Content-Transfer-Encoding: 8bits\n"; 
    $mensagem.= "Content-Type: text/html; charset=\"utf-8\"\n\n";
    $mensagem.= "$email_conteudo\n"; 
    $mensagem.= "--$boundary\n"; 
    $mensagem.= "Content-Type: ".$arquivos["type"]."\n";  
    $mensagem.= "Content-Disposition: attachment; filename=\"".$arquivos["name"]."\"\n";  
    $mensagem.= "Content-Transfer-Encoding: base64\n\n";  
    $mensagem.= "$anexo\n";  
    $mensagem.= "--$boundary--\r\n"; 
}
else // Caso não tenha anexo
{
  $mensagem = "--$boundary\n"; 
  $mensagem.= "Content-Transfer-Encoding: 8bits\n"; 
  $mensagem.= "Content-Type: text/html; charset=\"utf-8\"\n\n";
  $mensagem.= "$email_conteudo\n";
}
//====================================================
 
 //Seta os Headers (Alterar somente caso necessario) 
 //==================================================== 
 //$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 //====================================================
 
 //Enviando o email 
 //==================================================== 
 if (mail ($email_destinatario, $email_assunto, $mensagem, $email_headers)){ 
  echo '<script language="javascript">';
  echo 'alert("E-MAIL ENVIADO COM SUCESSO!!!")'; 
  echo '</script>';
 } 
 else{ 
  echo '<script language="javascript">';
  echo 'alert("FALHA NO ENVIO DO E-MAIL!")';
  echo '</script>';
 } 

 //====================================================
} 
?>
<!-- HTML -->
<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Joel Ferrer de Mello, FEMSoft, Desenvolvimento de Software e Consultoria em Gestão">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>FEMSoft, Desenvolvimento de Software e Consultoria em Gestão</title>
<!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/dist/css/bootstrap.css" rel="stylesheet">
<!-- Custom styles for this template -->
    <link href="estilos.css" rel="stylesheet">
  </head>
  <body>
<!-- BEGINNG OF HEADER  -->
    <header>
<!--  BEGINNING OF MENUS -->      
     <div class="container">
      <nav class="navbar navbar-expand-md navbar-right navbar-dark bg-dark fixed-top py-md-3">  
<!-- BRAND = LOGO -->
        <a class="navbar-brand" href="index.html">      
          <img id="logo" src="img/LogoLittle.png">
        </a>
<!-- Botões do menu e responsividade -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
<!--  Itens do MENU -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto"> <!--  ml-auto alinha a barra de menus a direita  -->
            <li class="nav-item active">
              <a class="nav-link" href="index.html">HOME<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sobre.html">SOBRE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="servicos.html">SERVIÇOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="orcamentos.php">ORÇAMENTOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contactos.php" tabindex="-1" aria-disabled="true">CONTACTOS</a>
            </li>
          </ul>
        </div>
      </nav>
     </div>
<!--  END OF MENUS  -->
    </header>
<!-- END OF  HEADER  -->
<main role="main">
<!-- TÍTULO DA PÁGINA  -->
<!--  <div id="titulo" class="container-fluid">
    <div class="d-flex p-3 justify-content-center align-items-center bd-highlight">
      <h1 class="display-4">Orçamentos</h1>
    </div>     
  </div>
-->      

<!-- BEGINNING THE CONTACT FORM  -->
  <div class="container contactos-contactos">
    <div class="row">
      <div class="col-md-12">
        <blockquote class="blockquote">
          <p> </p>  <h1 class="tit2 font-weight-light text-uppercase">Pedir orçamento sem compromisso</h1> <p></p>
        </blockquote>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p class="lead">Pretende criar um site ou reformular um site que já possui? Criar uma loja online, criar um APP, ou impulsionar o seu site, etc…? Descreva-nos o seu projeto:</p> 
        <p> </p> <p> </p> <p> </p>
      </div>
    </div>
    <form action="<? $PHP_SELF; ?>" method="POST" enctype="multipart/form-data">
      <fieldset>
      <div class="form-row">
        <div class="form-group col-md-12">
          <input  type="text" size="200" name="nome" class="form-control form-control-md" placeholder="Insira o seu nome aqui:" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <input  type="telefone" size="48" name="telefone" class="form-control form-control-md" placeholder="Insira seu telefone aqui:">
        </div>
        <div class="form-group col-md-6">
          <input type="email" size="48" name="email" class="form-control form-control-md" placeholder="Insira seu e-mail aqui:" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <textarea id="subject" name="mensagem" class="form-control form-control-md" placeholder="Descreva o seu projeto aqui..." rows="5" cols="173"  minlength="0" maxlength="1000" autocapitalize="sentences" required></textarea>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <input id="arquivos" name="arquivos" class="input-file" type="file">
          <span class="help-block">Tamanho máximo de 2MB por mensagem.</span>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <input type="checkbox" name="autorizo" class="form-group" checked> <label>Autorizo que usem os meus dados para entrar em contacto comigo.*</label>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="reset" name="BTapagar" value="Apagar" class="btn btn-warning btn-block"> 
        </div>
         <div class="form-group col-md-6">
          <input type="submit" name="BTEnviar" value="enviar" class="btn btn-warning btn-block">
        </div>
      </div>
    </form>
    <hr class="featurette-divider">
</div>
<!-- ENDING THE CONTACT FORM  -->
<!-- START THE FOOTER -->
      <footer class="container">
        <p class="float-right"><a class="footers" href="#">Back to top</a></p>
        <p>FEMSoft Desenvolvimento de Softwares. &middot; <a class="footers" href="#">Privacy</a> &middot; <a class="footers" href="#">Terms</a> &middot; <a class="footers" href="contactos.html">Contactos</a> </p>                 
      </footer>
<!-- END OF THE SECTION FOOTER -->
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="assets/dist/js/bootstrap.bundle.js"></script>
  </body>
</html>