<?php

 
if (isset($_POST['enviarFormulario'])){
 

 
$enviaFormularioParaNome = 'Alexandre felix';
$enviaFormularioParaEmail = 'alexandrefelix07@hotmail.com';

$caixaPostalServidorNome = 'wordfelixinformatica.com.br';
$caixaPostalServidorEmail = 'duvidas@wordfelixinformatica.com.br';
$caixaPostalServidorSenha = '@felix2016';

$remetenteNome  = $_POST['remetenteNome'];
$remetenteEmail = $_POST['remetenteEmail'];
$assunto  = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
 
$mensagemConcatenada = 'Fale Conosco'.'<br/>'; 
$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
$mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>'; 
$mensagemConcatenada .= 'E-mail: '.$remetenteEmail.'<br/>'; 
$mensagemConcatenada .= 'Assunto: '.$assunto.'<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
$mensagemConcatenada .= 'Mensagem: "'.$mensagem.'"<br/>';
 
 
/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
 
require_once('PHPMailerAutoload.php');
 
$mail = new PHPMailer();
 
$mail->IsSMTP();
$mail->SMTPAuth  = true;
$mail->Charset   = 'utf8_decode()';
$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
$mail->Port  = '587';
$mail->Username  = $caixaPostalServidorEmail;
$mail->Password  = $caixaPostalServidorSenha;
$mail->From  = $caixaPostalServidorEmail;
$mail->FromName  = utf8_decode($caixaPostalServidorNome);
$mail->IsHTML(true);
$mail->Subject  = utf8_decode($assunto);
$mail->Body  = utf8_decode($mensagemConcatenada);
 
 
$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
if(!$mail->Send()){
$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
}else{
$mensagemRetorno = 'Formulário enviado com sucesso!';

} 
 
}

?>

<!doctype html>
<html lang="pt-br" >
<head>
    <meta charset="utf-8"/>
    <title>Faleconosco</title>
    <link rel="stylesheet" type="text/css" href="_css/style.css" >
	<link rel="stylesheet" type="text/css" href="_css/form.css" >
</head>
<body>
		<?php
if(isset($mensagemRetorno)){

echo "<script>alert('$mensagemRetorno');</script>";

	
}
 
?>  


<script language="JavaScript" src="_js/arquivo.js"></script>
<div id="interface" >


    
          <header id="cabecalho">
              <img id="fotojs"src="_img/logo2.png"  >

                           <hgroup>
                            <h1>Word Felix Informática</h1>
                            <h2>Serviços na Tecnologia</h2>
                           </hgroup>
                            <nav id="menu">
                              
                       <ul>
                      <li onmouseover="mudafoto('_img/home.png')" onmouseout="mudafoto('_img/logo2.png')"><a href="index.html"> Home</a></li>
                  <li onmouseover="mudafoto('_img/Disk Tools.png')" onmouseout="mudafoto('_img/logo2.png')"><a href="servicos.html">Serviços</a></li>
			<li onmouseover="mudafoto('_img/MSN Messenger Talk.png')" onmouseout="mudafoto('_img/logo2.png')"><a href="faleconosco.php">Fale Conosco</a></li>
                           <li onmouseover="mudafoto('_img/Info.png')" onmouseout="mudafoto('_img/logo2.png')"><a href="sobre.html">Sobre</a></li>

                                </ul>
                            </nav>
          </header>
	  

		  <table id="tabela">
<caption>Envie Sua Mensagem ou Dúvida</caption>
</table>

  <form method="post" id="fcontato" action="" >



  <fieldset id="user1"> <legend>Dados De Contato</legend>
   <p><label for="cnome"> Nome:   </label><input required  type="text" name="remetenteNome"  size="45px" maxlength="50" placeholder="Nome Completo"/></p>
   <p><label for="cmail">E-mail:</label><input required  type="email" name="remetenteEmail"  size="45px" maxlength="40" placeholder="E-mail"/></p>
    <p><label for="cmail">Assunto:</label><input required  type="text" name="assunto"  size="43px" maxlength="40" placeholder="Assunto"/></p>
  
    </fieldset >

   <fieldset id="leg"> <legend>Mensagem ou Dúvida</legend>

    <p><label for="cmsg">Mensagem:</label>
        <textarea required  name="mensagem" placeholder="Se deseja uma rapidez maior informe o Whatsapp !" cols="60" rows="9"placeholder="Deixe sua Mesagem" ></textarea></p></fieldset>


<br/>

  <input class="c"  type="reset"  value=" Limpar tudo " />
<input type="submit" class="c"  value=" Enviar Mensagem " name="enviarFormulario"/>

</form>
</br>
</br>
</br>
</br></br>
<footer id="rodape">


   <p> Copyright &copy; 2016 - by Alexandre Felix Menezes<br></p>
       <p> <a href="https://www.facebook.com/alexandre.felix.923" target="_blank"><img id="qq" src="_img/facebook_alt.png"/></a></p>
	
		
  </footer>
</div>
</body>
</html>



