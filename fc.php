<?php

 
if (isset($_POST['enviarFormulario2'])){
 

 
$enviaFormularioParaNome = 'Alexandre felix';
$enviaFormularioParaEmail = 'alexandrefelix07@hotmail.com';

$caixaPostalServidorNome = 'wordfelixinformatica.com.br';
$caixaPostalServidorEmail = 'duvidas@wordfelixinformatica.com.br';
$caixaPostalServidorSenha = '@felix2016';

$remetenteNome  = $_POST['remetenteNome'];
$remetenteEmail = $_POST['remetenteEmail'];
$telfixo  = $_POST['telfixo'];
$telcel  = $_POST['telcel'];
$assunto  = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
 
$mensagemConcatenada .= ' Ordem de Seviço <br/>'; 
$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
$mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>'; 
$mensagemConcatenada .= 'E-mail: '.$remetenteEmail.'<br/>'; 
$mensagemConcatenada .= 'Telefone fixo: '.$telfixo.'<br/>';
$mensagemConcatenada .= 'telefone celular: '.$telcel.'<br/>';
$mensagemConcatenada .= 'Tipo de Serviço Solicitado : '.$assunto.'<br/>';
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
    <title>FormCadastro</title>
	
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
<caption>ORDEM DE SERVIÇO </caption>
</table>
 <form method="post" id="fc" action="" >
 
<fieldset id="user"> <legend>Dados De Contato</legend> 	
<p><label for="cnome" >Nome: </label><input required  type="text" name="remetenteNome" id="cnome" size="45" maxlength="50" placeholder="Nome Completo"/></p>
<p><label for="cmail">E-mail:</label><input type="email" name="remetenteEmail" id="cmail" size="45" maxlength="40" placeholder="E-mail "/></p>		
<p><label for="cnume">Tel.Fixo:</label><input type="tel" name="telfixo" size="13" maxlength="13" placeholder="99-9999-99999" OnKeyPress="formatar('##-####-####', this)" >	<label for="cnumec" >Tel.Cel:</label><input required type="telc" name="telcel" size="14" maxlength="13" placeholder="99-9999-99999" OnKeyPress="formatar('##-####-####', this)" ></p>
</fieldset >

<fieldset id="tipo"><legend>Escolha o Tipo de Serviço</legend> 
<p><input type=radio   name=assunto value="Remoção de virus" id="ctipo1"/>	<label class="as" for="ctipo1">Remoção de virus</label>
<input type=radio  name=assunto value="Formatação " id="ctipo2"  />	<label class="as" for="ctipo2">Formatação</label>	
<input type=radio  name=assunto value="Revisao Impressora" id="ctipo3"  />	<label class="as" for="ctipo3">Revisao Impressora</label>	
<input type=radio  name=assunto value="Revisao Computador" id="ctipo4"  />	<label class="as" for="ctipo4"> Revisao Computador</label>
<input type=radio  name=assunto value="Revisao Notebook" id="ctipo5"  />	<label class="as" for="ctipo5"> Revisao Notebook </label></p>	
<p><input type=radio  name=assunto value="Reparo e Conserto de Fontes " id="ctipo7"  />	<label class="as" for="ctipo7">Reparo e Conserto de Fontes</label>	
<input type=radio  name=assunto value="Reparo e Conserto de Placas Eletronica " id="ctipo8"/><label class="as" for="ctipo8">Reparo e Conserto de Placas Eletronica</label>	 
<input type=radio  name=assunto value="Reparo e Conserto de Teclado " id="ctipo9"  /><label class="as" for="ctipo9">Reparo e Conserto de Teclado</label><br/><br/>
<input type=radio  name=assunto value="Reparo e Conserto de Carcaça Notebook  " id="ctipo10"  /><label class="as" for="ctipo10">Reparo e Conserto de Carcaça Notebook </label>
<input type=radio  name=assunto value="Outros" id="ctipo6"  />	<label class="as" for="ctipo6">Outros </label></br></p>		


<p><input type=radio  name=assunto value="Linguagens para Web" id="ctipob" /><label class="as" for="ctipob"> Desenvolvimento e Analise Linguagens para Web </label>	</p>
  <p><option value="html">HTML (linguagem de marcação)</option>
  <option value="css">CSS (linguagem de estilo)</option>
  <option value="js">JavaScript (linguagem de programação)</option>
  <option value="php">PHP (linguagem de programação)</option>
 </optgroup></p>
 <p><input type=radio  name=assunto value="Linguagens para Desktop" id="ctipoc" /><label class="as" for="ctipoc"> Desenvolvimento e Analise Linguagens para Desktop </label></p>	
 <p> <option value="c">C (linguagem de programação)</option>
  <option value="delphi">Delphi (linguagem de programação)</option>
  <option value="java">Java (linguagem de programação)</option>
 </optgroup><p>



</fieldset>
<fieldset id="leg"><Legend>Descrição detalhada do Serviço</legend>
 <p><label for="cmsg">Mensagem:</label>
        <textarea required  name="mensagem" id="cMsg" cols="60" rows="8"placeholder="Descreva seu pedido ou Serviço  

Se deseja uma rapidez maior informe o Whatsapp nos telefone acima ! " ></textarea></p></fieldset>
<br/>


  <input class="b"  type="reset"  value=" Limpar tudo " />
  <input class="b" type="submit" value=" Enviar Pedido " name="enviarFormulario2"/>
 </form>

 
</form>
</form>
</br>
</br>
</br>
</br></br>
<footer id="rodape">


   <p> Copyright &copy; 2016 - by Alexandre Felix Menezes<br></p>
       <p> <a href="https://www.facebook.com/alexandre.felix.923" target="_blank"><img id="qq" src="_img/facebook_alt.png"/></a></p>
	
		
  </footer>>
</div>
</body>
</html>


