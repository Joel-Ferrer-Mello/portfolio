<!-- PHP  -->
<?php
if (isset($_POST['BTEnviar'])) {
 
 //Variaveis de POST, Alterar somente se necessário 
 //====================================================
 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $telefone = $_POST['telefone']; 
 $mensagem = $_POST['mensagem'];
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
 $email_assunto = "FEMSoft Formulário de Contacto"; // Este será o assunto da mensagem
 //====================================================
 
 //Monta o Corpo da Mensagem
 //====================================================
 $email_conteudo = "Nome = $nome \n"; 
 $email_conteudo .= "Email = $email \n";
 $email_conteudo .= "Telefone = $telefone \n"; 
 $email_conteudo .= "Mensagem = $mensagem \n";
 if ($autorizo == 'on') {
  $email_conteudo .= "AUTORIZO que usem os meus dados para entrar em contacto comigo. \n";
} else {
  $email_conteudo .= "NÃO AUTORIZO que usem os meus dados para entrar em contacto comigo. \n";
}
 //====================================================
 
 //Seta os Headers (Alterar somente caso necessario) 
 //==================================================== 
 $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 //====================================================
 
 //Enviando o email 
 //==================================================== 
 if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
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
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/dist/css/bootstrap.css" rel="stylesheet">
<!-- Custom styles for this template -->
    <link href="estilos.css" rel="stylesheet">
  </head>
  <body>
<!-- BEGINNING OF HEADER  -->
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
<!-- END OF HEADER  -->
    <main role="main">
<!-- TÍTULO DA PÁGINA  -->
      <div id="titulo" class="container-fluid">
        <div class="d-flex p-3 justify-content-center align-items-center bd-highlight">     
          <h1 class="display-4">Contactos</h1>
       </div>     
      </div>
<!-- DESCRIÇÃO DOS CONTATOS: TELEMÓVEL, ENDEREÇOS E E-MAIL
  ================================================== -->
      <div class="container contactos-contactos">
        <div class="row">
          <div class="col-lg-4">
            <img class="contactos-img img-fluid" src="img/whatsapp-orange.png" alt="Telemóvel" >
            <br> <br>      
            <h2>Telemóvel e WhatsApp</h2>
            <p>Seg. a Sex. das 9h30 às 18h</p>
            <p>+351 915 382 120</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="contactos-img img-fluid" src="img/navigation-gold.png" alt="Endereço" >
            <br> <br>
            <h2>Endereço</h2>
            <p><strong>Braga - </strong>Praçeta Manuel Alvares, 8 Sétimo Andar, Direito, Frente.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="contactos-img img-fluid" src="img/e-mail.png" alt="e-mail">
            <br> <br>
            <h2>E-mail</h2>
            <p>ferrerdemello.lda@gmail.com</p>
          </div>
        </div>
        <hr class="featurette-divider">
<!-- BEGINNING THE CONTACT FORM  -->
        <div class="row">
          <div class="col-md-12">
            <h2 class="featurette-heading">Formulário de contacto</h2> <p> </p>
          </div>
          <div class="col-md-12">
            <h3 style="font-weight: 200;">Para mais informações sobre a nossa empresa ou serviços, preencha o formulário:</h3> <p> </p> 
          </div>
        </div>
        <form action="<? $PHP_SELF; ?>" method="POST">                  
          <div class="form-row">
            <div class="form-group col-md-12">
              <input  type="text" size="200" name="nome" class="form-control form-control-lg" placeholder="Insira o seu nome aqui:" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input  type="telefone" size="48" name="telefone" class="form-control form-control-lg" placeholder="Insira seu telefone aqui:">
            </div>
            <div class="form-group col-md-6">
              <input type="email" size="48" name="email" class="form-control form-control-lg" placeholder="Insira seu e-mail aqui:" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <textarea id="subject" name="mensagem" class="form-control form-control-lg" placeholder="Insira sua mensagem aqui..." rows="5" cols="173"  minlength="0" maxlength="1000" autocapitalize="sentences" required></textarea>
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
<!-- ENDING THE CONTACT FORM  -->
        <hr class="featurette-divider">
      </div>
<!-- BEGINNING THE FOOTER -->
      <footer class="container">
        <p class="float-right"><a class="footers" href="#">Back to top</a></p>
        <p>FEMSoft Desenvolvimento de Softwares. &middot; <a class="footers" href="#">Privacy</a> &middot; <a class="footers" href="#">Terms</a> &middot; <a class="footers" href="contactos.html">Contactos</a> </p>                 
      </footer>
<!-- ENDING THE FOOTER -->
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="assets/dist/js/bootstrap.bundle.js"></script>
  </body>
</html>